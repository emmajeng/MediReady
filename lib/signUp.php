<?php
//start session
session_start();
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
require_once 'config.php';



//if they click on the signup button
if (isset($_POST['patient-signUp']))
{
        //POST code for patient details
        $patient_fname  = strip_tags($_POST['patient_fname']);
        $patient_lname  = strip_tags($_POST['patient_lname']);
        $patient_email  = strip_tags($_POST['patient_email']);
        $patient_pwd = strip_tags($_POST['patient_pwd']);
        $patient_phone  = strip_tags($_POST['patient_phone']);
        $patient_address  = strip_tags($_POST['patient_addr']);
        $patient_lat  = strip_tags($_POST['patient_addr_lat']);
        $patient_long  = strip_tags($_POST['patient_addr_long']);


        //Sending the input to variables so it can be sent to the db
        $patient_fname  = $DBcon->real_escape_string($patient_fname);
        $patient_lname  = $DBcon->real_escape_string($patient_lname);
        $patient_email  = $DBcon->real_escape_string($patient_email);
        $patient_pwd = $DBcon->real_escape_string($patient_pwd);
        $patient_phone  = $DBcon->real_escape_string($patient_phone);
        $Hash_patient_pwd = password_hash($patient_pwd, PASSWORD_BCRYPT);




        //setting a query to a variable to use
        $check_email = $DBcon->query("SELECT patient_email FROM patient_table WHERE patient_email='$patient_email'");
        //loops through the rows of the table to run the query to count the emails matching and setting to a counter
        $count       = $check_email->num_rows;
        //if the the emails mathching counter is equal to 0 lets run query to add account
        if ($count == 0) {
            //if email is not taken insert query
        $query = "INSERT INTO patient_table(patient_fname, patient_lname, patient_email, patient_phone, patient_address, lattitude, longitude ,patient_password)

        VALUES (
            '$patient_fname',  '$patient_lname',  '$patient_email', '$patient_phone', '$patient_address', '$patient_long',  '$patient_lat', '$Hash_patient_pwd'
        )";
        //send query to DB
        $DBcon->query($query);
        $patientID = $DBcon->insert_id;
        //send out to user that their account was successfully created
        $msg = "Successful registration";
        $_SESSION['login_user'] = $patientID;
        $_SESSION['user_type'] = 'patient';
        header("location: ../patient_dashboard.php");

        }
        //else send error email already taken
        else
        {
            $msg = "Email is taken";
        }

}

else if (isset($_POST['doctor-signUp']))
{

  //POST code for doctor details
  $doctor_fname  = strip_tags($_POST['doctor_fname']);
  $doctor_lname  = strip_tags($_POST['doctor_lname']);
  $doctor_email  = strip_tags($_POST['doctor_email']);
  $doctor_password = strip_tags($_POST['doctor_password']);
  //encrypts password
  $Hash_doctor_password = password_hash($doctor_password, PASSWORD_BCRYPT);

  $doctor_phone  = strip_tags($_POST['doctor_phone']);
  $target = "data/";
  $target = $target . basename( $_FILES['doctor_cert']['name']);
  $Filename=basename( $_FILES['doctor_cert']['name']);

  //Sending the input to variables so it can be sent to the db
  $doctor_fname  = $DBcon->real_escape_string($doctor_fname);
  $doctor_lname  = $DBcon->real_escape_string($doctor_lname);
  $doctor_email  = $DBcon->real_escape_string($doctor_email);
  $doctor_password = $DBcon->real_escape_string($doctor_password);
  $doctor_phone  = $DBcon->real_escape_string($doctor_phone);


  //setting a query to a variable to use
  $check_email = $DBcon->query("SELECT doctor_email FROM doctor_table WHERE doctor_email='$doctor_email'");
  //loops through the rows of the table to run the query to count the emails matching and setting to a counter
  $count       = $check_email->num_rows;

  //if the the emails mathching is equal to 0
  if ($count == 0) {
      //if email is not taken insert query
      $query = "INSERT INTO doctor_table( doctor_fname, doctor_lname, doctor_phone, doctor_email, doctor_password )

      VALUES (
          '$doctor_fname', '$doctor_lname', '$doctor_phone',  '$doctor_email',  '$Hash_doctor_password'
      )";
      //send query to DB
      $DBcon->query($query);
      $doctorID = $DBcon->insert_id;
      //send out to user that their account was successfully created
      $msg = "Successful registration";
      $_SESSION['login_user'] = $doctorID;
      $_SESSION['user_type'] = 'doctor';
      header("location: ../doctor_dashboard.php");
  }
  //else send error email already taken
  else{
      //If email is a match say this email has already been taking
      $msg = "Email is taken";
  }
}

