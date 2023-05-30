<?php
// ini_set("display_errors",'1');
// error_reporting(E_ALL);
//chek sesson
require_once('sessonchek.php');
//navbar
include 'navANDhead.php';
//connneton 
require_once('connbd.php');
$login = $_SESSION['login'];
$query = "SELECT * FROM users where username ='$login'";
$userdata = $db->prepare($query);
$userdata->execute();
$result = $userdata->fetch(PDO::FETCH_ASSOC);

$id = $result["id"];
// $queryid = "SELECT id FROM users where username ='$login'";
// $iddata = $db->prepare($queryid);
// $iddata->execute();
// $resultid = $iddata->fetch(PDO::FETCH_ASSOC);

$queryCourses = "SELECT * FROM lessons WHERE teacher_id='$id'";
$courseData = $db->prepare($queryCourses);
$courseData->execute();
$courses = $courseData->fetchAll(PDO::FETCH_ASSOC);

$queryBooks = "SELECT * FROM books WHERE user_id='$id'";
$bookData = $db->prepare($queryBooks);
$bookData->execute();
$books = $bookData->fetchAll(PDO::FETCH_ASSOC);

$queryCoursesp = "SELECT * FROM lessonspenting WHERE teacher_id='$id'";
$courseDatap = $db->prepare($queryCoursesp);
$courseDatap->execute();
$coursesp = $courseDatap->fetchAll(PDO::FETCH_ASSOC);

$queryBooksp = "SELECT * FROM bookspenting WHERE user_id='$id'";
$bookDatap = $db->prepare($queryBooksp);
$bookDatap->execute();
$booksp = $bookDatap->fetchAll(PDO::FETCH_ASSOC);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="profile.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #ddd;
        align-items: center;
        justify-content: center;
    }



    .container {
        display: flex;
        width: 100%;
        height: 100%;
        padding: 20px 20px;
    }

    .box {
        flex: 30%;
        display: table;
        align-items: center;
        text-align: center;
        font-size: 20px;
        background-color: #0d1425;
        color: #fff;
        padding: 30px 30px;
        border-radius: 20px;
    }

    .box img {
        border-radius: 50%;
        border: 2px solid #fff;
        height: 250px;
        width: 250px;
    }

    .box ul {
        margin-top: 30px;
        font-size: 30px;
        text-align: center;
    }

    .box ul li {
        list-style: none;
        margin-top: 50px;
        font-weight: 100;
    }

    .box ul li i {
        cursor: pointer;
        margin: 10px;
        font-size: 40px;
    }

    .box ul li i:hover {
        opacity: 0.6;
    }

    .About {
        margin-left: 20px;
        flex: 50%;
        display: table;
        padding: 30px 30px;
        font-size: 20px;
        background-color: #fff;
        border-radius: 20px;
    }

    .About h1 {
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 50px;
        font-weight: 500;
    }

    .About ul li {
        list-style: none;
    }

    .About ul {
        margin-top: 20px;
    }

    /* CSS for button styles */
    .box ul li input[type="button"] {
        padding: 10px 20px;
        font-size: 18px;
        background-color: #0d1425;
        color: #fff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .box ul li input[type="button"]:hover {
        background-color: #ff6363;
    }

    .box ul li input[type="button"]:focus {
        outline: none;
        box-shadow: 0 0 0 2px #ff6363;
    }

    h2{
        background-color: #0d1425;
    }

    @media screen and (max-width: 1068px) {
        .container {
            display: table;
        }

        .box {
            width: 100%;
        }

        .About {
            width: 100%;
            margin: 0;
            margin-top: 20px;
        }

        .About h1 {
            text-align: center;
        }

        .box ul li input[type="button"] {
            width: 100%;
        }


    }
</style>

<body>
    <div class="container">
        <div class="box">
            <img src="Profile-Icon-SVG-09856789.png" alt="">
            <ul>
                <li><?php
                    echo $result['username'];
                    ?></li>
                <li><?php
                    if ($_SESSION['login'] != "admin") {
                        echo "ROLE: " . $result['role'];
                    } ?></li>
                    <li>
                    <a href="logout.php"><input type="button" value="Deconnection"></a>
                    </li>
                <?php
                if ($_SESSION['login'] == "admin") {
                ?>
                    <li>
                        <a href="UsersControle.php"><input type="button" value="User Manager"></a>
                        <a href="ShowPendingBooks.php"><input type="button" value="Manage Books Pending"></a>
                        <a href="ShowPendingCourses.php"><input type="button" value="Manage Courses Pending"></a>
                        <a href="ShowUplodedBooks.php"><input type="button" value="Manage Uploaded Books"></a>
                        <a href="ShowUplodedCourses.php"><input type="button" value="Manage Uploaded Courses"></a>
                        <a href="showtmailslogin.php"><input type="button" value="Manage access to emails"></a>

                        <!-- <a href="ShowUplodedCourses.php"><input type="button" value="manage Courses upload"></a> -->
                    </li>
                <?php
                }
                ?>

            </ul>
        </div>
        <div class="About">
            <h1>Activities</h1>
            <div>
                <div id="courses">
                    <h2>Courses:</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Department ID</th>
                                <th>Topic</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($courses as $course) : ?>
                                <tr>

                                    <td><?php echo $course['title']; ?></td>
                                    <td><?php echo $course['description']; ?></td>
                                    <td><?php echo $course['created_at']; ?></td>
                                    <td><?php echo $course['department_id']; ?></td>
                                    <td><?php echo $course['topec']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <br><br><br>
                <div id="books">
                    <h2>Books:</h2>
                    <table>
                        <thead>
                            <tr>

                                <th>Title</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($books as $book) : ?>
                                <tr>

                                    <td><?php echo $book['title']; ?></td>
                                    <td><?php echo $book['author']; ?></td>
                                    <td><?php echo $book['description']; ?></td>
                                    <td><?php echo $book['created_at']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br><br><br>
            <h1>Files Pending</h1>
            <div>
                <div id="courses">
                    <h2>Courses:</h2>
                    <table>
                        <thead>
                            <tr>

                                <th>Title</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Department ID</th>
                                <th>Topic</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($coursesp as $course) : ?>
                                <tr>

                                    <td><?php echo $course['title']; ?></td>
                                    <td><?php echo $course['description']; ?></td>
                                    <td><?php echo $course['created_at']; ?></td>
                                    <td><?php echo $course['department_id']; ?></td>
                                    <td><?php echo $course['topec']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <br><br><br>
                <div id="books">
                    <h2>Books:</h2>
                    <table>
                        <thead>
                            <tr>

                                <th>Title</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($booksp as $book) : ?>
                                <tr>

                                    <td><?php echo $book['title']; ?></td>
                                    <td><?php echo $book['author']; ?></td>
                                    <td><?php echo $book['description']; ?></td>
                                    <td><?php echo $book['created_at']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>