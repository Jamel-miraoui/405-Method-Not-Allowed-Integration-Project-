<?php
ini_set("display_errors",'1');
error_reporting(E_ALL);
// $selected_colors = $_POST['description'];
// echo $selected_colors;

// if (isset($_POST['description'])) {
// 	$description = $_POST['description'];
// 	echo "You selected: " .$description ;
	
//   }else {
//   echo 'EL 3ASBA';}
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
  $topec = $_POST['topec'];
  $department = $_POST['department'];
  $class = $_POST['class'];
  $description = $_POST['description'];
  

  // Upload file to server
  $targetDir = "uploads/";
  $targetFile = $targetDir . $fileName;
  move_uploaded_file($_FILES['pdf_file']['tmp_name'], $targetFile);
  
  $insert = $db->query("INSERT INTO lessons (title, description, file_path, teacher_id, department_id, topec, class_level) VALUES ('$title', '$description', '$targetFile',1, '$department','$topec', '$class')");
  if($insert){
    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
	echo"file uploded secssefully";
	echo $targetFile;
   }else{
    $statusMsg = "File upload failed, please try again.";}

} else {
  echo "Error: No file uploaded.";
  mysqli_close($bd);
}
mysqli_close($bd);
}
?>