<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/booksstyle.css">
    <style>


    </style>
</head>
<body>
<header>
    <div class="header-container">
        <h1>Library</h1>
        <form method="get" action="search.php" class="search-form">
            <input type="text" name="search" class="search-input" placeholder="Search...">
            <input type="submit" value="Search" class="search-submit">
        </form>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="Courses.php">Courses</a></li>
                <li><a href="logout.php">Disconnect</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
        <div class="user-info">
            <a href="profile.php"><img src="Profile-Icon-SVG-09856789.png" alt="Profile photo" class="profile-photo"></a>
            <h3 class="user-name">John Doe</h3>
        </div>
    </div>
</header>


