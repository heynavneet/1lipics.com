<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
$admintitle = 'Edit Profile';
include 'header.php';
include 'sidebar.php';
require 'function.php'; 

?>
<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 

         <div class="banner">
          <h2>
        <a href="./index">Home</a>
        <i class="fa fa-angle-right"></i>
        <span>Setting</span>
        <i class="fa fa-angle-right"></i>
        <span>Edit Profile</span>
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
      $email = filter($_POST['email']);
      $contact = filter($_POST['contact']);
      $about = $_POST['about'];
      $role = filter($_POST['role']);
      $password = filter($_POST['password']);

      $dir = "./admin_data/".basename($_FILES['image']['name']);
      $admin_pic = $_FILES['image']['name'];


     //Admin Profile Pic
        if(!empty($admin_pic)){
        if (move_uploaded_file($_FILES['image']['tmp_name'],$dir)) {
        $oimage =  "./admin_data/$admin_pic";
        resize(150, $admin_pic, $oimage);
        $sql_pic = mysqli_query($con, "UPDATE `admin` SET `admin_pic`='$admin_pic' WHERE admin_name='{$_SESSION['admin_name']}'");
        $aus = 'Profile Image Update Success.';
        }
        }
      // Admin Password Update
      if(!empty($password)) 
      {
        $sql = mysqli_query($con, "UPDATE `admin` SET `password`=md5('$password') WHERE admin_name='{$_SESSION['admin_name']}' ");
        $aus = 'Password Update Success.';
      }else {}
      // Admin About Update
      if(!empty($about)) 
      {
        $sql = mysqli_query($con, "UPDATE `admin` SET `admin_about`='$about' WHERE admin_name='{$_SESSION['admin_name']}' ");
        $aus = 'About Update Success.';
      }else {}
    

    $sql = mysqli_query($con, "UPDATE `admin` SET `admin_f_name`='$firstname',`admin_l_name`='$lastname',`admin_email`='$email',`admin_contact`='$contact',`admin_role`='$role' WHERE admin_name='{$_SESSION['admin_name']}' ");



 }       

      
  


?>
        <!-- Success Massege -->
        <?php if(isset($aus)){ ?>
        <div class="alert alert-success alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>Success!</strong> <?php echo $aus; ?> </div>
        </div><?php } ?>


        <?php 

          $res = mysqli_query($con, "SELECT * FROM admin WHERE admin_name='{$_SESSION['admin_name']}' ");
          while ($row=mysqli_fetch_array($res)) {

            $role = $row['admin_role'];
            $rolenot = 'Select Admin Role';
        ?>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="vali-form">
            <div class="col-md-4 form-group1">
              <label class="control-label">Firstname</label>
              <input type="text" name="firstname" placeholder="Firstname" value="<?php echo $row['admin_f_name']; ?>">
            </div>
            <div class="col-md-4 form-group1 form-last">
              <label class="control-label">Lastname</label>
              <input type="text" name="lastname" placeholder="Lastname" value="<?php echo $row['admin_l_name']; ?>">
            </div>
            <div class="col-md-4 form-group1 form-last">
              <label class="control-label">Username</label>
              <input type="text" placeholder="Username" value="<?php echo $_SESSION['admin_name'] ?>" id="disabledInput" disabled>
            </div>
            <div class="clearfix"> </div>
            </div>

            <div class="vali-form">
            <div class="col-md-6 form-group1">
              <label class="control-label">Email</label>
              <input type="text" name="email" placeholder="Email" value="<?php echo $row['admin_email']; ?>">
            </div>
            <div class="col-md-6 form-group1 form-last">
              <label class="control-label">Contact No.</label>
              <input type="text" name="contact" placeholder="Contact Number" value="<?php echo $row['admin_contact']; ?>" >
            </div>
            <div class="clearfix"> </div>
            </div>

            <div class="vali-form">
            <div class="col-md-6 form-group1 ">
              <label class="control-label">About Me</label>
              <textarea name="about"  placeholder="Something about me ........" Value="" ><?php echo $row['admin_about']; ?></textarea>
            </div>
            <div class="form-group">
                  <label class="control-label" style="margin-left: 15px; padding-bottom: 10px;" >Admin Role</label>
                  <div class="col-sm-6"><select name="role" id="selector1" class="form-control1">
                    <option selected="selected" ><?php if ($role == null) { echo $rolenot; }else { echo $row['admin_role'];  } ?></option>
                    <option>Administrator</option>
                    <option>Editor</option>
                    <option>Author</option>
                  </select></div>
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
              <input name="ConfirmPass" id="txtConfirmPassword" type="password" placeholder="Repeat password">
            </div>
            <div class="clearfix" style="padding-bottom: 20px;"> </div>
            <div class="col-md-6 form-group1">
              <p style="color: red;" id="divCheckPasswordMatch"></p>
            </div>
             <div class="clearfix" style="padding-bottom: 20px;"> </div>

            <div class="vali-form"> 
            <div class="col-md-2 form-group">
              <label for="exampleInputFile">Update Image</label>
              <input type="file" value="Select" name="image" accept=".jpg,.jpeg,.png">
              <p class="help-block">Aspect Ratio: 100x100 or <br>150x150px</p>
            </div>
            <div class="col-md-4 form-group">
            <img src="admin_data/<?php $pic = $row['admin_pic']; if (!empty($pic)) { echo $row['admin_pic']; }else { echo 'default-avatar.png'; } ?>" style="width: 140px; height: 140px;border: 1px solid grey;" alt="Admin Profile" class="img-thumbnail Responsive image">
            </div>
            </div>

            <div class="checkbox">
            <div class="col-md-12 form-group">
              <button type="submit" name="update" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
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