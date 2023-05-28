<?php
// ini_set("display_errors",'1');
// error_reporting(E_ALL);

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Connect to database
  require_once('sessonchek.php'); 
  include 'connbd.php';
  //selecting the id of the user 
  $login = $_SESSION['login'];
$query = "SELECT * FROM users where username ='$login'";
$userdata= $db->prepare($query);
$userdata->execute();
$result = $userdata->fetch(PDO::FETCH_ASSOC);
$userID = $result['id'];

  $allowTypesPDF = array('pdf'); 
  $allowTypes = array('jpg','png','jpeg','gif');

// Check if file was uploaded
if (isset($_FILES['pdf_file'])&&!empty($_FILES["pdf_file"]["name"])) {

  // Get file name
  $fileName = basename($_FILES['pdf_file']['name']);
 
  
  // Other form data
  $title = $_POST['title'];
  $author_name = $_POST['author_name'];
  $category = $_POST['category'];
  
  // Upload file to server
  $targetDir = "../uploads/";
  $targetFile = $targetDir . $fileName;
  $fileType = pathinfo($targetFile,PATHINFO_EXTENSION);
//uplode data to data basse 


    


  
  //testing if file extanon is pdf befor uploding to the server 
  if(in_array($fileType, $allowTypesPDF)){

    if($_FILES['pdf_file']['size'] < 10485760){

      //testing if book name exsistes alredy 
      $query = "SELECT * FROM books WHERE title ='$title'";
       $stmt = $db->prepare($query);

$stmt->execute();

if ($stmt->rowCount() == 0) {

      move_uploaded_file($_FILES['pdf_file']['tmp_name'], $targetFile);
      
     
     // Upload cover image to server
     $coverImage = "";
     $targetDirImg = "uploads/";
     if (isset($_FILES['cover_image'])) {
       $coverFileName = basename($_FILES['cover_image']['name']);
       $coverTargetFile = $targetDirImg . $coverFileName;
           
          
       //test file tipe and file size
       $coverfileType = pathinfo($coverTargetFile,PATHINFO_EXTENSION);
       
       if(in_array($coverfileType, $allowTypes)){
         if($_FILES['cover_image']['size'] < 10485760){
   
           
           move_uploaded_file($_FILES['cover_image']['tmp_name'], $coverTargetFile);
           $coverImage = $coverTargetFile;
           }
        }else{echo"<br> error cover file tipe <br>";}
      }
   
     

     $insert = $db->query("INSERT INTO bookspenting (title, author, description, file_path, cover_path, user_id) VALUES ('$title', '$author_name', '$category', '$targetFile', '$coverImage', '$userID')");
   
     if($insert){
       $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
       header("Location: uplodebookform.php?msg=5");
       
      }else{
       $statusMsg = "<br>File upload failed, please try again.";}
       echo "<br>",$statusMsg;
      }
      else {echo "books exicte";
        header("Location: uplodebookform.php?msg=1");}

    }else{echo"invalid file size";
      header("Location: uplodebookform.php?msg=2");}

  }else{echo"<br>invalid file tipe";
    header("Location: uplodebookform.php?msg=3");}
}else {
  echo "<br>Error: No file uploaded.";
  header("Location: uplodebookform.php?msg=4");
   }
  }




   $db = null; // Close the database connection

  
  // Close database connection





?>
