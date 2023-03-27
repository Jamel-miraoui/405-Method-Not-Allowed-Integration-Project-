<?php
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
    if ($file_extension != "pdf") {
      echo "Error: Only PDF files are allowed.";
    }
    // Upload file to server
    else if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      // Insert book data and file path into database
      $sql = "INSERT INTO books (title, author_name, publisher_name, ISBN, publication_date, number_of_pages, category, pdf_file, cover_image) 
              VALUES ('$title', '$author_name', '$publisher_name', '$ISBN', '$publication_date', '$number_of_pages', '$category', '$target_file', '$cover_image')";
      
      if (mysqli_query($conn, $sql)) {
        echo "Book uploaded successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      echo "Error: File upload failed.";
    }
  }
  
  // Close database connection
  mysqli_close($conn);
}
?>
