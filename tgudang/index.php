<?php 
session_start();
require 'koneksi.php';
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>PT DNSL</title>
	<!--Import Google Icon Font-->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css" rel="stylesheet">
	<!--Import materialize.css-->

	<link type="text/css" rel="stylesheet" href="css/mdl.css"  media="screen,projection"/>

	<link type="text/css" rel="stylesheet" href="css/custom.css"  media="screen,projection"/>

	<link rel="stylesheet" href="css/style.default.css" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
</head>
<body>

	<div class="container">
		<br><br>
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-xs-center">Sistem Pergudangan PT. DNS Internasional</h1>
			</div>
		</div>
		<br><br><br>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<?php include("login.php") ?>
			</div>
			<div class="col-md-3"></div>
		</div>

	</div>
</div><!--loginwrapper-->


<!--Import jQuery before materialize.js-->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/mdl.js"></script>

<!-- <script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function(){

		var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
		jQuery('.loginwrap').bind(anievent,function(){
			jQuery(this).removeClass('animate2 bounceInDown');
		});

		jQuery('#username,#password').focus(function(){
			if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
		});

		jQuery('#loginform button').click(function(){
			if(!jQuery.browser.msie) {
				if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
					if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
					if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
					jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
						jQuery(this).removeClass('animate0 wobble');
					});
				} else {
					jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
						jQuery('#loginform').submit();
					});
				}
				return false;
			}
		});
	});
</script> -->

</body>
</html>