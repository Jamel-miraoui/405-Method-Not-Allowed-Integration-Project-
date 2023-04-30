<?php
ini_set("display_errors",'1');
error_reporting(E_ALL);
// $selected_colors = $_POST['description'];
// echo $selected_colors;

if (isset($_POST['description'])) {
	$description = $_POST['description'];
	echo "You selected: " .$description ;
	
  }else {
  echo 'EL 3ASBA';}
?>