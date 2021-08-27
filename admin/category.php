<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
$admintitle = 'Image Category';
include 'header.php';
include 'sidebar.php';
?>






<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 

		     <div class="banner">
		    	<h2>
				<a href="./">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Image Category & Add New Category</span>
				</h2>
		    </div>

		 	<div class="blank">
					<div class="blank-page">
                      
            <table class="table">
			        	<caption>Image Category <a class="pull-right" href="" value="Refresh Page" onClick="refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></caption>

			        	<thead>
			        		<tr>
			        			<th>ID</th>
			        			<th>Category Name</th>
			        			<th>Action</th>

			        		</tr>
			        	</thead>
			        	<tbody>
					        	<?php 
					        	$res = mysqli_query($con, "SELECT * FROM `category` ORDER BY `category`.`cat_id` ASC ");
								while ($row=mysqli_fetch_array($res)) {  
					        	?>
			        		<tr>
			        			<th><?php echo $row['cat_id']; ?></th>
			        			<th><?php echo $row['cat_name']; ?></th>
			        			<th>
			        			<form method="post">
			        			   <button name="delete" type="submit" class="btn btn-danger" disabled="disabled"><i class="fa fa-trash" aria-hidden="true"></i></button>
			        			</form>   
			        			</th>
			        		</tr>

			        		<?php } ?>
			        	</tbody>
	        		
	        </table>

	        <form method="post">
		        <div class="col-md-2">
		        	<input class="form-control" type="text" name="category-name" placeholder="Category Name" required="required">
		        </div>	
		        <button type="reset" class="btn btn-warning" ><i class="fa fa-repeat" aria-hidden="true"></i></button>
	        	<button name="add_admin" type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
	        </form>

	        <?php 
				if (isset($_POST['add'])) {
					$cate_name = $_POST['category-name'];

					$sql = mysqli_query($con, "INSERT INTO `category`(`cat_name`) VALUES ('$cate_name')" );
				}

				if (isset($_POST['delete'])) {
					
				}
	        ?>

		            </div>
		    </div>
        </div>

        <script>
        	
        </script>
</div>
<?php
include 'footer.php';
?>






