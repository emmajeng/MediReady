<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Patient - Dashboard</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />

  </head>

  <body>
    <?php
          include('lib/signUp.php');
        ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav-session">
      <div class="container">
        <a class="" href="index.html"><img height=35 width=210 src="img/MediReady.png" /></a>
      </div>
    </nav>

    
    <form id="form-sign-up" method="post">
      <div class="form-group">
        <select name="user-type">
          <option value=0>Patient</option>
          <option value=1>Doctor</option>
          <option value=2>Chemist</option>
          <option value=3>Delivery Man</option>
        </select>
      </div>
      <div class="form-group">
        <label for="patient_fname">First Name:</label>
        <input type="text" class="form-control" name="patient_fname">
      </div>
      <div class="form-group">
        <label for="patient_lname">Last Name:</label>
        <input type="text" class="form-control" name="patient_lname">
      </div>
      <div class="form-group">
        <label for="patient_email">Email address:</label>
        <input type="email" class="form-control" name="patient_email">
      </div>
      <div class="form-group">
        <label for="patient_pwd">Password:</label>
        <input type="password" class="form-control" name="patient_pwd">
      </div>
      <div class="form-group">
        <label for="patient_phone">Phone Number:</label>
        <input type="text" class="form-control" name="patient_phone">
      </div>
      <div class="form-group">
        <label for="patient_address_line_one">Address Line One:</label>
        <input type="text" class="form-control" name="patient_address_line_one">
      </div>
      <div class="form-group">
        <label for="patient_address_line_two">Address Line Two:</label>
        <input type="text" class="form-control" name="patient_address_line_two">
      </div>
      <div class="form-group">
        <label for="patient_city">City:</label>
        <input type="text" class="form-control" name="patient_city">
      </div>
      <div class="form-group">
        <label for="patient_county">County:</label>
        <input type="text" class="form-control" name="patient_county">
      </div>
      <button type="submit" class="btn-signUp" name="btn-signUp">Submit</button>
    </form>
    
    <?php
        if (isset($msg)) {
          echo $msg;
        }
    ?>
  </body>
</html>