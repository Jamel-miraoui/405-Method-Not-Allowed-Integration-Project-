<?php
include 'navANDhead.php';
require_once('sessonchekadmin.php');

ini_set("display_errors",'1');
error_reporting(E_ALL);
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

if (isset($_POST['submit'])) {

		// retrieve the updated user information from the form
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$email = $_POST['email'];
		$role = $_POST['role'];
		$id = $_POST['id'];
        // echo "noramlmon el id lenna<br>",$id;

        
		
		// update the user information in the database
		
        $insert = $conn->query("UPDATE users SET username='$user', password='$pass', email='$email', role='$role' WHERE id='$id' ");
        // echo "Rows affected: " . mysqli_affected_rows($conn);
		// check if the update was successful
		if ($insert) {
            echo "User information updated successfully.";
		}
		else {
			echo "Error";
        }}
        
?>
