<?php
require 'config.php';
session_start();

if (isset($_POST['btn-sendMed']))
{

$med = array();
$amt = array();

$id = $_POST['patient_id'];
//echo $id;

$med = $_POST['medication'];
$amt = $_POST['amount'];

/*
before we send to prescriptions we set the date to todays
*/
$date = date('Y-m-d H:i:s');

$presciption = "INSERT INTO `prescriptions`(`doctor_id`, `patient_id`, `order_date`) VALUES ('".$_SESSION['login_user']."','$id','$date')";
//$DBcon->exec($presciption);
$DBcon->query($presciption);

$orderID = $DBcon->insert_id;

//echo $orderID;

foreach(array_combine($med, $amt) as $val_med => $val_amt) {
        $sql = "INSERT INTO `prescription_details_table`(`prescription_id`, `med_name`, `med_amount`, `presc_accepted`) VALUES ('$orderID','$val_med','$val_amt', 'waiting')";
        $DBcon->query($sql);
}
/* check of med name is empty and amount from previous record if so delete */
/* Fixes the issue when php inserts into database twice */
$orderID2 = $DBcon->insert_id;
//echo $orderID2;
$deleteQuery = "delete from prescription_details_table where prescdetails_id = '". $orderID2 ."'";
$DBcon->query($deleteQuery);

}
/* for now, plan to implement ajax and pop up a success message */
header("Location: ../doctor_dashboard.php");


?>
