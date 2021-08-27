<?php 
session_start();
$pagetitle = ' ';
$search_q = '';
$keywords = '1lipics,free stock image,public domain image,cc0 images,';
$description = '1lipics.com';
$page_url = 'https://1lipics.com';
$image_url = '';
include './layout/header.php';
include './layout/search.php';
?>
<div class="spec "><h3 style="padding-top: 20px; font-size: 20px;">Some New Pics</h3><div class="ser-t"><b></b><span><i class="fa fa-camera" aria-hidden="true" style="color: #039445; font-size: 20px;"></i></span><b class="line"></b></div>

</div>
<div class="container-fluid">
<div class="masonary masonary--h"> 

<?php
$res = mysqli_query($connection, "SELECT * FROM image WHERE approved=1 ORDER BY date DESC LIMIT 20");
while ($row = mysqli_fetch_array($res)) { ?>

<div class="masonary-brick masonary-brick--h">
    <a href="image.php?name=<?php echo $row['img_url']; ?>">
      <img class="masonary-img" src="<?php echo $row['thumb'] ?>" alt="<?php echo $row['itags'] ?>" title="<?php echo $row['iname'] ?>">
    </a>
</div>
<?php  
}

?></div></div>
<div style="text-align: center; padding: 10px 0px;">
    <a class="btn btn-success btn-lg" href="./pics" role="button">Discover More Pics</a>
</div>


<?php include 'layout/footer.php'; ?>