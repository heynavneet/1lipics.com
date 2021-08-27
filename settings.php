<?php session_start();
if(!isset($_SESSION['username'])){
   header("Location:login");
}  
$pagetitle = 'Settings -'; 
$search_q = '';
$keywords = '';
$description = '';
$page_url = '';
$image_url = '';
include 'layout/header.php'; 

?>


<?php 

require 'fun_img.php';

if (isset($_POST['profile_update'])) {
  $dir = "./users/data/profile/";
  $user_photo = $_FILES['profile_pic']['name'];
  $tmp_file = $_FILES['profile_pic']['tmp_name'];
  $ext = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
  $rand = md5(uniqid().rand());
  $aa = getUsername() . '-'; 
  $post_image = $aa.$rand.".".$ext;
    if(!empty($user_photo)){
      if (move_uploaded_file($tmp_file,$dir.$post_image)) {
        $oimage =  "./users/data/profile/$post_image";
        resize_profile(150, $post_image, $oimage);
        $user = getUsername();
        $sql_user_photo = mysqli_query($connection, "UPDATE `usermanagement` SET `user_photo`='$post_image' WHERE username='$user'");
        $photo_us = 'Profile Image Update Success.';
      }
    }
}
 ?>

<div class="main">
  <div class="user-data" style="border-top:1px solid #dedede;">

     <div class="user-main">
        <div class="user-main-image">
          <?php 
        //Select User Profile Photo 
        $user = getUsername();
        $res = mysqli_query($connection, "SELECT * FROM usermanagement WHERE username='$user' ");
        while ($row=mysqli_fetch_array($res)) {
        ?>
           <img style="border: 2px solid #fff;" class="img-circle user-image-img" alt="User Avatar" src="users/data/profile/<?php $pic = $row['user_photo']; if (!empty($pic)) { echo $row['user_photo']; }else { echo '1lipics-default-avatar.svg'; } ?>" />

        <?php } ?>
        </div>
        <!-- Profile Image Update -->
        <div style="margin-top: -15px;">
          
          <form style="text-align: center;" action="" method="post" enctype="multipart/form-data">
            <label class="btn-bs-file btn btn-sm btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><input name="profile_pic" type="file" /></label> 
            <button class="btn btn-sm btn-success" name="profile_update" type="submit">Update</button> 
          </form>
        </div>
        
     </div>
     


     <div class="" >
        <div class="user-uploaded-images">

            <div class="user-nav user-nav-width user_nav" style="border-top:1px solid #ececec;">
                <div class="user-nav-tab">
                    <ul class="tabs">
                       <li class="tab-link current" data-tab="tab-1">Personal</li>
                       <li class="tab-link" data-tab="tab-2">Bio</li>
                   </ul>
                </div>
            </div>
            <div class="tab-content current" id="tab-1">  <!-- First Tab Start -->
                <div class="container">
                  <form action="">
                    <input type="text" value="work in progress">
                  </form>
                </div>
              </div>                                      <!-- First Tab End -->

              <div class="tab-content" id="tab-2">  <!-- Second Tab Start -->
                <div class="container">
                  <div class="" style="margin-right:10px; margin-right:10px;">
                  <form>
                    <div class="form-group">
                    <textarea class="form-group">
                      
                    </textarea>
                  </form>
                  </div>
                </div>
              </div> <!-- Second Tab End -->

        </div>
    </div>

  </div>
</div>

<style>
.form-group1 input[type="text"],.form-group1 textarea, .form-group1 input[type="password"],.form-group1 input[type="date"]{border:1px solid #E9E9E9;font-size:0.9em;width:100%;outline:none;padding:0.5em 1em;color:#999;margin-top:0.5em;font-family:'Muli-Regular'}.form-group1 textarea{min-height:100px}.vali-form{padding:1.5em 0}.vali-form1{padding:0 0 1.5em}.validation-form{background:#fff;margin-bottom:1em;padding:1em;border:1px solid #ebeff6;border-radius:4px;-webkit-border-radius:4px;-o-border-radius:4px;-moz-border-radius:4px;-ms-border-radius:4px;-webkit-box-shadow:0 1px 1px rgba(0,0,0,.05);box-shadow:0 1px 1px rgba(0,0,0,.05)}.validation-system{padding:1em}.validation-form h2{color:#1abc9c;font-size:1.8em;border-bottom:1px solid rgb(241, 233, 233);padding-bottom:0.3em;margin-bottom:1em}.btn-bs-file input[type="file"]{position:absolute;top:-9999999;filter:alpha(opacity=0);opacity:0;width:0;height:0;outline:none;cursor:inherit}
</style>

<style media="screen">
.main{}.user-data{text-align:center}.user-main{margin:60px auto 80px;margin-bottom:30px}.user-main-image{display:inline-block;margin-bottom:20px;border:2px solid #dedede;border-radius:50%}.user-image-img{width:130px;height:130px}.about-user{margin:15px}.about-user-icon{margin-right:5px}.about-user-inline{display:inline-block;margin-right:20px;color:#999}.about-user-inline:hover{color:#339F1E}.about-user-details{max-width:50%;margin:20px auto 0}.user-nav{position:relative;display:block;height:34px;margin-bottom:30px;line-height:34px;vertical-align:middle}.user-nav-width{max-width:1200px}.user_nav{margin-right:auto;margin-left:auto}.user-nav-tab{}ul.tabs{margin:0px;padding:0px;list-style:none}ul.tabs li{background:none;color:#222;display:inline-block;padding:10px 15px;cursor:pointer}ul.tabs li.current{background:#339F1E;border-radius:2%;color:#fff}.tab-content{display:none;background:#fff;padding:15px}.tab-content.current{display:inherit}
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
<script>
  var parameters = {
    gridContainer: '#grid-container',
    gridItems: '.grid-item',
    enableImagesLoaded: true
  };
</script>

<?php include 'layout/footer.php'; ?>