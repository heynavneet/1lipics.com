<?php 
session_start();
$search_q = '';
$pagetitle = 'Error 404 Page Not Found';
$keywords = '1lipics, 404page, error';
$description = '1lipics Error 404 Page';
$page_url = '//1lipics.com/404';
$image_url = 'http://1lipics.com/images/1lipics.png';
include './layout/header.php';
include './layout/search1.php';
?>
<div class="spec" style="color: #c1c1c1; margin: 15%;" ><h3 style=" font-size: 30px;"><i class="fa fa-exclamation-triangle" aria-hidden="true" style="margin-right: 15px; color: red;" ></i>Error 404</h3><h1 style="margin:0 0 75px;font-size:40px; color: black;  "> Oops Page not found </h1><a href="./">Go to Home </a></div>
<?php 
include './layout/footer.php';
?>