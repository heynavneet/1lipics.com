<?php
// Thsi is Database Connection For User Resitration and other
$connection = mysqli_connect("localhost", "healthx1_navneet", "#g3l25WQ1ex~");
if (!$connection) {
	echo "Failed to Connect with Database" . die(mysqli_error($connection));
}

$dbselect = mysqli_select_db($connection, "healthx1_pics");
if (!$dbselect) {
	echo "Failed To Select Database" . die(mysqli_error($connection));
}

?>