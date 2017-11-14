<?php
require_once 'config.php';


/* get the patient id */
if (isset($_POST['btn-send']))
{
$id = $_POST['patient_id'];

echo $id;
}

$med = $_POST['medInput']; // create variables of your form elements
$amount = $_POST['medAmount']; 

echo $med;
echo $amount;
/* This file takes the inputs from the fields and sends it to our table */

/* grab medication and their amounts */

/* get the doctor id */

/* get the patient id */

/* send */
 
?>