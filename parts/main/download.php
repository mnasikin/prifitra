<?php
header("Content-Type: text/html; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileURL = $_POST["file_url"];
    $destinationFolder = $_POST["destination_folder"];
    $fileName = $_POST["file_name"];
    $fileExtension = $_POST["file_extension"];
    $extFile = dirname(dirname(__DIR__)) . "/inc/main/data/ext.json";
    $extData = json_decode(file_get_contents($extFile), true);

    // Detect protocol from file
    $protocol = (strpos($fileURL, "https://") === 0) ? "https" : "http";

    // Set default folder to /download if destination form empty
    if (empty($destinationFolder)) {
        $destinationFolder = dirname(dirname(__DIR__)) . '/download'; // absolute path
        $relativeFolder = 'download'; // for URL
    } else {
        $relativeFolder = trim($destinationFolder, '/');
        $destinationFolder = dirname(dirname(__DIR__)) . '/' . $relativeFolder;
    }

    // Data validation
    if (
        (filter_var($fileURL, FILTER_VALIDATE_URL) && in_array($protocol, ["http", "https"])) &&
        !empty($fileName) &&
        in_array($fileExtension, $extData['extensions'])
    ) {
        // Current installation dir
        $currentDirectory = dirname(dirname(__DIR__));

        // Generate URL with protocol
        $fullFileURL = $fileURL;

        // Generate path to directory
        $fullDestinationFolder = rtrim($destinationFolder, '/');

        // Generate folder (if submitted folder does not exist)
        if (!is_dir($fullDestinationFolder)) {
            mkdir($fullDestinationFolder, 0755, true);
        }

        // Generate file name with chosen extension
        $fullFileName = $fileName . "." . $fileExtension;

        // Save file to destination folder
        $filePath = $fullDestinationFolder . "/" . $fullFileName;

        // Replace file_get_contents with cURL download
        function downloadFileWithProgress($url, $destinationPath, $progressFile) {
            $remoteSize = 0;
            $downloadedSize = 0;
            $lastLoggedSize = 0;

            // Get remote file size
            $headers = get_headers($url, 1);
            if (isset($headers['Content-Length'])) {
                $remoteSize = (int)$headers['Content-Length'];
            }

            // Open remote stream
            $readStream = fopen($url, 'rb');
            if (!$readStream) {
                file_put_contents($progressFile, "0|0\n", FILE_APPEND);
                return false;
            }

            // Open local file for writing
            $writeStream = fopen($destinationPath, 'wb');
            if (!$writeStream) {
                fclose($readStream);
                file_put_contents($progressFile, "0|0\n", FILE_APPEND);
                return false;
            }

            $chunkSize = 1024 * 64; // 64KB
            $chunkLimit = 50 * 1024 * 1024; // 50MB
            $chunkCounter = 0;
            $logThreshold = 1024 * 1024; // 1MB

            while (!feof($readStream)) {
                $buffer = fread($readStream, $chunkSize);
                fwrite($writeStream, $buffer);
                $downloadedSize += strlen($buffer);
                $chunkCounter += strlen($buffer);

                // Only log progress every 1MB
                if (($downloadedSize - $lastLoggedSize) >= $logThreshold && $remoteSize > 0) {
                    $percent = round(($downloadedSize / $remoteSize) * 100);
                    $sizeMB = number_format($downloadedSize / 1024 / 1024, 2);
                    file_put_contents($progressFile, "$percent|$sizeMB\n", FILE_APPEND | LOCK_EX);
                    $lastLoggedSize = $downloadedSize;
                }

                // Pause every 50MB
                if ($chunkCounter >= $chunkLimit) {
                    sleep(1);
                    $chunkCounter = 0;
                }
            }

            // Final write to ensure 100% is logged
            if ($remoteSize > 0) {
                $percent = round(($downloadedSize / $remoteSize) * 100);
                $sizeMB = number_format($downloadedSize / 1024 / 1024, 2);
                file_put_contents($progressFile, "$percent|$sizeMB\n", FILE_APPEND | LOCK_EX);
            }

            fclose($readStream);
            fclose($writeStream);

            return true;
        }

        // Download the file
        $downloadedSize = 0;
        $progressFileName = $_POST["progress_file"] ?? (".progress_" . uniqid() . ".txt");
        $logFolder = dirname(dirname(__DIR__)) . '/log';
        if (!is_dir($logFolder)) {
            mkdir($logFolder, 0755, true);
        }
        $progressFile = $logFolder . '/' . basename($progressFileName);


        $progressFileName = basename($progressFile);
        downloadFileWithProgress($fullFileURL, $filePath, $progressFile);


        // Check if file was saved
        if (file_exists($filePath)) {
            // Build public URL
            $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
            $host = $_SERVER['HTTP_HOST'];
            $publicURL = $protocol . "://" . $host . "/" . $relativeFolder . "/" . $fullFileName;
            $fileSize = filesize($filePath); // in bytes

            echo "<strong>File saved at:</strong> <code>$filePath</code><br>";
            echo "<strong>Size:</strong> " . number_format($fileSize / 1024 / 1024, 2) . " MB<br>";
        } else {
            echo "Failed to save File.";
        }
    } else {
        echo "Please enter a valid data.";
    }

    // Debug if something error
    // var_dump($_POST);
}
?>
