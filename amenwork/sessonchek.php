<!-- sesson chek to be completed: sesson.login alredy contanes the useername || modifie to be contaning the user tipe and starting from tahta the funcunality of the user-->
<?php
session_start();
if(!isset($_SESSION['login']))
{
    header("location:login.php?msg=1");
}
?>