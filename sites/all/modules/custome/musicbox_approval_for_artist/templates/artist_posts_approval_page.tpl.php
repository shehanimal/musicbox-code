<?php 
global $base_url;
$modulePath = drupal_get_path('module', 'musicbox_approval_for_artist');

$themePath = drupal_get_path('theme', 'musicbox');
$fullurl = $base_url.'/'.$modulePath;
$fullurl2 = $base_url.'/'.$themePath;

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
    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php print $fullurl; ?>/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <!-- Custom styles for this template -->
    <link href="<?php print $fullurl; ?>/css/dashboard.css" rel="stylesheet">
	<link href="<?php print $fullurl; ?>/css/tabstyles.css" rel="stylesheet">
    <link href="<?php print $fullurl; ?>/css/panel.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


 
</head>

<body>
 <?php 
  global $user;
  global $base_url;
$cuser = user_load($user->uid);
if(isset($image_fid)){
$image_fid = $cuser->picture->fid;
}else{
	$image_fid = 569;
	
}

$file = file_load($image_fid);

	
    $uri = $file->uri;
	
    $url = file_create_url($uri);
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
					<a href="<?php print $base_url;?>/admin_panel">	<img src="<?php print $fullurl;?>/Images/logo.png " class="logo pull-left" > </a>
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
							
						
							
						</div>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a class="top-title" href="<?php print $base_url;?>/admin_panel">DASHBOARD</a></li>
                    <li><a class="top-title" href="#">NEW ENTRY</a>
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
                    <a href="<?php print $base_url;?>/admin_panel"><img src="<?php print $fullurl;?>/images/logo.png " class="logo">
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
								<li><a class="fisrt-link"href="<?php print $base_url;?>/artist-approval">Artist Infotainment</a></li>
								
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
			<form action="<?php print $base_url;?>/selectall_submit" method="post">
             <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  		<div class="Select-Subscription-plan text-center ">
						<label class="art">Type Of Info</label>
							<select name="postchange" id="postchange">
						    <option value="showAll" selected="selected" >Type of Info</option>
									
							
							
							<?php print fill_infrotype(); ?>
	 

							</select>
							<br>
						<input type="checkbox" id="select_all"/> Select All
						<input class="checkbox approve" type="submit" name="submit" Value="Approve"/>	
						
			</div>
  <div class="panel panel-default">
    <div class="panel-body">
	<div class="scrollbar-display-panel">
						
	<div class="row" id="show_approval">
     <?php	print _get_listof_infortatements(); ?>
	
	
	
	
  </div>
  
  

   </div> </div></div></div></div></div></form>
   
<!-- Bootstrap core JavaScript
			================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  
    
     

    <script src="<?php print $fullurl; ?>/js/bootstrap.min.js"></script>
	 <script src="<?php print $fullurl2;?>/js/jquery.min.js"></script>
	 <script>  
 jQuery(document).ready(function(){  
      $('#postchange').change(function(){  
           var post_nid = $(this).val();  
           $.ajax({  
                url:"/musicbox.lk/artistapproval_process",  
                method:"POST",  
                data:{post_nid:post_nid},  
                success:function(data){  
                     $('#show_approval').html(data);  
                }  
           });  
      });  
 });  
 </script> 
 <script>		
var select_all = document.getElementById("select_all"); //select all checkbox
var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
    for (i = 0; i < checkboxes.length; i++) { 
        checkboxes[i].checked = select_all.checked;
    }
});


for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){
            select_all.checked = false;
        }
        //check "select all" if all checkbox items are checked
        if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
            select_all.checked = true;
        }
    });
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
			<script src="<?php print $fullurl; ?>/js/bootstrap.min.js"></script>
			
</body>

</html>