
<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/short.jpg" />
        <title>Medicive</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body style="background-color:#ffffff;">
        <div>
           <?php
            require 'header.php';
           ?>


    <div class="row">
        <div class="col-md-3"></div>
		<div class="col-md-6 text-center">
			<form class="form-horizontal" method="post" action="contact1.php">
			  	<fieldset>
				    <legend>Contact</legend>
				    <p class="lead">We would love to hear from you! Complete the form to send me an email.</p>
				    <div class="form-group">
				      	<label for="inputName" class="col-lg-2 control-label">Name</label>
				      	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="inputName" placeholder="Name" required="true">
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="inputEmail" class="col-lg-2 control-label">Email</label>
				      	<div class="col-lg-10">
				        	<input type="text" class="form-control" id="inputEmail" placeholder="Email" required="true">
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label for="textArea" class="col-lg-2 control-label">Textarea</label>
				      	<div class="col-lg-10">
				        	<textarea class="form-control" rows="3" id="textArea" required="true"></textarea>
				        	<!-- <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span> -->
				      	</div>
				    </div>
				    <div class="form-group">
				      	<div class="col-lg-10 col-lg-offset-2">
				        	<button type="reset" class="btn btn-default">Cancel</button>
				        	<input type="submit" class="btn btn-primary" value="Submit">
				      	</div>
				    </div>
			  	</fieldset>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
	

	 
	 <footer class="footer"> 
	 <div class="container">
               <center>
                   <p>©<a href="https://inspireengineering.wordpress.com">Inspire Engineering</a>. All Rights Reserved.</p>
                   <p>This website is developed by Inspired Engineers</p>
               </center>

               </div>

               <div class="text-muted pull-right">
          		<a href="admin.php">Admin Login</a> 2019
        	</div>
           </footer>