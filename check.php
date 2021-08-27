<!-- In This PHP Page I Check Username is Available Or Not -->

<?php
require_once 'config/db.php';
$username = $_POST['username'];
$usernamesql = "SELECT * FROM `usermanagement` WHERE username='$username'";
	$usernameres = mysqli_query($connection, $usernamesql);
	$count = mysqli_num_rows($usernameres);
	if ($count == 1) {
		echo "<span class='glyphicon glyphicon-remove' style='color: #FF0000;' aria-hidden='true'></span> <a style='color: #339F1E;' >Username Not Available.</a>";
	}else {
		echo "<span class='glyphicon glyphicon-ok' style='color: #339F1E; aria-hidden='true'></span> <a style='color: #339F1E; '> Username Available </a>";
	}


?>	

