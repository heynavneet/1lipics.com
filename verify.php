<?php 
session_start();
$pagetitle = 'User Account Verification';
$search_q = '';
$keywords = '';
$description = '';
$page_url = '';
$image_url = '';
include 'layout/header.php';
include 'layout/search1.php';
$key = $_GET['key'];
$id = $_GET['id'];
$sql = "SELECT * FROM `usermanagement` WHERE id=$id AND verification_key='$key' AND active=0";
$res = mysqli_query($connection, $sql);
$count = mysqli_num_rows($res);

if ($count == 1) {
	$usql = "UPDATE `usermanagement` SET active=1 WHERE id=$id";    //This Line For Update User Active = 1
	$ures = mysqli_query($connection, $usql);
	if ($ures) {
		$smsg = "Your Account Activated Successfully";
	}else {
       $fmsg = "Account Activation Failed, Contactr To Support Team";
	}
}else {
	$fmsg = "Activation Key Is Wrong";
}
?>
<div class="banner-top"><div class="container"><h3 >Register</h3><h4><a href="index.html">Home</a><label>/</label>Register</h4><div class="clearfix"> </div></div></div><div class="login"><div class="main-agileits"><div class="form-w3agile form1"><h3>Register</h3>
<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><p>You will be redirected in <span id="counter">10</span> second(s).</p><script type="text/javascript">function countdown(){var i=document.getElementById('counter');if(parseInt(i.innerHTML)<=0){location.href='login.php';} i.innerHTML=parseInt(i.innerHTML)-1;} setInterval(function(){countdown();},1000);
</script><?php } ?><?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?></div></div></div>
<?php 
include 'layout/footer.php';
?>