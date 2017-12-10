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
    <script>
      function getLatitudeLongitude(callback, address) {
        // If adress is not supplied, use default value 'National college of ireland, dublin, ireland'
        address = address || 'National college of ireland, dublin, ireland';
        // Initialize the Geocoder
        geocoder = new google.maps.Geocoder();
        if (geocoder) {
            geocoder.geocode({
                'address': address
            }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    callback(results[0]);
                }
            });
        }
      }

      function showResult(result) {
        document.getElementById('patient_addr_lat').value = result.geometry.location.lat();
        document.getElementById('patient_addr_long').value = result.geometry.location.lng();
      }

      function getLL(){
        var address = document.getElementById('patient_addr').value;
        getLatitudeLongitude(showResult, address);
      }
    </script>
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
            </div>
            <div id="locationField">
              <input id="patient_addr" name="patient_addr" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
            </div>
			<a type="button" class="" id="btn" onclick="getLL()">Confirm Address</a>
            <input type="hidden" id="patient_addr_lat" name="patient_addr_lat">
            <input type="hidden" id="patient_addr_long" name="patient_addr_long">
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
          document.getElementById("patient_addr").required = true;
          document.getElementById("patient_password").required = true;


          document.getElementById("doctor_fname").required = false;
          document.getElementById("doctor_lname").required = false;
          document.getElementById("doctor_email").required = false;
          document.getElementById("doctor_phone").required = false;
          document.getElementById("doctor_password").required = false;

          document.getElementById("chemist_store_name").required = false;
          document.getElementById("chemist_email").required = false;
          document.getElementById("chemist_phone").required = false;
          document.getElementById("chemist_password").required = false;

          document.getElementById("driver_fname").required = false;
          document.getElementById("driver_fname").required = false;
          document.getElementById("driver_email").required = false;
          document.getElementById("driver_phone").required = false;
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
          document.getElementById("doctor_password").required = true;

          document.getElementById("patient_fname").required = false;
          document.getElementById("patient_lname").required = false;
          document.getElementById("patient_email").required = false;
          document.getElementById("patient_phone").required = false;
          document.getElementById("patient_addr").required = false;
          document.getElementById("patient_password").required = false;

          document.getElementById("driver_fname").required = false;
          document.getElementById("driver_fname").required = false;
          document.getElementById("driver_email").required = false;
          document.getElementById("driver_phone").required = false;
          document.getElementById("driver_password").required = false;

          document.getElementById("chemist_store_name").required = false;
          document.getElementById("chemist_email").required = false;
          document.getElementById("chemist_phone").required = false;
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
          document.getElementById("driver_password").required = true;

          document.getElementById("chemist_store_name").required = false;
          document.getElementById("chemist_email").required = false;
          document.getElementById("chemist_phone").required = false;
          document.getElementById("chemist_password").required = false;

          document.getElementById("patient_fname").required = false;
          document.getElementById("patient_lname").required = false;
          document.getElementById("patient_email").required = false;
          document.getElementById("patient_phone").required = false;
          document.getElementById("patient_addr").required = false;
          document.getElementById("patient_password").required = false;

          document.getElementById("doctor_fname").required = false;
          document.getElementById("doctor_lname").required = false;
          document.getElementById("doctor_email").required = false;
          document.getElementById("doctor_phone").required = false;
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
          document.getElementById("chemist_password").required = true;

          document.getElementById("driver_email").required = false;
          document.getElementById("driver_phone").required = false;
          document.getElementById("driver_password").required = false;

          document.getElementById("patient_fname").required = false;
          document.getElementById("patient_lname").required = false;
          document.getElementById("patient_email").required = false;
          document.getElementById("patient_phone").required = false;
          document.getElementById("patient_addr").required = false;
          document.getElementById("patient_password").required = false;

          document.getElementById("doctor_fname").required = false;
          document.getElementById("doctor_lname").required = false;
          document.getElementById("doctor_email").required = false;
          document.getElementById("doctor_phone").required = false;
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

    <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('patient_addr')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        // for (var component in componentForm) {
        //   console.log(component);
        //   // document.getElementById(component).value = '';
        //   // document.getElementById(component).disabled = false;
        // }

        // // Get each component of the address from the place details
        // // and fill the corresponding field on the form.
        // for (var i = 0; i < place.address_components.length; i++) {
        //   var addressType = place.address_components[i].types[0];
        //   if (componentForm[addressType]) {
        //     var val = place.address_components[i][componentForm[addressType]];
        //     document.getElementById(addressType).value = val;
        //   }
        // }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHLIx0wxfBSnO7tPtAXvdTMBkXDSxfDFM&libraries=places&callback=initAutocomplete"
        async defer>


    </script>
    <?php
        if (isset($msg)) {
          echo $msg;
        }
    ?>

  </body>
</html>
