<?php 
	global $user;
	global $base_url;
	$cuser=user_load($user->uid); 
	$modulePath = drupal_get_path('module', 'musicbox_subscribers_artists');
	
	$fullurl = $base_url.'/'.$modulePath;
	
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
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/artist_subs.css">
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
					<button class="btn btn-primary dropdown-toggle  menu-button" type="button" data-toggle="dropdown">
					<i class="fa fa-align-justify"></i></button>
					<ul class="dropdown-menu css-menu">
						
				
							
							<li><a href="<?php print $base_url; ?>/welcome_home/<?php print $cuser->uid; ?>" >Home</a></li>
							<li><a href="<?php print $base_url; ?>/welcome_subscrib/<?php print $cuser->uid; ?>" class="active menucolor">Subscribe</a></li>
					        <li><a href="<?php print $base_url; ?>/welcome_profile/<?php print $cuser->uid; ?>">My Profile</a></li>
							<li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
						
					</ul>
				</div>
			</div>
			
			<div class="new-inner">
				
				<div class="row">
					<div class="col-lg-4 col-md-4  col-sm-6 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-2">
						<div class="text-center  ">
							<div class="text-center artist" style="height:5vh;">
								<center>
								<h6  class="upload-st">SUBSCRIPTION</h6></center>
							</div>
							
						</div>
					</div>
					
				</div>
				
				<div class="row " style="background-color: #2d2a2a;">
					
					<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
						
						
						
						
						<div class="container">
							
							<div class="row">
								
								<div class="col-md-12">
									
									
									
									
									<div class="main-title">
										<h2 class="upload-st text-center ">select your per day subscription </h2>
										
									</div>	
									
									
									
									<div class="Select-Subscription-plan text-center ">
										<select class="div-toggle" data-target=".my-info-1" id="subslist">
											<option value="showall" selected="selected" data-show=".showall">Subscription plan</option>
											<?php print get_dropdown_list_items();?>
										</select>
									</div>	
									<hr>
									
									<div class="my-info-1">
										<!---------------------------------------------- initianl------------------------------------------------->
										
										<div class="scrollbar-Subscription" id="style-Subscription-scroll">
											<div class="force-overflow-Subscription">
												<div class="panel panel-default panelnew">
													<div class="panel-body ">
														<div class="row" id="subslist">
															<?php print _get_artists_list(); ?>
														</div>	
													</div>
												</div>
											</div> 
										</div>
										<!------------------------------------------------- ****** ------------------------------------------------->
										
										<!---------------------------------------------- showall------------------------------------------------->
										<div class="showall hide" id="subslist">
											<div class="scrollbar-Subscription" id="style-Subscription-scroll">
												<div class="force-overflow-Subscription">
													<div class="panel panel-default panelnew">
														<div class="panel-body ">
															<div class="row" id="subslist">
																<?php print _get_artists_list(); ?>
															</div>	
														</div>
													</div>
												</div> 
											</div></div>
											
											
											<!------------------------------------------------- ****** ------------------------------------------------->
											
											<!---------------------------------------------- 1st package------------------------------------------------->
											<div class="10 hide">
												
												
												
												<?php
													$query1 = db_select('profile', 'p');
													$query1->fields('p', array('uid', 'pid', ));
													$query1->join('field_data_field_artist_rank', 'r', 'p.pid = r.entity_id');
													$query1->join('field_data_field_artist_stage_name', 's', 'p.pid = s.entity_id');
													$query1->fields('r', array('field_artist_rank_tid', 'entity_id', ));
													$query1->condition('p.type', 'artist','=');
													$query1->condition('r.field_artist_rank_tid', 13,'=');
													$query1->orderBy('s.field_artist_stage_name_value', 'ASC');
													$result1 = $query1->execute()->fetchAll(); 
													
												?>
												
												
												<form action="<?php print $base_url; ?>/selected1" method="post">
													<div class="scrollbar-Subscription" id="style-Subscription-scroll">
														<div class="force-overflow-Subscription">
															<div class="panel panel-default panelnew">
																<div class="panel-body">
																	<div class="row">
																		<form id="checkform" name="checkform">
																			<?php foreach ($result1 as $package1) {
																				
																				
																				$artist = user_load($package1->uid);
																				$artist_profile = profile2_load_by_user($artist->uid, $type_name = 'artist') ;
																				$artistname = $artist_profile->field_artist_name['und'][0]['value'];
																				$file = file_load($artist_profile->field_artist_profile_picture['und'][0]['fid']);
																				$uri = $file->uri;
																				$url = file_create_url($uri);
																				
																			?>
																			<div class="col-md-3 col-xs-6 col-sm-4 col-lg-4">
																				
																				<center>	<label class="boxcheck">
																					<div class="circular--portrait">
																						<img src="<?php print $url; ?>"  class="circle">
																					</div>
																					<input class="pac1art" id="pack1" type="checkbox" value="<?php print $package1->uid; ?>" name="package1_artist[]">
																					<span class="checkmark"></span>
																				</label>
																				<div class="caption text-center"><?php print $artistname; ?></div></center>
																			</div>
																			
																			<?php } ?>
																			
																			
																		</div>
																	</div>
																</div> 
															</div> 
														</div> 
														
														
														
														<center>  
														<input id="pack1-sub" class="pack1-sub" disabled="disabled" name="Submit" type="submit" value="Submit" /> </center>
													</form>
													  <script>
														        $(function () {
															            $('.pac1art').change(function () {
																                if ($(this).is(":checked")) {
																	                    $('#pack1-sub').removeAttr('disabled');
																                }
																                else {
																	                    var isChecked = false;
																	                    $('.pac1art').each(function () {
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
												<!------------------------------------------------- ****** ------------------------------------------------->
												<!---------------------------------------------- 2nd package------------------------------------------------->
												<div class="11 hide">
													<?php
														$db_or = db_or();
														$db_or->condition('r.field_artist_rank_tid', 13,'=');
														$db_or->condition('r.field_artist_rank_tid', 14,'=');
														
														
														$query2 = db_select('profile', 'p');
														$query2->fields('p', array('uid', 'pid', ));
														$query2->join('field_data_field_artist_rank', 'r', 'p.pid = r.entity_id');
														$query2->join('field_data_field_artist_stage_name', 's', 'p.pid = s.entity_id');
														$query2->fields('r', array('field_artist_rank_tid', 'entity_id', ));
														$query2->condition('p.type', 'artist','=');
														$query2->condition($db_or);	
                                                        $query2->orderBy('s.field_artist_stage_name_value', 'ASC');														
														$result2 = $query2->execute()->fetchAll(); 
														
														
														
													?>
													
													<form action="<?php print $base_url; ?>/selected2" method="post">
														<div class="scrollbar-Subscription" id="style-Subscription-scroll">
															<div class="force-overflow-Subscription">
																<div class="panel panel-default panelnew">
																	<div class="panel-body">
																		<div class="row">
																			
																			<?php foreach ($result2 as $package2) {
																				
																				
																				$artist = user_load($package2->uid);
																				$artist_profile = profile2_load_by_user($artist->uid, $type_name = 'artist') ;
																				$artistname = $artist_profile->field_artist_name['und'][0]['value'];
																				$file = file_load($artist_profile->field_artist_profile_picture['und'][0]['fid']);
																				$uri = $file->uri;
																				$url = file_create_url($uri);
																				
																			?>
																			<div class="col-md-3 col-xs-6 col-sm-4 col-lg-4">
																				
																				<center>	<label class="boxcheck"><div class="circular--portrait"><img src="<?php print $url; ?>"  class="circle"></div>
																					
																					<input class="pac2art" type="checkbox" value="<?php print $package2->uid; ?>" name="package2_artist[]">
																					<span class="checkmark"></span>
																				</label>
																				<div class="caption text-center"><?php print $artistname; ?></div></center>
																			</div>
																			<?php } ?>
																			
																			
																		</div>
																	</div>
																</div> 
															</div> 
														</div> 
														
														
														
														<center>  
														<input id="pack2-sub" class="pack2-sub" disabled="disabled" name="Submit" type="submit" value="Submit" /> </center>
													</form>
													  <script>
														        $(function () {
															            $('.pac2art').change(function () {
																                if ($(this).is(":checked")) {
																	                    $('#pack2-sub').removeAttr('disabled');
																                }
																                else {
																	                    var isChecked = false;
																	                    $('.pac2art').each(function () {
																		                        if ($(this).is(":checked")) {
																			                            $('#pack2-sub').removeAttr('disabled');
																			                            isChecked = true;
																		                        }
																	                    });
																	                    if (!isChecked) {
																		                        $('#pack2-sub').attr('disabled', 'disabled');
																	                    }
																                }
																 
																 
															            })
														        });
													    </script>
												</div>
												
												
												
												
												<!------------------------------------------------- ****** ------------------------------------------------->	
												<!---------------------------------------------- 3rd package------------------------------------------------->
												<div class="12 hide">
													<?php
														$db_or = db_or();
														$db_or->condition('r.field_artist_rank_tid', 13,'=');
														$db_or->condition('r.field_artist_rank_tid', 14,'=');
														$db_or->condition('r.field_artist_rank_tid', 15,'=');
														$db_or->condition('r.field_artist_rank_tid', 16,'=');
														
														
														$query3 = db_select('profile', 'p');
														$query3->fields('p', array('uid', 'pid', ));
														$query3->join('field_data_field_artist_rank', 'r', 'p.pid = r.entity_id');
														$query3->join('field_data_field_artist_stage_name', 's', 'p.pid = s.entity_id');
														$query3->fields('r', array('field_artist_rank_tid', 'entity_id', ));
														$query3->condition('p.type', 'artist','=');
														$query3->condition($db_or);	
                                                        $query3->orderBy('s.field_artist_stage_name_value', 'ASC');														
														$result3 = $query3->execute()->fetchAll(); 
														
														
														
													?>
													
													<form action="<?php print $base_url; ?>/selected3" method="post">
														<div class="scrollbar-Subscription" id="style-Subscription-scroll">
															<div class="force-overflow-Subscription">
																<div class="panel panel-default panelnew">
																	<div class="panel-body">
																		<div class="row">
																			
																			<?php foreach ($result3 as $package3) {
																				
																				
																				$artist = user_load($package3->uid);
																				$artist_profile = profile2_load_by_user($artist->uid, $type_name = 'artist') ;
																				$artistname = $artist_profile->field_artist_name['und'][0]['value'];
																				$file = file_load($artist_profile->field_artist_profile_picture['und'][0]['fid']);
																				$uri = $file->uri;
																				$url = file_create_url($uri);
																				
																			?>
																			<div class="col-md-3 col-xs-6 col-sm-4 col-lg-4">
																				
																				<center>	<label class="boxcheck"><div class="circular--portrait"><img src="<?php print $url; ?>"  class="circle "></div>
																					
																					<input class="pac4art" type="checkbox" value="<?php print $package3->uid; ?>" name="package3_artist[]">
																					<span class="checkmark"></span>
																				</label>
																				<div class="caption text-center"><?php print $artistname; ?></div></center>
																			</div>
																			<?php } ?>
																			
																			
																			
																		</div>
																	</div>
																</div> 
															</div> 
														</div> 
														
														
														
														
														<center>  
															<input id="pack3-sub" class="pack3-sub" disabled="disabled" name="Submit" type="submit" value="Submit" /> </center>													 <center>  
															
														</form>
														
														<script>
															        $(function () {
																            $('.pac4art').change(function () {
																	                if ($(this).is(":checked")) {
																		                    $('#pack3-sub').removeAttr('disabled');
																	                }
																	                else {
																		                    var isChecked = false;
																		                    $('.pac4art').each(function () {
																			                        if ($(this).is(":checked")) {
																				                            $('#pack3-sub').removeAttr('disabled');
																				                            isChecked = true;
																			                        }
																		                    });
																		                    if (!isChecked) {
																			                        $('#pack3-sub').attr('disabled', 'disabled');
																		                    }
																	                }
																	 
																	 
																            })
															        });
														    </script>
														
														
													</div>
													
													
													
													
													
												</div>
												
												
												
												
												<script> 
													function checkAvailability() {
														$("#loaderIcon").show();
														jQuery.ajax({
															url: "/musicbox.lk/check_number",
															data:'username='+$("#username").val(),
															type: "POST",
															success:function(data){
																$("#user-availability-status").html(data);
																$("#loaderIcon").hide();
															},
															error:function (){}
														});
													}
													
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
			</footer>
				</div>
				
				
				
				
				
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
					$(document).on('change', '.div-toggle', function() {
						var target = $(this).data('target');
						var show = $("option:selected", this).data('show');
						$(target).children().addClass('hide');
						$(show).removeClass('hide');
					});
					$(document).ready(function(){
						$('.div-toggle').trigger('change');
					});  
				</script>		
				
				
			</body>
			
		</html>		