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
        <div id="map"></div>

            <script>
              mapboxgl.accessToken = 'pk.eyJ1IjoiZW1tYWplbmciLCJhIjoiY2phbzNkdnRqM2kzejMzcGx6aXRnNGEzZCJ9.B2v7VV1Go9UVRv0m-YEDOw';
              var map = new mapboxgl.Map({
                  container: 'map', // container id
                  style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
                  center: [-7.778320310000026, 53.2734], // starting position [lng, lat]
                  zoom: 8 // starting zoom
              });

              map.scrollZoom.disable();
              map.addControl(new mapboxgl.NavigationControl());
            </script>
      </div>

    <!-- Update route button -->

     <!-- Location.php script -->
            <?php
            /*
             ====== Also need to comvert the output of the TSP as a json =====
            */
            /*
            This file grabs the longitudes and latitudes from the database
            and then converts them into a 2D array and calls the algorithim

            NOTE: Need to change fname and lname to the longitudes and latitudes
            */
                require 'lib/config.php';

                $arr = array();
                $query = ("SELECT * FROM patient_table");
                $result = $DBcon->query($query);

                //echo $query;
             $i=0;
                while($row = mysqli_fetch_array($result)) {

                    $arr[$i] = array($row['lattitude'],$row['longitude']);
                    $i++;

                }



            ?>



            <script>




            map.on('load', function(){

      getRoute();
    });

    //get route takes start and end (lat,long)
    function getRoute() {

      //php connect ot db to get long lat from patients with deliveries
      var locationArr = <?php echo json_encode($arr); ?>;

      // run tsp algortithm + get response array
      <?php include 'lib/tsp.php';?>;
      makeCities(locationArr);
      //pass in ordered tsp locations array below
      function passLocations(finalArray){
        console.log('again');
        console.log(finalArray);


      var locations = finalArray;

      var locationString = locations.map(function(x) {
        return x.join(',');

      }).join(';');

      var directionsRequest = 'https://api.mapbox.com/directions/v5/mapbox/driving/' + locationString + '?steps=true&geometries=geojson&access_token=' + mapboxgl.accessToken;
      $.ajax({
        method: 'GET',
        url: directionsRequest,
      }).done(function(data){
        var route = data.routes[0].geometry;

        //addes route line
        map.addLayer({
          id: 'route',
          type: 'line',
          source: {
            type: 'geojson',
            data: {
              type: 'Feature',
              geometry: route
            }
          },
          paint: {
            'line-width': 2
          }
        });

        //adds start point
        map.addLayer({
          id: 'start',
          type: 'circle',
          source: {
            type: 'geojson',
            data: {
              type: 'Feature',
              geometry: {
                type: 'Point',
                coordinates: start
              }
            }
          }
        });

        //adds end point
        map.addLayer({
          id: 'end',
          type: 'circle',
          source: {
            type: 'geojson',
            data: {
              type: 'Feature',
              geometry: {
                type: 'Point',
                coordinates: end
              }
            }
          }

        });

        map.addLayer({
          id: 'middle',
          type: 'circle',
          source: {
            type: 'geojson',
            data: {
              type: 'Feature',
              geometry: {
                type: 'Point',
                coordinates: middle
              }
            }
          }

        });

        //shows insturctions
        //https://www.mapbox.com/help/getting-started-directions-api/
        //https://www.mapbox.com/help/how-directions-work/


      });
    }
    }


            </script>

    <!-- Orders Table -->
    <div class="dashboard-container bottom-container">
      <table class="table-fill">
        <thead>
        <tr>
        <th class="text-left">Address</th>
        <th class="text-left">Price</th>
        <th class="text-left">Status</th>
        <th class="text-left">Update</th>
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
                      $status = $row['status'];
                      $orderID = $row['order_id'];

                       if($status == 'Delivery'){
                        $update = 'Delivered';
                      }

                      else{
                        $update = 'Delivery';
                      }

                      while($row1 = $details->fetch_assoc())
                    {

                      echo "<tr>";
                      echo "<form method='post' action='lib/setDelivered.php'>";
                        echo "<td>" . $row1['patient_address']. "</td>";
                        echo "<td>" . $row['price']. "</td>";
                        echo "<td>" . $row['status']. "</td>";
                        echo "<input type='hidden' name='orderID' value='".$row['order_id']."' />";
                        echo "<td><button type='submit' name='setDelivered' class='btn btn-success btn-block'>$update</button></td>";
                      echo "</form>";
                      echo "</tr>";
                    }
                    }
                  }
                  else
                  {
                    echo "<tr>";
                        echo "<td colspan='4'>No Current Deliveries</td>";
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
