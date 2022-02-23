<?php 
	global $base_url;
	$modulePath = drupal_get_path('module', 'musicbox_artist_income_report');
	
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
		
		<title>Musicbox -INCOME REPORT</title>
		
		<!-- Bootstrap core CSS -->
		<link href="<?php print $fullurl; ?>/css/bootstrap.css" rel="stylesheet">
		
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		
		<!-- Custom styles for this template -->
		<link href="<?php print $fullurl; ?>/css/artistreport.css" rel="stylesheet">
		
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
						<a href="<?php print $base_url;?>/admin_panel">	<img src="<?php print $fullurl;?>/images/logo.png " class="logo pull-left" > </a>
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
						<a href="<?php print $base_url;?>/admin_panel">		<img src="<?php print $fullurl; ?>/images/logo.png " class="logo"></a>
					</div>
					
					<ul class="nav nav-pills nav-stacked">
						
						<li ><a  class="top-title" href="<?php print $base_url;?>/admin_panel">DASHBOARD</a></li>
						<li><a  class="top-title" href="#">NEW ENTRY</a>
							<ul >
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
							<h2 class="page-header">ARTIST INCOME REPORT</h2>
							<div class="table-responsive"> 
							<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
							<tr>
							
							<th>NAME</th>
							<th>RANK</th>
							<th>Number of Days</th>
							<th>INCOME %</th>
							<th>SUBSCRIBERS</th>
							<th>START DATE</th>
							<th>INCOME</th>
							</tr>
							</thead>
							<tfoot>
							<tr>
						    <th>NAME</th>
							<th>RANK</th>
							<th>Number of Days</th>
							<th>INCOME %</th>
							<th>SUBSCRIBERS</th>
							<th>START DATE</th>
							<th>INCOME</th>
							</tr>
							</tfoot>
							<tbody>
							<?php 
							$query1 = db_select('profile', 'p');
							$query1->fields('p', array('uid', 'pid', ));
							$query1->condition('p.type', 'artist','='); 
							$result1 = $query1->execute();  
							
							while ($record1 = $result1->fetchAssoc()) {	  
							
							$artist = user_load($record1["uid"]);
							
							$artist_profile = profile2_load_by_user($artist->uid, $type_name = 'artist') ;
							?>
							<tr>
							
							<td><?php print $artist->name;?></td>
							<td><?php $term = taxonomy_term_load($artist_profile->field_artist_rank['und'][0]['tid']); 
							print $term->name; ?></td>
							<td><?php print $term->field_amount_of_rating['und'][0]['value']; ?></td>
							<td><?php print $artist_profile->field_artist_precentage['und'][0]['value'];?>%</td>
							<td><?php $numofsub = _numbert_of_subs_for_arti($artist->uid);
							print $numofsub;
							?></td>
							<td><?php 
							$timestap_start = $artist->created;
							$date_create = format_date($timestap_start, $type = 'medium', $format = '', $timezone = NULL, $langcode = NULL);
							print $date_create;
							?></td>
							<td><?php 
							//$income = _get_total_amount($artist->uid);
							$query = db_select('musicbox_incom', 'n');
$query->addExpression('SUM(artist_income)', 'total');
$query->condition('n.artist_uid', $artist->uid, '=');
$result = $query->execute();
$result = $result->fetchField();
							print $result;
							?></td>
							</tr>
							<?php } ?>
							
							</tbody>
							</table>
							</div>
							
							
							
							
							
							
							
							
							
							
							
							</div></div></div>
							
							
							
							<!-- Placed at the end of the document so the pages load faster -->
							<script src="<?php print $fullurl; ?>/js/jquery.min.js"></script>
							<script src="<?php print $fullurl;?>/js/bootstrap.min.js"></script>
							
							
							
							</body>
							</html>
														