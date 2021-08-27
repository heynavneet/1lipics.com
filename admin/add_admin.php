<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
   header("Location:signin.php");
}
$admintitle = 'Edit Profile';
include 'header.php';
include 'sidebar.php'; 

?>
<div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 

		     <div class="banner">
		    	<h2>
				<a href="./index">Home</a>
        <i class="fa fa-angle-right"></i>
        <span>Setting</span>
        <i class="fa fa-angle-right"></i>
        <span>Add Admin</span>
				</h2>
		    </div>

            <div class="blank">
				<div class="blank-page">


 		

<?php 
if (isset($_POST['add_admin'])) {
      $username = $_POST['new_admin_username'];
      $password = md5($_POST['pass']);
      $ConfirmPassword = md5($_POST['confirmpass']);
      $newrole = $_POST['role'];
      $avatar = 'admin_data/default-avatar.png';

      if ($password == $ConfirmPassword) {

        $sql = "INSERT INTO `admin`(`admin_name`, `password`, `admin_role`, `admin_pic`) VALUES ('$username','$password','$newrole', '$avatar')";
        $result = mysqli_query($con, $sql);

          $naas = 'New Admin Added Successfull';


      }else {
        $pnm = 'An Error Occure, password Not Match';
      }
  
}

?>

        <?php if(isset($naas)){ ?><div class="alert alert-success" role="alert"><?php echo $naas; ?> </div><?php } ?>
        <?php if(isset($pnm)){ ?><div class="alert alert-danger" role="alert"> <?php echo $pnm; ?> </div><?php } ?>

        <div class="grid-form1"  >
<h3 id="forms-horizontal">Add New Admin</h3>

<form  class="form-horizontal" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Username</label>
    <div class="col-sm-5">
      <input type="text" name="new_admin_username" class="form-control" id="inputEmail3" placeholder="New Admin Username" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label hor-form">Password</label>
    <div class="col-sm-5">
      <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="New Admin Password" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label hor-form">Confirm Password</label>
    <div class="col-sm-5">
      <input type="password" name="confirmpass" class="form-control" id="inputPassword3" placeholder="Confirm New Admin Password" required="required">
    </div>
  </div>
  <div class="form-group">
    <label for="selector1" class="col-sm-2 control-label">Dropdown Select</label>
    <div class="col-sm-5"><select name="role" id="selector1" class="form-control1">
      <option selected="selected" >Select New Admin Role</option>
      <option>Administrator</option>
      <option>Editor</option>
      <option>Author</option>
    </select></div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="checkbox" required="required" > Term & Condition 

        </label>
        <a data-toggle="popover" data-container="body" data-content="You Have To Only Add New Admin on your own Risk or on Your own Guarantee "><i style="cursor: pointer;" class="fa fa-question-circle"  aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button name="add_admin" type="submit" class="btn btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Admin</button>
    </div>
  </div>
</form>
</div>





            </div>
         </div>
        </div>
</div>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>

<?php
include 'footer.php';
?>