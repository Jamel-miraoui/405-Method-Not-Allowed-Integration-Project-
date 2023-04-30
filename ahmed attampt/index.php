<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Library</title>
	<link rel="stylesheet" href="css/style.css">
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
				<li><a href="#">Borrow History</a></li>
				<li><a href="#">Login</a></li>
			</ul>
		</nav>
	</header>
	
	<main>
		<section>
			<h2>New Books</h2>
			<div class="book-container">
				<div class="book">
					<img src="resorses/p4.jpg" alt="Book 1" width="300">
					<h3>Book 1 Title</h3>
					<p>Author Name</p>
				</div>
				<div class="book">
					<img src="resorses/p2.jpeg" alt="Book 1" width="300">
					<h3>Book 1 Title</h3>
					<p>Author Name</p>
				</div>
				<div class="book">
					<img src="resorses/p3.jpeg" alt="Book 2" width="300">
					<h3>Book 2 Title</h3>
					<p>Author Name</p>
				</div>
				<div class="book">
					<img src="resorses/p1.jpeg" alt="Book 3" width="300">
					<h3>Book 3 Title</h3>
					<p>Author Name</p>
				</div>
			</div>
		</section>
		
		<section>
			<h2>Popular Courses</h2>
			<div class="course-container">
				<div class="course">
					<img src="course1.jpg" alt="Course 1">
					<h3>Course 1 Title</h3>
					<p>Instructor Name</p>
				</div>
				<div class="course">
					<img src="course2.jpg" alt="Course 2">
					<h3>Course 2 Title</h3>
					<p>Instructor Name</p>
				</div>
				<div class="course">
					<img src="course3.jpg" alt="Course 3">
					<h3>Course 3 Title</h3>
					<p>Instructor Name</p>
				</div>
			</div>
		</section>
	</main>
	
	<footer>
		<p></p>
	</footer>
	
</body>
</html>
