<?php
include 'navANDhead.php';
require_once('sessonchekadmin.php');


?>
<body>
<a class='button' href="uplodebookform.php"><span>&#43;</span>Add<br>Email</a>
<div classe='y'>

<a class='x' href="Showtmailslogin.php"><span></span>studients Email</a>
</div>
<lable class='l'>Teacher Email</lable>
<!-- <a href="" >student emails</a>
     <a href="" >tescher emails</a> -->
<div class="table">

     <!-- <a href="" class="btn">student emails</a>
     <a href="" class="btn">tescher emails</a> -->
	<form method="post" class="search">
		<label for="search">Search:</label>
		<input type="text" id="search" name="search">
		<input type="submit" value="Search">
		<link rel="stylesheet" href="Style.css">
	</form>
	
	<table class="styled-table">
		<tr>
			<th>ID</th>
			<th>Email</th>
			<th>valid</th>
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
			$sql = "SELECT * FROM teacheremails WHERE email LIKE '%$search%' OR valid LIKE '%$search%' OR id LIKE '%$search%'";
		} else {
			// retrieve all users from the database
			$sql = "SELECT * FROM teacheremails";
		}

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
					echo "<td>" . $row['valid'] . "</td>";
                    echo "<td>";
                    if($row['valid']=="used"){
                    echo "<button class='button-18' role='button'><a href='Updateloginmail.php?id=" . $row['id'] . "'>chnage to unsed</a> </button>";
                    }else{
                        echo "<button class='button-18' role='button'><a href='Updateloginmail.php?id=" . $row['id'] . "'>chnage to used</a> </button>";
                    }
					echo "<button class='button-19' role='button'><a href='Deleteloginmail.php?id=" . $row['id'] . "'>Delete</a></button>";
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "0 results";
			}

			$conn->close();
		?>
	</table>
	</div>

	<br>

</body>
<style>
    	.l {
  display: block;
  font-size: 24px;
  font-weight: bold;
  text-align: center;
  margin-top: 50px;
}
div.y {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.x {
  display: inline-block;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  background-color: #f1f1f1;
  color: #333;
  border-radius: 4px;
  transition: background-color 0.3s ease;
  margin-bottom: 10px;
}

.x span {
  font-size: 24px;
  display: block;
  margin-bottom: 5px;
}

.x:hover {
  background-color: #ddd;
}

  </style>






</style>
</html>