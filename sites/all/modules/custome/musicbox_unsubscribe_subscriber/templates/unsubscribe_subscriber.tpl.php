<?php 
	global $user;
	global $base_url;
	$cuser=user_load($user->uid);
	$modulePath = drupal_get_path('module', 'musicbox_unsubscribe_subscriber');
	
	$fullurl = $base_url.'/'.$modulePath;
	
?>




<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Unsubscribe</title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php print $fullurl; ?>/images/favicon.ico" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/bootstrap.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/chechbox.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/unsubscribe.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/footer.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/top-bar.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/container.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
		<script src="<?php print $fullurl;?>/js/jquery.min.js"></script>
		<script src="<?php print $fullurl;?>/js/bootstrap.min.js"></script>
		
		
	</head>
	
	<body>
		
		<div class="container mobile-container " style="background-color:#2d2a2a;">
			
			<div class="text-center" style="height:6vh; background-color:#fff;">
				  <a href="<?php print $base_url; ?>/infortainment"><i class="fa fa-home" aria-hidden="true"></i></a><label class="name-activate2">MUSIC BOX</label>
				<div class="dropdown" style="float:right;">
					<button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
					<i class="fa fa-align-justify"></i></button>
					<ul class="dropdown-menu">
						
					<?php $paystatus = get_payment_status($cuser->uid);
		if($paystatus == 0) {?>
								<li><a href="<?php print $base_url; ?>/infortainment" >Home</a></li>
							
								<li><a href="<?php print $base_url; ?>">Change Package</a></li>
								<li><a href="<?php print $base_url; ?>/unsubscribe" class="active menucolor">Unsubscribe</a></li>
								<li><a href="<?php print $base_url; ?>/user">My Profile</a></li>
								<li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
		<?php } else { ?>		
						
								<li><a href="<?php print $base_url; ?>/infortainment">Home</a></li>
							
							    <li><a href="<?php print $base_url; ?>/change_package">Change Package</a></li>
								<li><a href="<?php print $base_url; ?>/unsubscribe" class="active menucolor">Unsubscribe</a></li>
								<li><a href="<?php print $base_url; ?>/user">My Profile</a></li>
								<li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
		<?php } ?>
					</ul>
				</div>
			</div>
			
			<div class="new-inner ">
				
				<div class="row row-title">
					<div class="col-lg-4 col-md-4  col-sm-6 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-2">
						<div class="text-center  ">
							<div class="text-center artist" style="height:5vh;">
								<center>
								<h6  class="upload-st">UNSUBSCRIBE</h6></center>
							</div>
							
						</div>
					</div>
					
				</div>
				
				<div class="row rowheight">
					
					<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
						
						
						
						
						<div class="container padding-all">
							
							
							<h6 class="text-center unsubs upload-st">When you unsubscribe, all artists you follow and their content will be cleared from your account.</h6>
							<center>
							<button type="button" class="btn btn-default"  data-toggle="modal" data-target="#myModalUnsubscribe"data-backdrop="static" data-keyboard="false">Unsubscribe</button></center>
							
						</div>
						
						
						
					</div>
					
				</div>
				
			</div>
			<footer>
				<div class="container">
					<img src="<?php print $fullurl; ?>/images/logo.png" class="logo-img pull-left">
					<img src="<?php print $fullurl; ?>/images/dialog.png" class="service pull-right">
				</div>
			</footer>
		</div>
		
		<!-- Modal -->
		<div id="myModalUnsubscribe" class="modal fade" role="dialog">
			<div class="modal-dialog">
				
				<!-- Modal content-->
				<div class="modal-content unsubcontent">
					
					<div class="modal-body">
						<p class="text-center unsubscribemsg">Are you sure you want to unsubscribe?</p>
					</div>
					<div class="modal-footer">
						
						<center> <a href="<?php print $base_url; ?>/unsubscribe_user/<?php print $user->uid; ?>"> <button type="button" class="btn btn-default">YES</button></a>
						<button type="button" class="btn btn-default" data-dismiss="modal">NO</button> </center>
					</div>
					
					
					
				</div>
				
			</div>
		</div>
		
		
	</div>
</div>
</div>





<script>
	$(document).ready(function(){
  $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
});
});</script>


<script>
	$('.dropdown').on('show.bs.dropdown', function() {
		$(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	});
	
	// Add slideUp animation to Bootstrap dropdown when collapsing.
	$('.dropdown').on('hide.bs.dropdown', function() {
		$(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	});
</script>

</body>

</html>