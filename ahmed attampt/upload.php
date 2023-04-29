<?php
ini_set("display_errors",'1');
error_reporting(E_ALL);
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Connect to database
  include 'connbd.php';
   
// Check if file was uploaded
if (isset($_FILES['pdf_file'])) {
  // Get file name
  $fileName = basename($_FILES['pdf_file']['name']);
  
  // Other form data
  $title = $_POST['title'];
  $author_name = $_POST['author_name'];
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
  $insert = $db->query("INSERT INTO books (id ,title, author, description, file_path, cover_path, user_id) VALUES (11222221 ,'$title', '$author_name', '$category', '$targetFile', '$coverImage', 1)");
  if($insert){
    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
   }else{
    $statusMsg = "File upload failed, please try again.";}
  // Insert data into database
  // $query = "INSERT INTO books (title, author, publisher_name, description, file_path, cover_path, user_id) VALUES ('$title', '$author_name', '$category', '$targetFile', '$coverImage', 1)";
  // mysqli_query($conn, $query);
  // mysqli_close($conn);
  
  // // Redirect to success page
  // header("Location: books.php");
  // exit;
} else {
  echo "Error: No file uploaded.";
}
  
  // Close database connection
  // mysqli_close($conn);
}
?>
