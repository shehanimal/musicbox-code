<?php 
   global $base_url;
   $modulePath = drupal_get_path('module', 'musicbox_custome_artist');
   
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
      <link rel="shortcut icon" type="image/x-icon" href="<?php print $fullurl; ?>/images/favicon.ico" />
      <title>Musicbox - Add Artist</title>
      <!-- Bootstrap core CSS -->
      <link href="<?php print $fullurl; ?>/css/bootstrap.css" rel="stylesheet">
      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <!-- Custom styles for this template -->
      <link href="<?php print $fullurl; ?>/css/dashboard.css" rel="stylesheet">
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
                  <img src="<?php print $fullurl; ?>/images/logo.png " class="logo">
               </div>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
               <ul class="nav navbar-nav">
                  <li ><a  class="top-title" href="<?php print $base_url;?>/admin_panel">DASHBOARD</a></li>
                  <li>
                     <a  class="top-title" href="#">NEW ENTRY</a>
                     <ul >
                        <li><a class="fisrt-link"href="<?php print $base_url;?>/preferance">Preferences</a></li>
                        <li><a class="fisrt-link" href="<?php print $base_url;?>/add_artist">Add New Artist</a></li>
                     </ul>
                  </li>
                  <li>
                     <a class="top-title" href="#">REPORTS</a>
                     <ul >
                        <li><a class="fisrt-link"href="<?php print $base_url;?>/artist/income">Income</a></li>
                        <li><a class="fisrt-link"href="<?php print $base_url;?>/subscriber-info">Subscribers</a></li>
                        <li><a class="fisrt-link" href="<?php print $base_url;?>/artist-info">Artist</a></li>
                     </ul>
                  </li>
                  <li>
                     <a class="top-title" href="#">APPROVAL</a>
                     <ul >
                        <li><a class="fisrt-link"href="<?php print $base_url;?>/artist-approval">Artist Infotainment</a></li>
                        <?php if ($cuser->uid == 163) { ?>
                        <li><a class="fisrt-link"href="<?php print $base_url;?>/registration_admin">Create Admin Account</a></li>
                        <?php } ?>
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
                  <img src="<?php print $fullurl; ?>/images/logo.png " class="logo">
               </div>
               <ul class="nav nav-pills nav-stacked">
                  <li ><a  class="top-title" href="<?php print $base_url;?>/admin_panel">DASHBOARD</a></li>
                  <li>
                     <a  class="top-title" href="#">NEW ENTRY</a>
                     <ul >
                        <li><a class="fisrt-link"href="<?php print $base_url;?>/preferance">Preferences</a></li>
                        <li><a class="fisrt-link" href="<?php print $base_url;?>/add_artist">Add New Artist</a></li>
                     </ul>
                  </li>
                  <li>
                     <a class="top-title" href="#">REPORTS</a>
                     <ul >
                        <li><a class="fisrt-link"href="<?php print $base_url;?>/artist/income">Income</a></li>
                        <li><a class="fisrt-link"href="<?php print $base_url;?>/subscriber-info">Subscribers</a></li>
                        <li><a class="fisrt-link" href="<?php print $base_url;?>/artist-info">Artist</a></li>
                     </ul>
                  </li>
                  <li>
                     <a class="top-title" href="#">APPROVAL</a>
                     <ul >
                        <li><a class="fisrt-link"href="<?php print $base_url;?>/artist-approval">Artist Infotainment </a></li>
                        <?php if  ($cuser->uid == 163) { ?>
                        <li><a class="fisrt-link"href="<?php print $base_url;?>/registration_admin">Admin Registration</a></li>
                        <?php } ?>
                     </ul>
                  </li>
               </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <h2 class="page-header">ADD NEW ARTIST</h2>
               <div class="row placeholders">
                  <div class="col-xs-12 col-sm-12	">
                     <form method="post" action="<?php print $base_url;?>/create_artist" class="form-horizontal form-alignment">
                        <h4 class="page-subheader">ARTIST NAME</h4>
                        <div class="row placeholder panel-section">
                           <div class="col-sm-4">
                              <div class="form-group">
                                 <label class="control-label " >Name:</label>
                                 <input required type="text" class="form-control" id="name" placeholder="Enter Name" name="artist_name">
                              </div>
                           </div>
                           <div class="col-sm-4">
                              <div class="form-group">
                                 <label class="control-label ">Surname  </label>
                                 <input type="text" class="form-control" id="inputSurname" name="artist_surname" placeholder="Please Enter Surname">
                              </div>
                           </div>
                           <div class="col-sm-4">
                              <div class="form-group">
                                 <label class="control-label">Stage Name</label>
                                 <input type="text" required class="form-control" name="stage_name" id="inputStage Name" placeholder="Please Mention Stage Name">
                              </div>
                           </div>
                        </div>
                        <h4 class="page-subheader">PERSONAL DETAILS</h4>
                        <div class="row placeholder  panel-section">
                           <div class="col-sm-6">
                              <div class="form-group" >
                                 <label class="control-label"> Date of Birth </label>
                                 <input type="date" name="dateofbirth" class="form-control" id="inputBirth" placeholder="E.g., 2018-01-05">
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group" >
                                 <label class="control-label " >NIC Number </label>
                                 <input type="text" name="artistnic" class="form-control" id="inputNIC" placeholder="Please Enter NIC number">
                              </div>
                           </div>
                        </div>
                        <h4 class="page-subheader">CONTACT</h4>
                        <div class="row placeholder  panel-section">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label"> Address </label>
                                 <input type="text" name="artistaddress" class="form-control" id="inputaddress" placeholder="Enter address">
                              </div>
                           </div>
                           <div class=" col-sm-6">
                              <div class="form-group">
                                 <label class="control-label"> Contact Number </label>
                                 <input type="text" name="artistcontact" class="form-control" id="inputNumber" placeholder="mention contact number">
                              </div>
                           </div>
                           <div class=" col-sm-6">
                              <div class="form-group">
                                 <label class="control-label"> Email Address</label>
                                 <input type="email" required name="artistemail" class="form-control" id="inputEmail" placeholder="mention Email Address">
                              </div>
                           </div>
                        </div>
                        <h4 class="page-subheader">GENARAL INFOR</h4>
                        <div class="row placeholder  panel-section">
                           <div class="col-sm-12">
                              <div class="form-group">
                                 <label class="control-label"> Genaral Info </label>
                                 <textarea rows="8" class="form-control" id="inputName" name="genaralinfor" placeholder=""></textarea >
                              </div>
                           </div>
                        </div>
                        <h4 class="page-subheader">EXTERNAL</h4>
                        <div class="row placeholder  panel-section">
                           <div class="col-sm-6">
                              <label class="control-label">Assaing for Bunlde</label>
                              <div class="form-group ">
                                 <?php print get_artist_bundle_list(); ?>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="form-group">
                                 <label class="control-label"> Artist Payment %</label>
                                 <input type="number" required class="form-control" name="artist_payment" id="inputEmail" placeholder="Enter payment value only ">
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="row placeholders">
                  <div class="col-sm-12">
                  <button type="submit" name="create" class="btn btn-primary">Create</button>
                  <div class="col-sm-12">
                  </div>
                  </div>
                  </div>
                  </form>
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
      <script>
         $(document).ready(function(){
             $("form").submit(function(){
         		if ($('input:checkbox').filter(':checked').length < 1){
                 alert("Assign relavant Bundles");
         		return false;
         		}
             });
         });
      </script>
   </body>
</html>