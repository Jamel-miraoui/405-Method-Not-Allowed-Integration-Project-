<?php
// Database configuration
$host = "localhost";
$username = "username";
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
$email = $_POST["email"];
$role = $_POST["role"];


 // Construct the SQL query to add the new user
 $sql = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$password', '$email', '$role')";

 // Execute the query and check if it was successful
 if (mysqli_query($conn, $sql)) {
     echo "New user added successfully";
 } else {
     echo "Error adding user: " . mysqli_error($conn);
 }