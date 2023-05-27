<?php
// ini_set("display_errors",'1');
// error_reporting(E_ALL);
// ini_set("display_errors",'1');
// error_reporting(E_ALL);
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Connect to database
  include 'connbd.php';
  require_once('sessonchek.php'); 

  //selecting user id 
  $login = $_SESSION['login'];
  $query = "SELECT * FROM users where username ='$login'";
  $userdata= $db->prepare($query);
  $userdata->execute();
  $result = $userdata->fetch(PDO::FETCH_ASSOC);
  $userID = $result['id'];

  //pdf tipe
  $allowTypesPDF = array('pdf'); 
// Check if file was uploaded
if (isset($_FILES['pdf_file'])&&!empty($_FILES["pdf_file"]["name"])) {
  // Get file name
  $fileName = basename($_FILES['pdf_file']['name']);
  
  // Other form data
  $title = $_POST['title'];
  $topec = $_POST['topec'];
  $department = $_POST['department'];
  $class = $_POST['class'];
  $description = $_POST['description'];
  //saiving file extanon
  $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
    
  if(in_array($fileType, $allowTypesPDF)){

    if($_FILES['pdf_file']['size'] < 10485760){
      $query = "SELECT * FROM lessons WHERE title ='$title'";
      $stmt = $db->prepare($query);

$stmt->execute();

if ($stmt->rowCount() == 0) {

  // Upload file to server
         $targetDir = "uploads/";
         $targetFile = $targetDir . $fileName;
         move_uploaded_file($_FILES['pdf_file']['tmp_name'], $targetFile);
         
         $insert = $db->query("INSERT INTO lessonspenting (title, description, file_path, teacher_id, department_id, topec, class_level) VALUES ('$title', '$description', '$targetFile','$userID', '$department','$topec', '$class')");
         if($insert){
               $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
	           echo"file uploded secssefully";
             header("Location: uplodecourseform.php?msg=1");
	           echo $targetFile;
         }
          } 
           }
            }else{
              header("Location: uplodecourseform.php?msg=2");
              }
        
            } else {
             echo "Error: No file uploaded.";
             mysqli_close($bd);
         }
mysqli_close($bd);
}
?>