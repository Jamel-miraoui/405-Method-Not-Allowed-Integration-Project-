<?php
// Connect to the databases
$servername = "localhost";
$username = "username";
$password = "password";
$dbname_pending = "books_pending";
$dbname = "books";
$conn_pending = new mysqli($servername, $username, $password, $dbname_pending);
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn_pending->connect_error || $conn->connect_error) {
	die("Connection failed: " . $conn_pending->connect_error . " and " . $conn->connect_error);
}
// Retrieve the book information from the pending database
$book_id = $_POST["book_id"];
$sql = "SELECT * FROM books WHERE id=".$book_id;
$result = $conn_pending->query($sql);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$title = $row["title"];
	$author = $row["author"];
	$content = $row["content"];
	// Insert the book into the books database
	$sql = "INSERT INTO books (title, author, content) VALUES ('$title', '$author', '$content')";
	if ($conn->query($sql) === TRUE) {
		// Delete the book from the pending database
		$sql = "DELETE FROM books WHERE id=".$book_id;
		if ($conn_pending->query($sql) === TRUE) {
			echo "Book accepted and moved to the books database successfully";
		} else {
			echo "Error deleting book from pending database: " . $conn_pending->error;
		}
	} else {
		echo "Error inserting book into books database: " . $conn->error;
	}
} else {
	echo "Book not found in pending database";
}
$conn_pending->close();
$conn->close();
?>
