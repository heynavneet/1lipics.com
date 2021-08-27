<?php
session_start();
$pagetitle = 'Navneet Profile';
include 'layout/header.php';

$id = $_GET['id'];



$res = mysqli_query($connection, "SELECT * FROM usermanagement where id=$id");
while ($row=mysqli_fetch_array($res)) {

?>
 <p><?php echo $row['username'] ?></p>
 <p><?php echo $row['email'] ?></p>
 <p><?php echo $row['join_date'] ?></p>
</a>
<?php
}

?>



<style>
    .page-inner {
  padding: 0 0 50px 0;
  background: #F1F4F9;
  position: relative;
}
.profile-cover {
    background: url('../users/data/cover/default.jpg');
    background-size: cover;
    width: 100%;
    height: 300px;
    position: relative;
}
.profile-image {
    position: absolute;
    margin: 200px 20px 20px 20px;
}
.profile-image img {
    display: block;
    margin: 0 auto;
    width: 150px;
    border-radius: 50%;
    -webkit-box-shadow: 0 0 0 5px #fff;
    -moz-box-shadow: 0 0 0 5px #fff;
    -o-box-shadow: 0 0 0 5px #fff;
    box-shadow: 0 0 0 5px #fff;
}


.profile-name {
    height: 60px;
    float: left;
    margin-top: 13%;
    margin-left: 17%;
}

.profile-name-value {
    color: #fff;
    display: inline-block;
    margin-left: 20px;
    margin-top: 10px;
    padding-right: 20px;
    bottom: 10px;
    right: 20px;
}
.profile-name-value p{
    font-size: 24px;
    font-weight: bold;
}

.profile-info {
    position: absolute;
    height: 60px;
    bottom: 0;
    padding: 0;
    right: 0;
    text-align: right;

}

.profile-info-value {
    color: #fff;
    display: inline-block;
    margin-left: 20px;
    margin-top: 10px;
    padding-right: 20px;
    bottom: 10px;
    right: 20px;
}
.profile-info-value a {
  color: #fff;
  text-decoration: none;

}


.user-profile {
    margin-top: 10;
    position: relative;
}

.user-profile hr {
  margin-top: 20px;
  margin-bottom: 20px;
  border: 0;
  border-top: 1px solid #eee;
}
.user-profile button {
  width: 200px;
  margin: auto;
}
.user-data {
    position: relative;
}

.profile-timeline ul li .timeline-item-header {
    width: 100%;
    overflow: hidden;
}

.profile-timeline ul li .timeline-item-header img {
    width: 50px;
    float: left;
    margin-right: 10px;
    border-radius: 50%;
}

.profile-timeline ul li .timeline-item-header p {
    margin: 0;
    color: #000;
    font-weight: bold;
}

.profile-timeline ul li .timeline-item-header p span {
    margin: 0;
    color: #8E8E8E;
    font-weight: normal;
}

.profile-timeline ul li .timeline-item-header small {
    margin: 0;
    color: #8E8E8E;
}

.profile-timeline ul li .timeline-item-post {
    padding: 20px 0 0 0;
    position: relative;
}

.profile-timeline ul li .timeline-item-post > img {
    width: 100%;
}

.timeline-options {
    overflow: hidden;
    margin-top: 20px;
    margin-bottom: 20px;
    border-bottom: 1px solid #f1f1f1;
    padding: 10px 0 10px 0;
}

.timeline-options a {
    display: block;
    margin-right: 20px;
    float: left;
    color: #333;
    text-decoration: none;
}

.timeline-options a i {
    margin-right: 3px;
}

.timeline-options a:hover {
    color: #22BAA0;
}

.post-options {
    overflow: hidden;
    margin-top: 15px;
    margin-left: 15px;
}

.post-options a {
    display: block;
    margin-top: 5px;
    margin-right: 20px;
    float: left;
    color: #333;
    text-decoration: none;
    font-size: 17px;
}

.post-options a:hover {
    color: #22BAA0;
}

#gallery .mix {
  display: none;
}



/*Media Query */
@media (max-width: 991px) {
    .profile-image {
        right: 0;
        left: 0;
    }

    .profile-info {
        top: 5px;
        right: 0;
        left: 0;
        bottom: auto;
        text-align: center;
    }

    .profile-info-value {
        color: #fff;
        float: none;
        margin: 0 10px 0 10px;
        display: inline-block;
    }

    .mailbox-header h2 {
        margin: 20px 0;
        text-align: center;
    }
}


