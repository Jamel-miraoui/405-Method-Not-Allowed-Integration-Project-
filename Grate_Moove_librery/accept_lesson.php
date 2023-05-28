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
// Retrieve the lesson information from the pending database
$lesson_id = $_GET["id"];
$sql = "SELECT * FROM lessonspenting WHERE id=".$lesson_id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();

	$title = $row["title"];
	
	$description = $row["description"];
	$file_path = $row["file_path"];
	$user_id = $row["teacher_id"];
	$department = $row["department_id"];
	$topec = $row["topic"];
	$class = $row["class_level"];
	

	// Insert the lesson into the lessons database
	$sql = "INSERT INTO lessons (title, description, file_path, teacher_id, department_id, topec, class_level) VALUES ('$title', '$description', '$file_path','$user_id','$department', '$topec', $class);";
	if ($conn->query($sql) === TRUE) {
		// Delete the lesson from the pending database
		$sql = "DELETE FROM lessonspenting WHERE id='$lesson_id';";
		if ($conn->query($sql) === TRUE) {
			echo "lesson accepted and moved to the lessons database successfully";
			// header("Location: ShowPendingCourses.php?msg=1");

		} else {
			echo "Error deleting lesson from pending database: " . $conn->error;
		}
	} else {
		echo "Error inserting lesson into lessons database: " . $conn->error;
	}
} else {
	echo "lesson not found in pending database";
}
$conn->close();
?>
