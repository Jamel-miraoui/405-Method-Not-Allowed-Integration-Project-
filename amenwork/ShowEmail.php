<?php
// ini_set("display_errors",'1');
// error_reporting(E_ALL);
require_once('connbd.php');

require_once('sessonchek.php');
// Get the books from the database

$query = "SELECT * FROM lessons";
$courses = $db->query($query)->fetchAll(PDO::FETCH_ASSOC); 
//navbar
include 'navANDhead.php';
?> <a class='button' href="uplodecourseform.php"><span>&#43;</span>Add<br>Email</a>
<button class="x">Email Teacher</button>
<button class="x">Email Student</button>
   

</body>

   


    
</html>
