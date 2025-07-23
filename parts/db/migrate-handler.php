<?php
define('BASE_DIR', dirname(dirname(dirname(__DIR__))));
$downloadDir = BASE_DIR . '/download';
$logFile = BASE_DIR . '/log/progress.txt';

// Create folders
if (!is_dir($downloadDir)) mkdir($downloadDir, 0755, true);
if (!is_dir(BASE_DIR . '/log')) mkdir(BASE_DIR . '/log', 0755, true);

// Progress polling
if (isset($_GET['progress'])) {
    if (file_exists($logFile)) {
        $lines = file($logFile); $last = trim(end($lines));
        list($percent, $text) = explode('|', $last);
        echo json_encode(['percent'=>(int)$percent, 'text'=>$text]);
    } else echo json_encode(['percent'=>0, 'text'=>'Starting...']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldHost=$_POST["old_host"]; $oldUser=$_POST["old_user"]; $oldPass=$_POST["old_pass"]; $oldDB=$_POST["old_db"];
    $newHost=$_POST["new_host"]; $newUser=$_POST["new_user"]; $newPass=$_POST["new_pass"]; $newDB=$_POST["new_db"];
    $mode=$_POST["mode"] ?? 'compatible';

    if (!$oldHost||!$oldUser||!$oldDB||!$newHost||!$newUser||!$newDB) {
        echo json_encode(['success'=>false,'message'=>'Please fill all fields']); exit;
    }

    $time = date('Y-m-d_H-i-s');
    $dumpFile = "$downloadDir/dump-$time.sql.gz";

    if ($mode=='fast') {
        // Fast mode: shell + mysqldump
        file_put_contents($logFile,"10|Dumping old DB...\n");
        $cmd = "mysqldump -h $oldHost -u $oldUser -p'$oldPass' $oldDB | gzip > $dumpFile";
        $out = shell_exec($cmd.' 2>&1');

        if (!file_exists($dumpFile)||filesize($dumpFile)==0) {
            echo json_encode(['success'=>false,'message'=>"Dump failed:<br><pre>$out</pre>"]); exit;
        }
        file_put_contents($logFile,"50|Importing into new DB...\n", FILE_APPEND);
        $cmdImport="gunzip < $dumpFile | mysql -h $newHost -u $newUser -p'$newPass' $newDB";
        $outImport=shell_exec($cmdImport.' 2>&1');
        unlink($dumpFile);
        file_put_contents($logFile,"100|Finished!\n", FILE_APPEND);
        echo json_encode(['success'=>true,'message'=>'Migration completed (Fast mode).']);
    } else {
        // Compatible mode: PHP-only
        file_put_contents($logFile,"10|Connecting to old DB...\n");
        $oldDb = new mysqli($oldHost,$oldUser,$oldPass,$oldDB);
        if($oldDb->connect_error) { echo json_encode(['success'=>false,'message'=>'Old DB error']); exit;}
        $newDb = new mysqli($newHost,$newUser,$newPass,$newDB);
        if($newDb->connect_error) { echo json_encode(['success'=>false,'message'=>'New DB error']); exit;}

        $tables=[]; $res=$oldDb->query("SHOW TABLES"); while($r=$res->fetch_array()) $tables[]=$r[0];
        $count=count($tables); $i=0;

        foreach($tables as $table){
            $i++;
            file_put_contents($logFile, round($i/$count*80+10)."|Migrating $table...\n", FILE_APPEND);
            $resC=$oldDb->query("SHOW CREATE TABLE `$table`"); $rowC=$resC->fetch_assoc();
            $newDb->query("DROP TABLE IF EXISTS `$table`"); $newDb->query($rowC['Create Table']);
            $resD=$oldDb->query("SELECT * FROM `$table`");
            while($row=$resD->fetch_assoc()){
                $cols=array_map(fn($c)=>"`$c`",array_keys($row));
                $vals=array_map([$newDb,'real_escape_string'],array_values($row));
                $vals=array_map(fn($v)=>"'$v'",$vals);
                $newDb->query("INSERT INTO `$table` (".implode(',',$cols).") VALUES (".implode(',',$vals).")");
            }
        }
        file_put_contents($logFile,"100|Finished!\n", FILE_APPEND);
        echo json_encode(['success'=>true,'message'=>'Migration completed (Compatible mode).']);
    }
}
?>
