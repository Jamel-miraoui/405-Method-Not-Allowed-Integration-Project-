
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/booksstyle.css">
	<title>User Management System</title>
</head>

<body>
<header>
    <div class="header-container">
        <h1>Library</h1>
        <form method="get" action="search.php" class="search-form">
            <input type="text" name="search" class="search-input" placeholder="Search...">
            <input type="submit" value="Search" class="search-submit">
        </form>
        <nav>
            <ul>
                <li><a href="../../../index.php">Home</a></li>
                <li><a href="../../../books.php">Books</a></li>
                <li><a href="../../../Courses.php">Courses</a></li>
                <li><a href="../../../logout.php">Disconnect</a></li>
                <li><a href="../../../login.php">Login</a></li>
            </ul>
        </nav>
        <div class="user-info">
            <a href="profile.php"><img src="../../../Profile-Icon-SVG-09856789.png" alt="Profile photo" class="profile-photo"></a>
            <h3 class="user-name">John Doe</h3>
        </div>
    </div>
</header>

	<form method="post">
		<label for="search">Search:</label>
		<input type="text" id="search" name="search">
		<input type="submit" value="Search">
	</form>

	<table>
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
		$username = 'root';
		$password = '';
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
					echo "<table>";
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['role'] ;
					
					echo "<a href='UpdateUser.php?id=" . $row['id'] . "' class='buttonn'>Modify</a> ";
					
                    echo "<a href='DeleteUsr.php?id=" . $row['id'] . "' class='buttonndelete'>Delete</a>";	
					echo"</td>";
					echo "</tr>";
					echo "</table>";
				}
			} else {
				echo "0 results";
			}

			$conn->close();
		?>
	</table>

	<br>
    
</body>
<style>

/* Styling for the table */


table th,
table td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

/* Styling for table header */
table th {
background-color:black;
  font-weight: bold;
  text-align: center;
  color:black;
  
}

/* Styling for alternate rows */


/* Styling for action links */


/* Styling for delete link */


form.search-form input[type="text"] {
  padding: 4px;
  border: 1px solid #ddd;
}

form.search-form input[type="submit"] {
  padding: 4px 8px;
  border: none;
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 10px;  
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
}

td {
  width: 25%; /* Modifier la largeur selon vos besoins */
}

/* Réduire l'espace entre les cellules */
table td, table th {
  border-spacing: 0;
}

/* Styling supplémentaire facultatif */
table th {
  background-color: #f2f2f2;
  font-weight: bold;
}

table tr:nth-child(even) {
  background-color: black;
	
}
a.buttonn {
	position:relative; left:45.5%; top:2px;
  padding: 8px 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: #f2f2f2;
  color: #333;
  text-decoration: none;
  text-align: left;
  cursor: pointer;
  display: inline-block;
  margin-right: 10px; 
}

a.button:hover {
  background-color: #ddd;
}

a.buttonndelete {
	position:relative; left:45.5%; top:2px;
  padding: 8px 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: #dc3545;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 10px; 
}

a.buttonndelete:hover {
  background-color: #c82333;
}

td.actions {
	display: inline-block;
  margin-right: 10px; 
  align-items: left;
  gap: 8px; /* Espacement entre les liens */
}

</style>
</html>


