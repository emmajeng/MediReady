<?php
require 'config.php';
if(isset($_POST['updatePrice']))
    {
        
        $price = $_POST['newPrice'];
        $orderID = $_POST['orderID'];
        
        $sqlPrice = "UPDATE orders_table SET status='Fulfilled', price='".$price."' WHERE order_id = '".$orderID."'";
        $DBcon->query($sqlPrice);
        
    }
    header("location: ../chemist_dashboard.php");
?>