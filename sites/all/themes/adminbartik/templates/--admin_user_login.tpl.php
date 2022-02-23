

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link href="css/bootstrap.css" rel="stylesheet">
	 <link href="css/style.css" rel="stylesheet">
	 
	 
 
	</head>
	
	<body>
		<div class="container-fluid">
			<div class="row">
			
				<div class="col-md-8 login">
				<center>
				<h2 class="sub-loginheader">LABEL CONTROL PANEL</h2><br><br>
				
				 <form class="form-horizontal">
				 	<div class="form-group">
								<?php  print drupal_render($form['name']); ?>
							</div>
							
							<div class="form-group">
								<?php  print drupal_render($form['pass']); ?>
							</div>
   
   <?php 
   
   print drupal_render($form['form_build_id']);
print drupal_render($form['form_id']);
print drupal_render($form['actions']);
   ?>
				</form>
				</center>

	
		 <script src="js/bootstrap.min.js"></script>
	 <footer>
 
  <p class="par-footer">Copyrights-Music box 2018</p>
</footer>
				</div>
				<div class="col-md-4 ">
				<img src="Images/login.jpg"  class="img-responsive img-margin imgdis" alt="Generic placeholder thumbnail">
				</div>

			</div>	  
		</div>	 
	</body>

</html>