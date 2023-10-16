<!DOCTYPE html>
<html lang="en">

<head>
    <?php
		include('./inc/main/lib/vars/global.php');
		include('./config.php');
        $extFile = "./inc/main/data/ext.json";
        $extData = json_decode(file_get_contents($extFile), true);
		
		
		if (!defined('BASE_URL')) {
			$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
			$host = $_SERVER['HTTP_HOST'];
			$path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
			define('BASE_URL', $protocol . $host . $path);
		}
	?>
    <meta charset="utf-8">
    <title><?php echo BASE_NAME; ?> <?php echo BASE_VER; ?> - <?php echo BASE_TAG; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="<?php echo BASE_TAG; ?>">

    <!-- Favicon -->
    <link href="<?php echo BASE_ICON; ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo BASE_URL; ?>/inc/main/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo BASE_URL; ?>/inc/main/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo BASE_URL; ?>/inc/main/css/style.css" rel="stylesheet">

    <!-- Redirect to login if does not have session -->
        <?php
        session_start();
        

        if (!isset($_SESSION['username'])) {
            header('Location: login');
            exit();
        }
        ?>