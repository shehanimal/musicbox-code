<?php
	
	global $base_url;
	global $user;
	$cuser = user_load($user->uid);
	
	$themePath = drupal_get_path('theme', 'musicbox');
	$fullurl = $base_url.'/'.$themePath;
	$artistprofile = profile2_load_by_user($user->uid, $type_name = 'artist');
	print '<pre>';
	print_r($artistprofile);
	print '</pre>';
	exit;
	
	$subscribeprofile = profile2_load_by_user($user->uid, $type_name = 'subscriber');
	
	
	
	$query = db_select('musicbox_subscriber_account', 'm')
	->condition('m.subscriber_uid', $cuser->uid, '=')
	->fields('m', array('mobile_number'))
	->execute(); 
	
	
	$package_query = db_select('musicbox_subscriber_account', 's');
	$package_query->fields('s', array('mobile_number'));
	$package_query->condition('s.subscriber_uid', $cuser->uid, '=');
	$package_object = $package_query->execute()->fetchAll();
	
	
	
	
?>

<!----------------------------------------------- ******************************** ------------------------------------------------------------>
<!--------------------- Subscriber -------------------------->

<?php if(((isset($cuser->roles[5])) && ($cuser->roles[5] == 'Subscriber')))
	{ 
		$subscriber = user_load($cuser->uid);
	$subscriber_profile = profile2_load_by_user($subscriber->uid, $type_name = 'subscriber') ;
	
	
		
	if(isset($subscriber_profile->field_subs_profile_pic['und'][0]['fid']))	{
	$file = file_load($subscriber_profile->field_subs_profile_pic['und'][0]['fid']);
    $suburi = $file->uri;
    $suburl = file_create_url($suburi);
		
	}else if(isset($cuser->picture->fid)){
			$fid = $cuser->picture->fid;
					$file = file_load($fid);
		
		
		$uri = $file->uri;
		
		$suburl = file_create_url($uri);
	}else{
			$fid = 532;
					$file = file_load($fid);
		
		
		$uri = $file->uri;
		
		$suburl = file_create_url($uri);
		}
		
		

		
	?>
	<div class="container mobile-container " style="background-color:#2d2a2a;">
		
		<div class="text-center" style="height:6vh; background-color:#fff;">
			  <a href="<?php print $base_url; ?>/infortainment"><i class="fa fa-home" aria-hidden="true"></i></a><label class="name-activate2">MUSIC BOX</label>
			<div class="dropdown" style="float:right;">
				<button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
				<i class="fa fa-align-justify"></i></button>
				<ul class="dropdown-menu">
					<?php $paystatus = get_payment_status($cuser->uid);
						if($paystatus == 0) {?>
						<li><a href="<?php print $base_url; ?>/infortainment">Home</a></li>
								
							    <li><a href="<?php print $base_url; ?>">Change Package</a></li>
								<li><a href="<?php print $base_url; ?>/unsubscribe">Unsubscribe</a></li>
								<li><a href="<?php print $base_url; ?>/user" class="active menucolor">My Profile</a></li>
								<li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
						<?php } else {?>
                       <li><a href="<?php print $base_url; ?>/infortainment">Home</a></li>
						
							    <li><a href="<?php print $base_url; ?>/change_package">Change Package</a></li>
								<li><a href="<?php print $base_url; ?>/unsubscribe">Unsubscribe</a></li>
								<li><a href="<?php print $base_url; ?>/user"class="active menucolor">My Profile</a></li>
								<li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
					<?php }?>	
					
				</ul>
			</div>
		</div>
		
		<div class="new-inner">
			
			<div class="container" >
				
				<div class="row">
					<div class="col-xs-6">
						
						<div class="userprofileimage"> <img src="<?php print $suburl; ?>" class="userimage">
							<button class="btn editbtn" data-toggle="modal" data-target="#Modaleditimage"data-backdrop="static" data-keyboard="false">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							</button>
						</div></div>
						<div class="col-xs-6">
							<div class="text-center artist">
								
								<h6 class="upload-st-user"><?php print $cuser->name; ?><br>	</h6>
							</div>
							<button type="button" class="btn btn-default resetpwd" data-toggle="modal" data-target="#myresetform">RESET PASSWORD</button>
							<br>
							<button type="button" class="btn btn-default resetpwd" data-toggle="modal" data-target="#packagetable" >PACKAGE HISTORY</button>
							<br>
							<!---       <button type="button" class="btn btn-default resetpwd">DEACTIVATE</button>  ------->
							<h4 class="newdl"><?php print $cuser->mail;?></h4>
							
							<h4 class="newdl"><?php print $package_object[0]->mobile_number; ?></h4>
						</div>
				</div>
			</div>
			<hr>
			<?php  $package_id = _get_currently_updated_package($cuser->uid); 
				$package_term = taxonomy_term_load($package_id);
				$bundle_id = _get_currently_updated_bundle($cuser->uid);
				$bundle_term_ = taxonomy_term_load($bundle_id);
			?>
			<h6 class="Pack-text"> Currently you have activated <?php print $bundle_term_->name; ?> bundle & <?php print $package_term->name; ?> package</h6>
			<hr>
			
			<h6 class="text-center username">SELECTED ARTIST</h6>
			
			<div class="scrollbar-user" id="style-user-scroll ">
				<div class="force-overflow-user">
					<div class="panel panel-default panelnew">
						<div class="panel-body">
							<div class="row">
								
								<?php $artist = _show_selected_artists($cuser->uid); 
									
									foreach($artist as $subsartist){
										
										$artist = user_load($subsartist->artist_uid);
										$artist_profile = profile2_load_by_user($artist->uid, $type_name = 'artist') ;
										$artistname = $artist_profile->field_artist_name['und'][0]['value'];
										$file = file_load($artist_profile->field_artist_profile_picture['und'][0]['fid']);
										$arturi = $file->uri;
										$arturl = file_create_url($arturi);
										
									?>
									
									<div class="col-md-3 col-xs-6 col-sm-4 col-lg-4">
										<center>
											<div class="circular--portrait "><a href="<?php print $base_url; ?>/artist/<?php print $subsartist->artist_uid; ?>"><img src="<?php print $arturl; ?>" class=" circle "></a></div>
											
											<div class="caption text-center">
												<?php print $artistname; ?>
											</div>
										</center>
									</div>
									
								<?php } ?>
								
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
	
	
</div>

<div class="modal fade" id="packagetable" role="dialog">
    <div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content unsubcontent">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title title-modal">Package History</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<?php 
						$package = get_package_history($cuser->uid);
						
						
					?>   
					<table class="table">
						<thead>
							<tr>
							    <th>Bundle Name</th>
								<th>Package</th>
								<th>Activated Date</th>
								
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($package as $package_list){
									
									$package_term = taxonomy_term_load($package_list->package_id);
									$bundle_term = taxonomy_term_load($package_list->bundle_id);
								?>
								<tr>
								    <td><?php print $bundle_term->name; ?></td>
									<td><?php print $package_term->name; ?></td>
									<td><?php 
										$originalDate = $package_list->register_date;
										$newDate = date("Y-m-d", strtotime($originalDate));
									print $newDate; ?></td>
									
								</tr>
							<?php } ?>
							
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		
	</div>
</div>

</div>
<!--------------------------------------------------- ****************** --------------------------------------------------------------------->       
<!--------------------------------------------------- artist --------------------------------------------------------------------->
<?php } else if((isset($cuser->roles[4])) && ($cuser->roles[4] == 'Artist')){ 
	
	$artist = user_load($cuser->uid);
	$artist_profile = profile2_load_by_user($artist->uid, $type_name = 'artist') ;
	
	$file = file_load($artist_profile->field_artist_profile_picture['und'][0]['fid']);
    $arturi = $file->uri;
    $arturl = file_create_url($arturi);
	
?>

<div class="container mobile-container " style="background-color:#2d2a2a;">
	
	<div class="text-center" style="height:6vh; background-color:#fff;">
		<a href="<?php print $base_url; ?>/infortainment"><i class="fa fa-home" aria-hidden="true"></i></a><label class="name-activate2">MUSIC BOX</label>
		<div class="dropdown" style="float:right;">
			<button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
			<i class="fa fa-align-justify"></i></button>
			<ul class="dropdown-menu user">
				
				<li><a href="<?php print $base_url; ?>/infortainment">Home</a></li>
				<li><a href="<?php print $base_url; ?>/uploade/pix" style="float:right;">Pix</a></li>
				<li><a href="<?php print $base_url; ?>/uploade/vids">Vids</a></li>
				<li><a href="<?php print $base_url; ?>/uploade/personal">Personal</a></li>
				<li><a href="<?php print $base_url; ?>/uploade/learn" class="learn">Learn</a></li>
				<li><a href="<?php print $base_url; ?>/status">Upload Status</a></li>
				<li><a href="<?php print $base_url; ?>/user" class="active menucolor">My Profile</a></li>
				<li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
				
			</ul>
		</div>
	</div>
	
	<div class="new-inner">
		
		<div class="container" >
			
			<div class="row">
				<div class="col-xs-6">
					
					 <img src="<?php print  $arturl; ?>" class="userimage">
					
					</div>
					<div class="col-xs-6">
						<div class="text-center artist">
							
							<h6 class="upload-st-user"><?php print $artist_profile->field_artist_name['und'][0]['value'] .' '. $artist_profile->field_artist_surname['und'][0]['value']; ?><br>	</h6>
						</div>
						<button type="button" class="btn btn-default resetpwd" data-toggle="modal" data-target="#myresetform">RESET PASSWORD</button>
						<br>
						
						<!---       <button type="button" class="btn btn-default resetpwd">DEACTIVATE</button>  ------->
						<h4 class="newdl"><?php print $cuser->mail;?></h4>
						
						<h4 class="newdl"><?php print $package_object[0]->mobile_number; ?></h4>
					</div>
			</div>
		</div>
		
		<br><br>
		<h6 class="text-center username">SUBSCRIBED USERS</h6>
		
		<div class="scrollbar-user" id="style-user-scroll ">
			<div class="force-overflow-user">
				<div class="panel panel-default panelnew">
					<div class="panel-body">
						<div class="row">
							
							<?php $artist = _subscribers_subscribe_by($cuser->uid); 
								
								foreach($artist as $subsartist){
									
									$sub_cri = user_load($subsartist->sub_id);
										$subscriber_profile = profile2_load_by_user($sub_cri->uid, $type_name = 'subscriber') ;
	
	
		
	if(isset($subscriber_profile->field_subs_profile_pic['und'][0]['fid']))	{
	$file = file_load($subscriber_profile->field_subs_profile_pic['und'][0]['fid']);
    $suburi = $file->uri;
    $suburl = file_create_url($suburi);
		
	}else if(isset($cuser->picture->fid)){
			$fid = $cuser->picture->fid;
					$file = file_load($fid);
		
		
		$uri = $file->uri;
		
		$suburl = file_create_url($uri);
	}else{
			$fid = 532;
					$file = file_load($fid);
		
		
		$uri = $file->uri;
		
		$suburl = file_create_url($uri);
		}
									
								?>
								
								<div class="col-md-3 col-xs-6 col-sm-4 col-lg-4">
									<center>
										<div class="circular--portrait "><img src="<?php print $suburl; ?>" class=" circle "></div>
										
										<div class="caption text-center">
											<?php print $sub_cri->name; ?>
										</div>
									</center>
								</div>
								
							<?php } ?>
							
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


</div>

<div class="modal fade" id="packagetable" role="dialog">
    <div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content unsubcontent">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title title-modal">Package History</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					<?php 
						$package = get_package_history($cuser->uid);
						
						
					?>   
					<table class="table">
						<thead>
							<tr>
								<th>Package</th>
								<th>Activated Date</th>
								
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach ($package as $package_list){
									
									$package_term = taxonomy_term_load($package_list->package_id);
								?>
								<tr>
									<td><?php print $package_term->name; ?></td>
									<td><?php 
										$originalDate = $package_list->register_date;
										$newDate = date("Y-m-d", strtotime($originalDate));
									print $newDate; ?></td>
									
								</tr>
							<?php } ?>
							
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		
	</div>
</div>

</div>
<!--------------------------------------------------- ****************** --------------------------------------------------------------------->       
<!--------------------------------------------------- authenticate --------------------------------------------------------------------->
<?php } else if(($cuser->roles[2] == 'authenticated user') && (empty($cuser->roles[5])) && (empty($cuser->roles[4]))){
	if(isset($cuser->picture->fid)){
		$fid = $cuser->picture->fid;
		}else{
		$fid = 532;
	}
	
	
	$file = file_load($fid);
	
	
    $uri = $file->uri;
	
    $url = file_create_url($uri);
	
?>
<div class="container mobile-container " style="background-color:#2d2a2a;">
	
	<div class="text-center" style="height:6vh; background-color:#fff;">
		<a href="<?php print $base_url; ?>/infortainment"><i class="fa fa-home" aria-hidden="true"></i></a><label class="name-activate2">MUSIC BOX</label>
		<div class="dropdown" style="float:right;">
			<button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
			<i class="fa fa-align-justify"></i></button>
			<ul class="dropdown-menu css">
	
		                    <li><a href="<?php print $base_url; ?>/welcome_home/<?php print $cuser->uid; ?>" >Home</a></li>
							<li><a href="<?php print $base_url; ?>/welcome_subscrib/<?php print $cuser->uid; ?>" >Subscribe</a></li>
					        <li><a href="<?php print $base_url; ?>/welcome_profile/<?php print $cuser->uid; ?>" class="active menucolor">My Profile</a></li>
							<li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
	
		
						
				
			</ul>
		</div>
	</div>
	
	<div class="new-inner">
		
		<div class="container" >
			
			<div class="row">
				<div class="col-xs-6">
					
					<img src="<?php print  $url; ?>" class="userimage">
				</div>
				<div class="col-xs-6">
					<div class="text-center artist">
						
						<h6 class="upload-st-user"><?php print $cuser->name; ?><br>	</h6>
					</div>
					<button type="button" class="btn btn-default resetpwd" data-toggle="modal" data-target="#myresetform">RESET PASSWORD</button>
					<br>
					<button type="button" class="btn btn-default resetpwd" data-toggle="modal" data-target="#myModalDeactivate">DEACTIVATE</button>
					<br>
					<!---       <button type="button" class="btn btn-default resetpwd">DEACTIVATE</button>  ------->
					<h4 class="newdl"><?php print $cuser->mail;?></h4>
					<h4 class="newdl"><?php print $package_object[0]->mobile_number; ?></h4>
				</div>
			</div>
			<hr>
			<center><a href="<?php print $base_url;?>/subscribe_artist"><button type="button" class="btn btn-default resetpwd">SUBSCRIBE</button></a></center>
		</div>
		
		
	</div>
	<footer>
		<div class="container">
			<img src="<?php print $fullurl; ?>/images/logo.png" class="logo-img pull-left">
			<img src="<?php print $fullurl; ?>/images/dialog.png" class="service pull-right">
		</div>
	</footer>
	
</div>
<?php } ?>

