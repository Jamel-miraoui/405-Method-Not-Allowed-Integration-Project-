<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "greatmove_library";

// Create a connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$role = $_POST["role"];


function modify_user($username, $password, $email, $role) {
    // Construct the SQL query to modify the existing user
    $query = "UPDATE users SET username = '$username', password = '$password', email = '$email', role = '$role' WHERE id = $id";

    // Execute the query and check if it was successful
    if (mysqli_query($conn, $query)) {
        echo "User modified successfully";
    } else {
        echo "Error modifying user: " . mysqli_error($conn);
    }
}
modify_user($id, $nom, $prenom, $class, $login, $password);

?>