/*Tab Start here*/
  .pics-tabs-container {
    text-align: center;
  }
.pics-tab {
    margin: auto;
}
.pics-tab-content {
    padding: 20px 20px;
}
</style>

<div style="padding-bottom: 20px;" >
    <div class="page-inner">
    	<div class="profile-cover" >
    	    <div class="row">
    	    <div  class="col-md-12 profile-info">
                <div  class=" profile-info-value">
                   <a href="?=Followers">
                    <h3>0000</h3>
                    <p>Followers</p>
                    </a>
                </div>
                <div class=" profile-info-value">
                   <a href="?=photo">
                    <h3>0000</h3>
                    <p>Photos</p>
                   </a>
                </div>
            </div>
    	        <div class="col-md-3 profile-image">
    	            <div class="profile-image-container">
                        <img src="../users/data/profile/default.png" alt="">
                    </div>
    	    	</div>
                <div class="profile-name">
                    <div class="profile-name-value">
                        <p style="text-rendering: optimizelegibility; text-shadow: 0 0 4px rgba(0,0,0,1);">Navneet Srivastav</p>
                     </div>
                </div>
    	    </div>
</div>
    </div>



   <!--  <div id="main-wrapper" class="user-data" >
        <div class="row">
            <div class="col-md-3 user-profile">

                <h3 class="text-center">Navneet</h3>
                <p class="text-center">Photographer/Web Designer</p>
                <hr>
                <ul class="list-unstyled text-center">
                    <li><p><i class="fa fa-map-marker m-r-xs"></i> Lucknow, India</p></li>
                    <li><p><i class="fa fa-envelope m-r-xs"></i><a href="#">Navneetsrivastav48@gmail.com</a></p></li>
                    <li><p><i class="fa fa-link m-r-xs"></i><a href=""> www.1lipics.com</a></p></li>
                    <li><p><a href="#"><b>Join Date :</b>23/09/2017</a></p></li>
                </ul>
                <hr>
                <button class="btn btn-success btn-block"><i class="fa fa-plus m-r-xs"></i>Follow</button>
            </div>

        </div>
    </div>
</div> -->


<!-- tabs Start here -->

<div class="pics-tabs-container">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs pics-tab" role="tablist" style="margin: auto 40%" ">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>




  <!-- Tab panes -->
  <div class="tab-content pics-tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">Home</div>
    <div role="tabpanel" class="tab-pane" id="profile">Profile</div>
    <div role="tabpanel" class="tab-pane" id="about">
      Navneet Srivastav
      <hr>
      Photographer/Web Designer
      <hr>
      <b>Live In :</b> Lucknow, India
      <hr>
      <b>Email :</b> Navneetsrivastav48@gmail.com

    </div>
    <div role="tabpanel" class="tab-pane" id="settings">Setting</div>
  </div>

</div>

<!-- Pics TAb End Here -->



<script type="text/javascript">
$(function(){
  var hash = window.location.hash;
  hash && $('ul.nav a[href="' + hash + '"]').tab('show');

  $('.nav-tabs a').click(function (e) {
    $(this).tab('show');
    var scrollmem = $('body').scrollTop() || $('html').scrollTop();
    window.location.hash = this.hash;
    $('html,body').scrollTop(scrollmem);
  });
});


$('#Home a[href="=Home"]').tab('home')
$('#Profile a[href="=profile"]').tab('show')
$('#Messages a[href="=Messages"]').tab('show')
$('#Setting a[href="=Setting"]').tab('show')

</script>





<?php include 'layout/footer.php'; ?>











<!-- tabs Start here -->

<!-- <div class="pics-tabs-container">
  Nav tabs
  <ul class="nav nav-tabs pics-tab" role="tablist" style="margin: auto 40%" ">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
    <li role="presentation"><a href="#about" aria-controls="about" role="tab" data-toggle="tab">About</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>




  Tab panes
  <div class="tab-content pics-tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">Home</div>
    <div role="tabpanel" class="tab-pane" id="profile">Profile</div>
    <div role="tabpanel" class="tab-pane" id="about">
      Navneet Srivastav
      <hr>
      Photographer/Web Designer
      <hr>
      <b>Live In :</b> Lucknow, India
      <hr>
      <b>Email :</b> Navneetsrivastav48@gmail.com

    </div>
    <div role="tabpanel" class="tab-pane" id="settings">Setting</div>
  </div>

</div>
 -->
<!-- Pics TAb End Here -->
    