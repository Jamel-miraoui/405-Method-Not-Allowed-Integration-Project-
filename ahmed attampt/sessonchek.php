<!-- for later not working yet its for later   -->
<?php
session_start();
if(!isset($_SESSION['login']))
{
    header("location:login.php?msg=1");
}
?>