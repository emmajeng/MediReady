<!-- PHP display info on modal in doctor dashboard -->

<?php
/*
include('send-prescription-doctor-dashboard.php');
 */
require 'config.php';
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
            </tbody>
            </table>
            </div>";
            
        echo '
          <div>
            <form method="post" action="lib/setprice.php">
                <label>Price:</label>
                <input type="text" id="newPrice" name="newPrice" Placeholder="Enter Price"/>
                <input type="hidden" name="orderID" value="'.$orderID.'" />
                <button type="submit" name="updatePrice" class="btn btn-success btn-block">Set Price</button>
            </form>
          </div>
          ';
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