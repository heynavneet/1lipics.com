<?php 
$pagetitle = 'User Forgot Password';
$search_q = '';
$keywords = '';
$description = 'User forgot password - 1lipics';
$page_url = '';
$image_url = '';
include 'layout/header.php';
include 'layout/search1.php';
//include 'config/mailconfig.php';


if (isset($_POST) & !empty($_POST) ) {
	$input = $_POST['email'];
	$token = md5(uniqid().rand());  // uniq token genrate and send to user email
	$sql = "SELECT * FROM `usermanagement` WHERE ";
	if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
		$sql .= "email='$input'";
    }else {
    	$sql .= "username='$input'";
    }
    $res = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($res);
    if ($count == 1) {
    	$r = mysqli_fetch_assoc($res);
    	//$password = $r['password'];
    	$username = $r['username'];
    	$id = $r['id'];
        $s = +1; 

    	$usql = "UPDATE `usermanagement` SET token='$token', forgot_status = forgot_status + 1 WHERE username='$username' or email='$input' ";
    	$result = mysqli_query($connection, $usql);
    	if ($result) {

    	require 'PHPMailer/PHPMailerAutoload.php';         		// Send Password to user Email By PHPMailer

			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                               

			$mail->isSMTP();                                      
			$mail->Host = 'smtp.elasticemail.com';
			$mail->SMTPAuth = true;                               
			$mail->Username = 'oyenavneet@gmail.com';            
			$mail->Password = 'ef315267-e56e-4de3-9fdd-3f8766c4ef50';                           
			$mail->SMTPSecure = 'tls';                            
			$mail->Port = 587;                                    

			$mail->setFrom('no-reply@1lipics.com', '1lipics.com');
			$mail->addAddress($input, 'Navneet');     

			$mail->Subject = '1lipics | Reset Password';
			// email send containt 
			$mail->Body    = "<div style='text-align: center;' >
			  <h1 style='text-align: center; margin: auto; font-size: 26px; ' > Reset Password Link. </h1> <br>
              <h2 style='text-align: center; margin: auto; font-size: 16px; margin-top: 30px; color:#434b57; ' > Reset password by clicking on below link. </h2> <br>
             <div>
			  <a href='localhost/pics/reset.php?id=$id&token=$token'>http://pics.com/reset.php?id=$id&token=$token</a> 
			  </div> 
			  <div style='text-align: center; margin-top: 5px; font-size: 18px;'>
             <a href='localhost/pics/reset.php?id=$id&token=$token'> Reset Password </a>
             </div>";
			$mail->AltBody = 'Click Reset Link to Reset Password';
			$fmsg = "";

			if(!$mail->send()) {
			    $fmsg = 'Reset Email could not be sent, Conatct for support. ';
			} else {
			    $smsg = 'Reset Email has been sent, Please Check Your Email.';
			} 
    	}else {
           $fms = "Failed To send reset link";
    	}


    	
    }
 }
?>
  <!---->
 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Forgot Password</h3>
		<h4><a href="index.php">Home</a><label>/</label>Reset Password</h4>
		<div class="clearfix"> </div>
	</div>
</div>

	<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
					<h3>Forgot Password</h3>
					<!-- Alert Success And Alert Failed Start -->
					<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
					<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
                    <!-- Alert Success And Alert Failed End -->							
					<form action="#" method="post">
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Reset">
					</form>
				</div>
				<div class="forg">
					<a href="login.php" class="forg-left">Login</a>
					<a href="register.php" class="forg-right">Register</a>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>

<?php
include 'layout/footer.php';
?>