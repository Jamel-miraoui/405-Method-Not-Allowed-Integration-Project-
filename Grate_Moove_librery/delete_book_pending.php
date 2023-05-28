<?php
include 'navANDhead.php';
require_once('sessonchekadmin.php');
// Connect to the database
$servername = "localhost";
$username = "sammy";
$password = "password";
$dbname = "greatmove_library";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
// Retrieve the book ID from the form data
$book_id = $_GET["id"];
// Delete the book from the database
$sql = "DELETE FROM bookspenting WHERE id=".$book_id;
if ($conn->query($sql) === TRUE) {
	echo "Book deleted successfully";
	header("Location: ShowPendingBooks.php");
} else {
	echo "Error deleting book: " . $conn->error;
}
$conn->close();
?>
