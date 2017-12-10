<?php

require 'lib/config.php';
//include 'lib/change_password.php';
//include 'lib/delete_account.php';

/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
 if ( $_SESSION['login_user'] == null ) {
   $_SESSION['message'] = "You must log in before viewing dashboard";
   header("location: index.php");
 }
 else {
     // Makes it easier to read
 }

?>

<!DOCTYPE html>
 <html lang="en">

   <head>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>Account</title></title>

     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom fonts for this template -->
     <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
     <link href='https://fonts.googleapis.com/css?family=KaushanScript' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=DroidSerif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=RobotoSlab:400,100,300,700' rel='stylesheet' type='text/css'>

     <!-- Custom styles for this template -->
     <link href="css/style.css" rel="stylesheet" />
     <!-- JS for password confirmation match-->
     <script language="javascript" type="text/javascript" src="js/change_password_match.js"></script>

     <!-- Sweet alert -->
    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.css" />
    <script data-require="jquery@*" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script data-require="sweet-alert@*" data-semver="0.4.2" src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>

    <script src="vendor/jquery/jquery.min.js"></script>



   </head>

   <body onload="check_password()">
     <div id="page-top">
     <!-- Navigation -->
     <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav-session">
       <div class="container">
         <a class="" href="index.php"><img height=35 width=210 src="img/MediReady.png" /></a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           <img height=25 width=25 src="img/cog.png" />
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
           <ul class="navbar-nav ml-auto">
             <li class="nav-item">
               <a class="nav-link" href="lib/signout.php">Sign Out</a>
             </li>

           </ul>
         </div>
       </div>
     </nav>
     </div>

     <!--Tabs for Patient Dashboard-->
     <section id="account-section">
           <div class="col-md-2"></div>

           <div class="col-md-5" id="change-password">
              <h2 class="account-heading">Change Password:</h2>
              <form method="post" action="lib/change_password.php" id='password-change-form'>
               <label for="user_new_password">New Password:</label>
               <input type="password" class="form-control" name="user_new_password" id="user_new_password" onchange="check_password()">
               <label for="user_new_password_check">New Password Again:</label>
               <input type="password" class="form-control" name="user_new_password_check" id="user_new_password_check" onchange="check_password()">
               <label for="user_current_password">Current Password:</label>
               <input type="password" class="form-control" name="user_current_password" id="user_current_password">
               <button id="changePasswordBtn" name="changePasswordBtn" class="btn btn-xl btn-mrg">Change</button>

              </form>
              <div id="password_error">Make sure your passwords match!</div>
           </div>
         </div>
           <!--<form action="lib/delete_account.php" method="post" id="deleteAccount" name="deleteMe">-->
           <!-- <button type="submit" name="deleteAccountBtn" class="btn btn-xl btn-mrg" id="delete_account" >Delete Account</button>-->
           <!--</form>-->

           <form action="lib/delete_account.php" id="deleteAccount">
            <button type="submit" class="btn btn-xl btn-mrg" id="deleteAccountBtn" name="deleteAccountBtn" >Delete Account</button>
           </form>

     </section>

     <!-- sweet alert for delete account -->
    <script>
    /* global $ */
    /* global swal */
   document.querySelector('#deleteAccount').addEventListener('submit', function(e) {
            var form = this;
            e.preventDefault();
            swal({
                title: "Delete account?",
                text: "You will not be able to recover your account",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#4DD0E1',
                confirmButtonText: 'Delete Account',
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    form.submit();
                } else {
                    swal("Account not deleted","", "error");
                }
            });
    });
    </script>


   <!-- Footer Section -->
   <footer id="footer">
     <div class="container">
       <div class="row">
         <div class="footer-links col-md-4">
           <a class="footer-links" href="faq.html">FAQs</a>
           <br />
           <br />
           <a class="footer-links" href="help.html">Help</a>
           <br />
           <br />
           <a class="footer-links" href="contact.html">Contact Us</a>
           <br />
           <br />
           <a class="footer-links" href="">Phone Support</a>
         </div>
         <div class="col-lg-4"></div>
         <div class="col-md-4"></div>
       </div>
       <div class="bottom-footer row">
         <div class="col-lg-4">
           <span class="copyright">Copyright &copy; <img height=30 width=180 src="img/MediReady.png" /> 2017</span>
         </div>
         <div class="col-lg-4"></div>
         <div class="col-lg-4">
           <ul class="list-inline social-buttons">
             <li class="list-inline-item">
               <a href="#">
                   <i class="fa fa-twitter"></i>
                 </a>
             </li>
             <li class="list-inline-item">
               <a href="#">
                   <i class="fa fa-facebook"></i>
                 </a>
             </li>
             <li class="list-inline-item">
               <a href="#">
                   <i class="fa fa-linkedin"></i>
                 </a>
             </li>
           </ul>
         </div>
       </div>
     </div>
   </footer>

     <!-- Bootstrap core JavaScript -->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/popper/popper.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

     <!-- Plugin JavaScript -->
     <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

     <!-- Contact form JavaScript -->
     <script src="js/jqBootstrapValidation.js"></script>
     <script src="js/contact_me.js"></script>

     <!-- Custom scripts for this template -->
     <script src="js/agency.js"></script>

     <!--Link to JS Tab file-->
     <script language="javascript" type="text/javascript" src="js/tab.js"></script>



     <!-- Google Map function and get location -->
     <script language="javascript" type="text/javascript" src="js/map.js"></script>

     <!-- API Key for Map -->
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3u7zBjNuRP74J7XOKA0nGAQyNeAY2_vc&callback=myMap"></script>
   </body>

 </html>
