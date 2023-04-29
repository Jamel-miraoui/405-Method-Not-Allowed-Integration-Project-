<?php
ini_set("display_errors",'1');
error_reporting(E_ALL);
require_once('connbd.php');

// Get the books from the database
$query = "SELECT * FROM lessons";
$courses = $db->query($query)->fetchAll(PDO::FETCH_ASSOC); 
?>
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

    <table>
        <tr>
            <th>Techer name</th>
            <th>Department</th>
            <th>Level degree</th>
            <th>Topec</th>
            <th>Title</th>
            <th>Description</th>
			<th>Read Now</th>
        </tr>
        <!-- dispaly al books in db secton -->
        <?php foreach ($courses as $course): ?>
        <tr>
            <td><?php echo $course['teacher_id']; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $course['title']; ?></td>
            <td><?php echo $course['teacher_id']; ?></td>
            <td><?php echo $course['description']; ?></td>
            <td><a href="<?php echo $course['file_path']; ?>">PDF File</a></td>
            <!-- the download book secton -->

        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
