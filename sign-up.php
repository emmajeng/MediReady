<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="js/velocity-master/velocity.js"></script>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />

    <!-- JS for password confirmation match-->
    <script language="javascript" type="text/javascript" src="js/signup_password_match.js"></script>




  </head>

  <body id="form-background" onload="checkPassword()">
    <?php
          include('lib/signUp.php');
        ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav-session">
      <div class="container">
        <a class="" href="index.php"><img height=35 width=210 src="img/MediReady.png" /></a>
      </div>
    </nav>

    <div class="form-container">
      <div class="form-head">
        <h2 class="form-title">Create a New Account</h2>
        <div id="user-dropdown" onchange="formChange()">
          <select name="user-type" id="user-type">
            <option value=0>Please choose user type</option>
            <option value=1>Patient</option>
            <option value=2>Doctor</option>
            <option value=3>Chemist</option>
            <option value=4>Delivery Man</option>
          </select>
        </div>
      </div>
      <div class="form-drop">
        <form id="patient-sign-up" class="reg-form" method="post">
          <!--Patient Sign Up Section-->
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
              <input type="password" class="form-control" name="patient_pwd" id="patient_password" onchange="checkPassword()">
            </div>
            <div class="form-group">
              <label for="patient_pwd2">Confirm Password:</label>
              <input type="password" class="form-control" name="patient_pwd2" id="patient_password2" onchange="checkPassword()">
            </div>
            <div class="form-group">
              <label for="patient_phone">Phone Number:</label>
              <input type="text" class="form-control" name="patient_phone" id="patient_phone">
            </div>
            <div class="form-group">
              <label for="patient_address_line_one">Address:</label>
              <input type="text" class="form-control" name="patient_address" id="patient_address_line_one">
            </div>
            <button type="submit" id="patient-reg" class="patient-signUp" name="patient-signUp">Submit</button>
            <div id="patient_error">Hey there friend your passwords do not match!</div>
          </form>

            <!--Doctor Sign Up Section-->
          <form id="doctor-sign-up" class="reg-form" method="post">
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
              <input type="password" class="form-control" name="doctor_password" id="doctor_password" onchange="checkPassword()">
            </div>
            <div class="form-group">
              <label for="doctor_password2">Confirm Password:</label>
              <input type="password" class="form-control" name="doctor_password2" id="doctor_password2" onchange="checkPassword()">
            </div>
            <div class="form-group">
              <label for="doctor_phone">Phone Number:</label>
              <input type="text" class="form-control" name="doctor_phone" id="doctor_phone">
            </div>
            <div class="form-group">
              <label for="doctor_cert">Please Upload your certifucation:</label>
              <input type="file" class="" name="doctor_cert" id="doctor_cert">
            </div>
            <button type="submit" id="doctor-reg" class="doctor-signUp" name="doctor-signUp">Submit</button>
            <div id="doctor_error">Hey there friend your passwords do not match!</div>
          </form>

          <form id="chemist-sign-up" class="reg-form" method="post">
            <!--Chemist Sign Up Section-->
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
              <input type="password" class="form-control" name="chemist_password" id="chemist_password" onchange="checkPassword()">
            </div>
            <div class="form-group">
              <label for="chemist_password2">Confirm Password:</label>
              <input type="password" class="form-control" name="chemist_password2" id="chemist_password2" onchange="checkPassword()">
            </div>
            <div class="form-group">
              <label for="chemist_phone">Phone Number:</label>
              <input type="text" class="form-control" name="chemist_phone" id="chemist_phone">
            </div>
            <div class="form-group">
              <label for="chemist_address">Address:</label>
              <input type="text" class="form-control" name="chemist_address" id="chemist_address">
            </div>
            <div class="form-group">
              <label for="chemist_cert">Please Upload your certifucation:</label>
              <input type="file" class="" name="chemist_cert" id="chemist_cert">
            </div>
            <button type="submit" id="chemist-reg" class="chemist-signUp" name="chemist-signUp">Submit</button>
            <div id="chemist_error">Hey there friend your passwords do not match!</div>
          </form>

          <form id="driver-sign-up" class="reg-form" method="post">
            <!--Driver Sign Up Section-->
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
              <input type="password" class="form-control" name="driver_pwd" id="driver_password" onchange="checkPassword()">
            </div>
            <div class="form-group">
              <label for="driver_pwd2">Confirm Password:</label>
              <input type="password" class="form-control" name="driver_pwd2" id="driver_password2" onchange="checkPassword()">
            </div>
            <div class="form-group">
              <label for="driver_phone">Phone Number:</label>
              <input type="text" class="form-control" name="driver_phone" id="driver_phone">
            </div>
            <div class="form-group">
              <label for="driver_license">Please Upload your drivers license:</label>
              <input type="file" class="" name="driver_license" id="driver_license">
            </div>
            <button type="submit" id="driver-reg" class="driver-signUp" name="driver-signUp">Submit</button>
            <div id="driver_error">Hey there friend your passwords do not match!</div>
          </form>

        </div>
      </div>





      <script type="text/javascript">
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



          $("#patient-sign-up").velocity("slideDown", {
                  duration: 1000
          });



          document.getElementById("patient-sign-up").style.display = 'none';
          document.getElementById("chemist-sign-up").style.display = 'none';
          document.getElementById("doctor-sign-up").style.display = 'none';
          document.getElementById("driver-sign-up").style.display = 'none';

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
          document.getElementById("chemist_al1").required = false;
          document.getElementById("chemist_al2").required = false;
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


          $("#doctor-sign-up").velocity("slideDown", {
                  duration: 1000
          });




          document.getElementById("patient-sign-up").style.display = 'none';
          document.getElementById("chemist-sign-up").style.display = 'none';
          document.getElementById("doctor-sign-up").style.display = 'none';
          document.getElementById("driver-sign-up").style.display = 'none';


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
          document.getElementById("chemist_al1").required = false;
          document.getElementById("chemist_al2").required = false;
          document.getElementById("chemist_city").required = false;
          document.getElementById("chemist_county").required = false;
          document.getElementById("chemist_password").required = false;



        }

        else if(optValue == "Delivery Man"){

          $("#driver-sign-up").velocity("slideDown", {
                  duration: 1000
          });



          document.getElementById("patient-sign-up").style.display = 'none';
          document.getElementById("chemist-sign-up").style.display = 'none';
          document.getElementById("doctor-sign-up").style.display = 'none';
          document.getElementById("driver-sign-up").style.display = 'none';


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
          document.getElementById("chemist_al1").required = false;
          document.getElementById("chemist_al2").required = false;
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


          $("#chemist-sign-up").velocity("slideDown", {
                  duration: 1000
          });



          document.getElementById("patient-sign-up").style.display = 'none';
          document.getElementById("chemist-sign-up").style.display = 'none';
          document.getElementById("doctor-sign-up").style.display = 'none';
          document.getElementById("driver-sign-up").style.display = 'none';


          // Spit out code for chemist sign up
          document.getElementById("chemist_store_name").required = true;
          document.getElementById("chemist_email").required = true;
          document.getElementById("chemist_phone").required = true;
          document.getElementById("chemist_al1").required = true;
          document.getElementById("chemist_al2").required = true;
          document.getElementById("chemist_city").required = true;
          document.getElementById("chemist_county").required = true;
          document.getElementById("chemist_password").required = true;

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

          $(".reg-form").velocity("slideUp", {
                  duration: 1000
          });




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
