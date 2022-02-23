<?php 
global $base_url;
$modulePath = drupal_get_path('module', 'musicbox_custome_artist');

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
		
		<title>Musicbox - Add Artist</title>
		
		<!-- Bootstrap core CSS -->
		<link href="<?php print $fullurl; ?>/css/bootstrap.css" rel="stylesheet">
		
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		
		<!-- Custom styles for this template -->
		<link href="<?php print $fullurl; ?>/css/dashboard.css" rel="stylesheet">
		
		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
		
		
	</head>
	
	<body>
			  <?php 
  global $user;
  global $base_url;
$cuser = user_load(arg(1));
if(isset($image_fid)){
$image_fid = $cuser->picture->fid;
}else{
	$image_fid = 569;
	
}

$file = file_load($image_fid);

	
    $uri = $file->uri;
	
    $url = file_create_url($uri);
		
		//---------------------------------------------------------
		
		$artist = user_load($cuser->uid);
	$artist_profile = profile2_load_by_user($artist->uid, $type_name = 'artist') ;
	
	
		
	if(isset($artist_profile->field_artist_profile_picture['und'][0]['fid']))	{
	$file = file_load($artist_profile->field_artist_profile_picture['und'][0]['fid']);
    $arturi = $file->uri;
    $arturl = file_create_url($arturi);
		
	}else if(isset($cuser->picture->fid)){
			$fid = $cuser->picture->fid;
					$file = file_load($fid);
		
		
		$uri = $file->uri;
		
		$arturl = file_create_url($uri);
	}else{
			$fid = 532;
					$file = file_load($fid);
		
		
		$uri = $file->uri;
		
		$arturl = file_create_url($uri);
		}
		
		
		
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
						<img src="<?php print $fullurl; ?>/images/logo.png " class="logo">
					</div>
				</div>
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
						<img src="<?php print $fullurl; ?>/images/logo.png " class="logo">
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
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h2 class="page-header">ADD ARTIST PROFILE PICTUER</h2>
					
					
					<div class="row placeholders">
						<div class="col-xs-12 col-sm-12	">
					<div class="col-xs-12 col-sm-12	">
								<div class="row placeholder panel-section">
							<div class="col-sm-6">	<div class="custom-file">
									<center>	<label class="custom-file-label" ><img src="<?php print $arturl;?>" width="100%"  class="img-responsive profile-pic" id="profile-pic" alt="Generic placeholder thumbnail"
										>
										</label></center>
											<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 uploadinfo" >
											
											
							</div></div>
							
							<button type="submit" class="btn btn-primary create" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ADD Profile Pictuer</button>
										
											
											
						</div></div>
							
						</div>
					</div>
				

					
				</div>
			</div>
							  <!-- Modal -->
								  	<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content editpro">
				<div class="modal-header">
					<button type="button" class="close closeb" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body">
					
						<div class=" uploadinfo" ><center>
						<?php $block2=module_invoke( 'musicbox_artist_dashboard', 'block_view', 'artist_profile_pic_update'); 
						if ($block2[ 'content']){ print render($block2[ 'content']);} ?> </center>
						
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
				<script>
				
				
				var message="";
				var image;
				
				function readURL() 
				{
					
					var imgs="profile-pic";
					
					
					if (this.files && this.files[0])
					{
						var obj = new FileReader();
						file = this.files[0];
						
						
						
								obj.onload=function(data)
								{
									image = document.getElementById(imgs);
									image.src =data.target.result;
									//	image.style.display="block";
								}
								obj.readAsDataURL(this.files[0]);
					}
							
			
				}
			</script>

		</body>
</html>