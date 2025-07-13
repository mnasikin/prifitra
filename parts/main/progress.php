<?php
header("Content-Type: text/plain");

$filename = $_GET['file'] ?? '';
$logFolder = dirname(dirname(__DIR__)) . '/log';
$progressFile = $logFolder . '/' . basename($filename);

if (file_exists($progressFile)) {
    $lines = file($progressFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $lastLine = end($lines);

    echo $lastLine ?: "0|0";

    // Auto-delete if progress is 100%
    $parts = explode('|', $lastLine);
    if (isset($parts[0]) && intval($parts[0]) >= 100) {
        unlink($progressFile);
    }
} else {
    echo "0|0";
}
?>
