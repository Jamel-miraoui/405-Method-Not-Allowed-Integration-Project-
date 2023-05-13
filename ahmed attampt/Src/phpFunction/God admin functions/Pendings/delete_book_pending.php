<?php
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "books_pending";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
// Retrieve the book ID from the form data
$book_id = $_POST["book_id"];
// Delete the book from the database
$sql = "DELETE FROM books WHERE id=".$book_id;
if ($conn->query($sql) === TRUE) {
	echo "Book deleted successfully";
} else {
	echo "Error deleting book: " . $conn->error;
}
$conn->close();
?>
