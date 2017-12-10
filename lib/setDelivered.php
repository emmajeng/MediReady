<?php
require 'config.php';
if(isset($_POST['setDelivered']))
    {
        
        $orderID = $_POST['orderID'];
        $status = 'Delivered';
        
        $sqlStatus = "UPDATE orders_table SET status='".$status."' WHERE order_id = '".$orderID."'";
        $DBcon->query($sqlStatus);
        
    }
    header("location: ../deliveryman_dashboard.php");
?>