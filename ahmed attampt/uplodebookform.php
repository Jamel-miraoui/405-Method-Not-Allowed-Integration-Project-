<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>uplode book form</title>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
  <label for="title">Title:</label>
  <input type="text" name="title" id="title"><br>
  
  <label for="author_name">Author Name:</label>
  <input type="text" name="author_name" id="author_name"><br>
  
  <label for="publisher_name">Publisher Name:</label>
  <input type="text" name="publisher_name" id="publisher_name"><br>
  
  <label for="ISBN">ISBN:</label>
  <input type="text" name="ISBN" id="ISBN"><br>
  
  <label for="publication_date">Publication Date:</label>
  <input type="date" name="publication_date" id="publication_date"><br>
  
  <label for="number_of_pages">Number of Pages:</label>
  <input type="number" name="number_of_pages" id="number_of_pages"><br>
  
  <label for="category">Category:</label>
  <input type="text" name="category" id="category"><br>
  
  <label for="pdf_file">PDF File:</label>
  <input type="file" name="pdf_file" id="pdf_file"><br>
  
  <label for="cover_image">Cover Image:</label>
  <input type="file" name="cover_image" id="cover_image"><br>
  
  <input type="submit" value="Upload">
</form>

</body>
</html>