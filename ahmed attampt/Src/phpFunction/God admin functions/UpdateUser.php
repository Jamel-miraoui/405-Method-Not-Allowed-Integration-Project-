<!DOCTYPE html>
<html>
<head>
	<title>Modify User</title>
</head>
<body>
	<h1>Modify User</h1>
	<form method="post">
		<label for="id">User ID:</label>
		<input type="text" id="id" name="id"><br><br>
		<input type="submit" value="Search"><br><br>

<?php
	// check if the form has been submitted
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		// retrieve the user ID from the form
		$id = $_GET['id'];
		
		// connect to the database (replace with your own database credentials)
		$host = 'localhost';
		$username = 'username';
		$password = 'password';
		$dbname = 'greatmove_library';
		
		$conn = new mysqli($host, $username, $password, $dbname);
		
		// check if the connection was successful
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		
		// query the database to retrieve the user information
		$sql = "SELECT * FROM users WHERE id='$id'";
		$result = $conn->query($sql);
		
		// check if the query returned any results
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$username = $row['username'];
			$password = $row['password'];
			$email = $row['email'];
			$role = $row['role'];
?>

		<label for="username">Username:</label>
		<input type="text" id="username" name="username" value="<?php echo $username; ?>"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" value="<?php echo $password; ?>"><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="<?php echo $email; ?>"><br><br>
		<label for="role">Role:</label>
        <input type="role" id="role" name="role" value="<?php echo $role; ?>"><br><br>
        <input type="hidden" name="id" value="<?php echo $user_id; ?>">
		<input type="submit" name="submit" value="Save Changes">
	</form>
	
    <?php
		}
		// if the query did not return any results
		else {
			echo "No user found with that ID.";
		}
	}
	
	// check if the form has been submitted with the updated user information
	if (isset($_POST['submit'])) {

		// retrieve the updated user information from the form
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$role = $_POST['role'];
		$id = $_POST['id'];
		
		// update the user information in the database
		$sql = "UPDATE users SET username='$username', password='$password', email='$email', role='$role' WHERE id='$id'";
		$result = $conn->query($sql);
		
		// check if the update was successful
		if ($result) {
			echo "User information updated successfully.";
		}
		else {
			echo "Error";
        }}
        ?>
        </body>
        </html>