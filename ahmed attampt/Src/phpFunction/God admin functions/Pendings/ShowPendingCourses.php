
<!DOCTYPE html>
<html>
<head>
	<title>List of Pending lessons</title>
	<meta charset="UTF-8">
    <title>Courses</title>
    <link rel="stylesheet" href="../../../../css/style.css">
    <link rel="stylesheet" href="../../../../css/lessonsstyle.css">
    

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
	<h1>List of Pending Courses</h1>
	<table>
		
		<?php
    if($_GET['msg']==1){
      echo "accsepted suseesfuly";
    }
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
		$sql = "SELECT * FROM lessonsspenting";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// Output data of each row
			while($row = $result->fetch_assoc()) {
				?>
				     <div class="lessons-container">
  <div class="lessons">
    
    <!--  -->
   
    <a href="<?php echo $row['file_path']; ?>">PDF File</a>

    <form method='post' action='accept_lessons.php'>
      <input type='hidden' name='lessons_id' value='<?php echo $row["id"]; ?>'>
      <input type='submit' value='Accept' class='bbb'>
    </form>
    <form method='post' action='delete_lessons_pending.php'>
      <input type='hidden' name='lessons_id' value='<?php echo $row["id"]; ?>'>
      <input type='submit' value='Delete' class='aaa'>
    </form>
  </div>
</div>

		<?php
		}}?>
	</table>
</body>
</html>
<style>
.lessons-container {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	display: inline-block;

  
}

.lessons {
  width: 300px;
  padding: 20px;
  text-align: center;
  background-color: #f2f2f2;
  border-radius: 8px;
}

.lessons img {
  width: 400%;
  max-height: 400px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 10px;
}

.lessons h3 {
  font-size: 20px;
  margin-bottom: 8px;
}

.lessons p {
  font-size: 16px;
  margin-bottom: 16px;
}

.lessons a {
  display: inline-block;
  padding: 8px 16px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.lessons a:hover {
  background-color: #0056b3;
}

.lessons form {
  margin-top: 16px;
  display: inline-block;
}

.lessons form input[type="submit"][value="Accept"] {
  background-color: green;
  color: #fff;
}

.aaa {
	
  padding: 8px 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: #dc3545;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 10px; 
}
.bbb{  padding: 8px 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  background-color: green;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 10px; }

</style>
