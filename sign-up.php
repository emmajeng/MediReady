<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up</title>

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


      <div id="user-dropdown" class="form-group" onchange="formChange()">
        <select name="user-type" id="user-type">
          <option value=0>Please choose user type</option>
          <option value=1>Patient</option>
          <option value=2>Doctor</option>
          <option value=3>Chemist</option>
          <option value=4>Delivery Man</option>
        </select>
      </div>

    <form id="patient-sign-up" method="post">
      <!--Patient Sign Up Section-->
      <h3>Patient</h3>
      <div class="form-group">
          <label for="patient_fname">First Name:</label>
          <input type="text" class="form-control" name="patient_fname" id="patient_fname">
        </div>
        <div class="form-group">
          <label for="patient_lname">Last Name:</label>
          <input type="text" class="form-control" name="patient_lname" id="patient_lname">
        </div>
        <div class="form-group">
          <label for="patient_email">Email address:</label>
          <input type="email" class="form-control" name="patient_email" id="patient_email">
        </div>
        <div class="form-group">
          <label for="patient_pwd">Password:</label>
          <input type="password" class="form-control" name="patient_pwd" id="patient_password">
        </div>
        <div class="form-group">
          <label for="patient_phone">Phone Number:</label>
          <input type="text" class="form-control" name="patient_phone" id="patient_phone">
        </div>
        <div class="form-group">
          <label for="patient_address_line_one">Address Line One:</label>
          <input type="text" class="form-control" name="patient_address_line_one" id="patient_address_line_one">
        </div>
        <div class="form-group">
          <label for="patient_address_line_two">Address Line Two:</label>
          <input type="text" class="form-control" name="patient_address_line_two" id="patient_address_line_two">
        </div>
        <div class="form-group">
          <label for="patient_city">City:</label>
          <input type="text" class="form-control" name="patient_city" id="patient_city">
        </div>
        <div class="form-group">
          <label for="patient_county">County:</label>
          <input type="text" class="form-control" name="patient_county" id="patient_county">
        </div>
        <button type="submit" class="patient-signUp" name="patient-signUp">Submit</button>
      </form>
        <!--Doctor Sign Up Section-->
      <form id="doctor-sign-up" method="post">
        <h3>Doctor</h3>
          <div class="form-group">
          <label for="doctor_fname">First Name:</label>
          <input type="text" class="form-control" name="doctor_fname" id="doctor_fname">
        </div>
        <div class="form-group">
          <label for="doctor_lname">Last Name:</label>
          <input type="text" class="form-control" name="doctor_lname" id="doctor_lname">
        </div>
        <div class="form-group">
          <label for="doctor_email">Email address:</label>
          <input type="email" class="form-control" name="doctor_email" id="doctor_email">
        </div>
        <div class="form-group">
          <label for="doctor_password">Password:</label>
          <input type="password" class="form-control" name="doctor_password" id="doctor_password">
        </div>
        <div class="form-group">
          <label for="doctor_phone">Phone Number:</label>
          <input type="text" class="form-control" name="doctor_phone" id="doctor_phone">
        </div>
        <div class="form-group">
          <label for="doctor_address_line_one">Address Line One:</label>
          <input type="text" class="form-control" name="doctor_address_line_one" id="doctor_address_line_one">
        </div>
        <div class="form-group">
          <label for="doctor_address_line_two">Address Line Two:</label>
          <input type="text" class="form-control" name="doctor_address_line_two" id="doctor_address_line_two">
        </div>
        <div class="form-group">
          <label for="doctor_city">City:</label>
          <input type="text" class="form-control" name="doctor_city" id="doctor_city">
        </div>
        <div class="form-group">
          <label for="doctor_county">County:</label>
          <input type="text" class="form-control" name="doctor_county" id="doctor_county">
        </div>
        <button type="submit" class="doctor-signUp" name="doctor-signUp">Submit</button>
      </form>

      <form id="chemist-sign-up" method="post">
        <!--Chemist Sign Up Section-->
        <h3>Chemist</h3>
        <div class="form-group">
          <label for="chemist_store_name">Store Name:</label>
          <input type="text" class="form-control" name="chemist_store_name" id="chemist_store_name">
        </div>
        <div class="form-group">
          <label for="chemist_email">Email:</label>
          <input type="text" class="form-control" name="chemist_email" id="chemist_email">
        </div>
        <div class="form-group">
          <label for="chemist_password">Password:</label>
          <input type="password" class="form-control" name="chemist_password" id="chemist_password">
        </div>
        <div class="form-group">
          <label for="chemist_phone">Phone Number:</label>
          <input type="text" class="form-control" name="chemist_phone" id="chemist_phone">
        </div>
        <div class="form-group">
          <label for="chemist_address_line_one">Address Line One:</label>
          <input type="text" class="form-control" name="chemist_address_line_one" id="chemist_address_line_one">
        </div>
        <div class="form-group">
          <label for="chemist_address_line_two">Address Line Two:</label>
          <input type="text" class="form-control" name="chemist_address_line_two" id="chemist_address_line_two">
        </div>
        <div class="form-group">
          <label for="chemist_city">City:</label>
          <input type="text" class="form-control" name="chemist_city" id="chemist_city">
        </div>
        <div class="form-group">
          <label for="chemist_county">County:</label>
          <input type="text" class="form-control" name="chemist_county" id="chemist_county">
        </div>
        <button type="submit" class="chemist-signUp" name="chemist-signUp">Submit</button>
      </form>
      
      <form id="driver-sign-up" method="post">
        <!--Driver Sign Up Section-->
        <h3>Driver</h3>
        <div class="form-group">
          <label for="driver_fname">First Name:</label>
          <input type="text" class="form-control" name="driver_fname" id="driver_fname">
        </div>
        <div class="form-group">
          <label for="driver_lname">Last Name:</label>
          <input type="text" class="form-control" name="driver_lname" id="driver_lname">
        </div>
        <div class="form-group">
          <label for="driver_email">Email address:</label>
          <input type="email" class="form-control" name="driver_email" id="driver_email">
        </div>
        <div class="form-group">
          <label for="driver_pwd">Password:</label>
          <input type="password" class="form-control" name="driver_pwd" id="driver_password">
        </div>
        <div class="form-group">
          <label for="driver_phone">Phone Number:</label>
          <input type="text" class="form-control" name="driver_phone" id="driver_phone">
        </div>
        <div class="form-group">
          <label for="driver_address_line_one">Address Line One:</label>
          <input type="text" class="form-control" name="driver_address_line_one" id="driver_address_line_one">
        </div>
        <div class="form-group">
          <label for="driver_address_line_two">Address Line Two:</label>
          <input type="text" class="form-control" name="driver_address_line_two" id="driver_address_line_two">
        </div>
        <div class="form-group">
          <label for="driver_city">City:</label>
          <input type="text" class="form-control" name="driver_city" id="driver_city">
        </div>
        <div class="form-group">
          <label for="driver_county">County:</label>
          <input type="text" class="form-control" name="driver_county" id="driver_county">
        </div>
        <button type="submit" class="driver-signUp" name="driver-signUp">Submit</button>
      </form>

        <!--Button to send sign up-->
        


      <script>
      /*
      TO-DO :
        Move this code to a seperate JS file
      */

      function formChange(){

        //get user type
        var getDropdown = document.getElementById('user-type');
        //get drop down?
        var optValue = getDropdown.options[getDropdown.selectedIndex].text;

        if(optValue == "Patient"){

          // Spit out code for patient sign up
          document.getElementById("patient_fname").required = true;
          document.getElementById("patient_lname").required = true;
          document.getElementById("patient_email").required = true;
          document.getElementById("patient_phone").required = true;
          document.getElementById("patient_address_line_one").required = true;
          document.getElementById("patient_address_line_two").required = true;
          document.getElementById("patient_city").required = true;
          document.getElementById("patient_county").required = true;
          document.getElementById("patient_password").required = true;


          document.getElementById("doctor_fname").required = false;
          document.getElementById("doctor_lname").required = false;
          document.getElementById("doctor_email").required = false;
          document.getElementById("doctor_phone").required = false;
          document.getElementById("doctor_address_line_one").required = false;
          document.getElementById("doctor_address_line_two").required = false;
          document.getElementById("doctor_city").required = false;
          document.getElementById("doctor_county").required = false;
          document.getElementById("doctor_password").required = false;

          document.getElementById("chemist_store_name").required = false;
          document.getElementById("chemist_email").required = false;
          document.getElementById("chemist_phone").required = false;
          document.getElementById("chemist_address_line_one").required = false;
          document.getElementById("chemist_address_line_two").required = false;
          document.getElementById("chemist_city").required = false;
          document.getElementById("chemist_county").required = false;
          document.getElementById("chemist_password").required = false;

          document.getElementById("driver_fname").required = false;
          document.getElementById("driver_fname").required = false;
          document.getElementById("driver_email").required = false;
          document.getElementById("driver_phone").required = false;
          document.getElementById("driver_address_line_one").required = false;
          document.getElementById("driver_address_line_two").required = false;
          document.getElementById("driver_city").required = false;
          document.getElementById("driver_county").required = false;
          document.getElementById("driver_password").required = false;

        }

        else if(optValue == "Doctor"){
          // Spit out code for doctor sign up
          document.getElementById("doctor_fname").required = true;
          document.getElementById("doctor_lname").required = true;
          document.getElementById("doctor_email").required = true;
          document.getElementById("doctor_phone").required = true;
          document.getElementById("doctor_address_line_one").required = true;
          document.getElementById("doctor_address_line_two").required = true;
          document.getElementById("doctor_city").required = true;
          document.getElementById("doctor_county").required = true;
          document.getElementById("doctor_password").required = true;

          document.getElementById("patient_fname").required = false;
          document.getElementById("patient_lname").required = false;
          document.getElementById("patient_email").required = false;
          document.getElementById("patient_phone").required = false;
          document.getElementById("patient_address_line_one").required = false;
          document.getElementById("patient_address_line_two").required = false;
          document.getElementById("patient_city").required = false;
          document.getElementById("patient_county").required = false;
          document.getElementById("patient_password").required = false;

          document.getElementById("driver_fname").required = false;
          document.getElementById("driver_fname").required = false;
          document.getElementById("driver_email").required = false;
          document.getElementById("driver_phone").required = false;
          document.getElementById("driver_address_line_one").required = false;
          document.getElementById("driver_address_line_two").required = false;
          document.getElementById("driver_city").required = false;
          document.getElementById("driver_county").required = false;
          document.getElementById("driver_password").required = false;

          document.getElementById("chemist_store_name").required = false;
          document.getElementById("chemist_email").required = false;
          document.getElementById("chemist_phone").required = false;
          document.getElementById("chemist_address_line_one").required = false;
          document.getElementById("chemist_address_line_two").required = false;
          document.getElementById("chemist_city").required = false;
          document.getElementById("chemist_county").required = false;
          document.getElementById("chemist_password").required = false;

        }

        else if(optValue == "Delivery Man"){
          // Spit out code for driver sign up
          document.getElementById("driver_fname").required = true;
          document.getElementById("driver_lname").required = true;
          document.getElementById("driver_email").required = true;
          document.getElementById("driver_phone").required = true;
          document.getElementById("driver_address_line_one").required = true;
          document.getElementById("driver_address_line_two").required = true;
          document.getElementById("driver_city").required = true;
          document.getElementById("driver_county").required = true;
          document.getElementById("driver_password").required = true;

          document.getElementById("chemist_store_name").required = false;
          document.getElementById("chemist_email").required = false;
          document.getElementById("chemist_phone").required = false;
          document.getElementById("chemist_address_line_one").required = false;
          document.getElementById("chemist_address_line_two").required = false;
          document.getElementById("chemist_city").required = false;
          document.getElementById("chemist_county").required = false;
          document.getElementById("chemist_password").required = false;

          document.getElementById("patient_fname").required = false;
          document.getElementById("patient_lname").required = false;
          document.getElementById("patient_email").required = false;
          document.getElementById("patient_phone").required = false;
          document.getElementById("patient_address_line_one").required = false;
          document.getElementById("patient_address_line_two").required = false;
          document.getElementById("patient_city").required = false;
          document.getElementById("patient_county").required = false;
          document.getElementById("patient_password").required = false;

          document.getElementById("doctor_fname").required = false;
          document.getElementById("doctor_lname").required = false;
          document.getElementById("doctor_email").required = false;
          document.getElementById("doctor_phone").required = false;
          document.getElementById("doctor_address_line_one").required = false;
          document.getElementById("doctor_address_line_two").required = false;
          document.getElementById("doctor_city").required = false;
          document.getElementById("doctor_county").required = false;
          document.getElementById("doctor_password").required = false;
        }
        else if(optValue == "Chemist"){
          // Spit out code for chemist sign up
          document.getElementById("chemist_store_name").required = true;
          document.getElementById("chemist_email").required = true;
          document.getElementById("chemist_phone").required = true;
          document.getElementById("chemist_address_line_one").required = true;
          document.getElementById("chemist_address_line_two").required = true;
          document.getElementById("chemist_city").required = true;
          document.getElementById("chemist_county").required = true;
          document.getElementById("chemist_password").required = true;

          document.getElementById("driver_fname").required = false;
          document.getElementById("driver_lname").required = false;
          document.getElementById("driver_email").required = false;
          document.getElementById("driver_phone").required = false;
          document.getElementById("driver_address_line_one").required = false;
          document.getElementById("driver_address_line_two").required = false;
          document.getElementById("driver_city").required = false;
          document.getElementById("driver_county").required = false;
          document.getElementById("driver_password").required = false;

          document.getElementById("patient_fname").required = false;
          document.getElementById("patient_lname").required = false;
          document.getElementById("patient_email").required = false;
          document.getElementById("patient_phone").required = false;
          document.getElementById("patient_address_line_one").required = false;
          document.getElementById("patient_address_line_two").required = false;
          document.getElementById("patient_city").required = false;
          document.getElementById("patient_county").required = false;
          document.getElementById("patient_password").required = false;

          document.getElementById("doctor_fname").required = false;
          document.getElementById("doctor_lname").required = false;
          document.getElementById("doctor_email").required = false;
          document.getElementById("doctor_phone").required = false;
          document.getElementById("doctor_address_line_one").required = false;
          document.getElementById("doctor_address_line_two").required = false;
          document.getElementById("doctor_city").required = false;
          document.getElementById("doctor_county").required = false;
          document.getElementById("doctor_password").required = false;

        }

        else{
          //no required fields
        }

        //console.log(optValue);

      }
      </script>
    <?php
        if (isset($msg)) {
          echo $msg;
        }
    ?>
  </body>
</html>
