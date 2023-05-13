<!DOCTYPE html>
<html>
<head>
	<title>User Management System</title>
</head>
<body>

	<form method="post">
		<label for="search">Search:</label>
		<input type="text" id="search" name="search">
		<input type="submit" value="Search">
		<link rel="stylesheet" href="Style.css">
	</form>

	<table class="styled-table">
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>Role</th>
			<th>Action</th>
		</tr>

		<?php
		// connect to the database (replace with your own database credentials)
		$host = 'localhost';
		$username = 'sammy';
		$password = 'password';
		$dbname = 'greatmove_library';

		$conn = new mysqli($host, $username, $password, $dbname);

		// check if the connection was successful
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// check if the search form has been submitted
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$search = $_POST['search'];

			// search for users by username, email, or ID
			$sql = "SELECT * FROM users WHERE username LIKE '%$search%' OR email LIKE '%$search%' OR id LIKE '%$search%'";
		} else {
			// retrieve all users from the database
			$sql = "SELECT * FROM users";
		}

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['role'] . "</td>";
					echo "<td>";
					echo "<button class='button-18' role='button'><a href='UpdateUser.php?id=" . $row['id'] . "'>Modify</a> </button>";
					echo "<button class='button-19' role='button'><a href='DeleteUsr.php?id=" . $row['id'] . "'>Delete</a></button>";
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}

			$conn->close();
		?>
	</table>

	<br>
    
</body>
</html>