<div class="modal fade" id="myresetform" role="dialog">
    <div class="modal-dialog">
		
		<!-- Modal content-->
		<div class="modal-content unsubcontent">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title title-modal">Reset Password</h4>
			</div>
			<div class="modal-body">
				<div class="container">
					
					<form method='post' action="<?php print $base_url;?>/resetpass">
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" id="email" value="<?php print $cuser->mail;?>"  disabled name="email">
						</div>
						<div class="form-group">
							<fieldset>
								<input type="text" name="user_id"   value="<?php print $cuser->uid;?>" id="user_id" >
								
								<input type="password" name="userpw"  placeholder="Password" id="password" required>
								<input type="password" name="confirmuserpw"  placeholder="Confirm Password" id="confirm_password" required>
								
								
								<input type="submit"  class="btn btn-default" name="submit" value="Update">
							</fieldset>
						</div>
						
						
					</form>
				</div>
			</div>
		</div>
	</div>  </div>
	<!---------------------------------------------------------------- ----------->
	
	<div id="myModalDeactivate" class="modal fade" role="dialog">
		<div class="modal-dialog">
			
			<!-- Modal content-->
			<div class="modal-content unsubcontent">
				
				<div class="modal-body">
					<p class="text-center unsubscribemsg">Are you sure you want to Deactivate this account?</p>
				</div>
				<div class="modal-footer">
					
					<center> <a href="<?php print $base_url; ?>/deactivate/<?php print $user->uid; ?>"> <button type="button" class="btn btn-default">YES</button></a>
					<button type="button" class="btn btn-default" data-dismiss="modal">NO</button> </center>
				</div>
				
				
				
			</div>
			
		</div>
	</div>
	<div class="modal fade " id="Modaleditimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content editpro">
				<div class="modal-header">
					<button type="button" class="close closeb" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body">
					
						<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 uploadinfo" ><center>
						<?php $block2=module_invoke( 'musicbox_artist_dashboard', 'block_view', 'user_profile_pic_update'); 
						if ($block2[ 'content']){ print render($block2[ 'content']);} ?> </center>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
	
	<!--------------------------------------------------- ****************** -------------------------------------->		
	
	
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
	
		