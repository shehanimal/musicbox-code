<?php
global $base_url;
$themePath = drupal_get_path('theme', 'adminbartik');

$fullurl = $base_url.'/'.$themePath;
//print '<pre>';print_r($form);print '</pre>';exit;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		
		<title>MUSIC BOX</title>
		<!-- <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css'> -->
		<!-- Bootstrap core CSS -->
		<link href="<?php print $fullurl; ?>/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php print $fullurl; ?>/css/style.css" rel="stylesheet">
		
		  <script src="<?php print $fullurl; ?>/js/jquery-3.2.1.min.js"></script>
		
	
		
		<script>
		$(document).ready(function(e){
    		$(".img-check").click(function(){
				$(this).toggleClass("check");
			});
	});
</script>
	</head>
	
	<body>
	
	
	<div class="container ">
	<div class="row">
	<img src="<?php print $fullurl; ?>/images/loginimg1.jpg"  class="cover-image" alt="Generic placeholder thumbnail">
	</div>
	
	</div>
	
	
	<div class="container selectplan-container ">
	<center>
			<a href="<?php print $base_url;?>" >
			<img src="<?php print $fullurl;?>/images/home-icon.png" class="home-class">
			</a>
			</center>
	<div class="main-title">
				<h1 class="select-subs-pack text-center">Create Administrator Account</h1>
			</div>	
		<div class="row selectartist-container">
					<div class="col-md-12 col-xs-12 col-xl-12 col-lg-12 text-center">
				
					<form class="form-horizontal form-alignment">
								
							
								
								<div class="row placeholder panel-section">
									
									<div class="col-sm-4 col-sm-offset-4">
										
										<div class="form-group">
											<?php  print drupal_render($form['name']); ?>
										</div>
										</div>
									
								</div>
								<div class="row placeholder panel-section">
									
									<div class="col-sm-4 col-sm-offset-4">
										
										<div class="form-group">
											<?php  print drupal_render($form['pass']); ?>
										</div>
										</div>
									
								</div><div class="row placeholder panel-section">
									
									<div class="col-sm-4 col-sm-offset-4">
										
										<div class="form-group">
											<?php  print drupal_render($form['mail']); ?>
										</div>
										</div>
									
								</div>
								<?php print drupal_render($form['submit']);?>
					</div>
				
			</div> 
	</div>
			<?php



print drupal_render($form['form_token']);

print drupal_render($form['form_id']);
?>	
		<div id ="footer">
			<p>copyrights-Music box 2018</p>
		</div>	
								
	<script src="<?php print $fullurl; ?>/js/bootstrap.min.js"></script>
	<script src="<?php print $fullurl; ?>/js/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
										
	</body>
	</html>