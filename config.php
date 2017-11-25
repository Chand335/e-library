<?php
//error_reporting(0);
ob_start();
 mysqli_report(MYSQLI_REPORT_STRICT);
    //http_response_code(404);
    //include('my_404.php'); // provide your own HTML for the error page
    //die();
     $host = "localhost";
     $db_name = "e_library";
     $username = "root";
     $password = "";
     $conn = NULL;

        try{
            $conn = new mysqli($host,$username,$password,$db_name);
			$host_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        }
        catch(Exception $e)
        {
          //echo $e->getMessage();
          echo '<center><h1 style="color: #de1414;font-size: 61px;text-align: center;margin: 88px;">Connection Error<h1></center>'; 
          exit();                   
        
        }
ob_flush();
 ?>