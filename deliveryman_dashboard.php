<?php
require 'lib/config.php';

/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['login_user'] == null ) {
  $_SESSION['message'] = "You must log in before viewing dashboard";
  header("location: index.php");
}
else {
    // pass in user type add if for redirects
    if($_SESSION['user_type'] == 'patient'){
      header("location: patient_dashboard.php");
    }

    else if($_SESSION['user_type'] == 'doctor'){
      header("location: doctor_dashboard.php");
    }

    else if($_SESSION['user_type'] == 'chemist'){
      header("location: chemist_dashboard.php");
    }

    else if($_SESSION['user_type'] == 'driver'){
    }

    else{
      header("location: index.php");
    }

}

?>

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
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.42.2/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.42.2/mapbox-gl.css' rel='stylesheet' />


    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />

  </head>

  <body>
    <div id="page-top" class="bottom-pad">
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
              <a class="nav-link" href="account.php">Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lib/signout.php">Sign Out</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    </div>

  <!--Tabs for Patient Dashboard-->
      <div id="mapContainer">
        <div class='sidebar'>
          <table class="table-fill">
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
            <tr>
              <td>Name</td>
              <td>Price</td>
              <td>Button</td>
            </tr>
          </table>
        </div>
        <div id="map"></div>

            <script>
              mapboxgl.accessToken = 'pk.eyJ1IjoiZW1tYWplbmciLCJhIjoiY2phbzNkdnRqM2kzejMzcGx6aXRnNGEzZCJ9.B2v7VV1Go9UVRv0m-YEDOw';
              var map = new mapboxgl.Map({
                  container: 'map', // container id
                  style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
                  center: [-7.778320310000026, 53.2734], // starting position [lng, lat]
                  zoom: 6 // starting zoom
              });

              map.scrollZoom.disable();
            </script>
      </div>

    <!-- Update route button -->

     <!-- Location.php script -->
            <?php
             // include 'lib/location.php';
              //print_r($locations);
              //echo '<button onclick="plotPoints(<?php echo  json_encode($locations) )" name="calc_route" class="btn btn-xl btn-mrg" id="calc_route">Update Route</button>';

            ?>

            <button onclick="plotPoints(<?php include 'lib/location.php'; echo  json_encode($locations) ?>)" name="calc_route" class="btn btn-xl btn-mrg" id="calc_route">Update Route</button>

            <script>

           /*function plotPoints(myarr){
                console.log(myarr.length);
                console.log(myarr);
               for(var i = 0; i<myarr.length; i++){
                 //print the locations as point from the array
                 console.log(myarr[i]);

               }
           }*/

          var arr = <?php include 'lib/location.php'; echo json_encode($locations)?>;
          var arrloc = [];

          for(var i = 0; i<arr.length;i++){
            arrloc.push(arr[i]);
          }
          //arr2 = arr[3];
          //arr3 = arr[2];
          console.log(arrloc);

          map.on('load', function () {

          map.addLayer({
              "id": "route",
              "type": "line",
              "source": {
                  "type": "geojson",
                  "data": {
                      "type": "Feature",
                      "properties": {},
                      "geometry": {
                          "type": "LineString",
                          "coordinates": arrloc
                      }
                  }
              },
              "layout": {
                  "line-join": "round",
                  "line-cap": "round"
              },
              "paint": {
                  "line-color": "#4DD0E1",
                  "line-width": 4
              }
          });

      });
            </script>

    <!-- Orders Table -->
    <div class="dashboard-container bottom-container">
      <table class="table-fill">
        <thead>
        <tr>
        <th class="text-left">Name</th>
        <th class="text-left">Address</th>
        <th class="text-left">Price</th>
        <th class="text-left">Status</th>
        </tr>
        </thead>
        <tbody class="table-hover">
          <?php
                  require_once 'lib/config.php';

                  // Create connection
                  // Check connection
                  if ($DBcon->connect_error)
                  {
                    die("Connection failed: " . $DBcon->connect_error);
                  }

                  $sql = "SELECT * FROM orders_table WHERE status = 'Delivery'";
                  $result = $DBcon->query($sql);

                  if ($result->num_rows > 0)
                  {
                    // output data of each row
                    while($row = $result->fetch_assoc())
                    {
                      $patient = "SELECT * FROM patient_table WHERE patient_id =" . $row['patient_id'].";";
                      $details = $DBcon->query($patient);

                      while($row1 = $details->fetch_assoc())
                    {

                      echo "<tr>";
                        echo "<td>" . $row1['patient_fname']. "</td>";
                        echo "<td>" . $row1['patient_address']. "</td>";
                        echo "<td>" . $row['price']. "</td>";
                        echo "<td><button class='btn btn-success btn-block'>" . $row['status']. "</button></td>";
                      echo "</tr>";
                    }
                    }
                  }
                  else
                  {
                    echo "<tr>";
                        echo "<td>N</td>";
                        echo "<td>A</td>";
                        echo "<td>D</td>";
                        echo "<td><button class='btn btn-success btn-block'>Status</button></td>";
                      echo "</tr>";
                  }

                ?>
        </tbody>
      </table>
    </div>

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

  </body>

</html>
