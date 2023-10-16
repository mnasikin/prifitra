<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileURL = $_POST["file_url"];
    $destinationFolder = $_POST["destination_folder"];
    $fileName = $_POST["file_name"];
    $fileExtension = $_POST["file_extension"];
    $extFile = "./inc/main/data/ext.json";
    $extData = json_decode(file_get_contents($extFile), true);
    
    // Detect protocol from file
    $protocol = (strpos($fileURL, "https://") === 0) ? "https" : "http";

    // Set default folder to /download if destination form empty
    if (empty($destinationFolder)) {
        $destinationFolder = "../download";
    }

    // Data validation
    if (
        (filter_var($fileURL, FILTER_VALIDATE_URL) && in_array($protocol, ["http", "https"])) &&
        !empty($fileName) &&
        in_array($fileExtension, $extData['extensions'])
    ) {
        // Current installation dir (if you use dirname(__FILE__), your file will be saved at parts/main/<your folder>)
        // $currentDirectory = dirname(__FILE__);
        $currentDirectory = "./";

        // Generate URL with protocol
        $fullFileURL = $fileURL;

        // Generate path to directory
        $fullDestinationFolder = $currentDirectory . '/' . $destinationFolder;

        // Generate folder (if submitted folder does not exist)
        if (!is_dir($fullDestinationFolder)) {
            mkdir($fullDestinationFolder, 0755, true);
        }

        // Get content from URL
        $fileContent = file_get_contents($fullFileURL);

        // Generate file name with choosen extension
        $fullFileName = $fileName . "." . $fileExtension;

        // Save file to destination folder
        $filePath = $fullDestinationFolder . "/" . $fullFileName;

        if (file_put_contents($filePath, $fileContent) !== false) {
            echo "File successfully downloaded and saved at: " . $filePath;
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