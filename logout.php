<?php ini_set('session.save_path',$_SERVER["DOCUMENT_ROOT"].'/e-library/not_for_world');
  session_start();
  include "config.php";
  session_unset(); 
  session_destroy();
  mysqli_close($conn);
  header("location:login.php");
  exit();
?>
