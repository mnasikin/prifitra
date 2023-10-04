<?php
include('../config.php');
    session_start();
    
    if (!isset($_SESSION['username'])) {
        header('Location: ' . BASE_URL . 'login');
        exit();
    } else {
        header('Location: ' . BASE_URL . 'login');
        exit();
    }
    ?>