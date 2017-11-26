<?php

if(isset($_POST['deleteAccountBtn'])){
    session_start();
    $deleteQuery = 'DELETE from '.$_SESSION['user_type'].'_table WHERE '.$_SESSION['user_type'].'_id = '.$_SESSION['login_user'].';';
    $DBcon->query($deleteQuery);
    session_destroy();
    header('Location: index.php');
}

?>
