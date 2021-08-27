<?php
session_start();
$pagetitle = 'Contact -';
$search_q = '';
$keywords = '';
$description = '';
$page_url = '';
$image_url = '';
include 'layout/header.php';
include 'layout/search1.php';
?>
 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Contact</h3>
		<h4><a href="/">Home</a><label>/</label>Contact</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<?php 
if (isset($_POST['contact'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$massage = $_POST['massage'];

	$q = "INSERT INTO `contact`(`con_name`, `con_mail`, `con_massage`) VALUES ('$name','$email','$massage')";
	$answer = mysqli_query($connection, $q);

	if ($answer) {
		$say = "Thanks You For Contacting.";
	}
}


 ?>
<!-- contact -->
<div class="contact">
	<div class="container">
		<div class="spec ">
			<h3>Contact</h3>
				<div class="ser-t">
					<b></b>
					<span><i class="fa fa-envelope" aria-hidden="true" style="color: #039445; font-size: 20px;"></i></span>
					<b class="line"></b>
				</div>
		</div>
		<div class=" contact-w3">	
			<div style="margin: auto; float: none;" class="col-md-9 contact-left">
				<h4>Contact Information</h4>
				<p></p>
				<ul class="contact-list">
					<li> <i class="fa fa-map-marker" aria-hidden="true"></i> Lucknow, India</li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:help@1lipics.com">help@1lipics.com</a></li>
					<li> <i class="fa fa-phone" aria-hidden="true"></i>0522-4956942</li>
				</ul>
				<div id="container">
					<!--Horizontal Tab-->
					<div id="parentHorizontalTab">
						<div class="resp-tabs-container hor_1">
							<?php if(isset($say)){ ?><div class="alert alert-success alert-dismissable" role="alert"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"> × </button> <?php echo $say; ?> </div><?php } ?>
							<div>
								<form action="#" method="post">
									<input type="text"  placeholder="Name" name="name" required="required" value="" >
									<input type="email" placeholder="Email" name="email"  required="required" value="">
									<textarea name="massage" placeholder="Write your massage here...." required="required"></textarea>
									<input type="submit" name="contact" value="Submit" >
								</form>
							</div>
							

						</div>
					</div>
				</div>
				
				
			</div>
			
		<div class="clearfix"></div>
	</div>
	</div>
</div>

<?php
include 'layout/footer.php';
?>