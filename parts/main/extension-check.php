<?php
// Check JSON
$jsonExtensionIsActive = extension_loaded('json');
$checkedAttribute = $jsonExtensionIsActive ? 'checked' : '';

// Check cURL
$curlExtensionIsActive = extension_loaded('curl');
$checkedAttribute = $curlExtensionIsActive ? 'checked' : '';

// Check fileinfo
$fileInfoExtensionIsActive = extension_loaded('fileinfo');
$checkedAttribute = $fileInfoExtensionIsActive ? 'checked' : '';
?>