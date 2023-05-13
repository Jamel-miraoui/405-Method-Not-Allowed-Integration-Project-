<?php
ini_set("display_errors",'1');
error_reporting(E_ALL);
//chek sesson
require_once('sessonchek.php');
//navbar
include 'navANDhead.php';
//connneton 
require_once('connbd.php');
$login = $_SESSION['login'];
$query = "SELECT * FROM users where username ='$login'";
$userdata= $db->prepare($query);
$userdata->execute();
$result = $userdata->fetch(PDO::FETCH_ASSOC);
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
    body{
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #ddd;
        align-items: center;
        justify-content: center;
    }

    

    .container{
        display: flex;
        width: 100%;
        height: 100%;
        padding: 20px 20px;
    }

    .box{
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

    .box img{
        border-radius: 50%;
        border: 2px solid #fff;
        height: 250px;
        width: 250px;
    }

    .box ul{
        margin-top: 30px;
        font-size: 30px;
        text-align: center;
    }
    .box ul li{
        list-style: none;
        margin-top: 50px;
        font-weight: 100;
    }

    .box ul li i{
        cursor: pointer;
        margin: 10px;
        font-size: 40px;
    }

    .box ul li i:hover{
        opacity: 0.6;
    }

    .About{
        margin-left: 20px;
        flex: 50%;
        display: table;
        padding: 30px 30px;
        font-size: 20px;
        background-color: #fff;
        border-radius: 20px;
    }

    .About h1{
        text-transform: uppercase;
        letter-spacing: 3px;
        font-size: 50px;
        font-weight: 500;
    }

    .About ul li{
        list-style: none;
    }

    .About ul{
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

@media screen and (max-width: 1068px) {
    .container{
        display: table;
    }

    .box{
        width: 100%;
    }

    .About{
        width: 100%;
        margin: 0;
        margin-top: 20px;
    }

    .About h1{
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
                if($_SESSION['login']!="admin"){
                       echo "ROLE: ".$result['role'];
                }?></li>
                <?php
                if($_SESSION['login']=="admin"){

               
                ?>
                <li>
                    <a href="Src/phpFunction/God admin functions/UsersControle.php"><input type="button" value="User Manager"></a>
                    <a href="Src/phpFunction/God admin functions/Pendings/ShowPending.php"><input type="button" value="manage Book Uplode"></a>
                    <a href="Src/phpFunction/God admin functions/UsersControle.php"><input type="button" value="manage Courses upload"></a>
                </li>
                <?php
                 }
                ?>
            </ul>
        </div>
        <div class="About">
            <ul>
                <h1>about</h1>
            </ul>
            <ul>
                <h3><?php
                       echo $result['role'];
                ?></h3>
                <li><?php
                       echo $result['username'];
                ?></li>

            </ul>
        </div>
    </div>
</body>
</html>