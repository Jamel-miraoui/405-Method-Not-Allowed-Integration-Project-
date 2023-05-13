<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$username = $_POST["user"];
$password = $_POST["psw"];
$email = $_POST["email"];
$role = $_POST["role"];

$host = "localhost";
$user = "sammy";
$password = "password";
$database = "greatmove_library";
$conn = new mysqli($host, $user, $password, $database);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement
$sql1 = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result)==0) {

$sql = "INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Bind the parameters and set their values

$stmt->bind_param("ssss", $username, $password, $email, $role);

// Execute the statement and check for errors
if ($stmt->execute() === FALSE) {
    die("Error: " . $sql . "<br>" . $conn->error);
}
else {
    session_start();
    $_SESSION['login']=$username;
header("Location: ../../index.php");
$stmt->close();
$conn->close();

echo "New user created successfully";
}

}
else {
    echo "invalide username or email";
    header("Location: ../../login.php?msg=3");
}




// Close the statement and connection

?>