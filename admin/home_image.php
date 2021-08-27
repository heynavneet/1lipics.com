<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
$admintitle = 'Home Page Images';
include 'header.php';
include 'sidebar.php';
?>
<?php 



?>



<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
				<a href="./">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Home Page Image</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--faq-->
 	<div class="blank">
	

			<div class="blank-page">
				
	        	<table class="table">
	        	<caption>Home Page Images <a class="pull-right" href="" value="Refresh Page" onClick="refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></caption>

	        	<thead>
	        		<tr>
	        			<th>ID</th>
	        			<th>Image</th>
	        			<th>Image Name</th>
	        			<th>View</th>
	        			<th>att</th>
	        			<th>Keywords</th>
	        			<th>Pics By</th>
	        			<th>Process</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        	
                
                <?php
	        	$res = mysqli_query($con, "SELECT main.id, image.id, image.iname, image.itags, image.image, image.image_by, image.date FROM main, image WHERE image_id=image.id ORDER BY image.id");
				while ($row=mysqli_fetch_array($res)) {  
	        	?><tr>
	        		
	        			<th><?php echo $row['id']; ?></th>
	        			<th><?php echo $row['image']; ?></th>
	        			<th><?php echo $row['iname']; ?></th>
	        			<th><img src="../img/thumb/<?php echo $row['image'] ?>" height="30px" width="auto"></th>
	        			<th><a href="../image?id=<?php echo $row['id']; ?>" target="_blank" >View</a></th>
	        			<th><?php echo $row['itags']; ?></th>
	        			<th><?php echo $row['image_by']; ?></th>
	        			<th>           <!-- Action Button For Approved Unprroved or Delete Image -->
	        				<div class="btn-group">
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    Action</span>
							  </button>
							  <ul class="dropdown-menu">
							    <li><a name="approved" target="_blank" href="approved.php?id=<?php echo $row['id']; ?>">Approved</a></li>
							    <li><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></li>
							    <!-- <li role="separator" class="divider"></li> -->
							    <li><a target="_blank" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></li>
							  </ul>
							</div>
	        			</th>
	        		
</tr>
	        		<?php } ?>
	        		
	        	</tbody>
	        		
	        	</table>
	        </div>
	       </div>


<?php
include 'footer.php';
?>