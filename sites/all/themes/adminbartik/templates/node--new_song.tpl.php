
<?php
global $base_url;
$themePath = drupal_get_path('theme', 'adminbartik');
$fullurl = $base_url.'/'.$themePath;


?>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		
		
		<title>Musicbox - Songs </title>
		
		<!-- Bootstrap core CSS -->
		<link href="<?php print $fullurl; ?>/css/bootstrap.css" rel="stylesheet">
		
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		
		<!-- Custom styles for this template -->
		<link href="<?php print $fullurl; ?>/css/style.css" rel="stylesheet">
		
		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
		
		
	</head>
	
	<body>
		
		  <?php 
  global $user;
  global $base_url;
$cuser = user_load($user->uid);
$image_fid = $cuser->picture->fid;
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
								<li><a class="top-title" href="#">APPROVAL</a>
							<ul >
								<li><a class="fisrt-link"href="<?php print $base_url;?>/artist-approval">Artist's Story</a></li>
								
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
								<li><a class="top-title" href="#">APPROVAL</a>
							<ul >
								<li><a class="fisrt-link"href="<?php print $base_url;?>/artist-approval">Artist's Story</a></li>
								
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
				<h2 class="page-header">SONG - <?php print $node->title;?></h2>
					
					
					<div class="row placeholders">
						<div class="col-xs-12 col-sm-12	">
						
								
								
								
								<div class="row placeholder panel-section">
									
									<div class="col-sm-4">
										
										
											<label class="control-label " >Song Title : </label>
											
											<div class="info-box"><?php print $node->title;?>
										
										
									</div>
									
								</div>
								
									<div class="col-sm-4">
										
											<?php $art_uid = $node->field_song_artist['und'][0]['uid'];
											      $artist = profile2_load_by_user($art_uid , $type_name = 'artist') ;
												  
												  
												  
												  ?>
											<label class="control-label"> Artist : </label>
												<div class="info-box"><?php print $artist->field_artist_stage_name['und'][0]['value'];?></div>
										
									</div>
									<div class="col-sm-4">
										
											<label class="control-label"> Mood : </label>
											<?php if(sizeof($node->field_song_mood['und'])==1){?>
											<div class="info-box">											
											<?php

	$mood = $node->field_song_mood['und'];
	foreach ($mood as $key=>$mval){ 
	$mood_val = $mval['value'];
    $songsmoods = entity_load('field_collection_item', array($mood_val));
	foreach ($songsmoods as $key=>$moodvalu) { 
	
	$moodTerm = taxonomy_term_load($moodvalu->field_moods_select['und'][0]['tid']);
	print $moodTerm->name;										
											
	}
											}
											
									}		
											 else if(sizeof($node->field_song_mood['und'])>1){
												
$mood = $node->field_song_mood['und'];
	foreach ($mood as $key=>$mval){ 
	$mood_val = $mval['value'];
    $songsmoods = entity_load('field_collection_item', array($mood_val));
	foreach ($songsmoods as $key=>$moodvalu) { 
	
	$moodTerm = taxonomy_term_load($moodvalu->field_moods_select['und'][0]['tid']);?>
										
											
	<div class="info-box"><?php print $moodTerm->name;	?></div>
	
	<?php }}}?>

											
											
										
									</div>
									</div>
								</div>
								
								
							
									
							
								
								<h4 class="page-subheader">SONG</h4>
								<div class="row placeholder  panel-section">
									<div class="col-sm-12">
									
											
											<?php 
											 $song_file = file_load($node->field_song_upload['und'][0]['fid']);
											 $song_uri = $song_file->uri;
                                             $song_url = file_create_url($song_uri);
											 
											 if(isset($node->field_song_image['und'][0]['fid'])){
												$image_file = file_load($node->field_song_image['und'][0]['fid']);
																	}
												else{
												$image_file = file_load(161);
												}
												$image_uri = $image_file->uri;
												$image_url = file_create_url($image_uri);
											?>
											
											<img src="<?php print $image_url; ?>" class="songblock-img" />
											<audio controls preload="metadata" 	id="audiocontrols" controlsList="nodownload">
											<source src="<?php print $song_url; ?>" type="audio/mp3"></audio>
											
										
										
									</div>
									
									
								</div>
								
								</div>
								
								<h4 class="page-subheader">VIDEO</h4>
								<div class="row placeholder  panel-section"><div class="col-sm-12">
							<?php	
   
	$video_url = $node->field_music_video['und'][0]['video_url'];
	

$artist = user_load($node->field_song_artist['und'][0]['uid']);
   $artist_name = $artist->name;	

$search     = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
$replace    = "youtube.com/embed/$1";    
$you_turl = preg_replace($search,$replace,$video_url);
$you_vi_img = file_create_url($node->field_music_video['und'][0]['thumbnail_path']);

    if(isset($node->field_music_video['und'][0]['video_url'])){
		
   ?>
														<div class="col-sm-6">
															  <img width="50%" src="<?php print $you_vi_img; ?>" class="video" data-video="<?php print $you_turl; ?>" data-toggle="modal" data-target="#videoModal"/>
															<h5 class="video-name"><?php print $node->title; ?> </h5><h6 class="video-name-artist">Song by <?php print $artist_name; ?></h6>
															
															
	</div><?php } ?>
								</div></div>
								
								
								
							
									
								
								
								</div>
					
					</div>
					
					
				</div>
			</div>
		
			<!-- Bootstrap core JavaScript
			================================================== -->
			<!-- Placed at the end of the document so the pages load faster -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
			<script src="js/bootstrap.min.js"></script>

</html>
