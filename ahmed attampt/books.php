<!-- //dispay all books from data base file  -->
<?php
// Connect to the database
ini_set("display_errors",'1');
error_reporting(E_ALL);
require_once('connbd.php');
//check sesson 
require_once('sessonchek.php');

// Get the books from the database
$query = "SELECT * FROM books";
$books = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/booksstyle.css">
</head>
<body>
    
    <header>
    <h1>Books</h1>
    <form method="get" action="search.php">
  <input type="text" name="search" placeholder="Search...">
  <input type="submit" value="Search">
         </form>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="books.php">Books</a></li>
				<li><a href="Courses.php">Courses</a></li>
				<li><a href="logout.php">Dissconnect</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
		</nav>
	</header>
    <div>
<a class='button' href="uplodebookform.php"><span>&#43;</span>Add<br>Book</a>
    </div>
    
    <table>
        <tr>
            <th>Cover</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
			<th>Read Now</th>
        </tr>
        <!-- dispaly al books in db secton -->
        <?php foreach ($books as $book): ?>
        <tr>
        <td><img src="<?php echo $book['cover_path']; ?>" width="210"></td>
            <td><?php echo $book['title']; ?></td>
            <td><?php echo $book['author']; ?></td>
            <td><?php echo $book['description']; ?></td>
            <td><a href="<?php echo $book['file_path']; ?>">PDF File</a></td>
            <!-- the download book secton -->

        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
