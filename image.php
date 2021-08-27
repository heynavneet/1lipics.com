<?php
session_start();
ob_start();
$url = $_GET['name'];
$pagetitle = getImageName($url) . ' -';
$search_q = '';
$keywords = getKeywords($url);
$description = '1lipics Free Photo of ' . getKeywords($url);
$page_url = 'https://1lipics.com/image?id='.$url;
$image_url = 'http://1lipics.com/'.getName($url);
include 'layout/header.php';
include 'layout/search1.php';
include 'fun_img.php';

function getImageName($url){
$link=mysqli_connect("199.79.62.14","tuber6u2_heynav","d09?D!4v?D5%","tuber6u2_pics");
  $name = mysqli_query($link, "SELECT * FROM image where img_url='$url' ");
  while($row = mysqli_fetch_array($name)) {
         $url = $row["iname"];
         return $url;
  }
}
function getKeywords($url){
$link=mysqli_connect("199.79.62.14","tuber6u2_heynav","d09?D!4v?D5%","tuber6u2_pics");
  $tag= mysqli_query($link, "SELECT * FROM image where img_url='$url' ");
  while($row = mysqli_fetch_array($tag)) {
         $itags= $row["itags"];
         return $itags;
  }
}
function getName($url){
$link=mysqli_connect("199.79.62.14","tuber6u2_heynav","d09?D!4v?D5%","tuber6u2_pics");
  $name= mysqli_query($link, "SELECT * FROM image where img_url='$url' ");
  while($row = mysqli_fetch_array($name)) {
         $image= $row["single"];
         return $image;
  }
}
?>
<link href="assets/css/justified.css" rel="stylesheet">
<?php
// if id= empty then redirect to location
if(empty($_GET['name'])) {
  header('Location: ./');
  exit;
}
?>
<div class="clearfix"><div class="p-single" > <?php
$res = mysqli_query($connection, "SELECT * FROM image where img_url='$url' ");

