<?php 
	global $user;
	global $base_url;
	$cuser=user_load($user->uid);
	$modulePath = drupal_get_path('module', 'musicbox_add_more_artists');
	
	$fullurl = $base_url.'/'.$modulePath;

//print '<pre>';
//	print_r($result1);
	//print $user_object[0]->name; 
	//print '</pre>';
//exit;
?>




<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>ADD MORE</title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php print $fullurl; ?>/images/favicon.ico" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/bootstrap.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/chechbox.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/addmore.css">
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
						
						
						
						<li><a href="<?php print $base_url; ?>/infortainment">Home</a></li>
						<li><a href="<?php print $base_url; ?>/add_more" class="active menucolor">Add More Artist</a></li>
						
						<li><a href="<?php print $base_url; ?>/unsubscribe">Unsubscribe</a></li>
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
								<h6  class="upload-st">SELECT MORE ARTIST</h6></center>
							</div>
							
						</div>
					</div>
					
				</div>
				
				<div class="row rowheight">
					
					<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
						
						
						
						
						<div class="container">
							
							<div class="row">
								
								<div class="col-md-12">
									
									
									
									<form action="<?php print $base_url;?>/more_artists" method="post">
										<div class="scrollbar-Subscription" id="style-Subscription-scroll">
											<div class="force-overflow-Subscription">
												<div class="panel panel-default panelnew">
													<div class="panel-body">
														<div class="row">
															
															<?php		
																$package_id = _get_currently_updated_package($cuser->uid); 
																
																
																$package_term = taxonomy_term_load($package_id);
																if($package_id == 10)  
																{  
																	$db_or = db_or();
																	$db_or->condition('r.field_artist_rank_tid', 13,'=');
																	
																} else if($package_id == 11)
																{
																	$db_or = db_or();
																	$db_or->condition('r.field_artist_rank_tid', 13,'=');
																	$db_or->condition('r.field_artist_rank_tid', 14,'=');
																	
																} 
																else if($package_id == 12)
																{
																	
																	
																	$db_or = db_or();
																	$db_or->condition('r.field_artist_rank_tid', 13,'=');
																	$db_or->condition('r.field_artist_rank_tid', 14,'=');
																	$db_or->condition('r.field_artist_rank_tid', 15,'=');
																	$db_or->condition('r.field_artist_rank_tid', 16,'=');
																	
																}	
																
																else  
																{  
																	$db_or = NULL;
																}  
																
																$query1 = db_select('profile', 'p');
																$query1->fields('p', array('uid', 'pid', ));
																$query1->join('field_data_field_artist_rank', 'r', 'p.pid = r.entity_id');
																$query1->join('field_data_field_artist_stage_name', 's', 'p.pid = s.entity_id');
																$query1->fields('r', array('field_artist_rank_tid', 'entity_id', ));
																$query1->condition('p.type', 'artist','=');
																$query1->condition($db_or);	
																$query1->orderBy('s.field_artist_stage_name_value', 'ASC');
																$query1_object = $query1->execute()->fetchAll(); 
																
															?>
															
															
															<?php 
																foreach($query1_object as $selectartist ) {
																	
																	$artist = user_load($selectartist->uid);
																	$artist_profile = profile2_load_by_user($artist->uid, $type_name = 'artist') ;
																	$artistname = $artist_profile->field_artist_name['und'][0]['value'];
																	$file = file_load($artist_profile->field_artist_profile_picture['und'][0]['fid']);
																	$uri = $file->uri;
																	$url = file_create_url($uri);
																	
																	$dis_art = unique_selections($selectartist->uid,$user->uid);
																	
																	
																	
																	if($dis_art == 'yes'){ ?>  
																	
																	
																	<div class="col-md-3 col-xs-6 col-sm-4 col-lg-4">
																		<center>
																			<label class="boxcheck">
																				<div class="circular--portrait " ><img src="<?php print $url; ?>"  class=" circle img-overlay"></div>
																				
																				<input type="checkbox" >
																				
																			</label>
																			<div class="caption text-center"><?php print $artistname; ?></div>
																		</center>
																	</div>
																	
																	<?php  }elseif($dis_art == 'no'){ 
																		$limit =	_limit_artist($cuser->uid,$package_id);
																	?>
																	
																	<div class="col-md-3 col-xs-6 col-sm-4 col-lg-4">
																		<center>	<label class="boxcheck"><div class="circular--portrait"><img src="<?php print $url; ?>" alt="..." class="circle"></div>
																			
																			<input type="checkbox" name="model_selection[]" class="limited" onclick="return limitchex(this,<?php print $limit;?>)" value="<?php print $selectartist->uid; ?>">
																			<span class="checkmark"></span>
																		</label>
																		<div class="caption text-center"><?php print $artistname; ?></div></center>
																	</div>
																	
																	
																<?php }?>	 
															<?php } ?>
															
															
															
															
															
															
														</div>
														
													</div>
													
												</div> 
												
											</div> 
											
											
										</div> 
										
										<center><input id="pack1-sub" class="pack1-sub" disabled="disabled" type="submit" name="submit" Value="ADD MORE!"/></center>
									</form>
									
									
									
									  <script>
										        $(function () {
											            $('.limited').change(function () {
												                if ($(this).is(":checked")) {
													                    $('#pack1-sub').removeAttr('disabled');
												                }
												                else {
													                    var isChecked = false;
													                    $('.limited').each(function () {
														                        if ($(this).is(":checked")) {
															                            $('#pack1-sub').removeAttr('disabled');
															                            isChecked = true;
														                        }
													                    });
													                    if (!isChecked) {
														                        $('#pack1-sub').attr('disabled', 'disabled');
													                    }
												                }
												 
												 
											            })
										        });
									    </script>
									
									
									
									
									
									
									
									
									
									
									
									
									
									
									
								</div>
								
							</div>
						</div>
					</div>
				</div>
				
				
				
			</div>
			<footer>
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
			
			
			<script>
				$(document).ready(function(){
					$('ul li a').click(function(){
						$('li a').removeClass("active");
						$(this).addClass("active");
					});
				});</script>
				
				
	</body>
	
</html>			