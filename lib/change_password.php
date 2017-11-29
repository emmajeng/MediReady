<?php

require 'config.php';
session_start();


//if they clicked the btn to change password
if(isset($_POST['changePasswordBtn']))
{
    
    $result = 'SELECT * FROM '.$_SESSION['user_type'].'_table WHERE '.$_SESSION['user_type'].'_id="'.$_SESSION['login_user'].'";';
    $table_result = $DBcon->query($result);
    $row = $table_result->fetch_assoc();
    
    $old_password  = strip_tags($_POST['user_current_password']);
    $new_password  = strip_tags($_POST['user_new_password']);
    $new_password_check  = strip_tags($_POST['user_new_password_check']);
    
    if($new_password == $new_password_check){
        
        if (password_VERIFY($old_password, $row[$_SESSION['user_type'].'_password'])){
                
                $hash_password = password_hash($new_password_check, PASSWORD_BCRYPT);
                $insert = 'UPDATE '.$_SESSION['user_type'].'_table SET '.$_SESSION['user_type'].'_password="'.$hash_password.'" WHERE '.$_SESSION['user_type'].'_id="'.$_SESSION['login_user'].'";';
                $DBcon->query($insert);
                header("Location: ../account.php");
            }
            
        else
        {
            echo 'you is wrong mate';
        }
        
    }
}
?>
    
    
    