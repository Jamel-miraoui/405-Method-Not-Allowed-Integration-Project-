<?php
ini_set("display_errors",'1');
error_reporting(E_ALL);
require_once('connbd.php');

require_once('sessonchek.php');
// Get the books from the database
$query = "SELECT * FROM lessons";
$courses = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/booksstyle.css">
</head>
<body>
<header>
		<h1>Library</h1>
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
    <a class='button' href="uplodecourseform.php"><span>&#43;</span>Add<br>Course</a>
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
            <?php
            $query2 = "SELECT username FROM users WHERE id = ?";
            $stmt = $conn->prepare($query2);
            $stmt->execute([$course['teacher_id']]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Access the username value  echo $course['class_level']; 
            $username = $result['username'];
            ?>
            <td><?php echo $result['username']; ?></td>
            <td><?php echo $course['department_id']; ?></td>
            <td><?php
            if ($course['class_level']>10) {
                if ($course['class_level']==11) {
                    echo "1er Master"; 
                }else{ echo "2emm Master";}
            }else{
                if ($course['class_level']==1) {
                    echo "1er";
                }
                if ($course['class_level']==2) {
                    echo "2emme";
                }if($course['class_level']==3) {
                    echo "3emme";
                }

            } 
            ?></td>
            <td><?php echo $course['topec']; ?></td>
            <td><?php echo $course['title']; ?></td>
            <td><?php echo $course['description']; ?></td>
            <td><a href="<?php echo $course['file_path']; ?>">PDF File</a></td>
            <!-- the download book secton -->

        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
