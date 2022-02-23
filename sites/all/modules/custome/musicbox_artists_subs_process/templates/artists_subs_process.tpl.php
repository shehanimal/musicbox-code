<?php 
	global $user;
	global $base_url;
	$cuser=user_load($user->uid); 
	$modulePath = drupal_get_path('module', 'musicbox_artists_subs_process');
	
	$fullurl = $base_url.'/'.$modulePath;
	
	$decodearr =  base64_decode(arg(2));
	$arr = json_decode($decodearr, true);
	
	//print_r($arr);exit;
	if (arg(1)== 1) {
		$home = 'infortainment';
		
	}
	else if(arg(1)== 2){
		$home = 'infortainment';
	}
	
?>




<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>SUBSCRIBE</title>
				<link rel="shortcut icon" type="image/x-icon" href="<?php print $fullurl; ?>/images/favicon.ico" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/bootstrap.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/chechbox.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/subs_process.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/footer.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/top-bar.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/container.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
		<script src="<?php print $fullurl;?>/js/jquery.min.js"></script>
		<script src="<?php print $fullurl;?>/js/bootstrap.min.js"></script>
		
		
		
	</head>
	
	<body>
		
		<div class="container mobile-container " style=" height:100vh;background-color:#2d2a2a;">
			
			<div class="text-center" style="height:6vh; background-color:#fff;">
				  <a href="<?php print $base_url; ?>/infortainment"><i class="fa fa-home" aria-hidden="true"></i></a><label class="name-activate2">MUSIC BOX</label>
				<div class="dropdown" style="float:right;">
					<button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
					<i class="fa fa-align-justify"></i></button>
					
						<?php if (arg(1)== 1) { ?>
							<ul class="dropdown-menu css-menuc">
						    <li><a href="<?php print $base_url; ?>/welcome_home/<?php print $cuser->uid; ?>" >Home</a></li>
							<li><a href="<?php print $base_url; ?>/welcome_subscrib/<?php print $cuser->uid; ?>" class="active menucolor">Subscribe</a></li>
					        <li><a href="<?php print $base_url; ?>/welcome_profile/<?php print $cuser->uid; ?>">My Profile</a></li>
							<li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
					
					
							</ul>
							<?php } else if(arg(1)== 2){ ?>
							<ul class="dropdown-menu">
							<li><a href="<?php print $base_url; ?>/process_home/<?php print $user->uid; ?>">Home</a></li>
							
							<li><a href="<?php print $base_url; ?>/process_unsubs/<?php print $user->uid; ?>">Unsubscribe</a></li>
							<li><a href="<?php print $base_url; ?>/process_prof/<?php print $user->uid; ?>">My Profile</a></li>
							<li><a href="<?php print $base_url; ?>/process_logout/<?php print $user->uid; ?>">Logout</a></li>
							</ul>
						<?php } ?>
					
					
				</div>
			</div>
		
			<div class="new-inner" style="background-color: #2d2a2a;">
				
				<div class="row  row-title">
					<div class="col-lg-4 col-md-4  col-sm-6 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-2">
						<div class="text-center  ">
							<div class="text-center artist" style="height:5vh;">
								<center>
								<h6  class="upload-st">SUBSCRIPTION PROCESSS</h6></center>
							</div>
							
						</div>
					</div>
					
				</div>
				
				
				
				
				
				
				<?php if (arg(1)== 1) { ?>
					
					
					
					
					
					<div class="main-title">
						<?php
										
							$bundleid = $arr['bundleid'];
							$term = taxonomy_term_load($bundleid);
						?>
						<h2 class="upload-st text-center ">You have selected "<strong> <?php print $term->name; ?>  </strong>" </h2>
						
					</div>	
					
					
					
					<hr>
					
					
					
					
					<!-- <div class="artist-select">
						<label>Artist Selection:</label>
					</div> -->
					<h2 class="upload-st text-center ">Included  Artists </h2>
					<div class="scrollbar-Subscription" id="style-Subscription-scroll">
						<div class="force-overflow-Subscription">
							<div class="panel panel-default panelnew">
								<div class="panel-body ">
									<div class="row">
										
										<?php 
											
											
												$query1 = db_select('profile', 'p');
    $query1->fields('p', array('uid', 'pid', ));
	$query1->distinct();
	$query1->join('field_data_field_artist_related_bundle', 'r', 'p.pid = r.entity_id');
	$query1->join('field_data_field_artist_stage_name', 's', 'p.pid = s.entity_id');
	$query1->condition('p.type', 'artist','='); 
	$query1->condition('r.field_artist_related_bundle_tid', $bundleid,'='); 
	$query1->orderBy('s.field_artist_stage_name_value', 'ASC');
		$result1 = $query1->execute()->fetchAll();
											foreach ($result1 as $artist) {
												
												
												$artist = user_load($artist->uid);
												$artist_profile = profile2_load_by_user($artist->uid, $type_name = 'artist') ;
												$artistname = $artist_profile->field_artist_name['und'][0]['value'];
												$file = file_load($artist_profile->field_artist_profile_picture['und'][0]['fid']);
												$uri = $file->uri;
												$url = file_create_url($uri);
												
												
												
											?>
											
											
											<div class="col-md-3 col-xs-6 col-sm-4 col-lg-4">
												<center><div class="circular--portrait "><img src="<?php print $url; ?>"  class=" circle "></div>
													
												<div class="caption text-center"><?php print $artistname; ?></div></center>
											</div>
											
										<?php } ?>
										
										
										
										
										
										
										
										
										
										
									</div>
								</div>
								
							</div> 
							
						</div> 
						
					</div> 
					
					
					
					
					
					
					
					
					<form action="<?php print $base_url; ?>/sendig_data" method="post" onsubmit="return checkall();">
						<center>  <input type="text" name="sub-mobile" id="someText" placeholder="Enter mobile number">
						
							<?php if(isset($name_error)){?>
							<span><?php echo $name_error; ?></span><?php } ?>
							<br>
							<?php $packageid = _get_package_values($bundleid); ?>
							
							
							<input type="text" name="bundleid" class="artistlist" value="<?php print $bundleid;?>">
							<input type="text" name="packid" class="artistlist" value="<?php print $packageid;?>"><br>
							<input type="text" name="subid" class="artistlist" value="<?php print $arr['sub_id'];?>"><br>
							
							
						<input type="submit" id="submit_button" class="btn btn-default"name="submit_form" value="SIGN ME UP!"></center>
						
						
						
						<script type="text/javascript">
							
							$(function(){
								$("#submit_button").click(function(){
									var someText = $("#someText").val();
									$.post("/handle_ajax.php",{someText:someText},function(resp){
										if(resp !== "OK"){
											alert("ERROR OCCURED "+resp)
										}
									});
								});
							});
							
						</script>
						
						
						
						
						
					</form>			
					
					
					
					
					
					
					
					
					<?php } else if (arg(1)== 2) { ?>
					
					
                    
					
					
					
					
					<div class="main-title">
						<?php
										
							$bundleid = $arr['bundleid'];
							$term = taxonomy_term_load($bundleid);
						?>
						<h2 class="upload-st text-center ">You have selected "<strong> <?php print $term->name; ?>  </strong>" </h2>
						
					</div>	
					
					
					
					<hr>
					
					
					
					
					<!-- <div class="artist-select">
						<label>Artist Selection:</label>
					</div> -->
					<h2 class="upload-st text-center ">Selected Artists </h2>
					<div class="scrollbar-Subscription" id="style-Subscription-scroll">
						<div class="force-overflow-Subscription">
							<div class="panel panel-default panelnew">
								<div class="panel-body ">
									<div class="row">
										
													<?php 
											
											
												$query1 = db_select('profile', 'p');
    $query1->fields('p', array('uid', 'pid', ));
	$query1->distinct();
	$query1->join('field_data_field_artist_related_bundle', 'r', 'p.pid = r.entity_id');
	$query1->join('field_data_field_artist_stage_name', 's', 'p.pid = s.entity_id');
	$query1->condition('p.type', 'artist','='); 
	$query1->condition('r.field_artist_related_bundle_tid', $bundleid,'='); 
	$query1->orderBy('s.field_artist_stage_name_value', 'ASC');
		$result1 = $query1->execute()->fetchAll();
											foreach ($result1 as $artist) {
												
												
												$artist = user_load($artist->uid);
												$artist_profile = profile2_load_by_user($artist->uid, $type_name = 'artist') ;
												$artistname = $artist_profile->field_artist_name['und'][0]['value'];
												$file = file_load($artist_profile->field_artist_profile_picture['und'][0]['fid']);
												$uri = $file->uri;
												$url = file_create_url($uri);
												
												
												
											?>
											
											
											<div class="col-md-3 col-xs-6 col-sm-4 col-lg-4">
												<center><div class="circular--portrait "><img src="<?php print $url; ?>"  class=" circle "></div>
													
												<div class="caption text-center"><?php print $artistname; ?></div></center>
											</div>
											
										<?php } ?>
										
										
										
										
										
										
										
										
										
										
										
										
									</div>
								</div>
								
							</div> 
							
						</div> </div> 
						
						
						
						<form action="<?php print $base_url; ?>/sendig_data_change" method="post">
							<center>  <input type="text" name="sub-mobile" hidden value="<?php print $arr['phone_num'];?>"><br>
							<input type="text" name="bundleid" class="artistlist" value="<?php print $bundleid;?>">
								<input type="text" name="packid" class="artistlist" value="<?php print $arr['pack_id'];?>"><br>
								<input type="text" name="subid" class="artistlist" value="<?php print $arr['sub_id'];?>"><br>
								
								<br>
								
							<input type="submit" class="btn btn-default"name="submit_form" value="SIGN ME UP FOR NEW PACKAGE!"></center>
							
						</form>
						
						
						
						
						
						
						
						
						
						
						
						
				<?php } ?>    
				</div>	<footer>
				<div class="container">
					<img src="<?php print $fullurl; ?>/images/logo.png" class="logo-img pull-left">
					<img src="<?php print $fullurl; ?>/images/dialog.png" class="service pull-right">
				</div>
			</footer></div>
			
			
			
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