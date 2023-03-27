<!-- //dispay all books from data base file  -->
<?php
// Connect to the database
ini_set("display_errors",'1');
error_reporting(E_ALL);
require_once('connbd.php');

// Get the books from the database
$query = "SELECT * FROM Books";
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
<div>
<a class='button' href="uplodebookform.php">Read Online</a>
</div>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>ISBN</th>
            <th>Publication Date</th>
            <th>Number of Pages</th>
            <th>Category</th>
            <th>Download</th>
			<th>Read Online</th>
        </tr>
        <!-- dispaly al books in db secton -->
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?php echo $book['book_id']; ?></td>
            <td><a href="book.php?id=<?php echo $book['book_id']; ?>"><?php echo $book['title']; ?></a></td>
            <td><?php echo $book['author_name']; ?></td>
            <td><?php echo $book['publisher_name']; ?></td>
            <td><?php echo $book['ISBN']; ?></td>
            <td><?php echo $book['publication_date']; ?></td>
            <td><?php echo $book['number_of_pages']; ?></td>
            <td><?php echo $book['category']; ?></td>
            <!-- the download book secton -->
            <?php
            $ID= $book['book_id'];
			echo "<td><a class='button' href='target='retrievebook.php?msg=$ID'>Read Online</a></td>";
			echo "</tr>";
            ?>

        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
