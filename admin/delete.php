 <?php
require 'db.php';
$id = $_GET['id'];

$sql = "SELECT * FROM `image` WHERE id=$id AND approved=0";
$res = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($res)) {

$image = $row['image'];
$thumb = $row['thumb'];
$single = $row['single'];

$oimage = realpath('../'.$image);
$timage = realpath('../'.$thumb);
$simage = realpath('../'.$single);

unlink($oimage);
unlink($timage);
unlink($simage);
}

$count = mysqli_num_rows($res);
if ($count == 1) {
	$usql = "DELETE FROM `image` WHERE id=$id";    //This Line For Update User Active = 1
	$ures = mysqli_query($con, $usql);
	if ($ures) {
		echo "Image Delete Successfully";
	}else {
       echo "Image Delete Failed";
	}
}
header("Location: {$_SERVER['HTTP_REFERER']}");
?>

