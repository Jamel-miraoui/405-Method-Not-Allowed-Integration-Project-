<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="Style.css">
<?php
// ini_set("display_errors",'1');
// error_reporting(E_ALL);
require_once('sessonchek.php'); 

$servername = "localhost";
$username = "sammy";
$password = "password";
$dbname = "greatmove_library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
include 'navANDhead.php';      
$search_term = $_GET['search'];

$sql = "SELECT * FROM books WHERE title LIKE '%" . $search_term . "%' OR description LIKE '%" . $search_term . "%' OR author LIKE '%" . $search_term . "%'";

$result = $conn->query($sql);
//start loking up for info 
echo "<table class='styled-table'>";
if ($result && $result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo"<h3>results in books</h3>";
    echo "<thead><tr><th>Title</th><th>Description</th><th>Author</th><th>           </th><th>File</th></tr></thead>";
    echo "<tbody>";
    echo "<tr><td>" . $row["title"]. "</td><td>" . $row["description"]. "</td><td>" . $row["author"]. "</td><td></td><td><a href=" . $row["file_path"]. " class='btn btn-primary'>PDF File</a></td></tr>";
  }
  echo "</tbody>";
  echo "</table>";
}
  $sql2 = "SELECT * FROM lessons WHERE title LIKE '%" . $search_term . "%' OR department_id LIKE '%" . $search_term . "%' OR topec LIKE '%" . $search_term . "%'";
  $result2 = $conn->query($sql2);

  if ($result2 !== false && $result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
      echo "<table class='styled-table'>";
      echo"<h3>results in lessons</h3>";
      echo "<thead><tr><th>Title</th><th>Description</th><th>Department</th><th>Topec</th><th>File</th></tr></thead>";
      echo "<tbody>";
      echo "<tr><td>" . $row["title"]. "</td><td>" . $row["description"]. "</td><td>" . $row["department_id"]. "</td><td>".$row["topec"]."</td><td><a href=".$row["file_path"]." class='btn btn-primary'>PDF File</a></td></tr>";
      echo "</tbody>";
      echo "</table>";
    }
    
  } 
  if ($result->num_row <0 && $result2->num_row <0 ) {
    echo"No resuls found";
  }
$conn->close();

?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
