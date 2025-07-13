<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include('./inc/main/lib/vars/global.php');
		include('./config.php');
		
		
		if (!defined('BASE_URL')) {
			$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
			$host = $_SERVER['HTTP_HOST'];
			$path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
			define('BASE_URL', $protocol . $host . $path);
		}
	?>
	<title><?php echo BASE_NAME; ?> <?php echo BASE_VER; ?> - <?php echo BASE_TAG; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo BASE_ICON; ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>inc/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>inc/login/css/main.css">
</head>
