<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
$admintitle = 'Edit Image Details';
include 'header.php';
include 'sidebar.php';

$id = $_GET['id'];

function gettags($id){
$link=mysqli_connect("199.79.62.14","tuber6u2_heynav","d09?D!4v?D5%","tuber6u2_pics");
  $tag = mysqli_query($link, "SELECT * FROM image,usermanagement WHERE image.image_by = usermanagement.id and image.id=$id");
  while($row = mysqli_fetch_array($tag)) {
         $iname = $row["itags"];
         return $iname;
  }
}
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
<link rel="stylesheet" type="text/css" href="css/tag.css">
<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
		     <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
        <a href="image.php">Images</a>
        <i class="fa fa-angle-right"></i>
				<span>Edit Images Details</span>
				</h2>
		    </div>
					<!--//banner-->
			 	 <!--faq-->
			 	<div style="min-height: auto;" class="blank">
			 	  <div class="blank-page">
			 	  <caption>Edit Images </caption>
			 	  <?php 
					$res = mysqli_query($con, "SELECT * FROM image,usermanagement WHERE image.image_by = usermanagement.id and image.id=$id");
					while($row = mysqli_fetch_array($res)) {

				  ?>
				  <div style="text-align: center;">
                   <div class="view_box" style="margin: auto;">
                   	<img src="../<?php echo $row['single'] ?>">
                   </div>
                  </div>
			 	  </div>
			    </div>

			    <div class="blank" style="padding: 1em; padding-top: 2px; min-height: auto;">
			 	  <div class="blank-page" style="padding: 1em; padding-top: 2px;">
                   <div class="" style="padding-top: 15px;">
                   <caption>Edit Images Details</caption>
                   </div>
                   <form style="" method="post">
                   	<div class="vali-form">
            <div class="col-md-4 form-group1">
              <label class="control-label">Image Name</label>
              <?php 
               $file = $row['iname'];
               $name = pathinfo($file, PATHINFO_FILENAME);

               ?>
              <input id="cfor" type="text" name="image_name" placeholder="Image Name" value="<?php echo $name; ?>">
            </div>
            <div class="col-md-1 form-group1 form-last">
              <label class="control-label">G I Name</label>
              <button id="cname" style="margin-top: 6px;" type="button" name="enrate" class="btn btn-info">Genrate</button>
            </div>
            <div class="col-md-1 form-group1 form-last">
              <label class="control-label">Image Ext</label>
              <?php 
                  $path = $row['image'];
                  $ext = pathinfo($path, PATHINFO_EXTENSION);
               ?>
              <input type="text" name="image_ext" placeholder="Image Ext" value="<?php echo $ext; ?>" disabled="">
            </div>
            <div class="col-md-4 form-group1 form-last">
              <label class="control-label">Image By</label>
              <input type="text" placeholder="image_by" value="<?php echo $row['username'] ?>" id="disabledInput" disabled="">
            </div>
            <div class="clearfix"> </div>
            </div>

            <div class="vali-form">
            <div class="col-md-6 form-group1">  <!-- Keywords -->
              <label class="control-label">Keyword or Tags</label>
              <input type="text" name="tags" class="itags" placeholder="Add more Keyword " value="<?php echo $row['itags'] ?>">
            </div>
            <div class="form-group">   <!-- Category -->
                  <label class="control-label" style="margin-left: 15px; padding-bottom: 10px;" >Select Category</label>
                  <div class="col-sm-6">
                  <select name="role" id="selector1" class="form-control1">
                    <?php
                    $sql = mysqli_query($con, "SELECT * FROM `category` "); 
                    while($row = mysqli_fetch_array($sql)) {
                    ?>
                    
                      <option selected="selected" >Select Category</option>
                      <option><?php echo $row['cat_name']; ?></option>
                    <?php  
                      }
                    ?>
                  </select></div>
            </div>

            <div class="clearfix"> </div>
            </div>

            <div class="col-md-12 form-group">
              <button type="submit" name="edited" class="btn btn-primary">Update</button>
              <button type="reset" class="btn btn-default"><i class="fa fa-repeat" aria-hidden="true"></i></button>
             <a href="delete_approved_image.php?id=<?php echo $id; ?>"> <button type="button" class="btn btn-danger dropdown-toggle" aria-haspopup="true" aria-expanded="false"><i class="fa fa-trash-o" aria-hidden="true"></i></span></button></a>
            </div>
          <div class="clearfix"> </div>
                   </form>
                   
			 	  </div>
			 	  <?php } ?>
			 	</div>  
        </div>
</div>
<script>
$('#cname').click(function(){
    var str = '<?php echo gettags($id).' - Free Stock Image on 1lipics' ?>';
    var replaced = str.split('').join('');

    $('#cfor').val(replaced);
    $('#total').text('Product price: $1000');  // change text on click
});

	$('[class=itags]').tagify();
</script>
<?php
    function filter($date)
    {
        return trim(htmlspecialchars($date));
    }
    if (isset($_POST['edited'])) {

    $iname = filter($_POST['image_name']);
    $keywords = filter($_POST['tags']);

    $sql = mysqli_query($con, "UPDATE `image` SET `iname`='$iname',`itags`='$keywords'  WHERE id=$id");
	
    }
?>
<?php
include 'footer.php';
?>