<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include 'navANDhead.php';
require_once('sessonchekadmin.php');

$host = 'localhost';
$username = 'sammy';
$password = 'password';
$dbname = 'greatmove_library';
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add an email to the specified table
function addEmail($table, $email, $conn) {
    $email = $conn->real_escape_string($email);

    // Check if the email already exists in the table
    $checkQuery = "SELECT * FROM teacheremails WHERE email = '$email'";
    $checkResult = $conn->query($checkQuery);
	$checkQuery1 = "SELECT * FROM studentsemails WHERE email = '$email'";
    $checkResult1 = $conn->query($checkQuery1);

    if ($checkResult->num_rows > 0  || $checkResult1->num_rows > 0) {
        return "Email already exists."; // Return error message
    }

    $insertQuery = "INSERT INTO $table (email, status) VALUES ('$email', 'Not Used')";
    $result = $conn->query($insertQuery);

    if ($result) {
        return "Email added successfully."; // Return success message
    } else {
        return "Error adding email: " . $conn->error; // Return error message
    }
}

// Handle add email request
if (isset($_POST['addEmail'])) {
    $table = $_POST['table'];
    $email = $_POST['email'];
    $addResult = addEmail($table, $email, $conn);

    echo $addResult; // Output the appropriate message
}

// Fetch all emails from teacheremails table
$teacherEmailsQuery = "SELECT * FROM teacheremails";
$teacherEmailsResult = $conn->query($teacherEmailsQuery);

// Fetch all emails from studentemails table
$studentEmailsQuery = "SELECT * FROM studentsemails";
$studentEmailsResult = $conn->query($studentEmailsQuery);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/showemailslogin.css">
    <title>Email Management</title>
</head>
<body>
    <h1>Email Management</h1>
    <div class="add">
    <h2>Add Email</h2>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br><br>
        <label for="table">Table:</label>
        <select name="table" id="table">
            <option value="teacheremails">Teacher Emails</option>
            <option value="studentsemails">Student Emails</option>
        </select>
        <br>
        <button type="submit" name="addEmail">Add Email</button>
    </form></div>
    <h2>Teacher Emails</h2>
    <table class="styled-table">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        <?php
        // Display teacher emails
        if ($teacherEmailsResult->num_rows > 0) {
            while ($row = $teacherEmailsResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No teacher emails found.</td></tr>";
        }
        ?>
    </table>

    <h2>Student Emails</h2>
    <table class="styled-table">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
        <?php
        // Display student emails
        if ($studentEmailsResult->num_rows > 0) {
            while ($row = $studentEmailsResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No student emails found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
