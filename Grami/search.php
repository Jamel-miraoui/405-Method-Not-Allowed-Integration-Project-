<?php
ini_set("display_errors",'1');
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
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
  echo "<table>";
  echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Author</th><th></th></tr>";

  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["description"]. "</td><td>" . $row["author"]. "</td></tr>";
  }
  echo "</table>";
}
else {
  $sql2 = "SELECT * FROM lessons WHERE title LIKE '%" . $search_term . "%' OR department_id LIKE '%" . $search_term . "%' OR topec LIKE '%" . $search_term . "%'";
  $result2 = $conn->query($sql2);


   if ($result2 && $result2->num_rows > 0) {
    echo "<table>";
  echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Department</th><th>Topec</th></tr>";

  // output data of each row
  while($row = $result2->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["description"]. "</td><td>" . $row["department_id"]. "</td><td>".$row["topec"]."</td></tr>";
  }


  echo "</table>";

   }else {
    echo "No results found.";
  }
} 
$conn->close();

?>