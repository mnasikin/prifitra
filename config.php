<?php
    if (!defined('BASE_URL') || BASE_URL == '') {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || 
                     $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        $script_name = dirname($_SERVER['SCRIPT_NAME']);
        $base_url = rtrim($protocol . $host . $script_name, '/') . '/';
        define('BASE_URL', $base_url);
    }
?>
