<?php
  // this is just for testing purposes
  // Will change so that it connects from config.php
  // Also Need to add require sign.php
  // database connection testing for now

  $connectToMysql = mysqli_connect("localhost","root","","c9");

  //query
  $query = "SELECT * FROM patient_table ORDER BY patient_id ASC";

  // store result
  $storedResult = mysqli_query($connectToMysql, $query);



?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Doctor - Dashboard</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- Auto complete JS -->
  <script src="vendor/autocomplete/jquery.easy-autocomplete.min.js"></script>

  <!-- Auto complete CSS -->
  <link rel="stylesheet" href="vendor/autocomplete/easy-autocomplete.min.css">

  <!-- Bootgrid -->
  <script src="vendor/bootgrid/jquery.bootgrid.min.js"></script>
  <link rel="stylesheet" href="vendor/bootgrid/jquery.bootgrid.css" type="text/css" />




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
              <a class="nav-link" href="">Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Sign Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!--Tabs for Doctor Dashboard-->
  <div class="dashboard-container">
    <div id="tab-buttons">
      <button onclick="setTabContents('tab-1')" id="new-order" class="tab-1 active">Make Prescription</button>
      <button onclick="setTabContents('tab-2')" id="chem-select" class="tab-2">Select Client</button>
    </div>
    <div id="wrapper-tabs">
      <div id="tab-contents">
        <div class="tab-1 active">
          <h4>
          </h4>

          <div id="make_prescription">

            <!-- form method = "post" action = "submitting.php" -->
            <form method="post" action="lib/send-prescription-doctor-dashboard.php" novalidate>

              <div class="form-group fieldGroup">

                <div class="input-group">

                  <input id="medInput" type="text" name="medication[]" class="form-control" placeholder="Medication" required />
                  <input id="amtInput" type="text" name="amount[]" class="form-control" placeholder="Amount" required/>

                  <div class="input-group-addon">
                    <a href="javascript:void(0)" class="btn btn-success btn-block addMore"><span class = "glyphicon glyphicon glyphicon-plus" aria-hidden = "true"><img height=25 width=25 src="img/plus.png" /></span> </a>
                  </div>

                </div>

              </div>

            <!-- tell javascript to grab this-->
            <div class="form-group fieldGroupCopy" style="display: none;">
              <div class="input-group">
                <input id="medInput" type="text" name="medication[]" class="form-control" placeholder="Medication" required/>
                <input id="amtInput" type="text" name="amount[]" class="form-control" placeholder="Amount" />
                <div class="input-group-addon">
                  <a href="javascript:void(0)" class="btn btn-danger btn-block remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"><img id="remove-img" height=7 width=25 src="img/remove.png" /></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="hide-drop">
          <input id="patient_id" name="patient_id" value=""/>
        </div>


        <div class="tab-2">
          <h4>
          </h4>
          <div id="choose-client">


            <!-- Make table that pulls from database -->

            <div class = "table-responsive">

              <table id = "patient_table" class="table table-striped table-bordered">
                 <thead>
                   <tr>


                   </tr>

                 </thead>
                 <tbody>
                 <?php

                  while($row = mysqli_fetch_array($storedResult))
                  {

                    echo '
                    <tr>
                      <td>' .$row["patient_fname"].'</td>
                      <td>' .$row["patient_lname"].'</td>
                      <td><button type="button" id="' .$row["patient_id"]. '" class="btn btn-primary btn-lg btn-block view-patient" data-toggle="modal" data-target="#myModal" >Select</button></td>
                    </tr>


                    ';
                  }
                 ?>
                 </tbody>
              </table>



            </div>
          </div>
        </div>
        <!-- end tab -->
        <!-- When select is pressed bring up modal -->

        <div id="myModal" class="modal fade">
          <div class="modal-dialog ">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Confirm Prescription</h4>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
            <div class="modal-body" id="patient_details">

            </div>





              <div class="modal-footer">
                  <button type="submit"  class="btn btn-primary btn-lg btn-block" name="btn-sendMed" >Send</button>
              </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script>


  /* remove url - problem with closing modal */
  /* global $ */
    /* Insert data into modal grab id and send to php file */

    $(document).on('click', '.view-patient', function(){
           var patient_id = $(this).attr("id");
           document.getElementById("patient_id").value = patient_id;
           //alert(patient_id);

           if(patient_id != '')
           {
                $.ajax({
                     url:"lib/show-patient-modal.php",
                     method:"POST",
                     data:{patient_id:patient_id},
                     success:function(data){
                          $('#patient_details').html(data);
                          //$('#myModal').modal('show');

                     }
                });
           }

      });


  </script>


  <script>
    /* global $ */
    $(document).ready(function() {
      // limit
      var max = 7;

      // add
      $(".addMore").click(function() {
        if ($('body').find('.fieldGroup').length < max) {
          var htmlF = '<div class = "form-group fieldGroup">' + $(".fieldGroupCopy").html() + '</div>';
          $('body').find('.fieldGroup:last').after(htmlF);
        }
        else {
          alert('Too many items! ' + max);
        }
      });

      // remove
      $('body').on("click", ".remove", function() {
        $(this).parents(".fieldGroup").remove();
      });
    });
  </script>
  <!-- Footer Section -->
  <footer id="footer" class="padded-footer">
    <div class="container">
      <div class="row">
        <div class="footer-links col-md-4">
          <a class="footer-links" href="faq.html">FAQs</a>
          <br />
          <br />
          <a class="footer-links" href="help/help.html">Help</a>
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
