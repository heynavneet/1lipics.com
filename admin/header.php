<?php 
include 'db.php';  ?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo "$admintitle"; ?> - 1lipics Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="1lipics Admin" content="1lipics Administrator" />
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<link rel="icon" sizes="64x164" href="images/admin_icon.png">
<link rel="icon" href="images/admin_icon.png">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery.min.js"> </script>
<script src="js/tag.js"></script>
<script src="js/jquery.metisMenu.js"></script>
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
<script>$('#toggle').click(function(){screenfull.toggle($('#container')[0]);});</script>
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">$(document).ready(function(){$('#demo-pie-1').pieChart({barColor:'#3bb2d0',trackColor:'#eee',lineCap:'round',lineWidth:8,onStep:function(from,to,percent){$(this.element).find('.pie-value').text(Math.round(percent)+'%');}});$('#demo-pie-2').pieChart({barColor:'#fbb03b',trackColor:'#eee',lineCap:'butt',lineWidth:8,onStep:function(from,to,percent){$(this.element).find('.pie-value').text(Math.round(percent)+'%');}});$('#demo-pie-3').pieChart({barColor:'#ed6498',trackColor:'#eee',lineCap:'square',lineWidth:8,onStep:function(from,to,percent){$(this.element).find('.pie-value').text(Math.round(percent)+'%');}});});</script>
<script src="js/skycons.js"></script>

</head>
<body>
<div id="wrapper">
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="./">1lipics</a></h1>         
               </div>
             <div class=" border-bottom">

            <!-- Brand and toggle get grouped for better mobile display -->
         
           <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="drop-men" >
                <ul class=" nav_1">
                    <li class="dropdown">
                    <?php 
                    $res = mysqli_query($con, "SELECT * FROM admin WHERE admin_name='{$_SESSION['admin_name']}' ");
                    while ($row=mysqli_fetch_array($res)) {
                    ?>
                      <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret"><?php echo $_SESSION['admin_name']; ?><i class="caret"></i></span>
                      <img style="width: 60px; height: 60px;border: 1px solid grey;" alt="admin Profile" src="admin_data/<?php $pic = $row['admin_pic']; if (!empty($pic)) { echo $row['admin_pic']; }else { echo 'default-avatar.png'; } ?>"></a><?php } ?>
                      <ul class="dropdown-menu " role="menu">
                        <li><a href="./profile"><i class="fa fa-user"></i>Edit Profile</a></li>
                        <li><a href="calendar"><i class="fa fa-calendar"></i>Calender</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
                      </ul>
                    </li>
                   
                </ul>
             </div>
         </div>
     </nav>
            <div class="clearfix"></div>