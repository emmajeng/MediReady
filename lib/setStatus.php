<?php
require 'config.php';
if(isset($_POST['updateStatus']))
    {
        $newStatus = $_POST['status'];
        $orderID = $_POST['orderID'];
        
        if($newStatus == 'Fulfilled')
        {
            $status = 'Delivery';
            
            $sqlStatus = "UPDATE orders_table SET status='".$status."' WHERE order_id = '".$orderID."'";
            $DBcon->query($sqlStatus);
        }
    }
    header("location: ../chemist_dashboard.php");
?>