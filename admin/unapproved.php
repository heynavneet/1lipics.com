<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
$admintitle = 'Unapproved Images';
include 'header.php';
include 'sidebar.php';
?>
<!-- Image Viewer Start Here -->
<div class="modal fade" id="empModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-dialog modal-lg">
     <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Image View</h4>
      </div>
      <div class="modal-body" style="text-align: center;">
 
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
     </div>
    </div>
    </div>
</div>
<!-- Image Viewer End Here -->

<link rel="stylesheet" href="css/pagination.css"><script src="js/pagination.js"></script><div id="page-wrapper" class="gray-bg dashbard-1"><div class="content-main"><div class="banner"><h2><a href="./">Home</a><i class="fa fa-angle-right"></i><span>Unapproved Images</span></h2></div><div class="blank"><div class="blank-page" style="text-align: center;">
	        	<table class="table table-bordered">
	        	<caption>Unapproved Images <a class="pull-right" href="" value="Refresh Page" onClick="refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></caption>
	        	<thead>
	        		<tr>
	        			<th>ID</th>
	        			<th>Image Name</th>
	        			<th>att</th>
	        			<th>Keywords</th>
	        			<th>Pics By</th>
	        			<th>Process</th>
	        		</tr>
	        	</thead>
	        	<tbody>
                <?php
                $limit = 20;  
				if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
				$start_from = ($page-1) * $limit;  
	        	$sql = "SELECT * FROM image where approved=0 ORDER BY id ASC LIMIT $start_from, $limit";
				$rs_result = mysqli_query($con, $sql); 
				while ($row = mysqli_fetch_assoc($rs_result)) { 
	        	?>
	        	<tr>
	        			<th><?php echo $row['id']; ?></th>
	        			<th><a style="color: #999; cursor:pointer;" id='butinfo_<?php echo $row['id']; ?>' class='userinfo'><?php echo $row['iname']; ?></a></th>
	        			<th><a style="color: #999; cursor:pointer;" id='butinfo_<?php echo $row['id']; ?>' class='userinfo'><img src="../<?php echo $row['thumb'] ?>" height="30px" width="auto"></a></th>
	        			<th><?php echo $row['itags']; ?></th>
	        			<th><?php echo $row['image_by']; ?></th>
	        			<th>           <!-- Action Button For Approved Unprroved or Delete Image -->
	        				<div class="btn-group">
							  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <i class="fa fa-tasks" aria-hidden="true"></i>
							  </button>
							  <ul class="dropdown-menu">
							    <li><a name="approved" href="approved.php?id=<?php echo $row['id']; ?>">Approved</a></li>
							    <li><a style="color: #999; cursor:pointer;" id='butinfo_<?php echo $row['id']; ?>' class='userinfo'>View</a></li>
							    <li><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></li>
							    <li><a href="home_image.php?iname=<?php echo $row['iname']; ?>">Add To Home Page</a></li>
							    <!-- <li role="separator" class="divider"></li> -->
							    <li><a target="_blank" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></li>
							  </ul>
							</div>
	        			</th></tr><?php } ?></tbody></table>
<?php  
$sql = "SELECT COUNT(id) FROM image where approved=0";  
$rs_result = mysqli_query($con, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<nav style='margin-top: 10px;'><ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<li><a href='unapproved?page=".$i."'>".$i."</a></li>";  
};  
echo $pagLink . "</ul></nav>";  
?>
</div></div><style>
.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#000;background-color:#eee;border-color:#a4a4a4}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#666;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#777;border-color:#777}
</style>
<script type="text/javascript">
$(document).ready(function(){
$('.userinfo').click(function(){
   var id = this.id;
   var splitid = id.split('_');
   var userid = splitid[1];

   // AJAX request
   $.ajax({
    url: 'ajax/image_view_model.php',
    type: 'post',
    data: {userid: userid},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-body').html(response);

      // Display Modal
      $('#empModal').modal('show'); 
    }
  });
 });

$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
		currentPage : <?php echo $page;?>,
		hrefTextPrefix : 'unapproved?page='
    });
	});
	</script><?php include 'footer.php'; ?>