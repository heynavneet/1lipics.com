<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
$admintitle = 'All Users';
include 'header.php';
include 'sidebar.php';
?>
<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
				<a href="./">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Users</span>
				<i class="fa fa-angle-right"></i>
				<span>All</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--faq-->
 	<div class="blank">
			<div class="blank-page">
				
	        	<table class="table">
	        	<caption>All Users <a class="pull-right" href="" value="Refresh Page" onClick="refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></caption>

	        	<thead>
	        		<tr>
	        			<th>ID</th>
	        			<th>User Name</th>
	        			<th>Email</th>
	        			<th>Join Date</th>
	        			<th>Active</th>
	        			<th>Action</th>
	        		</tr>
	        	</thead>
	        	<tbody>
	        	<?php 
	        	$res = mysqli_query($con, "SELECT * FROM `usermanagement` ");
				while ($row=mysqli_fetch_array($res)) {  
	        	?>
	        		<tr>
	        			<th><?php echo $row['id']; ?></th>
	        			<th><a href="user_details.php?username=<?php echo $row['username']; ?>" ><?php echo $row['username']; ?></th>
	        			<th><?php echo $row['email'] ?></th>
	        			<th><?php echo $row['join_date'] ?></th>
						<th>
			        			<?php 
			        			if ($row['active'] == 1) { 
			        				echo "Yes";
			        			}elseif ($row['active'] == 0) {
			        				echo "No";
			        			} 
			        			?>
	        			</th>
	        			<th><a href="delete_user.php?id=<?php echo $row['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></a></th>
	        		</tr>

	        		<?php } ?>
	        	</tbody>
	        		
	        	</table>
	        </div>
	       </div>
<script>
</script>
<?php
include 'footer.php';
?>