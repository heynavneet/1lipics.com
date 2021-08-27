<?php
$con = mysqli_connect('localhost', 'healthx1_navneet', '#g3l25WQ1ex~');
if (!$con){
    die("Database Connection Failed" . mysqli_error($con));
}
$select_db = mysqli_select_db($con, 'healthx1_pics');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($con));
}
?> 