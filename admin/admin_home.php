<?php include "header.php"; 
if(!isset($_SESSION['id_Admin'])){    
    if($_SESSION['id_Admin'] != 'admin'){
    header("location:../index.php"); 
    }  }
    
base64_decode($_SESSION['db_admin_id']);
base64_decode($_SESSION['admin_email']);
include "header_menu.php";


include "active_users.php";

include "footer.php"; ?>