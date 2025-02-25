<?php
session_start();
require_once "create_session.php"; // Ensure session variables exist

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $_SESSION['username'] && $password === $_SESSION['password']) {
        header("Location: welcome.php");
        exit();
    } else {
        $_SESSION['error'] = "Invalid credentials. Try again.";
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
