<?php
$host = "localhost:3307"; // Database host
$username = "root"; // Database username
$password = ""; // Database password
$database = "greatmove_library"; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully!";

// Close the connection
$conn->close();
?>