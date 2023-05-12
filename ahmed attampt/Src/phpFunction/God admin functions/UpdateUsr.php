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

function modify_user($id, $nom, $prenom, $class, $login, $password) {
    // Construct the SQL query to modify the existing user
    $query = "UPDATE users SET nom = '$nom', prenom = '$prenom', class = '$class', login = '$login', password = '$password' WHERE id = $id";

    // Execute the query and check if it was successful
    if (mysqli_query($conn, $query)) {
        echo "User modified successfully";
    } else {
        echo "Error modifying user: " . mysqli_error($conn);
    }
}
modify_user($id, $nom, $prenom, $class, $login, $password);

?>
