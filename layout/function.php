<?php

include './config/dbc.php';

function getUsername() {
	$connection = mysqli_connect("localhost", "lipicsco_Navneet", "0AJP&I,}BbmL", "lipicsco_pics");
	$run = mysqli_query($connection, "SELECT * FROM usermanagement where username='{$_SESSION['username']}' OR email='{$_SESSION['username']}'");
	while ($row=mysqli_fetch_array($run)) {
		return $row['username'];
	}
}

function getUserID() {
	$connection = mysqli_connect("localhost", "lipicsco_Navneet", "0AJP&I,}BbmL", "lipicsco_pics");
	$run = mysqli_query($connection, "SELECT * FROM usermanagement where username='{$_SESSION['username']}' OR email='{$_SESSION['username']}'");
	while ($row=mysqli_fetch_array($run)) {
		return $row['id'];
	}
}

function getProfileID($username) {
	$connection = mysqli_connect("localhost", "lipicsco_Navneet", "0AJP&I,}BbmL", "lipicsco_pics");
	$run = mysqli_query($connection, "SELECT * FROM usermanagement where username='$username'");
	while ($row=mysqli_fetch_array($run)) {
		return $row['id'];
	}
}


//getting the categores
function category(){

	$run = mysqli_query($connection, "SELECT * FROM `category` ORDER BY `cat_id` ASC " );
	while ($row=mysqli_fetch_array($run)){
		$cat_id = $row['cat_id'];
		$cat_name = $row['cat_name'];

		echo "<div class='cat_n'>
               <a href='#'>$cate_name</a>
              </div>";

	}

}


// Function For Resize Iamge According To Aspect Ration Thumnail For Main Page 
?>