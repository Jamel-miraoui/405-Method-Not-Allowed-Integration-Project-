<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Replace with your own database credentials
$host ="localhost";
$user ="root";
$password ="";
$database ="greatmove_library";

// Create a new MySQLi object
$conn = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$sql1 = "SELECT * FROM users WHERE username=$username OR email=$email";
$stmt1 = $conn->prepare($sql1);
if (mysqli_num_rows($stmt1)==0){
$sql = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind the parameters and set their values
$username = "testuser";
$password = "testpassword";
$email = "testemail@example.com";
$role = "testrole";
$stmt->bind_param("ssss", $username, $password, $email, $role);

// Execute the statement and check for errors
if ($stmt->execute() === FALSE) {
    die("Error: " . $sql . "<br>" . $conn->error);
}
else {
    echo "invalid username or password";
}
}

echo "New user created successfully";

// Close the statement and connection
$stmt->close();
$conn->close();
?>

