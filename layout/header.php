<!-- 

▄█  █    ▀  █▀▀█  ▀  █▀▀ █▀▀ 
 █  █   ▀█▀ █  █ ▀█▀ █   ▀▀█ 
▄█▄ ▀▀▀ ▀▀▀ █▀▀▀ ▀▀▀ ▀▀▀ ▀▀▀ 
            █   
            http://1lipics.com

Want to make this site better? mail: hello@1lipics.com
-->
<?php include 'function.php'; 
?>
<!DOCTYPE html>
<html><head><title><?php echo "$pagetitle"; ?> 1lipics</title>
<meta name='ir-site-verification-token' value='-820158536' />
<meta name="google-site-verification" content="iGgRc-K4AU-0kZ-yxurvAXJaPLgilvGL472mCBTycl8" />
<meta name="msvalidate.01" content="21D3EAFD3C167F0A24B8779E410BC02C" />
<!-- Google Analytics --><script async src="https://www.googletagmanager.com/gtag/js?id=UA-108261004-1"></script><script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);} gtag('js',new Date());gtag('config','UA-108261004-1');</script><meta name="viewport" content="width=device-width, initial-scale=1"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="theme-color" content="#008000"><meta property="og:image" content="<?php echo $image_url ?>"><meta name="keywords" content="<?php echo $keywords ?>" /><meta name="description" content="<?php echo $description ?>"><meta name="yandex-verification" content="fb15faede5820b54" /><link rel="canonical" href="<?php echo $page_url ?>" /><link rel="apple-touch-icon" sizes="180x180" href="images/180x180-icon.png"><link rel="icon" href="images/icon.png" style="color: green;"><script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);function hideURLbar(){ window.scrollTo(0,1); } </script><link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' /><link rel="stylesheet" type="text/css" href="./assets/css/gallery.css"><link href="assets/css/style.css" rel='stylesheet' media="all" type='text/css' /><script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><link rel="stylesheet" type="text/css" href="assets/css/tag.css"><script src="assets/js/tag.js" ></script><script type="text/javascript" src="assets/js/move-top.js"></script><script type="text/javascript" src="assets/js/easing.js"></script><script type="text/javascript" src="assets/js/main.js" ></script><script type="text/javascript">jQuery(document).ready(function($) {$(".scroll").click(function(event){	event.preventDefault();$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);});});</script><link href="assets/css/font-awesome.css" rel="stylesheet"> <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'></head><body><!--Google Tag Manager(noscript)--><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K57J5DC" height="0"width="0"style="display:none;visibility:hidden"></iframe></noscript><!--End Google Tag Manager(noscript)--><div class="header"><div class="container"><div class="logo"><h1 ><a href="./">1lipics<span>Free Stock Image</span></a></h1></div><div class="nav-top"><div class="cus-nav"><nav class="navbar navbar-default"><div class="navbar-header nav_2"><button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div> <div class="collapse navbar-collapse" id="bs-megadropdown-tabs"><ul class="nav navbar-nav "><li class="dropdown"><a href="#" class="dropdown-toggle hyper " data-toggle="dropdown" ><span> Browse <!-- <b class="caret"></b> --></span></a><ul class="dropdown-menu multi multi1"><div class="row"><div class="col-lg-12 "><ul class="multi-column-dropdown"><li><a href="./pics"> Discover Pics </a></li><li><a href="./recent"> Recent</a></li><li><a href="care"> Popular</a></li></ul></div></div></ul></li><li><a href="./upload" class="hyper"> <span>Upload</span></a></li><?php if(isset($_SESSION['username'])){ ?><li class="dropdown">  <!-- ... Header Start --><?php $sql = mysqli_query($connection, "SELECT * FROM usermanagement where username='{$_SESSION['username']}' OR email='{$_SESSION['username']}' "); while ($row=mysqli_fetch_array($sql)) { $row['username']; ?><a href="" class="dropdown-toggle hyper" data-toggle="dropdown" ><span><?php echo $row['username']; ?><?php } ?></span></a><ul class="dropdown-menu multi multi1"  ><div class="row"><div class="col-lg-12 "><ul class="multi-column-dropdown"><li><a href="./profile?username=<?php echo getUsername(); ?>"> Profile </a></li><li><a href="./myimage"> Images </a></li><li><a href="./settings"> Setting </a></li><li><a href="./"> License </a></li><li><a href="./logout"> Logout </a></li></ul></div></div></ul></li> <?php }else{ ?><li><a href="./register" class="hyper"> <span>Sign Up</span></a></li><li><a href="./login" class="hyper"> <span>Login</span></a></li> <?php } ?><li class="dropdown"><a href="#" class="dropdown-toggle hyper " data-toggle="dropdown" ><span><i class="fa fa-circle" style="font-size: 7px;" aria-hidden="true"></i> <i class="fa fa-circle" style="font-size: 7px;" aria-hidden="true"></i> <i class="fa fa-circle" style="font-size: 7px;" aria-hidden="true"></i> </span></a><ul class="dropdown-menu multi multi1"  ><div class="row"><div class="col-lg-12 "><ul class="multi-column-dropdown"><li><a href="./faq"> FAQ </a></li><li><a href="./farum"> Forum </a></li><li><a href="./blog"> Blog </a></li><li><a href="./"> License </a></li><li><a href="./contact"> Contact </a></li>	</ul></div></div></ul></li></ul></div></nav><div class="clearfix"></div></div></div></div></div>		