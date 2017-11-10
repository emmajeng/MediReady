<?php
session_start(); 
/* User login process, checks if user exists and password is correct */
require 'lib/config.php';
// Escape email to protect against SQL injections
$email = $DBcon->escape_string($_POST['signin_email']);
$password = $DBcon->escape_string($_POST['signin_password']);

$chemist_result = $DBcon->query("SELECT * FROM chemist_table WHERE chemist_email='$email'");
$doctor_result = $DBcon->query("SELECT * FROM doctor_table WHERE doctor_email='$email'");
$driver_result = $DBcon->query("SELECT * FROM driver_table WHERE driver_email='$email'");
$patient_result = $DBcon->query("SELECT * FROM patient_table WHERE patient_email='$email'");


if ( $chemist_result->num_rows == 1 )
{ 
    // User does exist
    $user = $chemist_result->fetch_assoc();

    if ($password == $user['chemist_password'])
    {
        $_SESSION['store_name'] = $user['chemist_store_name'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        header("location: chemist_dashboard.php");
        exit();
    }
    else 
    {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: index.php");
    }
}
else 
{ 
    // User does not exist
   $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: index.php");
}

if ( $doctor_result->num_rows == 1 )
{ 
    // User does exist
    $user = $doctor_result->fetch_assoc();

    if ($password == $user['doctor_password'])
    {
        $_SESSION['doctor_name'] = $user['doctor_name'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        header("location: doctor_dashboard.php");
        exit();
    }
    else 
    {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: index.php");
    }
}
else 
{ 
    // User does not exist
   $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: index.php");
}

if ( $patient_result->num_rows == 1 )
{ 
    // User does exist
    $user = $patient_result->fetch_assoc();

    if ($password == $user['patient_password'])
    {
        $_SESSION['patient_name'] = $user['patient_name'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        header("location: patient_dashboard.php");
        exit();
    }
    else 
    {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: index.php");
    }
}
else 
{ 
    // User does not exist
   $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: index.php");
}

if ( $driver_result->num_rows == 1 )
{ 
    // User does exist
    $user = $driver_result->fetch_assoc();

    if ($password == $user['driver_password'])
    {
        $_SESSION['driver_name'] = $user['driver_name'];

        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        header("location: deliveryman_dashboard.php");
        exit();
    }
    else 
    {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: index.php");
    }
}
else 
{ 
    // User does not exist
   $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: index.php");
}