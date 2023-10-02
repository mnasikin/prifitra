<?php
session_start();
session_unset();
session_destroy();

// Force destroy session using explicit method
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
$sessionFile = session_save_path() . '/sess_' . session_id();
if (file_exists($sessionFile)) {
    unlink($sessionFile);
}

header('Location: login');
exit();
?>
