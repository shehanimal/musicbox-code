<?php 
global $base_url;
$modulePath = drupal_get_path('module', 'musicbox_subscriber_report');

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
		<link rel="icon" href="../../favicon.ico">
		
		<title>INCOME REPORT</title>
		
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
					
					<div class="logout">
						<img src="<?php print $fullurl; ?>/images/logout.png " class="logout-res-icon" align="right">
					</div>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				
					<ul class="nav navbar-nav">
						<li ><a  class="top-title" href="<?php print $base_url;?>/admin_panel">DASHBOARD</a></li>
						<li><a  class="top-title" href="#">NEW ENTRY</a>
							<ul >
								<li><a  class="fisrt-link" href="<?php print $base_url;?>/add_artist">Add New Artist</a></li>
								<li><a   class="fisrt-link"href="<?php print $base_url;?>/node/add/new-song">Add New Song </a></li>
								<li ><a   class="fisrt-link" href="<?php print $base_url;?>/node/add/events-publisher">Add New Event</a></li>
							</ul>
						</li>
						<li><a class="top-title" href="#">REPORTS</a>
							<ul >
								<li ><a  class="fisrt-link" href="<?php print $base_url;?>/artist/income">Income</a></li>
								<li><a   class="fisrt-link" href="#">Subscribers</a></li>
								<li ><a   class="fisrt-link" href="#">Artist</a></li>
								<li ><a  class="fisrt-link" href="#">Albumbs/ Songs</a></li>
								<li ><a   class="fisrt-link"href="<?php print $base_url;?>/preferance">Preferences</a></li>
								
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
								<li ><a class="fisrt-link"  href="<?php print $base_url;?>/add_artist">Add New Artist</a></li>
								<li ><a  class="fisrt-link"href="<?php print $base_url;?>/node/add/new-song">Add New Song </a></li>
								<li><a   class="fisrt-link" href="<?php print $base_url;?>/node/add/events-publisher">Add New Event</a></li>
							</ul>
						</li>
						<li><a class="top-title" href="#">REPORTS</a>
							<ul >
								<li ><a class="fisrt-link"  href="<?php print $base_url;?>/artist/income">Income</a></li>
								<li><a  class="fisrt-link" href="#">Subscribers</a></li>
								<li ><a  class="fisrt-link"  href="#">Artist</a></li>
								<li ><a  class="fisrt-link" href="#">Albumbs/ Songs</a></li>
								<li ><a  class="fisrt-link"  href="<?php print $base_url;?>/preferance">Preferences</a></li>
							</ul>
						</li>
						
					</ul>
					
					
				</div>
				
				<div class="logout">
						<a href="<?php print $base_url;?>/user/logout"> <img src="<?php print $fullurl; ?>/images/logout.png " class="logout-icon" align="right" alt="Logout"> </a>
					</div>
					
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h2 class="page-header">ARTIST INCOME REPORT</h2>
					
					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>NAME</th>
				<th></th>
                <th>REGISTERED DATE</th>
				<th>EMAIL</th>
                <th>CITY</th>
                <th>CURRENT PACKAGE</th>
               
            </tr>
        </thead>
        <tfoot>
             <tr>
               <th>NAME</th>
			   <th></th>
                <th>REGISTERED DATE</th>
				<th>EMAIL</th>
                <th>CITY</th>
                <th>CURRENT PACKAGE</th>
            </tr>
        </tfoot>
        <tbody>
		<?php 
$query1=db_select('users','u');

$query1->leftJoin('users_roles','r' , 'u.uid = r.uid');









$query1->condition('r.rid', 3 , '!=');
$query1->condition('r.rid', 4 , '!=');
$query1->condition('r.rid', 6 , '!=');

$query1->fields('u', array('uid'));
	
	$result1 = $query1->execute();  
      
while ($record1 = $result1->fetchAssoc()) {	  
          
		 $subscriber = user_load($record1["uid"]);
		
		 $subscriber_profile = profile2_load_by_user($subscriber->uid, $type_name = 'subscriber') ;
		?>
            <tr>
                <td><?php print $subscriber->name;?></td>
				<td><?php
	$user_fields = user_load($subscriber->uid);
	if(isset($user_fields)){
	$userrolse = $user_fields->roles[5];
	}
	if (isset($userrolse)) {
		print $status = 'Subscriber';
	}else{
		print '<a href="verify_subscriber/'.$row->uid.'" target="_blank">
      <button type="button">Verify</button></a>';
	}
?></td>
				
                <td><?$formatted_date = format_date($subscriber->created, 'custom', 'j M Y D'); 
					$formatted_time = format_date($subscriber->created, 'custom', 'h i a'); 
					print $formatted_date .'  at  '.$formatted_time;?></td>
				<td><?php print $subscriber->email; ?></td>
                <td><?php print $artist_profile->field_artist_precentage['und'][0]['value'];?>%</td>
                <td>100<?php //$subs = _get_amount_of_subscribers($subuid)?></td>
                <td><?php 
				$timestap_start = $artist->created;
				$date_create = format_date($timestap_start, $type = 'medium', $format = '', $timezone = NULL, $langcode = NULL);
				print $date_create;
				?></td>
                <td><?php 
				$income = _get_total_amount($artist->uid);
				print $income;
				?></td>
            </tr>
<?php } ?>
            
        </tbody>
    </table>

								
								
								
								
								
								
								
						
						
						
					</div>
				
				
				<!-- Bootstrap core JavaScript
				================================================== -->
				<!-- Placed at the end of the document so the pages load faster -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
				<script src="js/bootstrap.min.js"></script>
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
		