<?php
ini_set("display_errors",'1');
error_reporting(E_ALL);
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Connect to database
  $servername = "localhost";
  $username = "sammy";
  $password = "password";
  $dbname = "BEISETSO_db";
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
   
// Check if file was uploaded
if (isset($_FILES['pdf_file'])) {
  // Get file name
  $fileName = basename($_FILES['pdf_file']['name']);
  
  // Other form data
  $title = $_POST['title'];
  $author_name = $_POST['author_name'];
  $publisher_name = $_POST['publisher_name'];
  $ISBN = $_POST['ISBN'];
  $publication_date = $_POST['publication_date'];
  $number_of_pages = $_POST['number_of_pages'];
  $category = $_POST['category'];
  
  // Upload file to server
  $targetDir = "uploads/";
  $targetFile = $targetDir . $fileName;
  move_uploaded_file($_FILES['pdf_file']['tmp_name'], $targetFile);
  
  // Upload cover image to server
  $coverImage = "";
  if (isset($_FILES['cover_image'])) {
    $coverFileName = basename($_FILES['cover_image']['name']);
    $coverTargetFile = $targetDir . $coverFileName;
    move_uploaded_file($_FILES['cover_image']['tmp_name'], $coverTargetFile);
    $coverImage = $coverTargetFile;
  }
  
  // Insert data into database
  $conn = mysqli_connect("localhost", "username", "password", "lib_db");
  $query = "INSERT INTO Books (title, author_name, publisher_name, ISBN, publication_date, number_of_pages, category, pdf_file, cover_image) VALUES ('$title', '$author_name', '$publisher_name', '$ISBN', '$publication_date', '$number_of_pages', '$category', '$targetFile', '$coverImage')";
  mysqli_query($conn, $query);
  mysqli_close($conn);
  
  // Redirect to success page
  header("Location: books.php");
  exit;
} else {
  echo "Error: No file uploaded.";
}
  
  // Close database connection
  mysqli_close($conn);
}
?>
