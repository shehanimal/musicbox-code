<?php 
global $base_url;
$modulePath = drupal_get_path('module', 'musicbox_reset_password');

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
		
		<title>Musicbox - Reset Password</title>
		
		<!-- Bootstrap core CSS -->
		<link href="<?php print $fullurl; ?>/css/bootstrap.css" rel="stylesheet">
		
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		
		<!-- Custom styles for this template -->
		<link href="<?php print $fullurl; ?>/css/reset.css" rel="stylesheet">
	
		
	
		
		<script>
		$(document).ready(function(e){
    		$(".img-check").click(function(){
				$(this).toggleClass("check");
			});
	});
</script>
	</head>
	
	<body>
	
	<div class="container padding-container">
			<div class="row"><center>
			<a href="<?php print $base_url;?>" >	<img src="http://kreativekrib.com/musicbox.lk/sites/all/themes/musicbox/logo.png" alt="Music Box"></a></center></div><br><br>
				<div class="row form"><div class="row"><div class="main-title">
					<h3 class="select-subs-pack text-center">Reset Password</h3>
				</div>	
			</div>
			<div class="row padding">
					<form method='post' action="<?php print $base_url;?>/resetpass_out">
					<div class="row">
						<div class="form-group">
							<div class="col-sm-12">
								<label for="email">Email:</label>
							</div>
							<div class="col-sm-12">
							<input type="email" class="form-control" id="email" value="<?php print arg(1);?>"  disabled name="email"><br></div>
							
							
						</div></div>
				<div class="row">
					<div class="form-group">
							<fieldset>
								<input type="text" name="user_id"   value="<?php print arg(2);?>" id="user_id" >
								<div class="col-sm-12">
								
								<input type="password" name="userpw"  placeholder="Password" id="password" required><br><br></div>
								<div class="col-sm-12"><input type="password" name="confirmuserpw"  placeholder="Confirm Password" id="confirm_password" required>
								<br><br></div>
								<div class="col-sm-4 button">
								<input type="submit"  class="btn btn-default" name="submit" value="Update"></div>	
							</fieldset>
						</div></div>
					
				</form>
				
			</div></div>
		</div>
		

	
	
	
					
<div class="container">
					
				
						<div class="form-group">
							<label for="email">:</label>
							
						</div>
						
						
						
					</form>
				</div>
	</div>

			
								
	<script src="<?php print $fullurl; ?>/js/bootstrap.min.js"></script>
	<script src="<?php print $fullurl; ?>/js/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
										
	</body>
	</html>