$i_count = mysqli_num_rows($res);
if ($i_count == 0) {
  header('Location: 404.php');
}else {

while($row = mysqli_fetch_array($res)) { ?> 

<div id="content" class="clearfix"><div id="pics_view" class=""><div class="left" ><div class="inside" ><div style="text-align: center;" ><div id="pics_container" class="" itemtype="schema.org/ImageObject" ><meta itemprop="license" content="https://creativecommons.org/licenses/publicdomain/"><img itemprop="contentURL" id="main" src="<?php echo $row['single'] ?>" alt="<?php echo $row['itags'] ?>" title="<?php echo $row['iname'] ?>" ></div></div><h2 style="margin:25px 0 10px; margin-bottom: 12px; font-size: 18px; font-weight: normal; ">Related Pics</h2><div class="gride-related" style="margin:0 -6px 15px -5px">
                        <?php
                          $itags = $row['itags'];
                          $iname = $row['iname'];
                          $image = $row['image'];
                          $id = $row['id'];
                          $author = $row['image_by'];
                        $res = mysqli_query($connection, "SELECT * FROM image WHERE itags LIKE '%$itags%' or iname like '%$url%' or image like '%$image%' or  image_by like '%$author%' limit 10 ");
                        while ($row=mysqli_fetch_array($res)) { ?> <a href="image.php?name=<?php echo $row['img_url']; ?>" class=""> <img src="<?php echo $row['thumb'] ?>"> </a><?php } ?>
                      </div></div></div> <div class="right"> <div class="inside"> <div class="clearfix">
             <?php 
                $sql = mysqli_query($connection, "SELECT * FROM image,usermanagement WHERE image.image_by = usermanagement.id and image.img_url='$url'");
                while ($row=mysqli_fetch_array($sql)) {
              ?>    
              <a href="/profile?username=<?php echo $row['username']; ?>">
                <img class="hover_opacity" style="float:left;width:50px;height:50px;border-radius:50px;margin:0 12px 0 0" src="users/data/profile/<?php $pic = $row['user_photo']; if (!empty($pic)) { echo $row['user_photo']; }else { echo '1lipics-default-avatar.svg'; } ?>" alt="" >
              </a>
              <a class="hover_opacity" style="display:block;font-size:15px;margin:-3px 0 -8px; color:#555" href="/profile?username=<?php echo $row['username']; ?>" ><?php echo $row['username']; ?></a>
              <br>
             <!-- <a href="#"> <span class="btn btn-success follow-btn follow-btn-s">Follow</span></a> -->
             <?php    
                }
              ?>
             <div class="like_buttons">
                 <span style="height:28px; width: 25%;" class="btn btn-primary btn-block button-sm pure-button"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><b>50</b> </span>
                 <span style="height:28px; width: 25%;" class="btn btn-primary btn-block button-sm pure-button"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i><b>50</b> </span>
                 <span style="height:28px; width: 25%;" class="btn btn-share btn-block button-sm pure-button" data-placement="bottom" data-toggle="popover" title="Share on :"
                 data-content="<a style='margin:7px;' onclick='myfbFunction()' ><i class='fa fa-facebook-official' style='color: #3b5998; cursor: pointer; font-size: 24px;' aria-hidden='true'></i></a>
                 <a style='margin:7px;' onclick='mytFunction()' ><i class='fa fa-twitter' style='color: #1da1f2; cursor: pointer; font-size: 24px;' aria-hidden='true'></i></a>
                 <a style='margin:7px;' onclick='mygFunction()' ><i class='fa fa-google-plus-square' style='color: #dc483c; cursor: pointer; font-size: 24px;' aria-hidden='true'></i></a>
                 <a style='margin:7px;' onclick='mypFunction()' ><i class='fa fa-pinterest' style='color: #cd1e28; cursor: pointer; font-size: 24px;' aria-hidden='true'></i></a></a></a>">
                 <i class="fa fa-share-alt" aria-hidden="true"></i>
                 </span>
             </div>
             <div class="download_btn">
          <?php
            $res = mysqli_query($connection, "SELECT * FROM image where img_url='$url' ");
            while($row = mysqli_fetch_array($res)) {
          ?>
               <a href="<?php echo $row['image'] ?>?=download" download> <span class="btn btn-success down_btn"><i class="fa fa-download download_icon" aria-hidden="true"></i>
                 Free Download </span></a>
          <?php } ?>
             </div>
            <div style="margin:20px 0 0;padding:15px 20px;background:#f7f8fa;line-height:1.5">
              <b>License:</b> CC0 Public Domain
                <div style="margin-top:4px;font-size:14px">
                   <i class="fa fa-check" aria-hidden="true" style="color: #308130"></i>
                        Free for commercial use
                    <br><i class="fa fa-check" aria-hidden="true" style="color: #308130"></i>
                        No attribution required
                    <br><a href="pics.com/cco.php" style="color: #339f1e;">Learn more</a>
                </div></div>
                <div style="margin:0px 0 10px;padding:1px 20px;background:#f7f8fa;line-height:1.5">
              <b>Like & Share us on facebook</b><div style="padding: 5px 0 0;" class="fb-like" data-href="https://www.facebook.com/1lipics/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div></div></div></div></div> </div> 
<?php } } ?> </div></div>
<script src="assets/js/imagesloaded.pkgd.min.js"></script><script src="assets/js/justified.min.js"></script><div id="fb-root"></div><script>(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src='https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11&appId=1776599055950615';fjs.parentNode.insertBefore(js,fjs);}(document,'script','facebook-jssdk'));</script>
      <script>
      function myfbFunction(){window.open("https://www.facebook.com/sharer.php?u=https://1lipics.com/image.php?name=<?php echo $url ?>","_blank","toolbar=no,scrollbars=yes,resizable=yes,top=200,left=700,width=400,height=400");} function mytFunction(){window.open("https://twitter.com/share?url=https://1lipics.com/image.php?name=<?php echo $url ?>","_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=700,width=400,height=400");} function mygFunction(){window.open("https://plus.google.com/share?url=https://1lipics.com/image.php?name=<?php echo $url ?>","_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=700,width=400,height=400");} function mypFunction(){window.open("//pinterest.com/pin/create/button/?media=http://1lipics.com/<?php echo getName($url); ?>&url=https://1lipics.com/image.php?name=<?php echo $url ?>","_blank","toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=700,width=400,height=400");} $(document).ready(function(){$('[data-toggle="popover"]').popover({html:true})});$('#main').bind('contextmenu',function(e){return false;});var parameters={gridContainer:'.gride-related',gridItems:'.grid-item',gutter:5,enableImagesLoaded:true};var grid=new justifiedGrid(parameters);$('body').imagesLoaded(function(){grid.initGrid();});
      </script>
<?php
require 'layout/footer.php';
?>