<?php
//User session in ['user']
if($_SESSION['user_id']){
  session_start();
  session_unset();
  session_destroy();
  session_write_close();
  setcookie(session_name(),'',0,'/');
  session_regenerate_id(true);
}
?>