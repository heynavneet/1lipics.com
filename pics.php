<?php 
session_start();
$pagetitle = 'Pics -';
$search_q = '';
$keywords = '';
$description = '';
$page_url = '';
$image_url = '';
include './layout/header.php';
include './layout/search1.php';
include './fun_img.php';
?>
<link rel="stylesheet" href="assets/css/511df6df1a0db59adce6f010e720c802.css">


<div class="container-fluid">
<div style="padding-top: 15px;" class="masonary masonary--h">
<?php  
  $limit = 40;  
  if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
  $start_from = ($page-1) * $limit;  

  $sql = "SELECT * FROM image where approved=1 ORDER BY RAND() LIMIT $start_from, $limit";
  $rs_result = mysqli_query($connection, $sql); 
  while ($row = mysqli_fetch_assoc($rs_result)) { 

?>

<div class="masonary-brick masonary-brick--h"> <!-- this div for specific images as single item -->
    <a href="image?name=<?php echo $row['img_url']; ?>"> <!-- this is for linking image item for future -->
      <img class="masonary-img" src="<?php echo $row['thumb'] ?>" alt="<?php echo $row['itags'] ?>" title="<?php echo $row['iname'] ?>">
    </a>
</div>


<?php } ?>
</div>
</div>

<!-- pagination start here -->
<?php 
//this query for If Image is less than 40 image then don't show pagination else show pagination

$count_sql = "SELECT * FROM image where approved=1";  
$count_result = mysqli_query($connection, $count_sql);  
$count_answer = mysqli_num_rows($count_result);

if ($count_answer < 40) {
  //Do Nothing
}else {
 ?>

            <div class="text-center" >
              <?php  
              $sql = "SELECT COUNT(id) FROM image where approved=1";  
              $rs_result = mysqli_query($connection, $sql);  
              $row = mysqli_fetch_row($rs_result);  
              $total_records = $row[0];  
              $total_pages = ceil($total_records / $limit);  
              $pagLink = "<nav style='margin-top: 10px;'><ul class='pagination' style='display:inline-block'>";  
              for ($i=1; $i<=$total_pages; $i++) {  
                           $pagLink .= "<li><a href='pics?page=".$i."'>".$i."</a></li>";    
              };  
              echo $pagLink . "</ul></nav>";  
              
              ?>
           </div><?php } ?>
<!-- pagination ends here --> 



      <script src="assets/js/511df6df1a0db59adce6f010e720c802.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
    items: <?php echo $total_records;?>,
    itemsOnPage: <?php echo $limit;?>,
    cssStyle: 'light-theme',
    currentPage : <?php echo $page;?>,
    hrefTextPrefix : 'pics?page='
    });
  });
</script>

<style>
  .pagination > li > a {
  color: #202020;
}
</style>


<?php
include 'layout/footer.php';
?>