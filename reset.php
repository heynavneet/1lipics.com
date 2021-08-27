<?php 
session_start();
$pagetitle = 'User Forgot Password';
$search_q = '';
$keywords = '';
$description = '';
$page_url = '';
$image_url = '';
include 'layout/header.php';
include 'layout/search1.php';

// -- to get multiple value from URL
//---   http://pics.com/reset.php?id=1&token=0107f0f264fed77d851ec0b1f27d352d
$reset_id = $_GET['id'];
$reset_token =  $_GET['token'];

if (isset($_POST['reset_pas'])) {
    $new_password = $_POST['reset_pass'];
    $confirm_new_pass = $_POST['Confirm_reset_pass'];
    if ($new_password = $confirm_new_pass) {
    	$stmt = "UPDATE `usermanagement` SET `password`=md5('$new_password') WHERE id='$reset_id' AND token='$reset_token'";
		$query = mysqli_query($connection, $stmt);
		$smsg = "Password reset Success!!";
    }else{
    	$error = "Password not matched!";
    }  	
}



 ?>


 <div class="banner-top">
	<div class="container">
		<h3 >Forgot Password</h3>
		<h4><a href="index.php">Home</a><label>/</label>Reset Password</h4>
		<div class="clearfix"> </div>
	</div>
</div>
 <!-- Forgot Pasword Reset Form -->
	<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Forgot Password</h3>
					<!-- Alert Success And Alert Failed Start -->
					<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
					<?php if(isset($error)){ ?><div class="alert alert-danger" role="alert"> <?php echo $error; ?> </div><?php } ?>
                    <!-- Alert Success And Alert Failed End -->							
					<form action="#" method="post">
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" id="txtNewPassword" placeholder="Change password" name="reset_pass" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" id="txtConfirmPassword" placeholder="Repeat password" name="Confirm_reset_pass" required="">
							<div class="clearfix"></div>
						</div>
						<p style="color: red; margin-bottom: 10px; margin-top: -19px;" id="divCheckPasswordMatch"></p>

						<div class="clearfix"></div>
						<input type="submit" name="reset_pas" value="Change">
					</form>
				</div>
				<div class="forg">
					<a href="login.php" class="forg-left">Login</a>
					<a href="register.php" class="forg-right">Register</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>

<script>
	// check both password are same
  $(function() {
    $("#txtConfirmPassword").keyup(function() {
        var password = $("#txtNewPassword").val();
        $("#divCheckPasswordMatch").html(password == $(this).val() ? "" : "Passwords not match!");
    });

});
</script>

<?php
include 'layout/footer.php';
?>		