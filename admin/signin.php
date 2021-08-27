<!DOCTYPE html>
<html lang="en">
<head>
	<title>1lipics Admin Signin</title>
	<meta name="robots" content="noindex">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
</style>
<body style="background-color: #e9ebee" >
<?php
 //Start the Session
session_start();
ob_start();
require('db.php');

if (isset($_SESSION['admin_name']) & !empty($_SESSION['admin_name'])) {
	$smsg = "You Are Already Signin <b>" . $_SESSION['admin_name'] . "</b> as <b>Admin</b> Go to <a style='text-decoration:  none;' href='./index.php'><b>Dashboard </b></a> or <a style='text-decoration:  none;' href='./logout'><b>Logout</b></a> ";
	
}

if (isset($_POST) & !empty($_POST)) {
	$admin_name =  mysqli_real_escape_string($con, $_POST['admin_name']);       //this $username variable for login
	$password = md5($_POST['password']);     //md5 for encode login password and make it secure

	$sql = "SELECT * FROM `admin` WHERE ";
	if (filter_var($admin_name, FILTER_VALIDATE_EMAIL)) {
		$sql .= "email='$username'";
	}else {
		$sql .= "admin_name='$admin_name'";
	}
    $sql .= "AND password='$password'";
    $sql;
	  $res = mysqli_query($con, $sql);
	  $count = mysqli_num_rows($res);

	if ($count == 1) {
		$_SESSION['admin_name'] = $admin_name;
		header('location: index.php');
		exit;
	}else {
		$fmsg = 'Admin Not Exist';
	}
}
?>
<div style="text-align: center;">
	<h2 style="padding-top: 20px; "><b>1lipics</b> Admin</h2>
          
     <div class="container" style="padding-top: 25px;">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-body" style="padding: 50px 60px; border-width:5px;  border-style:outset; border-color: #339f1e; box-shadow: 10px 10px 5px #888888;" >
						<div class="row">
							<div class="col-lg-12">

								  <?php if(isset($smsg)){ ?>
									<div class="alert alert-success alert-dismissable " role="alert"> <?php echo $smsg; ?></div><?php } ?>
                                
                                  <?php if(isset($fmsg)){ ?>
									<div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

								<form id="login-form" action="#" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="admin_name" id="username" class="form-control" placeholder="Admin Username" required="require" >
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" class="form-control" placeholder="Admin Password" required="require" >
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
											   <input type="submit" name="login-submit"  id="login-submit" tabindex="4" class="form-control btn btn-primary" value="Log In">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<h4 > &copy; 2017 <a href="http://1lipics.com">1lipics.com</a></h4>
</div>
</body>
</html>