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

// Cehck Value
$maxExecutionTime = ini_get('max_execution_time');
$memoryLimit = ini_get('memory_limit');
$maxInputTime = ini_get('max_input_time');
$maxInputVars = ini_get('max_input_vars');
$executionOK = ($maxExecutionTime >= 1800);
$memoryOK = (intval($memoryLimit) >= 512);
$inputTimeOK = ($maxInputTime >= 1800);
$inputVarsOK = ($maxInputVars >= 10000);
?>