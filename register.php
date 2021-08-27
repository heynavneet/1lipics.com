<?php
$pagetitle = 'User Register';
$search_q = '';
$keywords = '';
$description = 'User Signup - 1lipics';
$page_url = '';
$image_url = '';
include 'layout/header.php';
include 'layout/search1.php';
include 'config/mailconfig.php';
 // Resitration Script Start 
  if (isset($_POST) & !empty($_POST)) {
	 $username = mysqli_real_escape_string($connection, $_POST['username']);
	 $verification_key = md5($username);
	 $email = mysqli_real_escape_string($connection, $_POST['Email']);
	 $password = md5($_POST['Password']);
	 $Confirmpassword = md5($_POST['ConfirmPassword']);
	 if ($password == $Confirmpassword) {
	 	// Check Username Available or Not 
	 	$fmsg = "";
	 	$usernamesql = "SELECT * FROM `usermanagement` WHERE username='$username'";
	 	$usernameres = mysqli_query($connection, $usernamesql);
	 	$count = mysqli_num_rows($usernameres);
	 	if ($count == 1) {
	 		$fmsg .= "Username Already Taken, Please Try Another.";
	 	}
        // Check Email Address Availabel or Not
	 	$emailsql = "SELECT * FROM `usermanagement` WHERE email='$email'";
	 	$emailres = mysqli_query($connection, $emailsql);
	 	$emailcount = mysqli_num_rows($emailres);
	 	if ($emailcount == 1) {
	 		$fmsg .= "Email Already In Use, Please Reset Your Password or Try Another email.";
	 	}


	 	// SQL Query to Insert Data In Database Table
		 $sql = "INSERT INTO `usermanagement`(`username`, `email`, `password`, `verification_key`) VALUES ('$username','$email','$password', '$verification_key')";
		 $result = mysqli_query($connection, $sql);
		 if ($result) {
		 	$smsg = "You Have Register Successfully";
		 	$id = mysqli_insert_id($connection);
		 	// PHP Mailer Script For Send Email if Useer Resiterd Successfull
		 	require 'PHPMailer/PHPMailerAutoload.php';

			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                               

			$mail->isSMTP();                                      
			$mail->Host = $smtphost;
			$mail->SMTPAuth = true;                               
			$mail->Username = $smtpuser     ;            
			$mail->Password = $smtppass;                           
			$mail->SMTPSecure = 'ssl';                            
			$mail->Port = 465;                                    

			$mail->setFrom('noreply@1lipics.com', '1lipics - Email Verification');
			$mail->addAddress( $email , $username);     

			$mail->Subject = 'Verify Your Email Address';
			// Email That Send Start Here
			$mail->Body    = "<div style='text-align: center;' >
			  <h1 style='text-align: center; margin: auto; font-size: 26px; ' > Thanks For Joining 1lipics. </h1> <br>
              <h2 style='text-align: center; margin: auto; font-size: 16px; margin-top: 30px; color:#434b57; ' > Plese Confirm Your Email Address. </h2> <br>
             <div>
			  <a href='https://1lipics.com/verify?key=$verification_key&id=$id'>https://1lipics.com/verify?key=$verification_key&id=$id </a> 
			  </div> 
			  <div style='text-align: center; margin-top: 5px; font-size: 18px;'>
             <a href='https://1lipics.com/verify?key=$verification_key&id=$id'>Verify Email </a>
             </div>
			  "; 
			$mail->AltBody = 'Thank You For Joining 1lipics';
           //  EMail That Send End Here
			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    $cmsg = "Plese Check Your Email, Verification Mail Has Been Send, wait upto 10 minuts, or check spam folder";
			}
			// PHP Mailer Script End Here
		 }else {
		 	$fmsg .= " Failed To Register.";
		 }

	 }else {
		 	$fmsg = "Password Not Matched";
	 }
	 
    }
?>
<div class="banner-top">
	<div class="container">
		<h3 style="font-size: " > Register </h3>
		<h4><a href="./">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
$('#usernameLoading').hide();
$('#username').keyup(function(){
  $('#usernameLoading').show();
      $.post("./check.php", {
        username: $('#username').val()
      }, function(response){
        $('#usernameResult').fadeOut();
        setTimeout("finishAjax('usernameResult', '"+escape(response)+"')", 400);
      });
     return false;
});
});
 
function finishAjax(id, response) {
  $('#usernameLoading').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
} //finishAjax
</script>
	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
					<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
					<?php if(isset($cmsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $cmsg; ?> </div><?php } ?>
					<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
					<form action="#" method="post">
					    <div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input type="text" id="username" value="<?php if(isset($username) & !empty($username)){ echo $username; } ?>" placeholder="Username" name="username" required="">
							<div class="clearfix"></div>
						</div>
						<!-- Check Username Available Start -->
						<div style="margin: 15px;" >
						<span id="usernameLoading"  ><img src="./images/loading.gif" alt="Ajax Indicator" /></span>
						<span class="clearfix" id="usernameResult"></span>
						</div>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="<?php if(isset($email) & !empty($email)){ echo $email; } ?>" placeholder="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Password" name="Password" onfocus="this.value = '';"  onblur="if (this.value == '') {this.value = 'Password';}" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Confirm Password" name="ConfirmPassword" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" required="">
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Submit">
					</form>
					<div class="forg">
					 <a href="login" class="forg-right">Already Member? Login</a>
				     <div class="clearfix"></div>
				    </div>

				</div>
			</div>
		</div>

<?php 
include 'layout/footer.php';
?>