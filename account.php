<!DOCTYPE html>
 <html lang="en">

   <head>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>Deliveryman - Dashboard</title>

     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom fonts for this template -->
     <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
     <link href='https://fonts.googleapis.com/css?family=KaushanScript' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=DroidSerif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=RobotoSlab:400,100,300,700' rel='stylesheet' type='text/css'>

     <!-- Custom styles for this template -->
     <link href="css/style.css" rel="stylesheet" />

   </head>

   <body>
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
               <a class="nav-link" href="">Sign Out</a>
             </li>

           </ul>
         </div>
       </div>
     </nav>
     </div>

     <!--Tabs for Patient Dashboard-->
     <section id="account-section">
       <div class="account-container">
         <div class="row">
           <div class="col-md-5">
             <h2 class="account-heading">Change Details</h2>
              <label for="user_address_line_one">Address Line One:</label>
               <input type="text" class="form-control" name="user_address_line_one" id="user_address_line_one">
               <label for="user_address_line_two">Address Line Two:</label>
               <input type="text" class="form-control" name="user_address_line_two" id="user_address_line_two">
               <label for="user_town">Town:</label>
               <input type="text" class="form-control" name="user_town" id="user_town">
               <label for="user_county">County:</label>
               <input type="text" class="form-control" name="user_county" id="user_county">
              <button class="btn btn-xl btn-mrg">Change</button>
           </div>

           <div class="col-md-2"></div>

           <div class="col-md-5">
              <h2 class="account-heading">Change Password:</h2>
               <label for="user_current_password">Current Password:</label>
               <input type="text" class="form-control" name="user_current_password" id="user_current_password">
               <label for="user_new_password">New Password:</label>
               <input type="text" class="form-control" name="user_new_password" id="user_new_password">
               <button class="btn btn-xl btn-mrg">Change</button>
           </div>
         </div>
            <button class="btn btn-xl btn-mrg" id="delete_account">Delete Account</button>

       </div>
     </section>


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
