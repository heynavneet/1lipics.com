<?php
include "../db.php";



if (empty($_POST['userid'])) {
	echo "No Access";
}else{
$userid = $_POST['userid'];
$sql = "select * from image where id=".$userid;
$result = mysqli_query($con,$sql);
while( $row = mysqli_fetch_array($result) ){

 $single = $row['single'];

 $response = "<img src='../".$single."' style='margin: auto;' class='img-responsive' alt='Responsive image'>";
 
}
echo $response;
exit;
}
