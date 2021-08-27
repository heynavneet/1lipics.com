<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
$admintitle = 'Contact View';
include 'header.php';
include 'sidebar.php';
?>
<link rel="stylesheet" href="css/pagination.css">
<script src="js/pagination.js"></script>


<style>
	.modal-body img{
	   display: block;
	   overflow: hidden;
	   margin: auto;
	}
</style>

<!-- Image Viewer Start Here -->
<div class="modal fade" id="empModal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-dialog modal-lg">
     <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Contact View</h4>
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





<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
				<a href="./">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Contact Response</span>
				</h2>
		    </div>
		<!--//banner-->
 	 <!--faq-->
 	<div class="blank">
	

			<div class="blank-page" style="text-align: center;">
				
	        	<table class="table table-bordered">
	        	<caption>Unapproved Images <a class="pull-right" href="" value="Refresh Page" onClick="refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></caption>

	        	<thead>
	        		<tr>
	        			<th>ID</th>
	        			<th>Name</th>
	        			<th>EMail</th>
	        			<th>Massage</th>
	        			<th>Date</th>

	        		</tr>
	        	</thead>
	        	<tbody>
	        	
                
                <?php
                $limit = 20;  
				if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
				$start_from = ($page-1) * $limit;  

	        	$sql = "SELECT * FROM contact ORDER BY con_id DESC LIMIT $start_from, $limit";
				$rs_result = mysqli_query($con, $sql); 
				while ($row = mysqli_fetch_assoc($rs_result)) { 
	        	?>
	        	<tr>
	        		
	        			<th><?php echo $row['con_id']; ?></th>
	        			<th><a style="color: #999; cursor:pointer;" id='butinfo_<?php echo $row['con_id']; ?>' class='con_info'><?php echo $row['con_name']; ?></a></th>
	        			<th><a style="color: #999; cursor:pointer;" id='butinfo_<?php echo $row['con_id']; ?>' class='con_info'><?php echo $row['con_mail']; ?></a></th>
	        			<th><p><?php echo $row['con_massage']; ?></p></th>
	        			<th><?php echo $row['con_date']; ?></th>
				</tr>
	        		<?php } ?>
	        		
	        	</tbody>
	        		
	        	</table>


<?php  
$sql = "SELECT COUNT(con_id) FROM contact";  
$rs_result = mysqli_query($con, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<nav style='margin-top: 10px;'><ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
             $pagLink .= "<li><a href='u1?page=".$i."'>".$i."</a></li>";  
};  
echo $pagLink . "</ul></nav>";  
?>
	        </div>
	       </div>


<style>
.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#000;background-color:#eee;border-color:#a4a4a4}.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#666;text-decoration:none;background-color:#fff;border:1px solid #ddd}.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#777;border-color:#777}
</style>
<script type="text/javascript">
$(document).ready(function(){

// Model View/Load with ajax start 
$('.con_info').click(function(){
   var id = this.id;
   var splitid = id.split('_');
   var con_id = splitid[1];

   // AJAX request
   $.ajax({
    url: 'ajax/contact_view_model.php',
    type: 'post',
    data: {con_id: con_id},
    success: function(response){ 
      // Add response in Modal body
      $('.modal-body').html(response);

      // Display Modal
      $('#empModal').modal('show'); 
    }
  });
 });
// Model View/Load with ajax end

// pagination start
$('.pagination').pagination({
        items: <?php echo $total_records;?>,
        itemsOnPage: <?php echo $limit;?>,
        cssStyle: 'light-theme',
		currentPage : <?php echo $page;?>,
		hrefTextPrefix : 'u1?page='
    });
//pagination end

});
</script>


























<?php
include 'footer.php';
?>
