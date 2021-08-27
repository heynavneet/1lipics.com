<?php 
session_start();
if(!isset($_SESSION['username'])){
   header("Location:Login");
   exit();
}
$pagetitle = 'Pics -';
$search_q = '';
$keywords = '';
$description = '';
$page_url = '';
$image_url = '';
include './layout/header.php';
include './layout/search1.php';
?>
<link href="assets/css/justified.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/511df6df1a0db59adce6f010e720c802.css">

<div class="spec ">
        <h3 style="padding-top: 20px; font-size: 20px;">My Images</h3>
          <div class="ser-t">
            <b></b>
            <span><i class="fa fa-camera" aria-hidden="true" style="color: #039445; font-size: 20px;"></i></span>
            <b class="line"></b>
          </div>
      </div>


<div style="padding-top: 15px 0; padding-bottom: 30px;"  id="grid-container">
<?php   
$user = getUserID();

$limit = 40;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit; 

$res = "SELECT * FROM image WHERE image_by='$user' and approved=1 ORDER BY date DESC LIMIT $start_from, $limit";
$rs_result = mysqli_query($connection, $res); 

$icount = mysqli_num_rows($rs_result);
//if User Not Uploaded any image then show this 
if ($icount == 0) {
  echo "<h2 style='text-align: center; padding: 30px 0;'>No Images Uploaded Yet! or Waiting For Approval.</h2>";
}

while ($row = mysqli_fetch_assoc($rs_result)) { 

?>

<a href="image.php?id=<?php echo $row['id']; ?>" class="grid-item img-responsive">
 <img class="lazy" src="<?php echo $row['thumb'] ?>" alt="<?php echo $row['image'] ?>" title="<?php echo $row['iname'] ?>" >
</a>

<?php  } ?>
</div>
<!-- pagination start here -->
<?php 
//this query for If Image is less than 40 image then don't show pagination else show pagination

$count_sql = "SELECT * FROM image where approved=1 AND image_by='$user'";  
$count_result = mysqli_query($connection, $count_sql);  
$count_answer = mysqli_num_rows($count_result);

if ($count_answer < 40) {
  //Do Nothing
}else {
 ?>

            <div class="text-center" >
              <?php  
              $sql = "SELECT COUNT(id) FROM image where approved=1 AND image_by='$user'";  
              $rs_result = mysqli_query($connection, $sql);  
              $row = mysqli_fetch_row($rs_result);  
              $total_records = $row[0];  
              $total_pages = ceil($total_records / $limit);  
              $pagLink = "<nav style='margin-top: 10px;'><ul class='pagination' style='display:inline-block'>";  
              for ($i=1; $i<=$total_pages; $i++) {  
              $pagLink .= "<li><a href='myimage?page=".$i."'>".$i."</a></li>";   
              };  
              echo $pagLink . "</ul></nav>";  
              
              ?>
           </div><?php } ?>
<!-- pagination ends here -->



<?php 
$user = getUserID();

$uicount = mysqli_query($connection, "SELECT * FROM image where image_by='$user'and approved=0");  $ifind = mysqli_num_rows($uicount); 

if ($ifind) {
?>

<div style="padding: 30px; text-align: center;">
   <p></p>Your <?php echo $ifind; ?> Image Waiting For Aproval</p>
</div>

<?php 
}
?>

<style>
  .pagination > li > a {
  color: #202020;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
    items: <?php echo $total_records;?>,
    itemsOnPage: <?php echo $limit;?>,
    cssStyle: 'light-theme',
    currentPage : <?php echo $page;?>,
    hrefTextPrefix : 'myimage?page='
    });
  });
</script>

      <script src="assets/js/imagesloaded.pkgd.min.js"></script>
      <script src="assets/js/justified.min.js"></script>
      <script src="assets/js/511df6df1a0db59adce6f010e720c802.js"></script>
      <script>
        var parameters = {
          gridContainer: '#grid-container',
          gridItems: '.grid-item',
          enableImagesLoaded: true
        };
        var grid = new justifiedGrid(parameters);
        $('body').imagesLoaded( function() {
        grid.initGrid();
});
       
      </script>

<?php
include 'layout/footer.php';
?>