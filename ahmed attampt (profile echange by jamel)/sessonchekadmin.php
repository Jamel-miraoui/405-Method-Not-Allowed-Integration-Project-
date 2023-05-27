<?php
session_start();
if(!isset($_SESSION['login'])&&$_SESSION['login']!="admin")
{
    header("location:index.php");
}
?>