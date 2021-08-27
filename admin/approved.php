<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
require 'db.php';


$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT * FROM `image` WHERE id=$id AND approved=0");
while($row = mysqli_fetch_array($sql)) {

$imgid = $row['id'];
}
$count = mysqli_num_rows($sql);

if ($count == 1) {
	$usql = "UPDATE `image` SET `approved`=1 WHERE id=$imgid";    //This Line For Update User Active = 1
	$ures = mysqli_query($con, $usql);
}


	    //This Line For Update User Active = 1
header("Location: {$_SERVER['HTTP_REFERER']}");
?>