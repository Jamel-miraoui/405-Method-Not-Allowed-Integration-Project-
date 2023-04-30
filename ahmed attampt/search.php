<?php

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

         $sql = "SELECT 'book' AS type, title, author, description, cover_path AS image, file_path AS link
         FROM books
         WHERE title LIKE '%search_term%' OR author LIKE '%search_term%' OR description LIKE '%search_term%'
         UNION
         SELECT 'lesson' AS type, title, '' AS author, description, '' AS image, file_path AS link
         FROM lessons
         WHERE title LIKE '%search_term%' OR description LIKE '%search_term%'
         UNION
         SELECT 'user' AS type, username AS title, email AS author, '' AS description, '' AS image, '' AS link
         FROM users
         WHERE username LIKE '%search_term%' OR email LIKE '%search_term%'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table>";
  echo "<tr><th>Book ID</th><th>Title</th><th>Author</th><th>User</th><th>Lesson Title</th><th>Progress</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"]. "</td><td>" . $row["author"]. "</td><td>" . $row["username"]. "</td><td>" . $row["lesson_title"]. "</td><td>" . $row["progress"]. "</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();
?>
