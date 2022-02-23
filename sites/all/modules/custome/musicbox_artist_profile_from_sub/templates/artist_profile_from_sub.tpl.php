
<?php 
	
	global $base_url; 
	global $user; 
	$cuser=user_load($user->uid); 
	$modulePath = drupal_get_path('module', 'musicbox_artist_profile_from_sub'); 
	$fullurl = $base_url.'/'.$modulePath; 
	$themPath = drupal_get_path('theme', 'musicbox');
	
	$fullurl2 = $base_url.'/'.$themPath;

//exit;
?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<title>Musicbox - Artist Infotainment</title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php print $fullurl; ?>/images/favicon.ico" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
		<link rel="stylesheet" href="<?php print $fullurl; ?>/css/bootstrap.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/footer.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/top-bar.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/container.css">
		<link rel="stylesheet" href="<?php print $fullurl; ?>/css/insideprof.css">
		<link rel="stylesheet" href="<?php print $fullurl; ?>/css/chechbox.css">
		<link rel="stylesheet" href="<?php print $fullurl; ?>/js/select2/dist/css/select2.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
		<script src="<?php print $fullurl; ?>/js/jquery.min.js"></script>
		<script src="<?php print $fullurl; ?>/js/bootstrap.min.js"></script>
	    <script src="<?php print $fullurl; ?>/js/select2/dist/js/select2.min.js"></script>
		<script src="<?php print $fullurl; ?>/js/swip.js"></script>
		<script src="<?php print $fullurl; ?>/js/swipmob.js"></script>
		
		
		
	</head>
	

		
				<body>
					
					
				
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------- ARTIST--------------------------------------------------------------------->
						<div class="container mobile-container " style="background-color:#2d2a2a;">
							
							<div class="text-center" style="height:5vh; background-color:#fff;">
						<i class="fa fa-search"  data-toggle="modal" data-target="#myModalsearch"></i>
						<label class="name-activate2">MUSIC BOX</label>
						<div class="dropdown" style="float:right;">
							<button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
							<i class="fa fa-align-justify"></i></button>
							<ul class="dropdown-menu">
								<li><a href="<?php print $base_url; ?>/infortainment">Home</a></li>
								
							    <li><a href="<?php print $base_url; ?>/change_package" >Change Package</a></li>
								<li><a href="<?php print $base_url; ?>/unsubscribe">Unsubscribe</a></li>
								<li><a href="<?php print $base_url; ?>/user">My Profile</a></li>
								<li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
							</ul>
						</div>
					</div>
							
							<!-- Indicators -->
							
							<!-- Wrapper for slides -->
							<div class="new-inner">
							<?php 
							
								
								
								$artist_info = profile2_load_by_user(arg(1), $type_name = 'artist'); 
								
								
								$artistposter = _show_poster_image(arg(1)); 
								$snode = node_load($artistposter); 
								
								$artistvideo = _show_video_info(arg(1)); 
								$svinode = node_load($artistvideo); 
								
								$artistmotiv = _show_today_motivation_info(arg(1)); 
								$motinode = node_load($artistmotiv);
								
								$artistlearn = _show_artist_learn_info(arg(1)); 
								$learnode = node_load($artistlearn);
							
							?>
								<div class="row">
									
									<div class="col-lg-4 col-md-4  col-sm-6 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-2 slider_name">
										<div class="text-center artist" style="height:5vh;">
											<center>
											<h4 class="art-name"><?php print $artist_info->field_artist_stage_name['und'][0]['value'];?></h4></center>
										</div>
										
									</div>
								</div>
								
								
								<div class="row ">
									<!------------------------------------------------------- 1st artist image --------------------------------------------------------------------->
									<?php	if($artistposter == NULL){ ?>
										<div class="col-lg-6 col-md-6  col-sm-6 col-xs-6 all-right-col " style="background-color:#1f298c; height:44vh;">
											
											<div class="text-center ">
											<h2 class="title "> </h2> </div>
											
											<center><img class="title-img welcome-img" src="<?php print $fullurl; ?>/images/titles-01.png"></center>
											
										</div>
										<?php 
											
											}else {
											
											$snode = node_load($artistposter); 
											
											$story_image_file = file_load($snode->field_story_image_fid['und'][0]['value']);
											
											$story_image_uri = $story_image_file->uri; 
											$story_image_url = file_create_url($story_image_uri); 
											
										?>
										<a href="<?php print $base_url; ?>/pictures/<?php print arg(1); ?>">
										<div class="col-lg-6 col-md-6  col-sm-6 col-xs-6 all-right-col " style="background-color:#1f298c; height:44vh;">
											
											<img class="getSrc imageartist shrink " id="imId " src="<?php print $story_image_url; ?>"  style="width:100%; height:25vh; ">
											<center><img class="title-img-other-views" src="<?php print $fullurl; ?>/images/titles-01.png"></center>
											
										</div></a>
										
									<?php } ?>
									<!------------------------------------------------------- 1st artist video --------------------------------------------------------------------->				
									<?php   if($artistvideo == NULL){ ?> 
										<div class="col-lg-6 col-md-6  col-sm-6 col-xs-6 all-left-col " style="background-color:#fff; height:44vh;">
											<div class="text-center backgroundeight">
											<h2 class="title "></h2></div>
											<center>
												<div style="width: 100%;">
													
													<center><img class="title-img  welcome-img" src="<?php print $fullurl; ?>/images/titles-03.png"></center>
												</div>
												
											</div>
											<?php }else {	
												
												$story_video_file = file_load($svinode->field_story_video_image['und'][0]['value']); 
												$story_video_uri = $story_video_file->uri; 
											$story_video_url = file_create_url($story_video_uri);?>
											
											
											<div class="col-lg-6 col-md-6  col-sm-6 col-xs-6 all-left-col " data-toggle="modal" data-target="#myModalvideo" style="background-color:#fff; height:44vh;">
												
												<center>
													<button type="button" class="btn btn-primary btn-lg" align="center">
														<i class="fa fa-play"></i>
													</button>
												</center>
												
												<center>
													<video class="vdisk" style="height:25vh;">
														<source src="<?php print $story_video_url; ?>" type="video/mp4">
														
													</video>
												</center>
												<center><img class="title-img-other-views" src="<?php print $fullurl; ?>/images/titles-03.png"></center>
												
											</div>
										<?php } ?>
									</div>
									
									<div class="row">
										<!---------------------------------------------------- 1st artist persoanl ------------------------------------------------------------------------------> 
										<?php	if(empty($motinode->field_today_motivation['und'][0]['value'])){ ?>
											<div class="col-md-6 col-md-6  col-sm-6 col-xs-6 all-right-col " style="background-color:#fff; height:44vh;">
												<div class="text-center ">
												<h2 class="title  "></h2></div>
												
												<div class=" text-center">
													
													<center><img class="title-img  welcome-img" src="<?php print $fullurl; ?>/images/titles-02.png"></center>
												</div>
												
											</div>
											<?php } else {?>
											<div class="col-md-6 col-md-6  col-sm-6 col-xs-6 all-right-col   getCont" data-toggle="modal" data-target="#myModalcontent" data-content="<?php print $motinode->field_today_motivation['und'][0]['value'];?> " style="background-color:#fff; height:44vh;">
												
												<div class="background-padding2">
													<div class=" text-center">
														<br>
													<h5 class="title-2 open-AddBookDialog" data-id="ISBN"><?php print $motinode->field_today_motivation['und'][0]['value'];?></h5></div>
												</div>
												<center><img class="title-img-other-views" src="<?php print $fullurl; ?>/images/titles-02.png"></center>
											</div>
										<?php } ?>
										<!---------------------------------------------------- 1st artist learn ------------------------------------------------------------------------------> 						  
										<?php	if(empty($learnode->field_artist_learn['und'][0]['value'])){ ?>
										<div class="col-md-6 col-md-6  col-sm-6 col-xs-6 all-left-col backgroundlearntext getCont" style="background-color:#bd3333; height:44vh;">
											<div class="text-center ">
											<h2 class="title "></h2></div>
											
											<div class=" text-center">
												<center><img class="title-img  welcome-img" src="<?php print $fullurl; ?>/images/titles-04.png"></center>
											</div>
											
										</div>
										<?php } else {?>
												<div class="col-md-6 col-md-6  col-sm-6 col-xs-6 all-left-col backgroundlearntext getCont" data-toggle="modal" data-target="#myModalLearn" data-content="<?php print $learnode->field_artist_learn['und'][0]['value'];?> " style="background-color:#bd3333; height:44vh;">
												
												<div class="background-padding2">
													<div class=" text-center">
														<br>
													<h5 class="title-2 open-AddBookDialoglearn" data-id="ISBN"><?php print $learnode->field_artist_learn['und'][0]['value'];?></h5></div>
												</div>
											<center><img class="title-img-other-views" src="<?php print $fullurl; ?>/images/titles-04.png"></center>
											</div>
										<?php } ?>
									</div>
									
									
									
									
				
									
								</div>
								
								<footer>
									<div class="container">
										<img src="<?php print $fullurl; ?>/images/logo.png" class="logo-img pull-left">
										<img src="<?php print $fullurl; ?>/images/dialog.png" class="service pull-right">
									</div>
								</footer>
								
							</div>
				
							
							
							
					
								
								
								<!----- ------------------------------------------------------------------------------------------ -->
								<script>
									$(function() {
										$('#myModalvideo').modal({
											show: false
											}).on('hidden.bs.modal', function() {
											$(this).find('video')[0].pause();
										});
									});
								</script>
								
								<script type="text/javascript">
									$('.getSrc').click(function() {
										var src = $(this).attr('src');
										
										$('.showPic').attr('src', src);
									});
								</script>
								
								<script>
									$('.vdisk').click(function() {
										var src = $(this).find('source').attr('src');
										
										$('.showv').attr('src', src);
									});
								</script>
								
								<script>
									$('.getCont').click(function() {
										
										var Ctext = this.getAttribute("data-content");
										$('.textContent').text(Ctext);
										// alert(text);
										// do something with the text
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
								
								
								
								<script>
									$(document).ready(function() {  
										//add your other targets here
										$("#myCarouselimage2").swiperight(function() {  
											$(this).carousel('prev');  
										});  
										//add your other targets here
										$("#myCarouselimage2").swipeleft(function() {  
											$(this).carousel('next');  
										});  
									});  
								</script>
								
								
								
								<script>
									
									
								</script>
								<script>
									$('#myModalimage').on('show.bs.modal',function(){
										$('#myCarouselimage2').carousel(0)
									}) 
									
								</script> 
								
								
							</body>
				
						
						<div class="modal fade " id="myModalcontent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content blue">
										<div class="modal-header">
											<button type="button" class="close closeb" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Personal</h4>
										</div>
										<div class="modal-body">
											<p class="textContent">
											</p>
										</div>
										
									</div>
								</div>
							</div>
							
							<div class="modal fade " id="myModalLearn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content blue">
										<div class="modal-header">
											<button type="button" class="close closeb" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Learn</h4>
										</div>
										<div class="modal-body">
											<p class="textContent">
											</p>
										</div>
										
									</div>
								</div>
							</div>
							
							<div class="modal fade " id="myModalvideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										
										<div class="modal-body" style="padding:10px; background-color:#000;">
											<button type="button" class="close closeb" data-dismiss="modal">&times;</button>
											<video controls class="showv" style="width: 100%; margin:0 auto; frameborder:0;">
												<source src="">
											</video>
										</div>
										
									</div>
								</div>
							</div>
													<!-- serach modal -->
<div class="modal fade bs-modal-sm" id="myModalsearch" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-body search">
   
<button type="button" class="close closeb" data-dismiss="modal">&times;</button>
<div class="dropdown searchdropdown">

  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
<?php 
$artistlist = _get_music_box_artist_list_of_thoughts($user->uid); 
foreach($artistlist as $selectartist ) {
$artist_info = profile2_load_by_user($selectartist->artist_uid, $type_name = 'artist'); 

    $file = file_load($artist_info->field_artist_profile_picture['und'][0]['fid']);
    $uri = $file->uri;
    $url = file_create_url($uri);


?>   
   <a href="<?php print $base_url; ?>/artist/<?php print $selectartist->artist_uid; ?>"><?php print $artist_info->field_artist_stage_name['und'][0]['value'];?><img class="circle-img" src="<?php print $url;?>"></a>
<?php } ?>
  </div>
</div>


    
  </div>
	</div></div></div>			
							<script>
								$(function() {
									$('#myModalvideo').modal({
										show: false
										}).on('hidden.bs.modal', function() {
										$(this).find('video')[0].pause();
									});
								});
							</script>
							
				
							
							<script>
								$('.vdisk').click(function() {
									var src = $(this).find('source').attr('src');
									
									$('.showv').attr('src', src);
								});
							</script>
							
							<script>
								$('.getCont').click(function() {
									
									var Ctext = this.getAttribute("data-content");
									$('.textContent').text(Ctext);
									// alert(text);
									// do something with the text
								});
							</script>
						
							
							
							<script>
								$(document).ready(function() {  
									//add your other targets here
									$("#myCarousel, #myCarouselimage2, #myCarouselimage").swiperight(function() {  
										$(this).carousel('prev');  
									});  
									//add your other targets here
									$("#myCarousel, #myCarouselimage2, #myCarouselimage").swipeleft(function() {  
										$(this).carousel('next');  
									});  
								});  
							</script>
				<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    div = document.getElementById("myDropdown");
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
        } else {
            a[i].style.display = "none";
        }
    }
}
</script>
						
					</html>
								