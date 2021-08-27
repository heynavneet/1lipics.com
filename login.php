<?php 
session_start();
ob_start();


$pagetitle = 'User Login -';
$search_q = '';
$keywords = '';
$description = '1lipics User Login';
$page_url = '';
$image_url = '';
require_once 'layout/header.php';
include 'layout/search1.php';

if (isset($_SESSION['username']) & !empty($_SESSION['username'])) {
	$smsg = "You Are Already Logged In " . $_SESSION['username'];

}

if (isset($_POST) & !empty($_POST)) {
	$username =  mysqli_real_escape_string($connection, $_POST['username']);       //this $username variable for login
	$password = md5($_POST['password']);     //md5 for encode login password and make it secure

	$sql = "SELECT * FROM `usermanagement` WHERE ";
	if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
		$sql .= "email='$username'";
	}else {
		$sql .= "username='$username'";
	}
    $sql .= "AND password='$password' AND active=1";
    $sql;

	  $res = mysqli_query($connection, $sql);
	  $count = mysqli_num_rows($res);

	if ($count == 1) {
		$_SESSION['username'] = $username;
		header('location: ./');
		exit;
	}else {
		$fmsg = "User Not Exist";
	}
}

 ?>
<div class="banner-top">
	<div class="container">
		<h3 >Login</h3>
		<h4><a href="./">Home</a><label>/</label>Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>
	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Login</h3>
					<?php if(isset($smsg)){ ?>
					<div class="alert alert-success alert-dismissable " role="alert"> <?php echo $smsg; ?></div><?php } ?>
					<?php if(isset($fmsg)){ ?>
					<div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
					<form action="#" method="post">
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text"  name="username"  required="required" placeholder="Username or Email">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Login">
					</form>
				</div>
				<div class="forg">
					<a href="forgotpassword" class="forg-left">Forgot Password</a>
					<a href="register" class="forg-right">Register</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>

<?php
include 'layout/footer.php';
?>
