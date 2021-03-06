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
    }

    else if($_SESSION['user_type'] == 'doctor'){
      header("location: doctor_dashboard.php");
    }

    else if($_SESSION['user_type'] == 'chemist'){
      header("location: chemist_dashboard.php");
    }

    else if($_SESSION['user_type'] == 'driver'){
      header("location: deliveryman_dashboard.php");
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
    <!--SweetAlert-->
    <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.css" />
    <script data-require="jquery@*" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script data-require="sweet-alert@*" data-semver="0.4.2" src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>



  </head>

  <body id="page-top">
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

    <!--Tabs for Patient Dashboard-->
    <div class="dashboard-container">
      <div id="tab-buttons">
        <button onclick="setTabContents('tab-1')" id="new-order" class="tab-1 active" >New Orders</button>
        <button onclick="setTabContents('tab-2')" id="chem-select" class="tab-2" >Select Chemist</button>
      </div>
      <div id="tab-contents">
        <div class="tab-1 active">
          <table class="table-fill">
            <thead>
              <tr>
                <th class="text-left">Medication</th>
                <th class="text-left">Amount</th>
                <th class="text-left">Select</th>
              </tr>
            </thead>
            <tbody class="">
          <form method="post">
          <?php
            $query = "SELECT prescription_id FROM prescriptions WHERE patient_id='".$_SESSION['login_user']."';";
            $result = mysqli_query($DBcon, $query);

            while($row = mysqli_fetch_array($result))
            {
            	$query2 = "SELECT * FROM prescription_details_table WHERE prescription_id=".$row['prescription_id']." AND presc_accepted='waiting'";
            	$result2 = mysqli_query($DBcon, $query2);



            	if($result2->num_rows > 0){
            	  $numrows = $result2->num_rows;

            	while($row1 = mysqli_fetch_array($result2))
            	{
            		echo '
              		      <tr class="">
                			  	<td class="">'.$row1['med_name'].'</td>
                			  	<td class="">'.$row1['med_amount'].'</td>
                			  	<td class=""><input name="presc_id[]" type="checkbox" value="'.$row1['prescdetails_id'].'"/></td>
                			  </tr>';

            	}
            	//end while
              }
              //end if
            }

            if(!$numrows){
              echo '<td colspan="3">You have no active prescriptions</td>';
            }



            ?>
            </tbody>
          </table>
            <a onclick="setTabContents('tab-2')" class="btn btn-next">Next</a>
        </div>
        <div class="tab-2">
          <table class="table-fill">
            <thead>
              <tr>
                <th class="text-left">Chemist Store</th>
                <th class="text-left">Choose</th>
              </tr>
            </thead>
            <tbody class="">
              <?php
                $displayChemists = "SELECT * FROM chemist_table;";
                $chemistResults = $DBcon->query($displayChemists);

                while($row = mysqli_fetch_array($chemistResults)){
                    echo '<tr>
                            <td class="text-left">'.$row['chemist_store_name'].'</td>
                            <td><a class="chemist-button"  onclick="passID('.$row['chemist_id'].')">Select</a></td>
                          </tr>';
                }
              ?>

              <script>
                var chem_id;
                  function passID(chem_id){
                    //runnng this function puts the value in the chemist id field to send on
                    document.getElementById('chem_id_val').value = chem_id;
                  }
              </script>

            <input type="hidden" name="chem_id_val" id="chem_id_val" required/>



            <?php

            if(isset($_POST["btn-accept"])){
              //searching
              $chem_id = strip_tags($_POST['chem_id_val']);
              //insert query for order
              $insertorder = "INSERT INTO orders_table(status,patient_id,chemist_id) VALUES('Awaiting Response',".$_SESSION['login_user'].",".$chem_id.");";
              $DBcon->query($insertorder);
              //gets id for the previous query
              $orderID = $DBcon->insert_id;

              //get prescription id to pull the info the med name and amount
              $presc_id = array();
              $presc_id  = $_POST['presc_id'];
              foreach($presc_id as $index){
                $getOrderDetails = "SELECT * FROM prescription_details_table WHERE prescdetails_id=".$index.";";
                $info_result = $DBcon->query($getOrderDetails);
                while($row = mysqli_fetch_array($info_result)){
                  //setting table results to vars
                  $medication = $row['med_name'];
                  $amount = $row['med_amount'] ;

                  $insertOrderDetails = 'INSERT INTO order_details_table(medName,medAmount,order_id) VALUES("'.$medication.'","'.$amount.'",'.$orderID.');';
                	mysqli_query($DBcon, $insertOrderDetails);
                }
                //set to complete here
                $prescCompleted = 'UPDATE prescription_details_table
                                       SET presc_accepted = "completed"
                                       WHERE prescdetails_id ='.$index.';';
                mysqli_query($DBcon, $prescCompleted);
              }
            }
            ?>

            </tbody>

          </table>

          <button type="submit" id="send-order" class="btn btn-block" name="btn-accept"
            <?php
            //make this button disabled if the patient has no orders
            if(!$numrows){
              echo 'disabled';
            }
            ?>
            >Send Order</button><!-- Close the button tag-->
            </form>
        </div>
      </div>
    </div>



    <h2 id="section-heading">Active Orders</h2>


    <!-- Orders Table -->
    <div class="dashboard-container bottom-container">
      <table class="table-fill">
        <thead>
        <tr>
        <th class="text-left">Medication</th>
        <th class="text-left">Amount</th>
        <th class="text-left">Price</th>
        <th class="text-left">Order Status</th>
        </tr>
        </thead>
        <tbody class="table-hover">
          <?php
            $query = "SELECT * FROM orders_table where patient_id='".$_SESSION['login_user']."' AND status != 'Delivered'"/*insert patient id using sessions*/;
            $result = mysqli_query($DBcon, $query);
            if ($result->num_rows > 0) {
              while($row = mysqli_fetch_array($result))
              {

                $orderdetails = "SELECT * FROM order_details_table WHERE order_id=".$row['order_id'].";";
                $details = mysqli_query($DBcon, $orderdetails);
                while($row1 = mysqli_fetch_array($details)){

                  echo '<tr>
                    <td class="text-left">'.$row1['medName'].'</td>
                    <td class="text-left">'.$row1['medAmount'].'</td>
                    <td class="text-left">'.$row['price'].'</td>
                    <td class="text-left">'.$row['status'].'</td>
                    </tr>';

                }
              }
            }
            else{
              echo '<tr>
              <td colspan="4">You currently have no active orders</td>
              </tr>';
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
  </body>

</html>
