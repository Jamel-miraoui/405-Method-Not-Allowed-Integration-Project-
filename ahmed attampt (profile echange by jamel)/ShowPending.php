<?php
include 'navANDhead.php';
require_once('sessonchekadmin.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>List of Pending Books</title>
</head>
<body>
	<h1>List of Pending Books</h1>
	<table>
		<tr>
			<th>Cover</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
			
		</tr>
		<?php
		// Connect to the database
		$servername = "localhost";
		$username = "username";
		$password = "password";
		$dbname = "books_pending";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		// Retrieve the list of pending books
		$sql = "SELECT * FROM books";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// Output data of each row
			while($row = $result->fetch_assoc()) {

				echo "<div class='book'>";

				echo "<tr>";
				echo "<td><img src=". $row['cover_path']." width='300'></td>";
				echo "<td>".$row["title"]."</td>";
				echo "<td>".$row["author"]."</td>";
				echo "<td>".$row["Description"]."</td>";
				
				echo "<td>";
				echo "<form method='post' action='accept_book.php'>";
				echo "<input type='hidden' name='book_id' value='".$row["id"]."'>";
				echo "<input type='submit' value='Accept'>";
				echo "</form>";
				echo "<form method='post' action='delete_book_pending.php'>";
				echo "<input type='hidden' name='book_id' value='".$row["id"]."'>";
				echo "<input type='submit' value='Delete'>";
				echo "</form>";
				echo "</td>";
				echo "</tr>";

				echo "</div>";
			}
		} else {
			echo "<tr><td colspan='4'>No pending books</td></tr>";
		}
		$conn->close();
		?>
	</table>
</body>
</html>
