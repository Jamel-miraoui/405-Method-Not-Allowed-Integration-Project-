<?php
require_once('sessonchek.php');
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
</body>