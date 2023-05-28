<?php

// Database configuration
$host = "localhost";
$username = "sammy";
$password = "password";
$database = "greatmove_library";

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Log in user
$login = $_POST["username"];
$password = $_POST["password"];

// Check if the login input is an email or username
$isEmail = filter_var($login, FILTER_VALIDATE_EMAIL);

if ($isEmail) {
    // Login using email
    $sql = "SELECT * FROM users WHERE email='$login' AND password='$password'";
} else {
    // Login using username
    $sql = "SELECT * FROM users WHERE username='$login' AND password='$password'";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $user = $row['user_type'];

    session_start();
    $_SESSION['login'] = $username;

    if ($user == "admin") {
        header("Location: ../../index.php");
    } else {
        header("Location: ../../index.php");
    }
} else {
    // Login failed
    header("Location: ../../login.php?msg=1");
}
