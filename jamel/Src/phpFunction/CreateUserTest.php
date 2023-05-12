<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Replace with your own database credentials
$host = "localhost";
$user = "root";
$password = "";
$database = "greatmove library";

// Create a new MySQLi object
$conn = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$sql = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind the parameters and set their values
$username = "testuser";
$password = "testpassword";
$email = "testemail@example.com";
$role = "testrole";

$sql1 = "SELECT username FROM users";
$result = $conn->query($sql1);

$sql2 = "SELECT email FROM users";
$result2 = $conn->query($sql2);

if ($result->num_rows == 0 || $result2->num_rows == 0){

    $stmt->bind_param("ssss", $username, $password, $email, $role);
    if ($stmt->execute() === FALSE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }
    echo "New user created successfully";
}

else {echo "username or email exicte";}

// Close the statement and connection
$stmt->close();
$conn->close();
$result->close();
$result2->close();
?>

