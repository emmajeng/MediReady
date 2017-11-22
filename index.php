<?php 
/* Main page with two forms: sign up and log in */
    require ('lib/config.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Fast and Easy Prescriptions - MediReady </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">

  
  
  <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['signin'])) 
    { 
      //user logging in
      require 'lib/signin.php';
    }
    elseif (isset($_POST['register'])) { //user registering
        
        header("location: sign-up.php");
        
    }
}
?>



</head>

<body id="page-top">
  
  <script>
    
  </script>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="" href="index.php"><img height=35 width=210 src="img/MediReady.png" /></a>
    </div>
  </nav>

  <!-- Header Section -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Get Started with MediReady</div>
        <div class="intro-heading">Fast, Simple, Reliable</div>
        <button class="btn btn-xl btn-mrg" data-toggle="modal" data-target="#modal">Sign In</button>
        <a href="/../sign-up.php">
        <button class="btn btn-xl btn-mrg">Sign Up</button>
        </a>
      </div>
    </div>
  </header>
  
  <!-- modal -->
  <div class="modal fade" id="modal" role="dialog">
    
    <div class = "modal-dialog">
      
      <!-- content of modal -->
      <div class= "modal-content">
        <div class = "modal-header">
          <a class="" href="index.html"><img height=35 width=210 src="img/MediReady.png" /></a>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body">
	        <form class="form-signin" action="" method="post">
	          
	          <div class = "modal-grouping">
              <input type="email" class="form-control" name="signin_email" placeholder="Email*" required autofocus>
            </div>
            
            <div class="modal-grouping">
              <input type="password" class="form-control" name="signin_password" placeholder="Password*" required>
            </div>
            
            <p class="forgot"><a href="forgotpassword.php">Forgot Password?</a></p>
            
            <div class="modal-footer">
              <input type="submit" class="btn btn-lg btn-default btn-block" name="signin" value="Sign In" />
            </div>
            
          </form>       
        </div>
        
    </div>
  </div>
</div>
 

  <!-- About Section -->
  <section id="about-section">
    <div class="container about-container">
      <div class="row">
        <div class="col-lg-12 text-center margin-fix">
          <h2 class="section-heading">About</h2>
          <h3 class="section-subheading text-muted about-sub">Our company in a nutshell</h3>
        </div>
        <div>
          <p>
            MediReady is a platform that provides a simple prescription service. Instead of collecting your prescription and bringing it to the chemist, you can have it delivered straight to the chemist or delivered to your address. This service is open to doctors,
            chemists, patients and delivery men. By offering this service we hope to simplify the lifes of everyone in involved in this process.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">Services</h2>
          <h3 class="section-subheading text-muted">The accounts we provide for.</h3>
        </div>
      </div>
      <div class="row text-center top-service">
        <div class="col-md-5 service">
          <span>
              <img height=200 width=200 src="img/doctor.png" />
            </span>
          <h4 class="service-heading">Doctor</h4>
          <p class="text-muted">A doctor may sign up to so that they can send prescriptions to the chemist. This would allow doctors to speed up the process of sending prescriptions, and cut down the amount of time they spend interacting with patients.
          </p>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-5 service">
          <span>
              <img height=200 width=200 src="img/patient.png" />
            </span>
          <h4 class="service-heading">Patients</h4>
          <p class="text-muted">A patient may sign up so that they recieve prescriptions online. They can then choose which chemist to have them sent to, and whether it not they want it delivered to their address. They can pay for their prescriptions when it arrives.</p>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-5 service">
          <span>
              <img height=200 width=200 src="img/chemist.png" />
            </span>
          <h4 class="service-heading">Chemist</h4>
          <p class="text-muted">A chemist may sign up so that can recieve and review prescriptions online. They can then prepare the prescriptions for pick up or for delivery.</p>
        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-5 service">
          <span>
              <img height=200 width=200 src="img/delivery.png" />
            </span>
          <h4 class="service-heading">Delivery</h4>
          <p class="text-muted">A driver may sign up to deliver the prescriptions. They can view their list of destinations, and the best route will be calculated for them to follow.</p>
        </div>
      </div>
    </div>
  </section>


  <!-- Contact Section -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">Contact Us</h2>
          <h3 class="section-subheading text-muted">Leave us a query</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <div id="success"></div>
              <button id="sendMessageButton" class="btn btn-xl" type="submit">Send Message</button>
            </div>
          </div>
        </div>
        </form>
      </div>
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
  


</body>

</html>
