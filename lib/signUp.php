<?php
//start session
session_start();
if (isset($_SESSION['userSession']) != "") {
    header("Location: index.php");
}

//if they click on the signup button
if (isset($_POST['btn-signup'])) {

    //connects to DB
    require_once 'config.php';
    //get user type from drop down
    $user_types = array('Patient', 'Doctor', 'Chemist', 'Delivery Man');
    $selected_key = $_POST['user_type'];
    $selected_val = $user_types[$_POST['user_type']];

    //checking what user type in if statement
    if($selected_val == 'Patient'){
        //POST code for patient details
        $patient_fname  = strip_tags($_POST['patient_fname']);
        $patient_lname  = strip_tags($_POST['patient_lname']);
        $patient_email  = strip_tags($_POST['patient_email']);
        $patient_phone  = strip_tags($_POST['patient_phone']);
        $patient_address_line_one  = strip_tags($_POST['patient_address_line_one']);
        $patient_address_line_two = strip_tags($_POST['patient_address_line_two']);
        $patient_city  = strip_tags($_POST['patient_city']);
        $patient_county  = strip_tags($_POST['patient_county']);
        $patient_password = strip_tags($POST['patient_password']);

        //Sending the input to variables so it can be sent to the db
        $patient_fname  = $DBcon->real_escape_string($patient_fname);
        $patient_lname  = $DBcon->real_escape_string($patient_lname);
        $patient_email  = $DBcon->real_escape_string($patient_email);
        $patient_phone  = $DBcon->real_escape_string($patient_phone);
        $patient_address_line_one  = $DBcon->real_escape_string($patient_address_line_one);
        $patient_address_line_two = $DBcon->real_escape_string($patient_address_line_two);
        $patient_city  = $DBcon->real_escape_string($patient_city);
        $patient_county = $DBcon->real_escape_string($patient_county);
        $patient_password = $DBcon->real_escape_string($patient_password);

        //loops through patient table and counts the emails matching
        $check_email = $DBcon->query("SELECT patient_email FROM patient_table WHERE email='$patient_email'");
        $count       = $check_email->num_rows;
        //if the the emails mathching is equal to 0
        if ($count == 0) {
            //if email is not taken do insert query
            $query = "INSERT INTO patient_table(patient_fname,patient_lname,patient_email,patient_phone,patient_address_line_one,patient_address_line_two,patient_city,patient_county,patient_password') VALUES('$patient_fname','$patient_lname','$patient_email','$patient_phone','$patient_address_line_one','$patient_address_line_two','$patient_city','$patient_county','$patient_password')";
            if ($DBcon->query($query)) {
                $msg = "successful patient";
            }

            else{
                $msg = "unsuccessful patient";
            }
        }
        //else send error email already taken
        else{
            //put code here
            $msg = "email taken";
        }
    }

    else if($selected_val == 'Doctor'){

        //POST code for doctor details
        $doctor_fname  = strip_tags($_POST['doctor_fname']);
        $doctor_lname  = strip_tags($_POST['doctor_lname']);
        $doctor_address_line_one  = strip_tags($_POST['doctor_address_line_one']);
        $doctor_city  = strip_tags($_POST['doctor_city']);
        $doctor_county  = strip_tags($_POST['doctor_county']);
        $doctor_phone  = strip_tags($_POST['doctor_phone']);
        $doctor_email  = strip_tags($_POST['doctor_email']);
        $doctor_password = strip_tags($POST['doctor_password']);

        //Sending the input to variables so it can be sent to the db
        $doctor_fname  = $DBcon->real_escape_string($doctor_fname);
        $doctor_lname  = $DBcon->real_escape_string($doctor_lname);
        $doctor_address_line_one  = $DBcon->real_escape_string($doctor_address_line_one);
        $doctor_city  = $DBcon->real_escape_string($doctor_city);
        $doctor_county  = $DBcon->real_escape_string($doctor_county);
        $doctor_phone = $DBcon->real_escape_string($doctor_phone);
        $doctor_email  = $DBcon->real_escape_string($doctor_email);
        $doctor_password  = $DBcon->real_escape_string($doctor_password);

        //loops through doctor table and counts the emails matching
        $check_email = $DBcon->query("SELECT email FROM doctor_table WHERE email='$email'");
        $count       = $check_email->num_rows;
        //if the the emails mathching is equal to 0
        if ($count == 0) {
            //if email is not taken do insert query
        }
        //else send error email already taken
        else{
            //put code here
        }
    }

    else if($selected_val == 'Chemist'){

        //POST code for chemist details
        $chemist_store_name  = strip_tags($_POST['chemist_store_name']);
        $chemist_address_line_one  = strip_tags($_POST['chemist_address_line_one']);
        $chemist_city  = strip_tags($_POST['chemist_city']);
        $chemist_county  = strip_tags($_POST['chemist_county']);
        $chemist_phone  = strip_tags($_POST['chemist_phone']);
        $chemist_email  = strip_tags($_POST['chemist_email']);
        $chemist_password = strip_tags($POST['chemist_password']);

        //Sending the input to variables so it can be sent to the db
        $chemist_store_name  = $DBcon->real_escape_string($chemist_store_name);
        $chemist_address_line_one  = $DBcon->real_escape_string($chemist_address_line_one);
        $chemist_city  = $DBcon->real_escape_string($chemist_city);
        $chemist_county  = $DBcon->real_escape_string($chemist_county);
        $chemist_phone  = $DBcon->real_escape_string($chemist_phone);
        $chemist_phone = $DBcon->real_escape_string($chemist_phone);
        $chemist_password = $DBcon->real_escape_string($chemist_password);

        //loops through chemist table and counts the emails matching
        $check_email = $DBcon->query("SELECT email FROM chemist_table WHERE email='$email'");
        $count       = $check_email->num_rows;
        //if the the emails mathching is equal to 0
        if ($count == 0) {
            //if email is not taken do insert query
        }
        //else send error email already taken
        else{
            //put code here
        }
    }

    else if($selected_val == 'Delivery Man'){

        //POST code for delivery man details
        $driver_fname  = strip_tags($_POST['driver_fname']);
        $driver_lname  = strip_tags($_POST['driver_lname']);
        $driver_address  = strip_tags($_POST['driver_address']);
        $driver_city  = strip_tags($_POST['driver_city']);
        $driver_county  = strip_tags($_POST['driver_county']);
        $driver_password = strip_tags($POST['driver_password']);

        //Sending the input to variables so it can be sent to the db
        $driver_fname  = $DBcon->real_escape_string($driver_fname);
        $driver_lname  = $DBcon->real_escape_string($driver_lname);
        $driver_address  = $DBcon->real_escape_string($driver_address);
        $driver_city  = $DBcon->real_escape_string($driver_city);
        $driver_county  = $DBcon->real_escape_string($driver_county);
        $driver_password  = $DBcon->real_escape_string($driver_password);

        //loops through driver table and counts the emails matching
        $check_email = $DBcon->query("SELECT email FROM driver_table WHERE email='$email'");
        $count       = $check_email->num_rows;
        //if the the emails mathching is equal to 0
        if ($count == 0) {
            //if email is not taken do insert query
        }
        //else send error email already taken
        else{
            //put code here
        }
    }

    else{
        //send out error message no user type selected
    }

    header('Location: ' . $_SERVER['../sign-up.html']);

}

?>
