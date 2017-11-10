<?php
//start session
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
        $patient_address_line_one  = strip_tags($_POST['patient_address_line_one']);
        $patient_address_line_two = strip_tags($_POST['patient_address_line_two']);
        $patient_city  = strip_tags($_POST['patient_city']);
        $patient_county  = strip_tags($_POST['patient_county']);

        //Sending the input to variables so it can be sent to the db
        $patient_fname  = $DBcon->real_escape_string($patient_fname);
        $patient_lname  = $DBcon->real_escape_string($patient_lname);
        $patient_email  = $DBcon->real_escape_string($patient_email);
        $patient_pwd = $DBcon->real_escape_string($patient_pwd);
        $patient_phone  = $DBcon->real_escape_string($patient_phone);
        $patient_address_line_one  = $DBcon->real_escape_string($patient_address_line_one);
        $patient_address_line_two = $DBcon->real_escape_string($patient_address_line_two);
        $patient_city  = $DBcon->real_escape_string($patient_city);
        $patient_county = $DBcon->real_escape_string($patient_county);


        //setting a query to a variable to use
        $check_email = $DBcon->query("SELECT patient_email FROM patient_table WHERE patient_email='$patient_email'");
        //loops through the rows of the table to run the query to count the emails matching and setting to a counter
        $count       = $check_email->num_rows;
        //if the the emails mathching counter is equal to 0 lets run query to add account
        if ($count == 0) {
            //if email is not taken insert query
            $query = "INSERT INTO patient_table( patient_fname, patient_lname, patient_email, patient_phone, patient_address_line_one, patient_address_line_two, patient_city, patient_county, patient_password )

            VALUES (
                '$patient_fname',  '$patient_lname',  '$patient_email', '$patient_phone',  '$patient_address_line_one',  '$patient_address_line_two',  '$patient_city',  '$patient_county',  '$patient_pwd'
            )";
            //send query to DB
            $DBcon->query($query);
            //send out to user that their account was successfully created
            $msg = "Successful registration";
        }

        //else send error email already taken
        else{
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
  $doctor_phone  = strip_tags($_POST['doctor_phone']);
  $doctor_address_line_one  = strip_tags($_POST['doctor_address_line_one']);
  $doctor_address_line_two = strip_tags($_POST['doctor_address_line_two']);
  $doctor_city  = strip_tags($_POST['doctor_city']);
  $doctor_county  = strip_tags($_POST['doctor_county']);

  //Sending the input to variables so it can be sent to the db
  $doctor_fname  = $DBcon->real_escape_string($doctor_fname);
  $doctor_lname  = $DBcon->real_escape_string($doctor_lname);
  $doctor_email  = $DBcon->real_escape_string($doctor_email);
  $doctor_password = $DBcon->real_escape_string($doctor_password);
  $doctor_phone  = $DBcon->real_escape_string($doctor_phone);
  $doctor_address_line_one  = $DBcon->real_escape_string($doctor_address_line_one);
  $doctor_address_line_two = $DBcon->real_escape_string($doctor_address_line_two);
  $doctor_city  = $DBcon->real_escape_string($doctor_city);
  $doctor_county = $DBcon->real_escape_string($doctor_county);


  //setting a query to a variable to use
  $check_email = $DBcon->query("SELECT doctor_email FROM doctor_table WHERE doctor_email='$doctor_email'");
  //loops through the rows of the table to run the query to count the emails matching and setting to a counter
  $count       = $check_email->num_rows;

  //if the the emails mathching is equal to 0
  if ($count == 0) {
      //if email is not taken insert query
      $query = "INSERT INTO doctor_table( doctor_fname, doctor_lname, doctor_address_line_one, doctor_address_line_two, doctor_city, doctor_county, doctor_phone, doctor_email, doctor_password )

      VALUES (
          '$doctor_fname',  '$doctor_lname',  '$doctor_address_line_one', '$doctor_address_line_two',  '$doctor_city',  '$doctor_county',  '$doctor_phone',  '$doctor_email',  '$doctor_password'
      )";
      //send query to DB
      $DBcon->query($query);
      //send out to user that their account was successfully created
      $msg = "Successful registration";
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
  $chemist_al1  = strip_tags($_POST['chemist_al1']);
  $chemist_al2 = strip_tags($_POST['chemist_al2']);
  $chemist_city  = strip_tags($_POST['chemist_city']);
  $chemist_county  = strip_tags($_POST['chemist_county']);

  //Sending the input to variables so it can be sent to the db
  $chemist_store_name  = $DBcon->real_escape_string($chemist_store_name);
  $chemsit_email  = $DBcon->real_escape_string($chemsit_email);
  $chemist_password = $DBcon->real_escape_string($chemist_password);
  $chemist_phone  = $DBcon->real_escape_string($chemist_phone);
  $chemist_al1  = $DBcon->real_escape_string($chemist_al1);
  $chemist_al2 = $DBcon->real_escape_string($chemist_al2);
  $chemist_city  = $DBcon->real_escape_string($chemist_city);
  $chemist_county = $DBcon->real_escape_string($chemist_county);

  //setting a query to a variable to use
  $check_email = $DBcon->query("SELECT chemist_email FROM chemist_table WHERE chemist_email='$chemist_email'");
  //loops through the rows of the table to run the query to count the emails matching and setting to a counter
  $count       = $check_email->num_rows;
  //if the the emails mathching is equal to 0
  if ($count == 0) {
      //if email is not taken insert query
      $query = "INSERT INTO chemist_table( chemist_store_name, chemist_address_line_one, chemist_address_line_two, chemist_city, chemist_county, chemist_phone, chemist_email, chemist_password )

      VALUES (
          '$chemist_store_name',  '$chemist_al1', '$chemist_al2', '$chemist_city', '$chemist_county',  '$chemist_phone', '$chemist_email', '$chemist_password'
      )";
      //send query to DB
      $DBcon->query($query);
      //send out to user that their account was successfully created
      $msg = "Successful registration";

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
  $driver_address  = strip_tags($_POST['driver_address']);
  $driver_city  = strip_tags($_POST['driver_city']);
  $driver_county  = strip_tags($_POST['driver_county']);
  $driver_password = strip_tags($_POST['driver_phone']);

  //Sending the input to variables so it can be sent to the db
  $driver_fname  = $DBcon->real_escape_string($driver_fname);
  $driver_lname  = $DBcon->real_escape_string($driver_lname);
  $driver_address_line_one  = $DBcon->real_escape_string($driver_address_line_one);
  $driver_address_line_two  = $DBcon->real_escape_string($driver_address_line_two);
  $driver_city  = $DBcon->real_escape_string($driver_city);
  $driver_county  = $DBcon->real_escape_string($driver_county);
  $driver_password = $DBcon->real_escape_string($driver_password);
  $driver_phone = $DBcon->real_escape_string($driver_phone);
  $driver_email = $DBcon->real_escape_string($driver_email);

  $check_email = $DBcon->query("SELECT driver_email FROM driver_table WHERE driver_email='$driver_email'");
  $count       = $check_email->num_rows;

  //if the the emails matching is equal to 0
  if ($count == 0) {
      //if email is not taken insert query
      $query = "INSERT INTO driver_table( driver_fname, driver_lname, driver_address_line_one, driver_address_line_two, driver_city, driver_county, driver_email, driver_phone, driver_password)
      VALUES (
          '$driver_fname',  '$driver_lname',  '$driver_address_line_one', '$driver_address_line_two', '$driver_city',  '$driver_county', '$driver_email', '$driver_phone', '$driver_password'
      )";
      //send query to DB
      $DBcon->query($query);
      //send out to user that their account was successfully created
      $msg = "Successful registration";

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
