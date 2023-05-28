<?php
require_once('sessonchek.php');
include 'navANDhead.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <title>uplode book form</title>
</head>
<div class="formbold-main-wrapper">

  <div class="formbold-form-wrapper">
     <img width="500" src="resorses/frorm2.svg" >

        <form action="uploadbook.php" method="POST" enctype="multipart/form-data">
        <label for="title" class="formbold-form-label">Upload a Book:</label>
         <div>
          <label for="title" class="formbold-form-input">Book Title:</label>
          <input type="text" name="title" id="title" class="formbold-form-input"><br>
          </div>

          <div>
          <label for="author_name">Author Name:</label>
          <input type="text" name="author_name" id="author_name" class="formbold-form-input"><br>
          </div>

          <div>
          <label for="category">Description:</label>
          <input type="text" name="category" id="category" class="formbold-form-input"><br>
          </div>

          <div>
          <label for="pdf_file">PDF File:</label>
          <input type="file" name="pdf_file"id="pdf_file" class="formbold-form-input formbold-form-file"><br>
          </div>

          <div>
          <label for="cover_image">Cover Image:</label>
          <input type="file" name="cover_image" id="cover_image" class="formbold-form-input formbold-form-file"><br>
          </div>

          <div class="formbold-checkbox-wrapper">
        <label for="supportCheckbox" class="formbold-checkbox-label">
          <div class="formbold-relative">

            <div class="formbold-checkbox-inner">
              <span class="formbold-opacity-0">
                <svg
                  width="11"
                  height="8"
                  viewBox="0 0 11 8"
                  class="formbold-stroke-current"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M8.81868 0.688604L4.16688 5.4878L2.05598 3.29507C1.70417 2.92271 1.1569 2.96409 0.805082 3.29507C0.453266 3.66742 0.492357 4.24663 0.805082 4.61898L3.30689 7.18407C3.54143 7.43231 3.85416 7.55642 4.16688 7.55642C4.47961 7.55642 4.79233 7.43231 5.02688 7.18407L10.0696 2.05389C10.4214 1.68154 10.4214 1.10233 10.0696 0.729976C9.71776 0.357624 9.17049 0.357625 8.81868 0.688604Z"
                    fill="white"
                  />
                </svg>
              </span>
            </div>
          </div>
          <?php
          if($_GET['msg']==1){
            echo"<a>Book Alredy Exictes</a>";
          }
          if($_GET['msg']==2){
            echo"<p>Invalid File Size</p>";
          }
          if($_GET['msg']==3){
            echo"<p>Invalid File Tipe (PDF only)</p>";
          }
          if($_GET['msg']==4){
            echo"<p>Error: No file uploaded.</p>";
          }
          if($_GET['msg']==5){
            echo"<p>votre demande était envoyée à l'administrateur </p>";
          }
          ?>
        </label>
      </div>

          <div>
          <input type="submit" value="Upload" class="formbold-btn">
          </div>

        </form>
  </div>
</div>

</body>
</html>