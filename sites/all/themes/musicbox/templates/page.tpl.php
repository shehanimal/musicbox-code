  
  <?php global $base_url;
$themPath = drupal_get_path('theme', 'musicbox');

$fullurl = $base_url.'/'.$themPath;
 global $user;
 $cuser = user_load($user->uid);
?>
  <div id="page-wrapper">
    <div id="page">


				
	 
	<?php if ($is_front): ?>			
	<div class="container" id="imgslider">
					<div class="hero-unit" >
						<img src="<?php print $fullurl. '/images/main_banner.jpg';?>" class="cover-image"/>
					</div>
					
				</div>
	<?php endif; ?>			
			<!--	<div class="container" id="logo-responsive">
					<div class="col-md-12 col-xs-12">
						<div class="col-xs-2" >
							<img src="<?php //print $logo;?>" class="logores"/>
						</div>
						<div class="col-xs-10 "id="imgslider-responsive" >
							<img src="<?php //print $fullurl. '/images/main_banner.jpg';?>" class="cover-image-responsive"/>
						</div>
					</div>
					
				</div>-->
				
				<div id="main-wrapper" class="clearfix"><div id="main" class="clearfix"> 
  	 <div id="content" class="column"><div class="section">
      
   <?php
  if($is_front){
    $title = ''; // This is optional ... it removes the default Welcome to @site-name
    $page['content']['system_main']['default_message'] = array(); // This will remove the 'No front page content has been created yet.'
  }
?>
	  <a id="main-content"></a>
     
   			
  
     
      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      
	 
				
    
				
				
	<div class="container" id="songblock-container">
	<div class="row">
	
		 <?php if ($messages): ?>
	    <div id="messages"><div class="section clearfix">
	      <?php print $messages; ?>
	    </div></div> <!-- /.section, /#messages -->
	  <?php endif; ?>
					
	

	

	</div>
	</div>
	
	



		
									

<?php if ($page['bottom_area']): ?>
<div class="container"id="bottom-area">

									<div class="row bottomarea-background">
									<?php  print render($page['bottom_area']);?>
										<!--<center><img class="adv" src="<?php //print $fullurl. '/images/ADVERTISE.png';?>"></center>-->
									</div>
</div>  


<?php endif; ?>



 <!-- /.section, /#footer-wrapper -->
  
  
  </div>
  </div>  </div>
  
  <?php if ($is_front): ?>
  <div class="footer">

  <img src="<?php print $fullurl?>/images/logo.png" class="footer-logo pull-left">
  <p class="pull-left  footer-text-style">MUSIC BOX - A PLATFORM FOR LOCAL ARTIST</p>
  <div class="pull-right footer-copyrights">
  <p class="pull-left copyrights"><i class="fa fa-copyright " aria-hidden="true"></i>Copy rights- musicbox 2017</p>
  </div>
</div>
<?php endif; ?>