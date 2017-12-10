<?php
//echo "hello";
/*if(isset($_POST['deleteAccountBtn'])){*/
require 'config.php';

session_start();
$deleteQuery = 'DELETE from '.$_SESSION['user_type'].'_table WHERE '.$_SESSION['user_type'].'_id = '.$_SESSION['login_user'].';';

echo $deleteQuery;
$DBcon->query($deleteQuery);
session_destroy();
header('Location: ../index.php');
/*}*/

?>
