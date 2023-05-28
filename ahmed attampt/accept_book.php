<?php
include 'navANDhead.php';
require_once('sessonchekadmin.php');
// ini_set("display_errors",'1');
// error_reporting(E_ALL);
// Connect to the databases
$servername = "localhost";
$username = "sammy";
$password = "password";
$dbname = "greatmove_library";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed:" . $conn->connect_error);
}
// Retrieve the book information from the pending database
$book_id = $_GET["id"];
$sql = "SELECT * FROM bookspenting WHERE id=".$book_id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	
	$row = $result->fetch_assoc();
	$title = $row["title"];
	$author = $row["author"];
	$description = $row["description"];
	$file_path = $row["file_path"];
	$cover_path = $row["cover_path"];
	$user_id = $row["user_id"];

	

	// Insert the book into the books database
	$sql = "INSERT INTO books (title, author, description, file_path, cover_path, user_id) VALUES ('$title', '$author', '$description', '$file_path','$cover_path','$user_id')";
	if ($conn->query($sql) === TRUE) {
		// Delete the book from the pending database
		$sql = "DELETE FROM bookspenting WHERE id=".$book_id;
		if ($conn->query($sql) === TRUE) {
			echo "Book accepted and moved to the books database successfully";
			header("Location: ShowPendingBooks.php?msg=1");

		} else {
			echo "Error deleting book from pending database: " . $conn->error;
			
		}
	} else {
		echo "Error inserting book into books database: " . $conn->error;
	}
} else {
	echo "Book not found in pending database";
}
$conn->close();
?>
