<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<?php
// ini_set("display_errors",'1');
// error_reporting(E_ALL);

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

if ($result && $result->num_rows > 0) {
  echo "<table class='table'>";
  echo "<thead><tr><th>Title</th><th>Description</th><th>Author/Department</th><th>Topec</th><th>File</th></tr></thead>";
  echo "<tbody>";
  
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["title"]. "</td><td>" . $row["description"]. "</td><td>" . $row["author"]. "</td><td></td><td><a href=" . $row["file_path"]. " class='btn btn-primary'>PDF File</a></td></tr>";
  }
  
  while($row = $result2->fetch_assoc()) {
    echo "<tr><td>" . $row["title"]. "</td><td>" . $row["description"]. "</td><td>" . $row["department_id"]. "</td><td>".$row["topec"]."</td><td><a href=".$row["file_path"]." class='btn btn-primary'>PDF File</a></td></tr>";
  }
  
  echo "</tbody>";
  echo "</table>";
  
}
else {
  $sql2 = "SELECT * FROM lessons WHERE title LIKE '%" . $search_term . "%' OR department_id LIKE '%" . $search_term . "%' OR topec LIKE '%" . $search_term . "%'";
$result2 = $conn->query($sql2);

$result2 = null;

if ($result && $result->num_rows > 0) {
} else {
  $sql2 = "SELECT * FROM lessons WHERE title LIKE '%" . $search_term . "%' OR department_id LIKE '%" . $search_term . "%' OR topec LIKE '%" . $search_term . "%'";
  $result2 = $conn->query($sql2);

  if ($result2 !== false && $result2->num_rows > 0) {
    // Output results from $result2
  } else {
    echo "No results found.";
  }
}



} 
$conn->close();

?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
