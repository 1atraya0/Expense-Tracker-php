<?php
session_start();
require_once('db_config.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_username = $_POST['reg_username'];
    $reg_email = $_POST['reg_email'];
    $reg_password = $_POST['reg_password'];

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->execute(['username' => $reg_username, 'email' => $reg_email, 'password' => $reg_password]);

    if ($stmt->rowCount() > 0) {
        echo "Registration successful. You can now login.";
    } else {
        echo "Registration failed. Please try again.";
    }
}
?>
