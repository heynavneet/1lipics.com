<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
$admintitle = 'Unapproved Images View';
include 'header.php';
include 'sidebar.php';

$id = $_GET['id'];
?>
<style>
	.view_box {
	    display: inline-block;
	    zoom: 1;
	    *display: inline;
	}
	.view_box img {
		display: inline-block;
	    height: auto;
	    width: 100%;
	    position: relative;
	    box-shadow: 0 1px 3px rgba(0, 0, 30, .3);
	    cursor: pointer;
	    background: repeating-linear-gradient(45deg, #c1c1c1, #c1c1c1 .10em, #fff 0, #fff .75em );
	    background-position: 0 0, 10px 10px;
	    background-color: #fff;
	    background-size: 21px 21px;
	}
</style>

<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<a href="unapproved.php">Unapproved Images</a>
				<i class="fa fa-angle-right"></i>
				<span>View Single Unapproved Images</span>
				</h2>
		    </div>
					<!--//banner-->
			 	 <!--faq-->
			 	<div class="blank">
			 	  <div class="blank-page">
			 	  <?php 
					$res = mysqli_query($con, "SELECT * FROM image where id=$id and approved=0 ");
					while($row = mysqli_fetch_array($res)) {
				  ?>
				  <div style="text-align: center;">
                   <div class="view_box" style="margin: auto;">
                   	<img src="../<?php echo $row['single'] ?>">
                   </div>
                  </div>
				  <?php } ?>
			 	  </div>
			    </div>

			    <div class="blank" style="padding: 1em; padding-top: 2px;">
			 	  <div class="blank-page" style="padding: 1em; padding-top: 2px;">
                   <p>Few Feture Come Later</p>
			 	  </div>
			 	</div>  
        </div>
</div>





















<?php
include 'footer.php';
?>