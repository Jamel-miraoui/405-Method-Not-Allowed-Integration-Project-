<?php
include 'navANDhead.php';
require_once('sessonchekadmin.php');
?>
	<h1>List of Uploded Books</h1>
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
		$sql = "SELECT * FROM books";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// Output data of each row
			while($row = $result->fetch_assoc()) {
				?>
				     <div class="book-container">
  <div class="book">
    <img src="<?php echo $row['cover_path']; ?>" alt="Book 3">
    <h3><?php echo $row['title']; ?></h3>
    <p><?php echo $row['author']; ?></p>
    <p>uploded by: <?php
          $path = $row['user_id'];
          $sql2 = "SELECT * FROM users WHERE id='$path'";
          $result2 = $conn->query($sql2);
          if ($result2->num_rows > 0){
          while($row2 = $result2->fetch_assoc()){
            echo $row2['username'];
          }}else {echo "error";} ?></p>
    <a href="download.php?filename=<?php echo urlencode($row['file_path']);?>">PDF File</a>

    <a href='delete_book_Uplode.php?id=<?php echo urlencode($row["id"]);?>'>Delete</a>

    </form>
  </div>
</div>

		<?php
		}}?>
	</table>
</body>
</html>
<style>
.book-container {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	display: inline-block;

  
}

.book {
  /* width: 300px; */
  padding: 20px;
  text-align: center;
  background-color: #f2f2f2;
  border-radius: 8px;
}

.book img {
  /* width: 400%; */
  max-height: 400px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 10px;
}

.book h3 {
  font-size: 20px;
  margin-bottom: 8px;
}

.book p {
  font-size: 16px;
  margin-bottom: 16px;
}

.book a {
  display: inline-block;
  padding: 8px 16px;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.book a:hover {
  background-color: #0056b3;
}

.book form {
  margin-top: 16px;
  display: inline-block;
}

.book form input[type="submit"][value="Accept"] {
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
