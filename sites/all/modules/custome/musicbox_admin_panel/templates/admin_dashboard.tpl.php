<?php 
global $base_url;
$modulePath = drupal_get_path('module', 'musicbox_admin_panel');

$fullurl = $base_url.'/'.$modulePath;

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
<link rel="shortcut icon" type="image/x-icon" href="<?php print $fullurl; ?>/images/favicon.ico" />
		
		<title>Musicbox - Admin Pannel</title>
		
		<!-- Bootstrap core CSS -->
		<link href="<?php print $fullurl; ?>/css/bootstrap.css" rel="stylesheet">
		
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		
		<!-- Custom styles for this template -->
		<link href="<?php print $fullurl; ?>/css/dashboard.css" rel="stylesheet">
		
		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->
		
		
	</head>
	
	<body>
		
		  <?php 
  global $user;
  global $base_url;
$cuser = user_load($user->uid);
if(isset($image_fid)){
$image_fid = $cuser->picture->fid;
}else{
	$image_fid = 569;
	
}

$file = file_load($image_fid);

	
    $uri = $file->uri;
	
    $url = file_create_url($uri);
		?>
		<nav class="navbar navbar-inverse visible-xs">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					
					<div class="head-logo">
					<a href="<?php print $base_url;?>/admin_panel" >	<img src="<?php print $fullurl;?>/images/logo.png " class="logo pull-left" > </a>
					</div>
					  <div class="navbar-form pull-right">
							<div class="navbar-items"><img src="<?php print $url; ?>" class="img-profile img-circle " align="left"/>
							<div id="username-profile"><?php print $cuser->name; ?></div></div>
							
						
							<div class="btn-group pull-right">
								
								<button type="button" class="btn btn-info dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu log-menu-list-mb">
								
									<li role="separator" class="divider"></li>
									<li><a href="<?php print $base_url; ?>/user/logout">Log out</a></li>
									
									
									
								</ul>
							</div>
							
						
							
						</div></div>
						
						<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li ><a  class="top-title" href="<?php print $base_url;?>/admin_panel">DASHBOARD</a></li>
						<li><a  class="top-title" href="#">NEW ENTRY</a>
							<ul >
							<li><a class="fisrt-link"href="<?php print $base_url;?>/preferance">Preferences</a></li> 
								<li><a class="fisrt-link" href="<?php print $base_url;?>/add_artist">Add New Artist</a></li>
							
							</ul>
						</li>
						<li><a class="top-title" href="#">REPORTS</a>
							<ul >
								<li><a class="fisrt-link"href="<?php print $base_url;?>/artist/income">Income</a></li>
								<li><a class="fisrt-link"href="<?php print $base_url;?>/subscriber-info">Subscribers</a></li>
								<li><a class="fisrt-link" href="<?php print $base_url;?>/artist-info">Artist</a></li>
						
								
							</ul>
						</li>
							<li><a class="top-title" href="#">APPROVAL</a>
							<ul >
								<li><a class="fisrt-link"href="<?php print $base_url;?>/artist-approval">Artist Infotainment</a></li>
									<?php if ($cuser->uid == 163) { ?>
								<li><a class="fisrt-link"href="<?php print $base_url;?>/registration_admin">Create Admin Account</a></li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</div>
				</div>
		</nav>
		
		
		
						
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<div class="head-logo">
					<a href="<?php print $base_url;?>/admin_panel" >	<img src="<?php print $fullurl; ?>/images/logo.png " class="logo"></a>
					</div>
					
					<ul class="nav nav-pills nav-stacked">
						
						<li ><a  class="top-title" href="<?php print $base_url;?>/admin_panel">DASHBOARD</a></li>
						<li><a  class="top-title" href="#">NEW ENTRY</a>
								<ul >
								<li><a class="fisrt-link"href="<?php print $base_url;?>/preferance">Preferences</a></li> 
								<li><a class="fisrt-link" href="<?php print $base_url;?>/add_artist">Add New Artist</a></li>
							
							</ul>
						</li>
						<li><a class="top-title" href="#">REPORTS</a>
							<ul >
								<li><a class="fisrt-link"href="<?php print $base_url;?>/artist/income">Income</a></li>
								<li><a class="fisrt-link"href="<?php print $base_url;?>/subscriber-info">Subscribers</a></li>
								<li><a class="fisrt-link" href="<?php print $base_url;?>/artist-info">Artist</a></li>
								
							
							</ul>
						</li>
								<li><a class="top-title" href="#">APPROVAL</a>
							<ul >
								<li><a class="fisrt-link"href="<?php print $base_url;?>/artist-approval">Artist Infotainment </a></li>
								
								<?php if  ($cuser->uid == 163) { ?>
								<li><a class="fisrt-link"href="<?php print $base_url;?>/registration_admin">Admin Registration</a></li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</div>
				
				  <div class="navbar-form pull-right"  id="logout-op-admin">
							<div class="navbar-items"><img src="<?php print $url; ?>" class="img-profile img-circle " align="left"/>
							<div id="username-profile"><?php print $cuser->name; ?></div></div>
						
							<div class="btn-group pull-right">
								
								<button type="button" class="btn btn-info dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="caret"></span>
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<ul class="dropdown-menu log-menu-list-mb">
									<li><a href="<?php print $base_url; ?>/user">My Account</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="<?php print $base_url; ?>/user/logout">Log out</a></li>
									
									
									
								</ul>
							</div>
							
						
							
						</div>
					
					
					
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h2 class="page-header">ADMIN CONTROL PANEL</h2>
					<?php
						$subs_query = db_select('musicbox_subscriber_account', 'p');
						$subs_query->condition('p.substatus', 1, '='); 
						
						$subs_query->addExpression('COUNT(p.subscriber_uid)');
						$subs_count = $subs_query->execute()->fetchField();
						
						?>
					
					<div class="row placeholders ">
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 border-right">
							<div class="top-well ">
								<div class="row ">
									<div class="col-xs-3 thumbnail-img">
										<img src="<?php print $fullurl; ?>/images/icon2.png" width="45" height="35" class="img-responsive" alt="Generic placeholder thumbnail">
										
									</div>
									<div class="col-xs-9 ">
										
										<div class="small-header">SUBSCRIBERS</div>
										<div class="huge"><?php print $subs_count; ?></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 border-right">
							<div class="top-well ">
								<div class="row ">
									<div class="col-xs-3 thumbnail-img">
										<img src="<?php print $fullurl; ?>/images/artist.png" width="45" height="35" class="img-responsive" alt="Generic placeholder thumbnail">
										
									</div>
									<div class="col-xs-9 ">
										<?php 
	  
										
							        $artist_query = db_select('profile', 'a');
									$artist_query->condition('a.type', 'artist','=');
									$artist_query->addExpression('COUNT(a.uid)');
									$artist_count = $artist_query->execute()->fetchField();
									?>
										<div class="small-header">ARTIST</div>
										<div class="huge"><?php print $artist_count; ?></div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 ">
							<div class="top-well">
								<div class="row">
									<div class="col-xs-3 thumbnail-img">
										<img src="<?php print $fullurl; ?>/images/income.png" width="45" height="35" class="img-responsive" alt="Generic placeholder thumbnail">
										
									</div>
									<div class="col-xs-9 ">
										
										<div class="small-header">INCOME</div>
										<div class="huge">85,875</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<h4 class="page-subheader">APPROVAL</h4>
					
					
					<div class="row placeholders panel-section">
						
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<div class="top-well ">
								<a href="<?php print $base_url;?>/artist-approval" ><button type="button" class="btn btn-warning btn-for-item">Artist Infotainment</button></a>
							</div>
							
						</div>
						<?php if  ($cuser->uid == 163) { ?>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<div class="top-well ">
								<a href="<?php print $base_url;?>/registration_admin" ><button type="button" class="btn btn-warning btn-for-item">Admin Registration</button></a>
							</div>
							
						</div><?php } else { ?>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							
							
						</div><?php } ?>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							
							
						</div>
							<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							
							
						</div>
					</div>
					<h4 class="page-subheader">NEW ENTRY</h4>
					
					
					<div class="row placeholders panel-section">
						
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<div class="top-well ">
								<a href="<?php print $base_url;?>/add_artist" target="_blank"><button type="button" class="btn btn-warning btn-for-item">New Artist</button></a>
							</div>
							
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							
							
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							
							
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							
							
						</div>
					</div>
					
					
					<h4 class="page-subheader">REPORTS</h4>
					
					
					<div class="row placeholders panel-section">
						
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<div class="top-well ">
								<a href="<?php print $base_url;?>/artist/income" target="_blank"><button type="button" class="btn btn-warning btn-for-item">Income</button></a>
							</div>
							
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<div class="top-well ">
								<a href="<?php print $base_url;?>/subscriber-info" target="_blank"><button type="button" class="btn btn-warning btn-for-item">Subscribers</button></a>
							</div>
							
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							<div class="top-well ">
								<a href="<?php print $base_url;?>/artist-info" target="_blank"><button type="button" class="btn btn-warning btn-for-item">Artist</button></a>
							</div>
							
						</div>
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
							
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
			
			<!-- Bootstrap core JavaScript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			
            <script src="<?php print $fullurl; ?>/js/jquery.min.js"></script>
			<script src="<?php print $fullurl; ?>/js/bootstrap.min.js"></script>
			
			
		</body>
	</html>
