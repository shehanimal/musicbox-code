<?php 
global $base_url;
$modulePath = drupal_get_path('module', 'musicbox_preference_page_config');

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
		
		<title>Musicbox - Preferences</title>
		
		<!-- Bootstrap core CSS -->
		<link href="<?php print $fullurl; ?>/css/bootstrap.css" rel="stylesheet">
		
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		
		<!-- Custom styles for this template -->
		<link href="<?php print $fullurl; ?>/css/preference.css" rel="stylesheet">
		
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
					<a href="<?php print $base_url;?>" target="_blank">	<img src="<?php print $fullurl;?>/images/logo.png " class="logo pull-left" > </a>
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
						<li><a class="fisrt-link"href="<?php print $base_url;?>/preferance">Preferences</a></li>
							
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
					<a href="<?php print $base_url;?>" target="_blank">	<img src="<?php print $fullurl; ?>/images/logo.png " class="logo"></a>
					</div>
					
					<ul class="nav nav-pills nav-stacked">
						
						<li ><a  class="top-title" href="<?php print $base_url;?>/admin_panel">DASHBOARD</a></li>
						<li><a  class="top-title" href="#">NEW ENTRY</a>
							<ul >
								<li><a class="fisrt-link" href="<?php print $base_url;?>/add_artist">Add New Artist</a></li>
								<li><a class="fisrt-link"href="<?php print $base_url;?>/preferance">Preferences</a></li>
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
					
					
					
					
					<h2 class="page-header">PREFERENCES</h2>
					<div class="row">
					<div class="col-md-6 border-right">
					<h4 class="page-subheader">CREATE RANKS</h4>
						
								
								
								
								<form method='post' action="<?php print $base_url;?>/create_package" class="form-horizontal form-alignment">
								
								
								
								<div class="row placeholder panel-section">
									
									<div class="col-sm-12">
										
										<div class="form-group">
											<label class="control-label " >Package</label>
											
											<input type="text" class="form-control" id="package" placeholder="Enter Package" name="packagename" required>
											
										</div>	<div class="form-group">
											<label class="control-label " >Package amount</label>
																<select name="packassign"  >  
                          <option value="">Select package</option>  
                          <?php print get_package_assigment_items(); ?>  
                     </select>
										</div>
									</div>
									
								</div>
									<div class="row placeholders">
								<div class="col-sm-12">
									<button type="submit" name="package_submit" class="prefernce-submit">Save</button>
								
									
								
							</div>
						</div>
								</form>
								
								
								<h4 class="page-subheader">VIEW LIST</h4>
										<div class="table-responsive"> 
								<table class="table  table-hover">
							
									<tbody>
							<?php $ranks = taxonomy_get_tree(7);
							
								foreach ($ranks as $term) {
								 $rankterm = taxonomy_term_load($term->tid);
		$packterm = taxonomy_term_load($rankterm->field_assing_package_value['und'][0]['tid']);
								?>
									
										<tr>
											<td><?php print $rankterm->name; ?></td>
											<td>Rs <?php print $packterm->name; ?></td>
											<td><button type="button" class="" data-toggle="modal" data-target="#myModal<?php print $rankterm->tid;?>">edit</button></td>
										</tr>
										<div id="myModal<?php print $rankterm->tid;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      <div class="modal-body">
       				<form method='post' action="<?php print $base_url;?>/update_package" class="form-horizontal form-alignment">
								
								
								  <input type="hidden" id="packtermid" name="packtermid" value="<?php print $rankterm->tid;?>">
								<div class="row placeholder panel-section">
									
									<div class="col-sm-12">
										
										<div class="form-group">
											<label class="control-label " >Bundle name</label>
											
											<input type="text" class="form-control" id="package" placeholder="Enter Package" value="<?php print $rankterm->name;?>" name="packagenameedit" >
											
										</div>	<div class="form-group">
											<label class="control-label " >Package assignmnt</label>
									
																					<select name="packassignedit"  >  
                       <option selected="selected" value="<?php print $rankterm->field_assing_package_value['und'][0]['tid'];?>"><?php print $packterm->name; ?></option>
                          <?php print get_package_assigment_items(); ?>  
                     </select>
											
										
										</div>
									</div>
									
								</div>
									<div class="row placeholders">
								<div class="col-sm-12">
									<button type="submit" name="package_update" class="prefernce-update">Update</button>
								
									
								
							</div>
						</div>
								</form>
      </div>
   
    </div>

  </div>
</div>
										
										
								<?php } ?>
									</tbody>
								</table>
								

							</div>
					</div>
					
					<div class="col-md-6">
					<h4 class="page-subheader">Pacakge and Values</h4>
						<?php
                    $block = module_invoke('musicbox_preference_page_config', 'block_view', 'create_subscription_plan_block');
	                 
                  print render($block['content']);?>
								<h4 class="page-subheader">View list</h4>
										<div class="table-responsive"> 
								<table class="table  table-hover">
									<thead>
					<?php $plans = taxonomy_get_tree(4);
							
								foreach ($plans as $term) {
								 $planterm = taxonomy_term_load($term->tid)

								?>
										<tr>
											<td><?php print $planterm->field_subs_plan_name['und'][0]['value']; ?></td>
											<td>Rs.<?php print $planterm->field_amount_of_palan['und'][0]['value']; ?>.00</td>
											<td><?php $ran_ = taxonomy_term_load($planterm->field_rank_assinged['und'][0]['tid']); 
											print $ran_->name;
											?></td>
											
										</tr>
								<?php } ?>
									</tbody>
								</table>
								

							</div>
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
			
			
		</body>
	</html>
