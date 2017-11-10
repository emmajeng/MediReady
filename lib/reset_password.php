<?php
/* Password reset process, updates database with new user password */
require 'lib/config.php';
session_start();

// Make sure the form is being submitted with method="post"

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Make sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) {

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);

        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
        $email = $DBcon->escape_string($_POST['email']);
        $hash = $DBcon->escape_string($_POST['hash']);

        $sql = "UPDATE chemist_table SET password='$new_password', hash='$hash' WHERE chemist_email='$email'";

        if ( $DBcon->query($sql) )
        {

        $_SESSION['message'] = "Your password has been reset successfully!";
            header("location: successful.php");

        }

    }
    else {
        $_SESSION['message'] = "Two passwords you entered don't match, try again!";
        header("location: unsuccesful.php");
    }
}
?>
