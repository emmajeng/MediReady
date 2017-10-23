<!DOCTYPE html>
<html lang="en">

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

  <body id="page-to">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav-session">
      <div class="container">
        <a class="" href="index.html"><img height=35 width=210 src="img/MediReady.png" /></a>
      </div>
    </nav>


    <form id="form-sign-up" method="post">
      <div class="form-group">
        <select>
          <option value=0>Patient</option>
          <option value=1>Doctor</option>
          <option value=2>Chemist</option>
          <option value=3>Delivery Man</option>
        </select>
      </div>
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="patient_email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="patient_password">
      </div>
      <div class="form-group">
        <label for="fn">First Name:</label>
        <input type="text" class="form-control" id="patient_fname">
      </div>
      <div class="form-group">
        <label for="ln">Last Name:</label>
        <input type="text" class="form-control" id="patient_lname">
      </div>
      <div class="form-group">
        <label for="pnum">Phone Number:</label>
        <input type="text" class="form-control" id="patient_patient">
      </div>
      <div class="form-group">
        <label for="adline1">Address Line One:</label>
        <input type="text" class="form-control" id="patient_address_line_one">
      </div>
      <div class="form-group">
        <label for="adline2">Address Line Two:</label>
        <input type="text" class="form-control" id="patient_address_line_two">
      </div>
      <div class="form-group">
        <label for="pcity">City:</label>
        <input type="text" class="form-control" id="patient_city">
      </div>
      <div class="form-group">
        <label for="pcounty">County:</label>
        <input type="text" class="form-control" id="patient_county">
      </div>
      <button type="submit" class="btn-signUp" name="btn-signUp">Submit</button>
    </form>
        <?php
          include('lib/signUp.php');
        ?>
  </body>