else if (isset($_POST['chemist-signUp']))
{

  $chemist_store_name  = strip_tags($_POST['chemist_store_name']);
  $chemist_email  = strip_tags($_POST['chemist_email']);
  $chemist_password = strip_tags($_POST['chemist_password']);
  $chemist_phone  = strip_tags($_POST['chemist_phone']);
  $chemist_address  = strip_tags($_POST['chemist_addr']);

  //Sending the input to variables so it can be sent to the db
  $chemist_store_name  = $DBcon->real_escape_string($chemist_store_name);
  $chemsit_email  = $DBcon->real_escape_string($chemsit_email);
  $chemist_password = $DBcon->real_escape_string($chemist_password);

  $Hash_chemist_password = password_hash($chemist_password, PASSWORD_BCRYPT);

  $chemist_phone  = $DBcon->real_escape_string($chemist_phone);
  $chemist_address  = $DBcon->real_escape_string($chemist_address);

  //setting a query to a variable to use
  $check_email = $DBcon->query("SELECT chemist_email FROM chemist_table WHERE chemist_email='$chemist_email'");
  //loops through the rows of the table to run the query to count the emails matching and setting to a counter
  $count       = $check_email->num_rows;
  //if the the emails mathching is equal to 0
  if ($count == 0) {
      //if email is not taken insert query

      $query = "INSERT INTO chemist_table(chemist_store_name, chemist_phone, chemist_email, chemist_password )

      VALUES (
          '$chemist_store_name','$chemist_phone', '$chemist_email', '$Hash_chemist_password'
      )";

      //send query to DB
      $DBcon->query($query);
      $chemistID = $DBcon->insert_id;
      //send out to user that their account was successfully created
      $msg = "Successful registration";
      $_SESSION['login_user'] = $chemistID;
      $_SESSION['user_type'] = 'chemist';
      header("location: ../chemist_dashboard.php");

  }
  //else send error email already taken
  else{
      //If email is a match say this email has already been taking
      $msg = "Email is taken";
  }
}

else if (isset($_POST['driver-signUp']))
{
  $driver_fname  = strip_tags($_POST['driver_fname']);
  $driver_lname  = strip_tags($_POST['driver_lname']);
  $driver_email = strip_tags($_POST['driver_email']);
  $driver_password = strip_tags($_POST['driver_pwd']);
  $driver_phone = strip_tags($_POST['driver_phone']);

  $Hash_driver_password = password_hash($driver_password, PASSWORD_BCRYPT);

  $driver_password = strip_tags($_POST['driver_phone']);

  //Sending the input to variables so it can be sent to the db
  $driver_fname  = $DBcon->real_escape_string($driver_fname);
  $driver_lname  = $DBcon->real_escape_string($driver_lname);
  $driver_password = $DBcon->real_escape_string($driver_password);
  $driver_phone = $DBcon->real_escape_string($driver_phone);
  $driver_email = $DBcon->real_escape_string($driver_email);

  $check_email = $DBcon->query("SELECT driver_email FROM driver_table WHERE driver_email='$driver_email'");
  $count       = $check_email->num_rows;

  //if the the emails matching is equal to 0
  if ($count == 0) {
      //if email is not taken insert query
      $query = "INSERT INTO driver_table( driver_fname, driver_lname, driver_email, driver_phone, driver_password)
      VALUES (
          '$driver_fname','$driver_lname', '$driver_email', '$driver_phone', '$Hash_driver_password'
      )";
      //send query to DB
      $DBcon->query($query);
      $driverID = $DBcon->insert_id;
      //send out to user that their account was successfully created
      $msg = "Successful registration";
      $_SESSION['login_user'] = $driverID;
      $_SESSION['user_type'] = 'driver';
      header("location: ../deliveryman_dashboard.php");

  }
  //else send error that the email already taken
  else{

      //If email is a match say this email has already been taking
      $msg = "Email is taken";
  }

}

else{
}


?>
