
<?php
global $base_url;
$themePath = drupal_get_path('theme', 'adminbartik');
$fullurl = $base_url.'/'.$themePath;
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		
		
		<title>Dashboard - Artist</title>
		
		<!-- Bootstrap core CSS -->
		<link href="<?php print $fullurl; ?>/css/bootstrap.css" rel="stylesheet">
		
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		
		<!-- Custom styles for this template -->
		<link href="<?php print $fullurl; ?>/css/styleadmin.css" rel="stylesheet">
		
		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->
		
		
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
					<a href="<?php print $base_url;?>/admin_panel">		<img src="<?php print $fullurl;?>/images/logo.png " class="logo pull-left" > </a>
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
					<a href="<?php print $base_url;?>/admin_panel">	<img src="<?php print $fullurl; ?>/images/logo.png " class="logo"></a>
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
	<h2 class="page-header">Artist</h2>
	
                   <?php  $block1 = module_invoke('views', 'block_view', '-exp-artist_info-page');
	                
                 print render($block1['content']);?>
				 <div class="table-responsive">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">


   <?php if (!empty($title) || !empty($caption)) : ?>
     <caption><?php print $caption . $title; ?></caption>
  <?php endif; ?>
  <?php if (!empty($header)) : ?>
    <thead>
      <tr>
        <?php foreach ($header as $field => $label): ?>
          <th <?php if ($header_classes[$field]) { print 'class="'. $header_classes[$field] . '" '; } ?> scope="col">
            <?php print $label; ?>
          </th>
        <?php endforeach; ?>
      </tr>
    </thead>
  <?php endif; ?>
  <tbody>
    <?php foreach ($rows as $row_count => $row): ?>
      <tr <?php if ($row_classes[$row_count]) { print 'class="' . implode(' ', $row_classes[$row_count]) .'"';  } ?>>
        <?php foreach ($row as $field => $content): ?>
          <td <?php if ($field_classes[$field][$row_count]) { print 'class="'. $field_classes[$field][$row_count] . '" '; } ?><?php print drupal_attributes($field_attributes[$field][$row_count]); ?>>
            <?php print $content; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
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

		
		</body>
</html>
