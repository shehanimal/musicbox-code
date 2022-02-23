<?php 
global $base_url;
$modulePath = drupal_get_path('module', 'musicbox_preference_page_config');

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
		<link rel="icon" href="../../favicon.ico">
		
		<title>Musicbox - Preferences</title>
		
		<!-- Bootstrap core CSS -->
		<link href="<?php print $fullurl; ?>/css/bootstrap.css" rel="stylesheet">
		
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		
		<!-- Custom styles for this template -->
		<link href="<?php print $fullurl; ?>/css/preference.css" rel="stylesheet">
		
		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->
		
		
	</head>
	
	<body>
		
		<nav class="navbar navbar-inverse visible-xs">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					
					<div class="head-logo">
					<a href="<?php print $base_url;?>" target="_blank">	<img src="<?php print $fullurl;?>/images/logo.png " class="logo pull-left" > </a>
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
									<li><a href="<?php print $base_url; ?>/user">My Account</a></li>
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
								<li><a class="fisrt-link" href="<?php print $base_url;?>/add_artist">Add New Artist</a></li>
								<li><a class="fisrt-link" href="<?php print $base_url;?>/node/add/new-song">Add New Song </a></li>
								<li><a class="fisrt-link" href="<?php print $base_url;?>/node/add/events-publisher">Add New Event</a></li>
							</ul>
						</li>
						<li><a class="top-title" href="#">REPORTS</a>
							<ul >
								<li><a class="fisrt-link"href="<?php print $base_url;?>/artist/income">Income</a></li>
								<li><a class="fisrt-link"href="<?php print $base_url;?>/subscriber-info">Subscribers</a></li>
								<li><a class="fisrt-link" href="<?php print $base_url;?>/artist-info">Artist</a></li>
								<li><a class="fisrt-link"href="<?php print $base_url;?>/songs">Albumbs/ Songs</a></li>
								<li><a class="fisrt-link"href="<?php print $base_url;?>/preferance">Preferences</a></li>
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
					<a href="<?php print $base_url;?>" target="_blank">	<img src="<?php print $fullurl; ?>/images/logo.png " class="logo"></a>
					</div>
					
					<ul class="nav nav-pills nav-stacked">
						
						<li ><a  class="top-title" href="<?php print $base_url;?>/admin_panel">DASHBOARD</a></li>
						<li><a  class="top-title" href="#">NEW ENTRY</a>
							<ul >
								<li><a class="fisrt-link" href="<?php print $base_url;?>/add_artist">Add New Artist</a></li>
								<li><a class="fisrt-link" href="<?php print $base_url;?>/node/add/new-song">Add New Song </a></li>
								<li><a class="fisrt-link" href="<?php print $base_url;?>/node/add/events-publisher">Add New Event</a></li>
							</ul>
						</li>
						<li><a class="top-title" href="#">REPORTS</a>
							<ul >
								<li><a class="fisrt-link"href="<?php print $base_url;?>/artist/income">Income</a></li>
								<li><a class="fisrt-link"href="<?php print $base_url;?>/subscriber-info">Subscribers</a></li>
								<li><a class="fisrt-link" href="<?php print $base_url;?>/artist-info">Artist</a></li>
								<li><a class="fisrt-link"href="<?php print $base_url;?>/songs">Albumbs/ Songs</a></li>
								<li><a class="fisrt-link"href="<?php print $base_url;?>/preferance">Preferences</a></li>
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
					<h2 class="page-header">LABEL CONTROL PANEL</h2>
					
					
					<div class="row placeholders ">
						<div class="col-xs-6 col-sm-3 border-right">
							<div class="top-well ">
								<div class="row ">
									<div class="col-xs-3 thumbnail-img">
										<img src="<?php print $fullurl; ?>/Images/icon2.png" width="45" height="35" class="img-responsive" alt="Generic placeholder thumbnail">
										
									</div>
									<div class="col-xs-9 ">
										
										<div class="small-header">SUBSCRIBERS</div>
										<div class="huge">253,556</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-3 border-right">
							<div class="top-well ">
								<div class="row ">
									<div class="col-xs-3 thumbnail-img">
										<img src="<?php print $fullurl; ?>/Images/artist.png" width="45" height="35" class="img-responsive" alt="Generic placeholder thumbnail">
										
									</div>
									<div class="col-xs-9 ">
										
										<div class="small-header">ARTIST</div>
										<div class="huge">86</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-3 border-right">
							<div class="top-well ">
								<div class="row">
									<div class="col-xs-3 thumbnail-img">
										<img src="<?php print $fullurl; ?>/Images/songs.png" width="45" height="35" class="img-responsive" alt="Generic placeholder thumbnail">
									</div>
									<div class="col-xs-9">
										
										<div class="small-header">SONGS</div>
										<div class="huge">860</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-3 ">
							<div class="top-well">
								<div class="row">
									<div class="col-xs-3 thumbnail-img">
										<img src="<?php print $fullurl; ?>/Images/income.png" width="45" height="35" class="img-responsive" alt="Generic placeholder thumbnail">
										
									</div>
									<div class="col-xs-9 ">
										
										<div class="small-header">INCOME</div>
										<div class="huge">6,338,900</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<h2 class="page-header">PREFERENCES</h2>
					<div class="row">
					<div class="col-md-6 border-right">
					<h4 class="page-subheader">CREATE RANKS</h4>
						<form class="form-horizontal form-alignment">
								
								
								
				<?php
                    $block2 = module_invoke('musicbox_preference_page_config', 'block_view', 'rank_update_block');
	                 
                  print render($block2['content']);?>
								</form>
								
								<h4 class="page-subheader">NEW SUBSCRIPTION</h4>
										<div class="table-responsive"> 
								<table class="table  table-hover">
									<thead>
										<tr>
											<th>Firstname</th>
											<th>Lastname</th>
											<th>Email</th>
											<th>Firstname</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>John</td>
											<td>Doe</td>
											<td>john@example.com</td>
											<td>John</td>
										</tr>
										<tr>
											<td>Mary</td>
											<td>Moe</td>
											<td>mary@example.com</td>
											<td>John</td>
										</tr>
										<tr>
											<td>July</td>
											<td>Dooley</td>
											<td>july@example.com</td>
											<td>John</td>
										</tr>
									</tbody>
								</table>
								

							</div>
					</div>
					
					<div class="col-md-6">
					<h4 class="page-subheader">LABEL CONTROL PANEL</h4>
					<form class="form-horizontal form-alignment">
								
								
								
								<div class="row placeholder panel-section">
									
									<div class="col-sm-12">
										
										<div class="form-group">
											<label class="control-label " >Artist</label>
											
											<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
											
										</div>
									</div>
									<div class="col-sm-12">
										
										<div class="form-group">
											<label class="control-label " >Artist</label>
											
											<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
											
										</div>
									</div>
									<div class="col-sm-12">
										
										<div class="form-group">
											<label class="control-label " >Artist</label>
											
											<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
											
										</div>
									</div>
									
								</div>
									<div class="row placeholders">
								<div class="col-sm-12">
									<button type="submit" class="btn btn-primary">Save</button>
								
									
								
							</div>
						</div>
								</form>
								<h4 class="page-subheader">LABEL CONTROL PANEL</h4>
										<div class="table-responsive"> 
								<table class="table  table-hover">
									<thead>
										<tr>
											<th>Firstname</th>
											<th>Lastname</th>
											<th>Email</th>
											<th>Firstname</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>John</td>
											<td>Doe</td>
											<td>john@example.com</td>
											<td>John</td>
										</tr>
										<tr>
											<td>Mary</td>
											<td>Moe</td>
											<td>mary@example.com</td>
											<td>John</td>
										</tr>
										<tr>
											<td>July</td>
											<td>Dooley</td>
											<td>july@example.com</td>
											<td>John</td>
										</tr>
									</tbody>
								</table>
								

							</div>
					</div>
					</div>
					
				</div>
			</div>
			</div>
			
			<!-- Bootstrap core JavaScript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
			<script src="<?php print $fullurl; ?>/js/bootstrap.min.js"></script>
			
			
		</body>
	</html>
