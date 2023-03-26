<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
		<h1>Library</h1>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="books.php">Books</a></li>
				<li><a href="Courses.php">Courses</a></li>
				<li><a href="#">Borrow History</a></li>
				<li><a href="#">Login</a></li>
			</ul>
		</nav>
	</header>
    <main>
        <?php
            //connect to the database
            $conn = mysqli_connect("localhost", "sammy", "password", "BEISETSO_db");
            
            //check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            //retrieve course data from database
            $sql = "SELECT * FROM Courses";
            $result = mysqli_query($db, $sql);
            
            //display course data
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='course'>";
                    echo "<h2>" . $row["title"] . "</h2>";
                    echo "<p><strong>Instructor:</strong> " . $row["instructor_name"] . "</p>";
                    echo "<p><strong>Department:</strong> " . $row["department_name"] . "</p>";
                    echo "<p><strong>Faculty:</strong> " . $row["faculty_name"] . "</p>";
                    echo "<p>" . $row["description"] . "</p>";
                    
                    // not sure about this
                    echo "<a href='" . $row["course_url"] . "' target='_blank'>View Course</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No courses available at this time.</p>";
            }
            
            //close database connection
            mysqli_close($conn);
        ?>
    </main>
</body>
</html>
