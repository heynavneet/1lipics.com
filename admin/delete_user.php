<?php 
require 'db.php';
$id = $_GET['id'];
$usql = "DELETE FROM `usermanagement` WHERE id=$id";    //This Line For Update User Active = 1
	$ures = mysqli_query($con, $usql);
header("Location: {$_SERVER['HTTP_REFERER']}");
 ?>
 