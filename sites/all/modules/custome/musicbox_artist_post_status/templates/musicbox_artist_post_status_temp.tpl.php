<?php 
	global $base_url;
	global $user;
	$cuser=user_load($user->uid); 
	$modulePath = drupal_get_path('module', 'musicbox_artist_post_status');
	
	$fullurl = $base_url.'/'.$modulePath;
	
?>

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Musicbox | Status</title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php print $fullurl; ?>/images/favicon.ico" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/bootstrap.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/post_status.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/footer.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/top-bar.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/tab.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/container.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
		<script src="<?php print $fullurl;?>/js/jquery.min.js"></script>
		<script src="<?php print $fullurl;?>/js/bootstrap.min.js"></script>
		<style>
			
		</style>
		
	</head>
	
	<body>
		<?php 
			$artist = _get_infortatements_artist($cuser->uid);
			
		?>
		<div class="container mobile-container " style=" background-color:#2d2a2a;">
			
			<div class="text-center" style="height:5vh; background-color:#fff;">
				  <a href="<?php print $base_url; ?>/infortainment"><i class="fa fa-home" aria-hidden="true"></i></a><label class="name-activate2">MUSIC BOX</label>
				<div class="dropdown" style="float:right;">
					<button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
					<i class="fa fa-align-justify"></i></button>
					<ul class="dropdown-menu menucss">
						
						<li><a href="<?php print $base_url; ?>/infortainment" style="float:right;">Home</a></li>
						<li><a href="<?php print $base_url; ?>/uploade/pix" style="float:right;">Pix</a></li>
						<li><a href="<?php print $base_url; ?>/uploade/vids">Vids</a></li>
						<li><a href="<?php print $base_url; ?>/uploade/personal">Personal</a></li>
						<li><a href="<?php print $base_url; ?>/uploade/learn" class="learn">Learn</a></li>
						<li><a href="<?php print $base_url; ?>/status"class="active menucolor">Upload Status</a></li>
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
								<h4 class="art-name"><?php echo strtoupper($user->name);?></h4></center>
							</div>
							
						</div>
					</div>
					
				</div>
				
				<div class="row uploadinfo ">
					<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 ">
						<label class="upload-st">Upload Status</label>
						
					</div>
					<div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
						<div class="tab" role="tabpanel">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active tab1"><a href="#Section1" aria-controls="home" role="tabpanel" data-toggle="tab">Pix</a></li>
								<li role="presentation" class="tab1"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Vids</a></li>
								<li role="presentation" class="tab1"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Personal</a></li>
								<li role="presentation" class="tab1"><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab">Learn</a></li>
								<!-- Tab panes -->
							</ul>
							<div class="tab-content tabs">
								<div role="tabpanel" class="tab-pane fade in active" id="Section1">
									<div class="table-responsive table-up">
										<table class="table">
											<thead>
												<tr>
													<th>Uploads</th>
													<th>Date</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($artist as $artist_data) { 
													$node = node_load($artist_data->nid);
													if(isset($node->field_story_image_fid['und'][0]['value'])){
														$image_file = file_load($node->field_story_image_fid['und'][0]['value']);
														$image_uri = $image_file->uri;
														$image_url = file_create_url($image_uri);
														$createdate = date('Y-m-d',$node->created);
														
														$infotai = 'pix';
														$infordate = $createdate;
														if($node->status == 0){
															$status = 'Pending';
															}else if($node->status == 1){
															$status = '<div class="approved-color">Approved</div>';
														}
													?>
													<tr>
														<td><img src="<?php print $image_url; ?>" class="img-artist getimage" data-toggle="modal" data-target="#myModalimage"></td>
														
														<td><?php print $createdate; ?></td>
														<td><?php print $status; ?></td>
													</tr>
													
												<?php }} ?>
											</tbody>
										</table>
									</div>
									
								</div>
								
								<div role="tabpanel" class="tab-pane fade" id="Section2">
									<div class="table-responsive table-up">
										<table class="table">
											<thead>
												<tr>
													<th>Uploads</th>
													
													<th>Date</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($artist as $artist_data) { 
													$node = node_load($artist_data->nid);
													if(isset($node->field_story_video_image['und'][0]['value'])){
														$story_video_file = file_load($node->field_story_video_image['und'][0]['value']); 
														$story_video_uri = $story_video_file->uri; 
														$story_video_url = file_create_url($story_video_uri);
														$createdate = date('Y-m-d',$node->created);
														
														$infotai = 'Vid';
														$infordate = $createdate;
														if($node->status == 0){
															$status = 'Pending';
															}else if($node->status == 1){
															$status = '<div class="approved-color">Approved</div>';
														}
													?>
													<tr>
														
														<td>
															<video class="img-artist videopopv" data-toggle="modal" data-target="#myModalvideopop">
																<source src="<?php print $story_video_url;?>" type="video/mp4">
																
															</video>
														</td>
														
														
														<td><?php print $createdate; ?></td>
														<td><?php print $status; ?></td>
													</tr>
													
												<?php } } ?>
												
											</tbody>
										</table>
									</div>
									
								</div>
								<div role="tabpanel" class="tab-pane fade" id="Section3">
									<div class="table-responsive table-up">
										<table class="table">
											<thead>
												<tr>
													<th>Uploads</th>
													
													<th>Date</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($artist as $artist_data) { 
													$node = node_load($artist_data->nid);
													if(isset($node->field_today_motivation['und'][0]['value'])){
														
														
														$infotai = 'Personal';
														$infordate = $createdate;
														if($node->status == 0){
															$status = 'Pending';
															}else if($node->status == 1){
															$status = '<div class="approved-color">Approved</div>';
														}
													?>
													<tr>
														
													</td>
													
													<td class="getContup" data-toggle="modal" data-target="#myModalcontentup" data-content="<?php print $node->field_today_motivation['und'][0]['value']; ?> ">
														<p class="status-upload"><?php print $node->field_today_motivation['und'][0]['value']; ?><p>
														</td>
														
														<td><?php print $createdate; ?></td>
														<td><?php print $status; ?></td>
														</tr>
														
													<?php } } ?>
													
												</tbody>
											</table>
										</div>
										
									</div>
									<div role="tabpanel" class="tab-pane fade" id="Section4">
										<div class="table-responsive table-up">
											<table class="table">
												<thead>
													<tr>
														<th>Uploads</th>
														
														<th>Date</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
                             						<?php foreach ($artist as $artist_data) { 
														$node = node_load($artist_data->nid);
														if(isset($node->field_artist_learn['und'][0]['value'])){
															
															
															$infotai = 'Personal';
															$infordate = $createdate;
															if($node->status == 0){
																$status = '<div class="Pending-color">Pending</div>';
																}else if($node->status == 1){
																$status = '<div class="approved-color">Approved</div>';
															}
														?>
														<tr>
															
														</td>
														
														<td class="getContup" data-toggle="modal" data-target="#myModalcontentup" data-content="<?php print $node->field_artist_learn['und'][0]['value']; ?> ">
															<p class="status-upload"><?php print $node->field_artist_learn['und'][0]['value']; ?><p>
															</td>
															
															<td><?php print $createdate; ?></td>
															<td><?php print $status; ?></td>
															</tr>
															
														<?php } } ?>
														
														
														
													</tbody>
												</table>
											</div>
											
										</div>
										
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
					<footer>
						<div class="container">
							<img src="<?php print $fullurl; ?>/Images/logo.png" class="logo-img pull-left">
							<img src="<?php print $fullurl; ?>/Images/dialog.png" class="service pull-right">
						</div>
					</footer>
				</div>
				
				
				<!-- modal -->
				
				
				<div class="modal fade image" id="myModalimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content updatemodal">
							<div class="modal-body" style="padding: 10px; background-color: #000;">
								
								<button type="button" class="close closeb" data-dismiss="modal">&times;</button>
								<img src="" class="show" style="width:100%;">
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="modal fade " id="myModalvideopop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content updatemodal">
							
							<div class="modal-body" style="padding: 10px;background-color: #000;">
								<button type="button" class="close closeb" data-dismiss="modal">&times;</button>
								<video controls class="showvideo" style="width: 100%; margin:0 auto; frameborder:0;">
									<source src="">
								</video>
							</div>
							
						</div>
					</div>
				</div>
				
				<div class="modal fade " id="myModalcontentup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content blue updatemodal">
							<div class="modal-header">
							<button type="button" class="close closeb" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Personal</h4>
							</div>
							<div class="modal-body" >
							<p class="textContentup">
							</p>
							</div>
							
							</div>
							</div>
							</div>
							
							<script>
							$(function() {
							$('#myModalvideopop').modal({
							show: false
							}).on('hidden.bs.modal', function() {
							$(this).find('video')[0].pause();
							});
							});
							</script>
							<script type="text/javascript">
							$('.getimage').click(function() {
							var src = $(this).attr('src');
							
							$('.show').attr('src', src);
							});
							</script>
							
							<script>
							$('.videopopv').click(function() {
							var src = $(this).find('source').attr('src');
							
							$('.showvideo').attr('src', src);
							});
							</script>
							<script>
							$('.getContup').click(function() {
							
							var Ctext = this.getAttribute("data-content");
							$('.textContentup').text(Ctext);
							
							});
							</script>
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