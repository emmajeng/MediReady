<?php


if (isset($_POST['signin']))
{

session_start();
require 'config.php';

$email = strip_tags($_POST['signin_email']);
// Escape email to protect against SQL injections
$email    = $DBcon->real_escape_string($email);

$chemist_result = $DBcon->query("SELECT * FROM chemist_table WHERE chemist_email='$email'");
$doctor_result = $DBcon->query("SELECT * FROM doctor_table WHERE doctor_email='$email'");
$driver_result = $DBcon->query("SELECT * FROM driver_table WHERE driver_email='$email'");
$patient_result = $DBcon->query("SELECT * FROM patient_table WHERE patient_email='$email'");



if ( $chemist_result->num_rows == 1 )
{
    $password = strip_tags($_POST['signin_password']);
    $password = $DBcon->real_escape_string($password);
    // User does exist
    $user = $chemist_result->fetch_assoc();

    if (password_VERIFY($password, $user['chemist_password']))
    {
        // This is how we'll know the user is logged in
        $_SESSION['login_user'] = $user['chemist_id'];
        header("location: ../chemist_dashboard.php");
        //exit();
    }
    else
    {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: ../index.php");
    }
}

else if ( $doctor_result->num_rows == 1 )
{
    $password = strip_tags($_POST['signin_password']);
    $password = $DBcon->real_escape_string($password);
    // User does exist
    $user = $doctor_result->fetch_assoc();
    if (password_VERIFY($password, $user['doctor_password']))
    {
        // This is how we'll know the user is logged in
        $_SESSION['login_user'] = $user['doctor_id'];
        header("location: ../doctor_dashboard.php");
        //exit();
    }
    else
    {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: ../index.php");
    }
}

else if ( $patient_result->num_rows == 1 )
{
    // User does exist

    $password = strip_tags($_POST['signin_password']);
    $password = $DBcon->real_escape_string($password);

    $user = $patient_result->fetch_assoc();

    if (password_VERIFY($password, $user['patient_password']))
    {
        // This is how we'll know the user is logged in
        $_SESSION['login_user'] = $user['patient_id'];
        header("location: ../patient_dashboard.php");
        //exit();
    }
    else
    {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: ../index.php");
    }
}

else if ( $driver_result->num_rows == 1 )
{
    // User does exist
    $password = strip_tags($_POST['signin_password']);
    $password = $DBcon->real_escape_string($password);
    $user = $driver_result->fetch_assoc();

    if (password_VERIFY($password, $user['driver_password']))
    {
        // This is how we'll know the user is logged in
        $_SESSION['login_user'] = $user['driver_id'];
        header("location: ../deliveryman_dashboard.php");
        //exit();
    }
    else
    {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: ../index.php");
    }
}
else
{
    // User does not exist
   $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: ../index.php");
}

}
