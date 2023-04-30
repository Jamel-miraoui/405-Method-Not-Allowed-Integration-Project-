<?php

// connect to the database
$conn = mysqli_connect("localhost", "username", "password", "greatmove library");

// check if the form has been submitted
if (isset($_GET['search'])) {

  // retrieve the search query
  $query = mysqli_real_escape_string($conn, $_GET['search']);

  // build the SQL query
  $sql = "SELECT * FROM books WHERE CONCAT(title, author, description) LIKE '%$query%' UNION SELECT * FROM lessons WHERE CONCAT(title, description) LIKE '%$query%' UNION SELECT * FROM users WHERE CONCAT(username, email) LIKE '%$query%'";

  // execute the query
  $result = mysqli_query($conn, $sql);

  // check if any results were found
  if (mysqli_num_rows($result) > 0) {

    // loop through the results and display them to the user
    while ($row = mysqli_fetch_assoc($result)) {
      echo $row['title'];
      echo $row['author'];
      // and so on...
    }

  } else {

    // no results found
    echo "No results found.";

  }

}

?>

<!-- the search form -->
