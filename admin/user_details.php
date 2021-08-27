<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
$admintitle = 'Edit Profile';
include 'header.php';
include 'sidebar.php';
require 'function.php'; 

$getusername = $_GET['username'];


?>
<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 

		     <div class="banner">
		    <h2>
				<a href="./index">Home</a>
				<i class="fa fa-angle-right"></i>
        <a href="users.php">Users</a>
        <i class="fa fa-angle-right"></i>
				<span>Edit User Profile</span>
				</h2>
		    </div>

            <div class="blank">
				<div class="blank-page">

		        	<div class="validation-system">
 		
 		<div class="validation-form">

<?php 

function filter($date)
{
    return trim(htmlspecialchars($date));
}


if (isset($_POST['update'])) {
      $firstname = filter($_POST['firstname']);
      $lastname = filter($_POST['lastname']);
      $cUsername = filter($_POST['cusername']);
      $email = filter($_POST['email']);
      $contact = filter($_POST['contact']);
      $about = $_POST['about'];
      $password = filter($_POST['password']);


      // User Password Update
      if(!empty($password)) 
      {
        $sql = mysqli_query($con, "UPDATE `usermanagement` SET `password`=md5('$password') WHERE username='$getusername' ");
        $aus = 'Password update successfully.';
      }else {}
      // User About Update
      if(!empty($about)) 
      {
        $sql = mysqli_query($con, "UPDATE `usermanagement` SET `bio`='$about' WHERE username='$getusername' ");
        $aus = 'About update successfully.';
      }else {}

      // update username 
      if(!empty($cUsername)) 
      {
        $sql = mysqli_query($con, "UPDATE `usermanagement` SET `username`='$cUsername' WHERE username='$getusername' ");
        $aus = 'Username update successfully.';
      }else {}
      // update first name 
      if(!empty($firstname)) 
      {
        $sql = mysqli_query($con, "UPDATE `usermanagement` SET `first_name`='$firstname' WHERE username='$getusername' ");
        $aus = 'First Name update successfully.';
      }else {}
      //Update Last Name 
      if(!empty($lastname)) 
      {
        $sql = mysqli_query($con, "UPDATE `usermanagement` SET `last_name`='$lastname' WHERE username='$getusername' ");
        $aus = 'Last Name update successfully.';
      }else { }



 }       

?>
        <!-- Success Massege -->
        <?php if(isset($aus)){ ?>
        <div class="alert alert-success alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>Success!</strong> <?php echo $aus; ?> </div>
        </div><?php } ?>


        <?php 

          $res = mysqli_query($con, "SELECT * FROM usermanagement WHERE username='$getusername' ");
          while ($row=mysqli_fetch_array($res)) {
        ?>
        <form action="" method="post" enctype="multipart/form-data">
         	<div class="vali-form">
            <div class="col-md-4 form-group1">
              <label class="control-label">Firstname</label>
              <input type="text" name="firstname" placeholder="Firstname" value="<?php echo $row['first_name']; ?>">
            </div>
            <div class="col-md-4 form-group1 form-last">
              <label class="control-label">Lastname</label>
              <input type="text" name="lastname" placeholder="Lastname" value="<?php echo $row['last_name']; ?>">
            </div>
            <div class="col-md-4 form-group1 form-last">
              <label class="control-label">Username</label>
              <input type="text" name="cusername" placeholder="Username" value="<?php echo $row['username']; ?>" disabled="">
            </div>
            <div class="clearfix"> </div>
            </div>

            <div class="vali-form">
            <div class="col-md-6 form-group1">
              <label class="control-label">Email</label>
              <input type="text" name="email" placeholder="Email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="col-md-4 form-group1 form-last">
              <label class="control-label">Contact No.</label>
              <input type="text" name="contact" placeholder="Contact Number" value="<?php echo ''; ?>" >
            </div>
            <div class="clearfix"> </div>
            </div>

            <div class="vali-form">
            <div class="col-md-6 form-group1 ">
              <label class="control-label">About Me</label>
              <textarea name="about"  placeholder="Something about me ........" Value="" ><?php echo $row['bio']; ?></textarea>
            </div>
            <div class="col-md-4 form-group1 form-last">
              <label class="control-label">PayPal</label>
              <input type="text" name="contact" placeholder="PayPal Email Address" value="<?php echo ''; ?>" >
            </div>
            
            <div class="clearfix"> </div>
            </div>

          <div class="vali-form vali-form1">
            <div class="col-md-6 form-group1">
              <label class="control-label">Change password</label>
              <input name="password" id="txtNewPassword" type="password" placeholder="Change password">
            </div>
            <div class="col-md-6 form-group1 form-last">
              <label class="control-label">Confirm password</label>
              <input name="ConfirmPass" id="txtConfirmPassword" type="password" placeholder="Repeated password">
            </div>
            <div class="clearfix" style="padding-bottom: 20px;"> </div>
            <div class="col-md-6 form-group1">
              <p style="color: red;" id="divCheckPasswordMatch"></p>
            </div>
             <div class="clearfix" style="padding-bottom: 20px;"> </div>

            <div class="vali-form">
              <div class="col-md-4 form-group">
              <img src="./../users/data/profile/<?php $pic = $row['user_photo']; if (!empty($pic)) { echo $row['user_photo']; }else { echo '1lipics-default-avatar.svg'; } ?>" style="width: 140px; height: 140px;border: 1px solid grey;" alt="Admin Profile" class="img-thumbnail Responsive image">
              </div>
            </div>
          </div>  

            <div class="checkbox">
            <div class="col-md-12 form-group">
              <button type="submit" name="update" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
              <a class="btn btn-danger pull-right" href="delete_user.php?id=<?php echo $row['id']; ?>">Delete User</a>
            </div>
          <div class="clearfix"> </div>
        </form>
<?php } ?>
 </div>

</div>
		        </div>
	       </div>
        </div>
</div>
<script>
  $(function() {
    $("#txtConfirmPassword").keyup(function() {
        var password = $("#txtNewPassword").val();
        $("#divCheckPasswordMatch").html(password == $(this).val() ? "" : "Passwords not match!");
    });

});
</script>


<?php
include 'footer.php';
?>