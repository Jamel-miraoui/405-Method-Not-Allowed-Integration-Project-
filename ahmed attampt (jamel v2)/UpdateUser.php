<?php
include 'navANDhead.php';
require_once('sessonchekadmin.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Modify User</title>
</head>
<body>
	<h1>Modify User</h1>
	<form method="POST" action="FunctionUpdateUser.php">

<?php
	// check if the form has been submitted
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		// retrieve the user ID from the form
		$id = $_GET['id'];
		
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
			$id = $row['id'];
?>

		<label for="username">id:</label>
		<input type="text" name="id" value="<?php echo $id; ?>"><br><br>
		<label for="username">username:</label>
		<input type="text" id="username" name="username" value="<?php echo $username; ?>"><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" value="<?php echo $password; ?>"><br><br>
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" value="<?php echo $email; ?>"><br><br>
		<label for="role">Role:</label>
        <input type="role" id="role" name="role" value="<?php echo $role; ?>"><br><br>
        <!-- <input type="hidden" name="id" value="<?php echo $user_id; ?>"> -->
		<input type="submit" name="submit" value="Save Changes">
	</form>
	
    <?php
		}
		// if the query did not return any results
		else {
			echo "No user found with that ID.";
		}
	}
	
        ?>
        </body>
        </html>