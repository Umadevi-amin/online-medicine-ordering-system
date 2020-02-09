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
    <body style="background-color:#000;">
        <div>
           <?php
            require 'header.php';
           ?>
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>Welcome to Medicive</h1>
                       <p>An online medicine shop!</p>

                       <?php
                           if(isset($_SESSION['email'])){
                           ?>
                           <a href="medicines.php" class="btn btn-danger">Shop</a>
                           <?php
                           }else{
                            ?>
                             
                       <a href="signup.php" class="btn btn-danger">Sign up</a>
                       <a href="login.php" class="btn btn-danger">Login</a>
                            
                           <?php
                           }
                           ?>











                      
                   </div>
                   </center>
               </div>
           </div>
           
            
            <h1><font color="#ffffff">About Medicive:</font></h1>

<p><font color="#ffffff"> Medicive is one of the most trusted gateways to medicines and general provision with an aim to eradicate fake and ineffective medicines, and supply high-quality medicines in India.<br>
<br> 


Reasons for you to Shop from Medicive:<br>
<br>

►<b>Authentic medicines:</b> Be 100% assured of receiving genuine medicines<br>
►<b>Quick to-door deliveries:</b> We ensure the delivery of well-packaged products to your doorstep at quick timelines.<br>
►<b>Pocket-friendly:</b> Our range of discounts, offers and deals will allow you to go economical everyday, everytime. We recommend you to explore our special saving scheme.<br>
►<b>Customer-friendly:</b> Order from the comfort of your sofa with our easy browsing and smooth billing procedure.<br>

</font>
</p>

<br><br> <br><br><br><br>
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
        </div>
    </body>
</html>