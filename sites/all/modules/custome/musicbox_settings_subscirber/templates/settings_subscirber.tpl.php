<?php 
global $base_url; 
global $user; 
$cuser=user_load($user->uid);
$modulePath = drupal_get_path('module', 'musicbox_settings_subscirber');

$fullurl = $base_url.'/'.$modulePath;





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0" />
    <link rel="stylesheet" href="<?php print $fullurl;?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php print $fullurl;?>/css/chechbox.css">
	 <link rel="stylesheet" href="<?php print $fullurl;?>/css/subsettings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <script src="<?php print $fullurl;?>/js/jquery.min.js"></script>
    <script src="<?php print $fullurl;?>/js/bootstrap.min.js"></script>
	<script>  
 $(document).on('change', '.div-toggle', function() {
  var target = $(this).data('target');
  var show = $("option:selected", this).data('show');
  $(target).children().addClass('hide');
  $(show).removeClass('hide');
});
$(document).ready(function(){
	$('.div-toggle').trigger('change');
});  
 </script>

</head>

<body>

 
	<script> 
			function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "/musicbox.lk/check_number",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
			
			</script>
<div id="frmCheckUsername">
  <label>Check Username:</label>
  <input name="username" type="text" id="username" class="demoInputBox" onBlur="checkAvailability()"><span id="user-availability-status"></span>    
</div>
<p><img src="<?php print $fullurl; ?>/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
			
		  

</body>

</html>