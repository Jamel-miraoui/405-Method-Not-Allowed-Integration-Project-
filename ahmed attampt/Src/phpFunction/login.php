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
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);
$id=$result['id'];
if (mysqli_num_rows($result) > 0) {
  //  $role=$result['role'];
    //User has logged in successfully
    if($username == "admin"){
        session_start();
        $_SESSION['login']=$username;
        header("Location: ../../index.php");
    }else{
    session_start();
    $_SESSION['login']=$username;
    $_SESSION['id']=$id;
   // $_SESSION['role']=$role;
    header("Location: ../../index.php");}
} else {
    // Login failed
    echo "Invalid username or password.";
    header("Location: ../../index.php?msg=1");
}