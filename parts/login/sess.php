<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userdata = file_get_contents("./inc/login/login.json");
    // Read user data from JSON file
    $users = json_decode($userdata, true);

    if ($users !== null && isset($users[$username])) {
        $hashedPassword = $users[$username]['password'];

        // Verify hashed password
        if (password_verify($password, $hashedPassword)) {
            // Successfuly login, save username into session and redirect to dashboard
            $_SESSION['username'] = $username;
            header('Location: dashboard');
            
            exit();
        } else {
            echo "<script type='text/javascript'>";
            echo "document.getElementById('notice').innerHTML = 'Login failed. Something went wrong.';";
            echo "</script>";
        }
    } else {
        echo "<script type='text/javascript'>";
        echo "document.getElementById('notice').innerHTML = 'Login failed. Username or Password does not match or does not exist.';";
        echo "</script>";    }
}

?>