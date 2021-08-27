<?php 
session_start();
ob_start();

$getUsername =  $_GET['username'];



if(empty($_GET['username'])) {
  header('Location: ./');
  exit;
}



$dash = ' -';
$search_q = '';
$pagetitle = $getUsername . $dash ; 
$keywords = '';
$description = '';
$page_url = '';
$image_url = '';
include 'layout/header.php';

?>
<link href="assets/css/justified.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/511df6df1a0db59adce6f010e720c802.css">


<?php 
?>


  
<div class="main">

  <div class="user-data" style="border-top:1px solid #dedede;">

     <div class="user-main">
<?php
$res = mysqli_query($connection, "SELECT * FROM usermanagement WHERE username='$getUsername' AND active=1  ");
while($row = mysqli_fetch_array($res)) {

?>


        <div class="user-main-image">
           <img style="border: 2px solid #fff;" class="img-circle user-image-img" alt="User Avatar" src="users/data/profile/<?php $pic = $row['user_photo']; if (!empty($pic)) { echo $row['user_photo']; }else { echo '1lipics-default-avatar.svg'; } ?>" />
        </div>
        <div class="">
          <h2><?php if ($row['first_name'] == NULL) {
            echo $row['username'];
          }else {
            echo $row['first_name'] . str_repeat('&nbsp;', 1) . $row['last_name'];  
          } ?></h2>
        </div>
        <div class="about-user">
          <a class="about-user-inline" target="_blank" href="https://www.google.co.in/maps/search/Lucknow"><i class="fa fa-map-marker about-user-icon" aria-hidden="true"></i>Lucknow,India</a>
          <a class="about-user-inline" href="mailto:<?php echo $row['email']; ?>"><i class="fa fa-envelope about-user-icon" aria-hidden="true"></i><?php echo $row['email']; ?></a>
        </div>
        
<?php } ?>
     </div>
     


     <div class="" >
        <div class="user-uploaded-images">

            <div class="user-nav user-nav-width user_nav" style="border-top:1px solid #ececec;">
                <div class="user-nav-tab">
                    <ul class="tabs">
                       <li class="tab-link current" data-tab="images">Images</li>
                       <li class="tab-link" data-tab="about-tab">Bio</li>
                   </ul>
                </div>
            </div>
            <div class="tab-content current" id="images">
              <div style="padding-top: 15px 0; padding-bottom: 30px;"  id="grid-container">
                    <?php  
                    $id = getProfileID($_GET['username']); //get username

                    $limit = 40;  
                    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
                    $start_from = ($page-1) * $limit;  

                    $sql = "SELECT * FROM image where approved=1 AND image_by='$id' ORDER BY date DESC LIMIT $start_from, $limit";
                    $rs_result = mysqli_query($connection, $sql); 
                    while ($row = mysqli_fetch_assoc($rs_result)) { 

                    ?>

                <a href="image.php?name=<?php echo $row['img_url']; ?>" class="grid-item img-responsive">
                 <img class="lazy" src="<?php echo $row['thumb'] ?>" alt="<?php echo $row['image'] ?>" title="<?php echo $row['iname'] ?>" >
                </a>
                    <?php  
                    }

                    ?>
              </div>
<!-- pagination start here -->
<?php 
//this query for If Image is less than 40 image then don't show pagination else show pagination

$count_sql = "SELECT * FROM image where approved=1 AND image_by='$id'";  
$count_result = mysqli_query($connection, $count_sql);  
$count_answer = mysqli_num_rows($count_result);

if ($count_answer < 40) {
  //Do Nothing
}else {
 ?>
            <div class="text-center" >
              <?php  
              $sql = "SELECT COUNT(id) FROM image where approved=1 AND image_by='$id'";  
              $rs_result = mysqli_query($connection, $sql);  
              $row = mysqli_fetch_row($rs_result);  
              $total_records = $row[0];  
              $total_pages = ceil($total_records / $limit);  
              $pagLink = "<nav style='margin-top: 10px;'><ul class='pagination' style='display:inline-block'>";  
              for ($i=1; $i<=$total_pages; $i++) {  
                           $pagLink .= "<li><a href='profile?username=".$getUsername."&page=".$i."'>".$i."</a></li>";  
              };  
              echo $pagLink . "</ul></nav>";  
              ?>
           </div><?php }?>
<!-- pagination ends here -->           

              </div>     <!-- Image Tab End -->
              
              <div id="about-tab" class="tab-content">
                <div class="" style="margin-right:10px; margin-right:10px;">
                  <?php $res = mysqli_query($connection, "SELECT * FROM usermanagement where username='$getUsername' ");
                               while($row = mysqli_fetch_array($res)) { 
                  ?>

                <p class="about-user-details">
                    <?php if ($row['bio'] == NULL) {
                      echo $row['bio'];
                    }else {
                      echo $row['bio'];  
                    } ?>
               </p>
                    <?php } ?>
                </div>
              </div>

        </div>


    </div>



  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$('.pagination').pagination({
    items: <?php echo $total_records;?>,
    itemsOnPage: <?php echo $limit;?>,
    cssStyle: 'light-theme',
    currentPage : <?php echo $page;?>,
    hrefTextPrefix : 'profile?username=<?php echo $getUsername ?>&page='
    });
  });
</script>



<style media="screen">
.pagination > li > a {
  color: #202020;
}


.main{

}
.user-data {
 text-align: center;
}
.user-main {
  margin: 60px auto 80px;
  margin-bottom: 30px;
}
.user-main-image {
  display: inline-block;
  margin-bottom: 20px;
  border: 2px solid #dedede;
  border-radius: 50%;
}
.user-image-img {
  width: 130px;
  height: 130px;
}
.about-user {
 margin: 15px;
}
.about-user-icon {
  margin-right: 5px;
}
.about-user-inline {
  display: inline-block;
  margin-right: 20px;
  color: #999;
}
.about-user-inline:hover {
  color: #339F1E;
}
.about-user-details {
  max-width: 50%;
  margin: 20px auto 0;
}
.user-nav {
  position: relative;
  display: block;
  height: 34px;
  margin-bottom: 30px;
  line-height: 34px;
  vertical-align: middle;
}
.user-nav-width {
  max-width: 1200px;
}
.user_nav {
  margin-right: auto;
  margin-left: auto;
}
.user-nav-tab {

}
ul.tabs{
  margin: 0px;
  padding: 0px;
  list-style: none;
}
ul.tabs li{
  background: none;
  color: #222;
  display: inline-block;
  padding: 10px 15px;
  cursor: pointer;
}
ul.tabs li.current{
  background: #339F1E;
  border-radius: 2%;
  color: #fff;
}
.tab-content{
  display: none;
  background: #fff;
  padding: 15px;
}
.tab-content.current{
  display: inherit;
}
</style>


<script type="text/javascript">
$(document).ready(function(){
  
  $('ul.tabs li').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('ul.tabs li').removeClass('current');
    $('.tab-content').removeClass('current');

    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
  })

})
</script>

<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/justified.min.js"></script>
<script src="assets/js/511df6df1a0db59adce6f010e720c802.js"></script>
<script>

  
  var parameters = {
    gridContainer: '#grid-container',
    gridItems: '.grid-item',
    gutter: 2,
    enableImagesLoaded:true
  };
  var $progress, $status;
  var supportsProgress;
  var grid = new justifiedGrid(parameters);
  $('body').imagesLoaded( function() {
  grid.initGrid();
  });




</script>
<?php include 'layout/footer.php'; ?>
