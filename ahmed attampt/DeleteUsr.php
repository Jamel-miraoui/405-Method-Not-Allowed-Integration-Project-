<?php
ini_set("display_errors",'1');
error_reporting(E_ALL);
require_once('sessonchekadmin.php');


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

$id = $_GET["id"];

// checking if the id exists
if ($sql = "SELECT * FROM users WHERE id='$id' " ){
    
    $sql5 ="DELETE FROM bookspenting WHERE teacher_id= '$id'";
    $sql4 ="DELETE FROM lessonspenting WHERE teacher_id= '$id'";
    $sql1 ="DELETE FROM lessons WHERE teacher_id= '$id'";
    $sql2 ="DELETE FROM books WHERE user_id = '$id'";
    $sql3 ="DELETE FROM users WHERE id = '$id'";
    $conn->query($sql1)==TRUE;
    $conn->query($sql2)==TRUE;
    $conn->query($sql4)==TRUE;
    $conn->query($sql5)==TRUE;
    if($conn->query($sql3)==TRUE){
        echo "user deleted succesfully";
    }

}
else{

    echo "Error : The user ID doesn't exist. ";

}echo"ranna lellna ",$id;