
<?php

 //print '<pre>';
//print_r($form);
 //print '</pre>';exit;
//print drupal_render($form['event_calendar_date']);


/*print '<div class="hidediv">';
print drupal_render_children($form); 
print '</div>';
print '<div class="hidediv">';
//print drupal_render($form['field_jo_registrtion_number']);
print '</div>';
print '<div class="hidediv">';
print drupal_render($form['form_token']);
print '</div>';
print '<div class="hidediv">';
print drupal_render($form['form_id']);
print '</div>';
print '<div class="hidediv">';
print drupal_render($form['menu']);
print '</div>';*/


global $base_url;
$themePath = drupal_get_path('theme', 'adminpannel');
$fullurl = $base_url.'/'.$themePath;


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php print $fullurl ?>/css/bootstrap.css" rel="stylesheet">
		<link href="<?php print $fullurl ?>/css/style.css" rel="stylesheet">
		
	</head>
	
	<body>
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 nav-side-menu">
				<img src="<?php print $fullurl ?>/images/logo.png " class="logo">
					<div class="topnav" id="myTopnav">
						
						
							<a  class="top-title" href="#">DASHBOARD</a>
						
						<a  class="fisrt-link" href="<?php print $base_url;?>/add_artist" target="_blank">Add New Artist</a>
						<a  class="fisrt-link" href="<?php print $base_url;?>/node/add/new-song" target="_blank">Add New Song </a>
						<a  class="fisrt-link" href="<?php print $base_url;?>/node/add/event-calendar" target="_blank">Add New Event</a>
						
						<a class="top-title" href="#" target="_blank">REPORTS</a>
						<a class="fisrt-link"href="<?php print $base_url;?>/income" target="_blank">Income</a>
						<a class="fisrt-link"href="<?php print $base_url;?>/subscriber-info" target="_blank">Subscribers</a>
						<a class="fisrt-link" href="<?php print $base_url;?>/artist-info" target="_blank">Artist</a>
						<a class="fisrt-link"href="<?php print $base_url;?>/songs-info" target="_blank">Albumbs/Songs</a>
					
						
						
						
						<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
					</div><p class="copyright" >Copyrights-Music box 2018 </p>
				</div>
					
					
					
				
				
				
				<div class=" col-sm-offset-3 col-md-10 col-md-offset-2">
					<h3 class="page-header">NEW EVENT INFORMATION</h3>
					<form class="form-horizontal">
						<div class=" col-md-10"> 
							<div class="form-group">
								
								
								<?php print drupal_render($form['field_event_name']);?>
									
							</div>
							
							<div class="form-group">
								<?php print drupal_render($form['field_event_organized_by']);?>
							</div>
							
							<div class="form-group">
								<?php print drupal_render($form['field_event_primary_artist']);?>
							</div>
							<div class="form-group">
								<?php print drupal_render($form['field_event_featuring_artists']);?>
							</div>
							
							<div class="form-group">
								<div class="form-group">
								<?php print drupal_render($form['event_calendar_date']);?>
							</div>
								</div>
								
								<div class="col-xs-3 margin-NIC">
									
								</div>
							</div>
							
							
							<div class="form-group">
								<label for="Info" class="control-label col-xs-2"></label>
								<div class="col-md-8">
									<?php print drupal_render($form['body']);?>
								</div>
							</div>
							
							
						</div> 
						
							
							
				
						
						<div class=" col-md-12 ">
						<input type="button" class="eventbtn" value="Cancel">
						<?php print drupal_render($form['actions']['submit']);?>
						</div>
						
					</form>
					
					
					
				</div>
			</div>
		</div>
		
		
		
	</body>
	<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
				} else {
				x.className = "topnav";
			}
		}
	</script>
	<script src="js/bootstrap.min.js"></script>
</html>
