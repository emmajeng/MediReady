<!-- PHP display info on modal in doctor dashboard -->

<?php
/*
include('send-prescription-doctor-dashboard.php');
 */
require_once 'config.php';
/* GLOBAL VARIABLE FOR ORDER ID */
$orderID = $_POST["order_id"];
 if(isset($_POST["order_id"]))
 {

      $query = "SELECT * FROM order_details_table WHERE order_id = $orderID";

      $result = mysqli_query($DBcon, $query);

      echo
      "
        <div class='table-responsive'>
           <table class='table-fill'>
            <thead>
           <tr>
              <th class='text-left'>Medication</th>
              <th class='text-left'>Amount</th>
            </tr>
          </thead>
          <tbody>
      ";
      
    if($result->num_rows > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
               echo "
                    <tr>
                        <td>".$row['medName']."</td>
                        <td>".$row['medAmount']."</td>
                    </tr>
               ";
        }
        echo " 
            <tbody>
            </table>
            </div>";
            
        echo "
          <div>
            <form  method='post'>
                <label>Price:</label>
                $newPrice = <input type='number' id='newPrice' Placeholder='Enter Price'/>
                <button type='submit' value='updatePrice' id='$orderID' class='btn btn-success btn-block'>Set Price</button>
            <form>
          </div>
          ";
    }
    else 
    {
        echo "
            <tr>
                 <td>Empty</td>
                 <td>Empty</td>
            </tr>
        ";
        
    }
 }
 ?>

<?php
    if(isset($_GET['updatePrice']))
    {
        if ($DBcon->connect_error)
        {
            die("Connection failed: " . $DBcon->connect_error);
        }
        else
        {
            $sqlPrice = "UPDATE orders_table SET status='Fulfilled',price=$newPrice WHERE order_id = '$orderID'";
            
            $DBcon->query($sqlPrice);
        }
    }
?>