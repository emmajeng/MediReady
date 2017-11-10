<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require 'lib/config.php';
session_start();

// Make sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 

    // Make sure user email with matching hash exist
    $result = $mysqli->query("SELECT * FROM chemist_table WHERE chemist_email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: unsuccessful.php");
    }
}
else {
    $_SESSION['message'] = "Sorry, verification failed, try again!";
    header("location: unsuccessful.php");  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Password Reset - MediReady </title>

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
        
        <h1>Choose Your New Password</h1>
        
            <form action="reset_password.php" method="post">
            
            <div class="field-wrap">
                <label>
                    New Password<span class="req">*</span>
                </label>
                <input type="password"required name="newpassword" autocomplete="off"/>
            </div>
            
            <div class="field-wrap">
                <label>
                    Confirm New Password<span class="req">*</span>
                </label>
                <input type="password"required name="confirmpassword" autocomplete="off"/>
            </div>
            
            <!-- This input field is needed, to get the email of the user -->
            <input type="hidden" name="email" value="<?= $email ?>">    
            <input type="hidden" name="hash" value="<?= $hash ?>">    
            
            <button class="button button-block"/>Apply</button>
            
            </form>
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
