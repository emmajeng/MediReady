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
              <a class="nav-link" href="https://mediready-development-emmajeng.c9users.io/account.php">Account</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Sign Out</a>
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
          <h4>
            new orders will show here
          </h4>
        </div>
        <div class="tab-2">
          <h4>
            Patient will select chemist here
          </h4>
        </div>
      </div>
    </div>

    <!-- Orders Table -->
    <div class="dashboard-container bottom-container">
      <table class="table-fill">
        <thead>
        <tr>
        <th class="text-left">Orders</th>
        <th class="text-left">Address</th>
        </tr>
        </thead>
        <tbody class="table-hover">
          <tr>
          <td class="text-left">January</td>
          <td class="text-left">$ 50,000.00</td>
          </tr>
          <tr>
          <td class="text-left">February</td>
          <td class="text-left">$ 10,000.00</td>
          </tr>
          <tr>
          <td class="text-left">March</td>
          <td class="text-left">$ 85,000.00</td>
          </tr>
          <tr>
          <td class="text-left">April</td>
          <td class="text-left">$ 56,000.00</td>
          </tr>
          <tr>
          <td class="text-left">May</td>
          <td class="text-left">$ 98,000.00</td>
          </tr>
        </tbody>
      </table>
    </div>

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
