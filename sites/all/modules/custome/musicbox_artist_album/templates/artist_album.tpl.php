<?php 
	global $user;
	global $base_url;
	$cuser=user_load($user->uid);
	$modulePath = drupal_get_path('module','musicbox_artist_album');

	$fullurl = $base_url.'/'.$modulePath;
	//print $decodeuser;exit;
	$artist_info = profile2_load_by_user(arg(1), $type_name = 'artist'); 
	$status = check_subscribers_artist($cuser->uid,arg(1));
?>
<!DOCTYPE html>
<?php if((isset($cuser->roles[1])) && ($cuser->roles[1] == 'anonymous user')) { ?> 			
<html lang="en">
	
	<head>
   <title>Unsubscribe</title>
   <link rel="shortcut icon" type="image/x-icon" href="<?php print $fullurl; ?>/images/favicon.ico" />
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
   <link rel="stylesheet" href="<?php print $fullurl;?>/css/bootstrap.css">
   <link rel="stylesheet" href="<?php print $fullurl;?>/css/chechbox.css">
   <link rel="stylesheet" href="<?php print $fullurl;?>/css/unsubscribe.css">
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
            <button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
            <i class="fa fa-align-justify"></i></button>
            <ul class="dropdown-menu">
               <li><a href="<?php print $base_url; ?>/infortainment" >Home</a></li>
               <li><a href="<?php print $base_url; ?>/user">Login</a></li>
            </ul>
         </div>
      </div>
      <div class="new-inner ">
         <div class="row row-title">
            <div class="col-lg-4 col-md-4  col-sm-6 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-2">
               <div class="text-center  ">
                  <div class="text-center artist" style="height:5vh;">
                     <center>
                        <h6  class="upload-st">UNSUBSCRIBE</h6>
                     </center>
                  </div>
               </div>
            </div>
         </div>
         <div class="container padding-all">
            <h6 class="text-center unsubs upload-st">You are not authorized to view this page</h6>
            <center>
               <a href="<?php print $base_url; ?>/user"> <button type="button" class="btn btn-default">LOGIN</button></a>
            </center>
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
   </div>
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
</body>

</html>
	<?php }else if((isset($cuser->roles[5])) && ($cuser->roles[5] == 'Subscriber')){?>
		<html lang="en">
			<head>
		<title>Artist Album</title>
		<link rel="shortcut icon" type="image/x-icon" href="<?php print $fullurl; ?>/images/favicon.ico" />
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/bootstrap.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/album.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/footer.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/top-bar.css">
		<link rel="stylesheet" href="<?php print $fullurl;?>/css/container.css">
		<link rel="stylesheet" href="<?php print $fullurl; ?>/css/inactive.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
		
		<script src="<?php print $fullurl;?>/js/jquery.min.js"></script>
		<script src="<?php print $fullurl;?>/js/bootstrap.min.js"></script>
		<script src="<?php print $fullurl;?>/js/swip.js"></script>
		<script src="<?php print $fullurl;?>/js/swipmob.js"></script>
		<script src="<?php print $fullurl;?>/js/jquery.livequery.js"></script>
		
		
	</head>
	<?php $paystatus = get_payment_status($cuser->uid);
			if($paystatus == 0) {?>
			<body>
   <div class="container mobile-container " style="background-color:#3A3A3C; overflow:auto;">
      <div class="text-center" style="height:6vh; background-color:#fff;">
         <label class="name-activate2">MUSIC BOX</label>
         <div class="dropdown" style="float:right;">
            <button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
            <i class="fa fa-align-justify"></i></button>
            <ul class="dropdown-menu">
               <li><a href="<?php print $base_url; ?>/infortainment">Home</a></li>
               <li><a href="<?php print $base_url; ?>">Change Package</a></li>
             
               <li><a href="<?php print $base_url; ?>/unsubscribe">Unsubscribe</a></li>
               <li><a href="<?php print $base_url; ?>/user">My Profile</a></li>
               <li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
			   		
            </ul>
         </div>
      </div>
      <div class="new-inner">
         <div class="row .row-title">
            <div class="col-lg-4 col-md-4  col-sm-6 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-2">
               <div class="text-center  ">
                  <div class="text-center artist" style="height:5vh;">
                     <center>
                        <h6  class="upload-st-fu">INSUFFICIENT FUNDS</h6>
                     </center>
                  </div>
               </div>
            </div>
         </div>
         <div class="row rowheight" style="background-color: #3A3A3C;">
            <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
               <div class="container padding-all">
                  <h6 class="text-center unsubs upload-st">your account has been temporarily deactivated due to insufficient funds
                     please top up your credits to activate your account
                  </h6>
                  <center>
                     <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#myModalUnsubscribe"data-backdrop="static" data-keyboard="false">Activate</button>
                  </center>
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
   <!-- Modal -->
   <div id="myModalUnsubscribe" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content unsubcontent">
            <div class="modal-body">
               <p class="text-center unsubscribemsg">Are you sure you want to Activate?</p>
            </div>
            <div class="modal-footer">
               <center> <a href="<?php print $base_url; ?>/active_user/<?php print $user->uid; ?>"> <button type="button" class="btn btn-default">YES</button></a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">NO</button> 
               </center>
            </div>
         </div>
      </div>
   </div>
</body><?php } else { 
			
			if($status == 'no'){?>
			<body>
   <div class="container mobile-container " style="background-color:#3A3A3C; overflow:auto;">
      <div class="text-center" style="height:6vh; background-color:#fff;">
         <label class="name-activate2">MUSIC BOX</label>
         <div class="dropdown" style="float:right;">
            <button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
            <i class="fa fa-align-justify"></i></button>
             <ul class="dropdown-menu sub-menu">
            <li><a href="<?php print $base_url; ?>/infortainment">Home</a></li>
        
         <li><a href="<?php print $base_url; ?>/change_package" >Change Package</a></li>
            <li><a href="<?php print $base_url; ?>/unsubscribe">Unsubscribe</a></li>
            <li><a href="<?php print $base_url; ?>/user">My Profile</a></li>
            <li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
         </ul>
         </div>
      </div>
      <div class="new-inner">
         <div class="row .row-title">
            <div class="col-lg-4 col-md-4  col-sm-6 col-xs-8 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-2">
               <div class="text-center  ">
                  <div class="text-center artist" style="height:5vh;">
                     <center>
                        <h6  class="upload-st-fu">UNAUTHORIZED ACCESS</h6>
                     </center>
                  </div>
               </div>
            </div>
         </div>
         <div class="row rowheight" style="background-color: #3A3A3C;">
            <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
               <div class="container padding-all">
                  <h6 class="text-center unsubs upload-st">you are not subscribe this artist , if you want to see this artist please subscribe 
                  </h6>
                  <center>
                 <a href="<?php print $base_url; ?>/change_package">    <button type="button" class="btn btn-default">ADD ARTIST</button></a>
                  </center>
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
   <!-- Modal -->
   <div id="myModalUnsubscribe" class="modal fade" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content unsubcontent">
            <div class="modal-body">
               <p class="text-center unsubscribemsg">Are you sure you want to Activate?</p>
            </div>
            <div class="modal-footer">
               <center> <a href="<?php print $base_url; ?>/add_more"> <button type="button" class="btn btn-default">YES</button></a>
                  <button type="button" class="btn btn-default" data-dismiss="modal">NO</button> 
               </center>
            </div>
         </div>
      </div>
   </div>
</body>	
<?php } else if($status == 'yes'){?>
			
			<body>
		
	<div class="container mobile-container " style="background-color:#2d2a2a;">
   <div class="text-center" style="height:5vh; background-color:#fff;">
      <i class="fa fa-search"  data-toggle="modal" data-target="#myModalsearch"></i>
      <label class="name-activate2">MUSIC BOX</label>
      <div class="dropdown" style="float:right;">
         <button class="btn btn-primary dropdown-toggle menu-button" type="button" data-toggle="dropdown">
         <i class="fa fa-align-justify"></i></button>
         <ul class="dropdown-menu sub-menu">
            <li><a href="<?php print $base_url; ?>/infortainment">Home</a></li>
           
           <li><a href="<?php print $base_url; ?>/change_package" >Change Package</a></li>
            <li><a href="<?php print $base_url; ?>/unsubscribe">Unsubscribe</a></li>
            <li><a href="<?php print $base_url; ?>/user">My Profile</a></li>
            <li><a href="<?php print $base_url; ?>/user/logout">Logout</a></li>
         </ul>
      </div>
   </div>
   <div id="myCarouselimage2" class="carousel slide " data-ride="carousel" data-interval="false">
      <!-- Wrapper for slides -->
      <div class="carousel-inner" style="background-color:#2d2a2a">
         <div class="item active">
            <div class="row">
               <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12  slider_name">
                  <div class="text-center artist" >
                     <center>
                        <h4 class="art-name"><?php print $artist_info->field_artist_stage_name['und'][0]['value'];?></h4>
                     </center>
                  </div>
                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarouselimage2" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" style="background-image:"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarouselimage2" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
            <?php $artimage_list = _get_gallery_image(arg(1)); 
		
               $ginode = node_load($artimage_list[0]->nid); 
               
               $gallery_image_file = file_load($ginode->field_story_image_fid['und'][0]['value']);
               
               $gallery_image_uri = $gallery_image_file->uri; 
               $gallery_image_url = file_create_url($gallery_image_uri);?>
			   
            <center><img src="<?php print $gallery_image_url; ?>" class="showPic img-of-artist"> </center>
            <?php 
               $query = db_select('musicbox_like_post', 'm')
               ->condition('m.post_id', $ginode->nid, '=')
               ->condition('m.user_id', $cuser->uid, '=')
               ->fields('m', array('user_id'))
               ->execute();
               $num = $query->rowCount();
              
               $likedcount = likepost_get_total_like($ginode->nid);
               $liked = already_liked($ginode->nid,$cuser->uid);
               
               if($likedcount == 0){
               $likesta = '';
               }else if($likedcount == 1){
               $likesta = '1 like';
               }else if($likedcount > 1){
               $likesta = $likedcount.' likes';
               }
           if($num == 1){?>
            <div class="displaylike">
               <div class="likebutton"><button id="<?php print $ginode->nid;?>" value="<?php print $ginode->nid; ?>" class="unlike"><i class="fa fa-thumbs-up" style="color:#feab3e;"></i> </button></div>
               <span id="show_like">
                  <div id="show_like1">
                     <?php print $likesta;?>
                  </div>
                  <div id="show_like2" style="display:none;">
                     222222222222
                  </div>
               </span>
            </div>
            <?php }else {?>
            <div class="displaylike">
               <div class="likebutton"><button id="<?php print $ginode->nid;?>" value="<?php print $ginode->nid; ?>" class="like"><i class="fa fa-thumbs-up"></i></button></div>
               <span id="show_like">
                  <div id="show_like1">
                     <?php print $likesta;?>
                  </div>
                  <div id="show_like2" style="display:none;">
                     7777777777777
                  </div>
               </span>
            </div>
            <?php } ?>
            <?php 
               if(($likedcount - 1) == 0){
               	$likeedsta = '';
               }else if(($likedcount - 1) == 1){
               	$likeedsta = '1 like' ;
               }else if(($likedcount - 1) > 1){
               	$likeedsta = ($likedcount - 1) .' likes';
               }
               
               ?>						
            <script>		
               $('.unlike').on('click',function(){
                   if($('#show_like1').css('display')!='none'){
                   $('#show_like2').html(' <?php print $likeedsta;?>').show().siblings('div').hide();
                   }else if($('#2').css('display')!='none'){
                       $('#show_like1').show().siblings('div').hide();
                   }
               });	
               		
            </script>	
            <?php 
               if(($likedcount + 1) == 1){
               	$likessta = 'you liked this';
               }else if(($likedcount + 1) > 1){
               	$likessta = ($likedcount + 1) .' likes' ;
               }?>
            <script>		
               $('.like').on('click',function(){
                   if($('#show_like1').css('display')!='none'){
                   $('#show_like2').html('<?php print  $likessta;?>').show().siblings('div').hide();
                   }else if($('#2').css('display')!='none'){
                       $('#show_like1').show().siblings('div').hide();
                   }
               });	
               		
            </script>		
            <?php 
               $uniqueId= time();
               $commentid = $uniqueId.$cuser->uid;
               
               $query = db_select('musicbox_artist_status', 'm')
               ->condition('m.post_id', $ginode->nid, '=')
               ->fields('m', array('comment'))
               ->execute();
               $commentnum = $query->rowCount();
               	
               	if($commentnum == 0){
               		$div = "";
               		}else {
               		$div = "row scrollcomm";
               		}?>
            <div class="<?php print $div;?>" id="style-1" >
               <div class="comments">
                  <?php 
                     if( $commentnum > 2){
                     ?>
                  <div id="loadMore" style="">
                     <a href="#" class="loadmore">Load Previous Comments........</a>
                  </div>
                  <?php } ?>
                  <?php 	$allpost = _display_all_comments($ginode->nid);
                     foreach($allpost as $allcomments){ 
                     	
                     	$allcommentuser=user_load($allcomments->cuser_id);
                     ?>
                  <div class=" blogBox moreBox" style="display: none;">
                     <h5 class="comment-type"><?php print $allcommentuser->name;  ?> :</h5>
                     <h5 class="comment"><?php print $allcomments->comment;  ?></h5>
                  </div>
                  <?php } ?> 
                  <?php 	$post = _display_comments($ginode->nid);
                     foreach($post as $comments){ 
                     	
                     	$commentuser=user_load($comments->cuser_id);
                     ?>
                  <div class="blogBox moreBox">
                     <h5 class="comment-type"> <?php print $commentuser->name;  ?> :</h5>
                     <h5 class="comment"><?php print $comments->comment;  ?></h5>
                  </div>
                  <?php  } ?>
               </div>
            </div>
            <center>
               <div class="comment-form-container">
                  <div id="box">
                     <ul class="comment-text likebutton">
                     </ul>
                  </div>
                  <input type="hidden" value="<?php print $ginode->nid;?>" id="name">
                  <input type="hidden" value="<?php print $cuser->uid;?>" id="user">
                  <input type="hidden" value="<?php print $cuser->name;?>" id="username">
                  <textarea  class="commentarea" id="mess" placeholder="Type your comment ..."></textarea>
                  <br>
                  <button class="postbutton" id="postbtn<?php print $ginode->nid;?>">POST</button>
               </div>
               <script>
                  $( document ).ready(function () {
                  	$(".moreBox").slice(3, 0).show();
                  	if ($(".blogBox:hidden").length != 0) {
                  		$("#loadMore").show();
                  	}		
                  	$("#loadMore").on('click', function (e) {
                  		e.preventDefault();
                  		$(".moreBox:hidden").slice(0).slideDown();
                  		if ($(".moreBox:hidden").length == 0) {
                  			$("#loadMore").fadeOut('slow');
                  		}
                  	});
                  });
               </script>
               <script>
                  $(document).ready(function(){
                  	
                  	$("#postbtn<?php print $ginode->nid;?>").click(function() {
                  		var name=$("#name").val();
                  		var user=$("#user").val();
                  		var username=$("#username").val();
                  		var mess=$("#mess").val();
                  		if(mess=="")
                  		{
                  			alert("please fill all fields");
                  			return;
                  			
                  		}
                  		else{
                  			$.ajax({
                  				url:"/musicbox2.lk/post_comment_artist",
                  				type:"POST",
                  				data:{na:name,userid:user,uname:username,me:mess},
                  				success:function(){
                  					$("<li class='message-full'></li>").html("<br>"+username+"</b> : "+mess).
                  					prependTo("#box ul");
                  					
                  					$("#mess").val("");
                  				}
                  			});
                  		}
                  	});
                  });
                  
               </script>								
            </center>
         </div>
         <?php $gallitemecount =( (count($artimage_list)) - 1); 
            for ($y=1 ; $y <=$gallitemecount; $y++) 
            { 
            	$gitemnode = node_load($artimage_list[$y]->nid); 
            	
            	
            	$gallery_item_image_file = file_load($gitemnode->field_story_image_fid['und'][0]['value']);
            	
            	$gallery_item_image_uri = $gallery_item_image_file->uri; 
            $gallery_item_image_url = file_create_url($gallery_item_image_uri);?>
         <div class="item">
            <div class="row">
               <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12 slider_name">
                  <div class="text-center artist" >
                     <center>
                        <h4 class="art-name"><?php print $artist_info->field_artist_stage_name['und'][0]['value'];?></h4>
                     </center>
                  </div>
                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarouselimage2" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" style="background-image:"></span>
                  <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarouselimage2" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                  </a>
               </div>
            </div>
            <center> <img src="<?php print $gallery_item_image_url; ?>" class="img-of-artist"></center>
            <?php 
               $query = db_select('musicbox_like_post', 'm')
               ->condition('m.post_id', $gitemnode->nid, '=')
               ->condition('m.user_id', $cuser->uid, '=')
               ->fields('m', array('user_id'))
               ->execute();
               $num = $query->rowCount();
               $likedcount = likepost_get_total_like($gitemnode->nid);
               $liked = already_liked($gitemnode->nid,$cuser->uid);
               
              if($likedcount == 0){
               
               $likesta = '';
               }else if($likedcount == 1){
               
               $likesta = '1 like';
               }else if($likedcount > 1){
               $likesta = $likedcount.' likes';
               }
             if($num == 1){?>
            <div class="displaylike">
               <div class="likebutton"><button id="<?php print $gitemnode->nid;?>" value="<?php print $gitemnode->nid; ?>" class="unlike<?php print $gitemnode->nid; ?>" style ="color: #fff;background-color:#2d2a2a;border:0;"> <i class="fa fa-thumbs-up" style="color:#feab3e;"></i></button></div>
               <span id="show_likedisplay">
                  <div id="show_like3<?php print $gitemnode->nid; ?>" style="padding-left:10%; color:#fff;">
                     <?php print $likesta;?> 
                  </div>
                  <div id="show_like4<?php print $gitemnode->nid; ?>" style="display:none;color:#fff;padding-left:10%;">
                     222222222222
                  </div>
               </span>
            </div>
            <?php }else {?>
            <div class="displaylike">
               <div class="likebutton"><button id="<?php print $gitemnode->nid;?>" value="<?php print $gitemnode->nid; ?>" class="like<?php print $gitemnode->nid; ?>" style ="background-color:#2d2a2a; border:0;    "><i class="fa fa-thumbs-up" style="color:#fff; background-color:#2d2a2a;"></i> </button></div>
               <span id="show_likedisplay">
                  <div id="show_like3<?php print $gitemnode->nid; ?>" style="padding-left:10%; color:#fff;">
                     <?php print $likesta;?> 
                  </div>
                  <div id="show_like4<?php print $gitemnode->nid; ?>" style="display:none;color:#fff;padding-left:10%;">
                     7777777777777
                  </div>
               </span>
            </div>
            <?php } ?>	
            <script type = "text/javascript">
               $(document).ready(function(){
               
               $(document).on('click', '.like<?php print $gitemnode->nid; ?>', function(){
               var id=$(this).val();
               var $this = $(this);
               var postid = $(this).attr('id');
               $this.toggleClass('like<?php print $gitemnode->nid; ?>');
               if($this.hasClass('like<?php print $gitemnode->nid; ?>')){
               $this.text('like'); 
               } else {
               $this.html(' <i class="fa fa-thumbs-up" style="color:#feab3e;"></i>');
               $this.addClass("unlike<?php print $gitemnode->nid; ?>"); 
               }
               $.ajax({
               type: "POST",
               url: "/musicbox2.lk/liked_post",
               data: {
               'postid': postid
               },
               success: function(){
               showLike(id);
               }
               });
               });
               
               $(document).on('click', '.unlike<?php print $gitemnode->nid; ?>', function(){
               var id=$(this).val();
               var $this = $(this);
               var postid = $(this).attr('id');
               $this.toggleClass('unlike<?php print $gitemnode->nid; ?>');
               if($this.hasClass('unlike<?php print $gitemnode->nid; ?>')){
               $this.html('<i class="fa fa-thumbs-up"></i>'); 
               } else {
               $this.html('<i class="fa fa-thumbs-up" style="color:#fff; background-color:#2d2a2a;"></i>');
               $this.addClass("like<?php print $gitemnode->nid; ?>"); 
               }
               $.ajax({
               type: "POST",
               url: "/musicbox2.lk/unlike_post",
               data: {
               'postid': postid
               },
               success: function(){
               showLike(id);
               }
               });
               });
               
               });
               
               function showLike(id){
               $.ajax({
               url: 'show_like.php',
               type: 'POST',
               async: false,
               data:{
               'postid': postid
               
               },
               success: function(response){
               $('#show_like'+id).html(response);
               
               }
               });
               }
               
            </script>
            <?php 
               if(($likedcount - 1) == 0){
               	$likeedsta = '';
               }else if(($likedcount - 1) == 1){
               	$likeedsta = '1 like' ;
               }else if(($likedcount - 1) > 1){
               	$likeedsta = ($likedcount - 1) .' likes';
               }
               
               ?>						
            <script>		
               $('.unlike<?php print $gitemnode->nid; ?>').on('click',function(){
                   if($('#show_like3<?php print $gitemnode->nid; ?>').css('display')!='none'){
                   $('#show_like4<?php print $gitemnode->nid; ?>').html(' <?php print $likeedsta;?>').show().siblings('div').hide();
                   }else if($('#show_like4<?php print $gitemnode->nid; ?>').css('display')!='none'){
                       $('#show_like3<?php print $gitemnode->nid; ?>').show().siblings('div').hide();
                   }
               });	
               		
            </script>	
            <?php 
               if(($likedcount + 1) == 1){
               	$likessta = 'you liked this';
               }else if(($likedcount + 1) > 1){
               	$likessta = ($likedcount + 1) .' likes' ;
               }
               
               ?>
            <script>		
               $('.like<?php print $gitemnode->nid; ?>').on('click',function(){
                   if($('#show_like3<?php print $gitemnode->nid; ?>').css('display')!='none'){
                   $('#show_like4<?php print $gitemnode->nid; ?>').html('<?php print $likessta ;?>  ').show().siblings('div').hide();
                   }else if($('#show_like4<?php print $gitemnode->nid; ?>').css('display')!='none'){
                       $('#show_like3<?php print $gitemnode->nid; ?>').show().siblings('div').hide();
                   }
               });	
               		
            </script>					<?php		
               $query = db_select('musicbox_artist_status', 'm')
               ->condition('m.post_id', $gitemnode->nid, '=')
               ->fields('m', array('comment'))
               ->execute();
               $commentnum = $query->rowCount();
               
               
               	if($commentnum == 0){
               		$div = "";
               		}
                      else {
               		$div = "row scrollcomm";
               		}
               ?>
            <div class="<?php print $div;?>" id="style-1">
               <div class="comments" >
                  <?php 
                     if($commentnum > 2){
                     ?>
                  <div id="loadMore<?php print $gitemnode->nid;?>" style="">
                     <a href="#" class="loadmore">Load Previous Comments....</a>
                  </div>
                  <?php } ?>
                  <?php 	$allpost = _display_all_comments($gitemnode->nid);
                     foreach($allpost as $allcomments){ 
                     
                     $allcommentuser=user_load($allcomments->cuser_id);
                     ?>
                  <div class=" blogBox moreBox<?php print $gitemnode->nid;?>" style="display: none;">
                     <h5 class="comment-type"><?php print $allcommentuser->name;  ?> :</h5>
                     <h5 class="comment"><?php print $allcomments->comment;  ?></h5>
                  </div>
                  <?php } ?> 
                  <?php 	$post = _display_comments($gitemnode->nid);
                     foreach($post as $comments){ 
                     
                     $commentuser=user_load($comments->cuser_id);
                     ?>
                  <div class="blogBox moreBox<?php print $gitemnode->nid;?>">
                     <h5 class="comment-type"> <?php print $commentuser->name;  ?> :</h5>
                     <h5 class="comment"><?php print $comments->comment;  ?></h5>
                  </div>
                  <?php  } ?>
               </div>
            </div>
            <center>
            <div class="comment-form-container">
               <div id="box<?php print $gitemnode->nid;?>">
                  <ul class="comment-text likebutton">
                  </ul>
               </div>
               <input type="hidden" value="<?php print $gitemnode->nid;?>" id="name<?php print $gitemnode->nid;?>">
               <input type="hidden" value="<?php print $cuser->uid;?>" id="user<?php print $gitemnode->nid;?>">
               <input type="hidden" value="<?php print $cuser->name;?>" id="username<?php print $gitemnode->nid;?>">
               <textarea class="commentarea"id="mess<?php print $gitemnode->nid;?>" placeholder="Type your comment ..."></textarea>
               <br>
               <button class="postbutton" id="postbtn<?php print $gitemnode->nid;?>">POST</button>
            </div>
            <script>
               $(document).ready(function () {
               $(".moreBox<?php print $gitemnode->nid;?>").slice(3, 0).show();
               if ($(".blogBox:hidden").length != 0) {
               $("#loadMore<?php print $gitemnode->nid;?>").show();
               }		
               $("#loadMore<?php print $gitemnode->nid;?>").on('click', function (e) {
               e.preventDefault();
               $(".moreBox<?php print $gitemnode->nid;?>:hidden").slice(0).slideDown();
               if ($(".moreBox<?php print $gitemnode->nid;?>:hidden").length == 0) {
               $("#loadMore<?php print $gitemnode->nid;?>").fadeOut('slow');
               }
               });
               });
            </script>	
            <script>
               $(document).ready(function(){
               
               $("#postbtn<?php print $gitemnode->nid;?>").click(function() {
               var name=$("#name<?php print $gitemnode->nid;?>").val();
               var user=$("#user<?php print $gitemnode->nid;?>").val();
               var username=$("#username<?php print $gitemnode->nid;?>").val();
               var mess=$("#mess<?php print $gitemnode->nid;?>").val();
               if(mess=="")
               {
               alert("please fill all fields");
               return;
               
               }
               else{
               $.ajax({
               url:"/musicbox2.lk/post_comment_artist",
               type:"POST",
               data:{na:name,userid:user,uname:username,me:mess},
               success:function(){
               $("<li></li>").html("<br>"+username+"</b> : "+mess).
               prependTo("#box<?php print $gitemnode->nid;?> ul");
               
               $("#mess<?php print $gitemnode->nid;?>").val("");
               }
               });
               }
               });
               });
               
            </script>	
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
                                 <script type = "text/javascript">
								$(document).ready(function(){
								
								$(document).on('click', '.like', function(){
								var id=$(this).val();
								var $this = $(this);
								var postid = $(this).attr('id');
								$this.toggleClass('like');
								if($this.hasClass('like')){
								$this.text('like'); 
								} else {
								$this.html(' <i class="fa fa-thumbs-up" style="color:#feab3e;"></i>');
								$this.addClass("unlike"); 
								}
								$.ajax({
								type: "POST",
								url: "/musicbox2.lk/liked_post",
								data: {
								'postid': postid
								},
								success: function(){
								showLike(id);
								}
								});
								});
								
								$(document).on('click', '.unlike', function(){
								
								var id=$(this).val();
								var $this = $(this);
								var postid = $(this).attr('id');
								$this.toggleClass('unlike');
								if($this.hasClass('unlike')){
								$this.html(' <i class="fa fa-thumbs-up" style="color:#feab3e;"></i>'); 
								} else {
								$this.html('<i class="fa fa-thumbs-up"></i>');
								$this.addClass("like"); 
								}
								$.ajax({
								type: "POST",
								url: "/musicbox2.lk/unlike_post",
								data: {
								'postid': postid
								},
								success: function(){
								showLike(id);
								}
								});
								});
								
								});
								
								function showLike(id){
								$.ajax({
								url: 'show_like.php',
								type: 'POST',
								async: false,
								data:{
								'postid': postid
								
								},
								success: function(response){
								$('#show_like'+id).html(response);
								
								}
								});
								}
								
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
								$(" #myCarouselimage2").swiperight(function() {  
								$(this).carousel('prev');  
								});  
								//add your other targets here
								$(" #myCarouselimage2").swipeleft(function() {  
								$(this).carousel('next');  
								});  
								});  
								</script>	
								<script>
								$(document).ready(function(){
								$("#user_submit").click(function(){
								var pid = $("#podtId").val();
								var name = $("#user_name").val();
								var uid = $("#user_id").val();
								var comment = $("#comment").val();
								var dataString = 'name1='+ name + '&comment='+ comment + '&pid='+ pid + '&pid='+ pid + '&uid='+ uid;
								if(comment=='')
								{
								$("#display").html("please add comment");
								
								}
								else
								{
								$.ajax({
								type:"POST",
								url: "/musicbox2.lk/jquery_post",
								data: dataString,
								cache: false,
								success: function(result){
								$("#display").html(result);
								}
								});
								}
								return false
								});
								});
								</script>		
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
								$artistlist = _get_music_box_artist_list_of_thoughts($cuser->uid); 
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
								
						
								</body>
<?php } ?>
			<?php } ?>
	</html>
	
	<?php } ?>
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