<?php

require 'config.php';
session_start();

if(isset($_POST['changeAddressBtn'])){
    
    $address  = strip_tags($_POST['user_address']);
    $password  = strip_tags($_POST['password']);
    
    $result = 'SELECT * FROM '.$_SESSION['user_type'].'_table WHERE '.$_SESSION['user_type'].'_id="'.$_SESSION['login_user'].'";';
    $table_result = $DBcon->query($result);
    $row = $table_result->fetch_assoc();
    
    if (password_VERIFY($password, $row[$_SESSION['user_type'].'_password'])){
                
                $insert = 'UPDATE '.$_SESSION['user_type'].'_table SET '.$_SESSION['user_type'].'_address="'.$address.'" WHERE '.$_SESSION['user_type'].'_id="'.$_SESSION['login_user'].'";';
                $DBcon->query($insert);
                header("Location: ../account.php");
            }
            
        else
        {
            echo 'you is wrong mate';
        }
    
}

?>
