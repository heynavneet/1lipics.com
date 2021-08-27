<?php
session_start();
$pagetitle = 'Pics -';
$search_q = '';
$keywords = '';
$description = 'Recent Photo on 1lipics';
$page_url = '';
$image_url = '';
include './layout/header.php';
include './layout/search1.php';
?>
<link href="assets/css/justified.css" rel="stylesheet">

<div class="spec ">
        <h3 style="padding-top: 20px; font-size: 20px;">Some Recent Pics</h3>
          <div class="ser-t">
            <b></b>
            <span><i class="fa fa-camera" aria-hidden="true" style="color: #039445; font-size: 20px;"></i></span>
            <b class="line"></b>
          </div>
      </div>

<div style="padding-top: 15px 0; padding-bottom: 30px;"  id="grid-container">
<?php
$res = mysqli_query($connection, "SELECT * FROM image WHERE approved=1 ORDER BY date DESC LIMIT 40");
while ($row=mysqli_fetch_array($res)) {

?>

<a href="image.php?name=<?php echo $row['img_url']; ?>" class="grid-item img-responsive" >
 <img class="lazy" src="<?php echo $row['thumb'] ?>" alt="<?php echo $row['image'] ?>" title="<?php echo $row['iname'] ?>" >
</a>

<?php
}

?>
</div>
<div style="text-align: center; padding-bottom: 20px;">
   <div style="margin: auto;">
     <p style="font-size: 40px;" >No More Recent</p>
   </div>
</div>




      <script src="assets/js/imagesloaded.pkgd.min.js"></script>
      <script src="assets/js/justified.min.js"></script>
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
