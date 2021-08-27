<?php
include 'fun_img.php';
//use this 
$camera = cameraUsed("./img/pix.jpg");
echo "Camera Used: " . $camera['model'] . "<br />";
echo "Date Taken: " . $camera['datetaken'] . "<br />";


?>
