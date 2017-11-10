<?php
/* Displays all error messages */
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sign In Unsuccessfull</title>

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

</head>

<body id="page-top">
  
  <script>
    
  </script>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="" href="index.html"><img height=35 width=210 src="img/MediReady.png" /></a>
    </div>
  </nav>

  <!-- Header Section -->
  <header class="masthead">
    <div class="container">
        <div class="form">
            <h1>Error</h1>
            <p>
                <?php 
                if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
                    echo $_SESSION['message'];    
                else:
                    header( "location: index.html" );
                endif;
                ?>
            </p>     
            <a href="index.php"><button class="button button-block"/>Home</button></a>
        </div>
    </div>
  </header>

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
