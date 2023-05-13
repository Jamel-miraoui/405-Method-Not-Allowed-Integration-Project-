
<!DOCTYPE html>
<html>
<head>
	<title>List of Pending Books</title>
	<meta charset="UTF-8">
    <title>Courses</title>
    <link rel="stylesheet" href="../../../../css/style.css">
    <link rel="stylesheet" href="../../../../css/booksstyle.css">
    

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
                <li><a href="index.php">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="Courses.php">Courses</a></li>
                <li><a href="logout.php">Disconnect</a></li>
                <!-- <li><a href="login.php">Login</a></li> -->
            </ul>
        </nav>
        <div class="user-info">
            <a href="profile.php"><img src="Profile-Icon-SVG-09856789.png" alt="Profile photo" class="profile-photo"></a>
            <h3 class="user-name">John Doe</h3>
        </div>
    </div>
</header>
	<h1>List of Pending Books</h1>
	<table>
		<tr>
			<th>Cover</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
			<th>PDF file</th>
			<th>Action</th>
			
		</tr>
		<?php
		// Connect to the database
		$servername = "localhost";
		$username = "sammy";
		$password = "password";
		$dbname = "greatmove_library";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		// Retrieve the list of pending books
		$sql = "SELECT * FROM bookspenting";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// Output data of each row
			while($row = $result->fetch_assoc()) {
				?>
				     <div class="book-container">

                        <div class="book">
                        	<img src="<?php echo $row['cover_path']; ?>" alt="Book 3" width="300">
                        	<h3><?php echo $row['title']; ?></h3>
                        	<p><?php echo $row['author']; ?></p>
                        	<a href="<?php echo $row['file_path']; ?>">PDF File</a>
                             <form method='post' action='accept_book.php'>
                             <input type='hidden' name='book_id' value='".$row["id"]."'>
                             <input type='submit' value='Accept'>
                             </form>";
                             <form method='post' action='delete_book_pending.php'>
                             <input type='hidden' name='book_id' value='".$row["id"]."'>
                             <input type='submit' value='Delete'>
                             </form>
                        </div>
					 </div>   
		<?php
		}}?>
	</table>
</body>
</html>
<!-- echo "<div class='book'>";

echo "<tr>";
echo "<td><img src=".$row['cover_path']." width='300'></td>";
echo "<td>".$row["title"]."</td>";
echo "<td>".$row["author"]."</td>";
echo "<td>".$row["Description"]."</td>";
echo "<td><a href=../../../".$row["file_path"].">pdf file</a></td>";

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
$conn->close(); -->