<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing dashboard";
  header("location: index.php");
}
else {
    // Makes it easier to read
    $_SESSION['store_name'] = $user['chemist_store_name'];

}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chemist - Dashboard</title>

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
    <div id="page-top">
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
              <a class="nav-link" href="https://mediready-development-emmajeng.c9users.io/account.php">Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Sign Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </div>


    <!-- Orders Table -->
    <section id="chemist-dash">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
                <h2> Dashboard - <?= $store_name ?> </h2>
            </div>
            <div class="col-md-12">
                <form>
                    <input type="text" id="search" name="search" placeholder="Search..">
                </form>
            </div>

            <div class="col-lg-12 text-center">
                <table class="table-fill">
                    <thead>
                        <tr>
                            <th class="text-left">Orders</th>
                            <th class="text-left">Name</th>
                        </tr>
                    </thead>
                    <tbody class="table-hover">
                      <tr>
                          <td class="text-left" >2333444</td>
                          <td class="text-left">Christopher Kambayi</td>
                      </tr>

                      <?php
                      require_once 'lib/config.php';

                      // Create connection
                      // Check connection
                      if ($DBcon->connect_error)
                      {
                          die("Connection failed: " . $DBcon->connect_error);
                      }

                      $sql = "SELECT * FROM chemist_table";
                      $result = $DBcon->query($sql);

                      if ($result->num_rows > 0)
                      {
                          // output data of each row
                          while($row = $result->fetch_assoc())
                          {
                              echo "<tr>";
                                echo "<td>" . $row["chemist_id"]. "</td>";
                                echo "<td>" . $row["chemist_store_name"]. "</td>";
                                //echo "<td>" . $row["patient_fname"]. "</td>";
                              echo "</tr>";
                          }
                          //echo "</table>";
                      }
                      else
                      {
                        echo "<tr>";
                          echo "<td>No</td>";
                          echo "<td>Results</td>";
                        echo "</tr>";

                        echo "<tr>";
                          echo "<td>Still</td>";
                          echo "<td>Results</td>";
                        echo "</tr>";
                      }

                      $DBcon->close();

                      echo "</tbody>";
                      echo "</table>";

                    ?>


                    </tbody>
              </table>
            </div>
        </div>
    </div>
</section>

<section id="chemist2">
    <div class="container">


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

    <!--Link to JS Tab file-->
    <script language="javascript" type="text/javascript" src="js/tab.js"></script>

    <!-- Google Map function and get location -->
    <script language="javascript" type="text/javascript" src="js/map.js"></script>

    <!-- API Key for Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3u7zBjNuRP74J7XOKA0nGAQyNeAY2_vc&callback=myMap"></script>
  </body>

</html>
