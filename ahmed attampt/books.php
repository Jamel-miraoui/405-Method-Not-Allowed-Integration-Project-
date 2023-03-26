<!-- //dispay all books from data base file  -->
<?php
// Connect to the database
$host = 'localhost';
$username = 'sammy';
$password = 'password';
$dbname = 'BEISETSO_db';

$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

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
				<li><a href="#">Home</a></li>
				<li><a href="books.php">Books</a></li>
				<li><a href="Courses.php">Courses</a></li>
				<li><a href="#">Borrow History</a></li>
				<li><a href="#">Login</a></li>
			</ul>
		</nav>
	</header>

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
            echo "<td><a class='button' href='" . $row["book_url"] . "' download>Download</a></td>";
			echo "<td><a class='button' href='" . $row["book_url"] . "' target='_blank'>Read Online</a></td>";
			echo "</tr>";
            ?>

        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
