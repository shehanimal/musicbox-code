<?php 
	global $base_url;
	global $user;
	$cuser=user_load($user->uid); 
	$modulePath = drupal_get_path('module', 'musicbox_artist_uploade_info_page');
	
	$fullurl = $base_url.'/'.$modulePath;
	
	
	
	if(arg(1) == 'pix'){
		$info_block_id = 'artist_infortatement_pictuer';
		$main_title = 'Upload Pictures';
		$menpix = "active menucolor";
		}else if(arg(1) == 'vids'){
		$info_block_id = 'artist_infortatement_video';
		$main_title = 'Upload Video';
		$menvids = "active menucolor";
		}else if(arg(1) == 'personal'){
		$info_block_id = 'artist_todays_motivation';
		$main_title = 'Write Your Message';
		$menpersonal = "active menucolor";
		}else if(arg(1) == 'learn'){
		$info_block_id = 'artist_infortatement_learn';
		$main_title = 'Write Your Thought';
		$menlearn = "active menucolor";
	}
	
	

?>

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Musicbox | Status</title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php print $fullurl; ?>/images/favicon.ico" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/bootstrap.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/status_uplode.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/footer.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/top-bar.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/container.css">
			<link rel="stylesheet" href="<?php print $fullurl;?>/css/tab.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
		<script src="<?php print $fullurl;?>/js/jquery.min.js"></script>
		<script src="<?php print $fullurl;?>/js/bootstrap.min.js"></script>
		<style>
			
		</style>
		
	</head>
	
	<body>
		
		<div class="container mobile-container " style=" background-color:#2d2a2a;">
			
			<div class="text-center" style="height:5vh; background-color:#fff;">
				  <a href="<?php print $base_url; ?>/infortainment"><i class="fa fa-home" aria-hidden="true"></i></a><label class="name-activate2">MUSIC BOX</label>
				<div class="dropdown" style="float:right;">
					<button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
					<i class="fa fa-align-justify"></i></button>
					<ul class="dropdown-menu">
						
						<li><a href="<?php print $base_url; ?>/infortainment" style="float:right;">Home</a></li>
						<li><a href="<?php print $base_url; ?>/uploade/pix" class="<?php print $menpix;?>" style="float:right;">Pix</a></li>
						<li><a href="<?php print $base_url; ?>/uploade/vids" class="<?php print $menvids;?>">Vids</a></li>
						<li><a href="<?php print $base_url; ?>/uploade/personal" class="<?php print $menpersonal;?>">Personal</a></li>
						<li><a href="<?php print $base_url; ?>/uploade/learn" class="<?php print $menlearn;?>">Learn</a></li>
						<li><a href="<?php print $base_url; ?>/status">Upload Status</a></li>
						<li><a href="<?php print $base_url; ?>/user">My Profile</a></li>
						<li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
					</ul>
				</div>
			</div>
			
			<div class="new-inner">
				
				<div class="row row-title">
					<div class="col-lg-4 col-md-4  col-sm-6 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-2">
						<div class="text-center  ">
							<div class="text-center artist" style="height:5vh;">
								<center>
								<h4 class="art-name"><?php echo strtoupper($user->name);?></h4></center>
							</div>
							
						</div>
					</div>
					
				</div>
				
				<div class="row ">
					<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 ">
						<label class="upload-st"><?php print $main_title;?></label>
						
					</div>
					<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 uploadinfo" ><center>
						<?php $block2=module_invoke( 'musicbox_artist_dashboard', 'block_view', $info_block_id); 
						if ($block2[ 'content']){ print render($block2[ 'content']);} ?> </center>
						
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
		
		
		<!-- modal -->
		
		
		
		
		
		
		
		
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