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
  
  // Get form data
  $title = mysqli_real_escape_string($conn, $_POST["title"]);
  $author_name = mysqli_real_escape_string($conn, $_POST["author_name"]);
  $publisher_name = mysqli_real_escape_string($conn, $_POST["publisher_name"]);
  $ISBN = mysqli_real_escape_string($conn, $_POST["ISBN"]);
  $publication_date = mysqli_real_escape_string($conn, $_POST["publication_date"]);
  $number_of_pages = mysqli_real_escape_string($conn, $_POST["number_of_pages"]);
  $category = mysqli_real_escape_string($conn, $_POST["category"]);
  
  // Check if file was uploaded
  if ($_FILES["fileToUpload"]["name"]) {
    // Get file name and extension
    $file_name = basename($_FILES["fileToUpload"]["name"]);
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    
    // Generate new file name
    $new_file_name = uniqid() . '.' . $file_extension;
    
    // Set file upload directory
    $target_dir = "uploads/";
    $target_file = $target_dir . $new_file_name;
    
    // Check if file is valid PDF
   
// Check if file was uploaded
     if (isset($_FILES['fileToUpload'])) {
       // Get file name
       $fileName = basename($_FILES['fileToUpload']['name']);
     
       // Other form data
       $title = $_POST['title'];
       $author = $_POST['author'];
       $publisher = $_POST['publisher'];
       $isbn = $_POST['isbn'];
       $publication_date = $_POST['publication_date'];
       $num_pages = $_POST['num_pages'];
       $category = $_POST['category'];
     
       // Upload file to server
       $targetDir = "uploads/";
       $targetFile = $targetDir . $fileName;
       move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFile);
     
       // Insert data into database
       $conn = mysqli_connect("localhost", "username", "password", "lib_db");
       $query = "INSERT INTO Books (title, author_name, publisher_name, ISBN, publication_date, number_of_pages, category, pdf_cours, cours_cover) VALUES ('$title', '$author', '$publisher', '$isbn', '$publication_date', $num_pages, '$category', '$targetFile', '$coverImage')";
       mysqli_query($conn, $query);
       mysqli_close($conn);
     
       // Redirect to success page
       header("Location: success.php");
       exit;
     } else {
       echo "Error: No file uploaded.";
     }


  }
  
  // Close database connection
  mysqli_close($conn);
}
?>
