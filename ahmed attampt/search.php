<?php
ini_set("display_errors",'1');
error_reporting(E_ALL);

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
          
$search_term = $_GET['search'];

$sql = "SELECT * FROM books WHERE title LIKE '%" . $search_term . "%' OR description LIKE '%" . $search_term . "%' OR author LIKE '%" . $search_term . "%'";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>ID</th><th>Title</th><th>Description</th><th>Author</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["description"]. "</td><td>" . $row["author"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "No results found.";
}

$conn->close();

?>