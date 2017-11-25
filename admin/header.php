<?php ini_set('session.save_path',$_SERVER["DOCUMENT_ROOT"].'/not_for_world');
session_start();
 include"../config.php"; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
      <!--[if lt IE 7]><html lang="en" class="no-js ie6 {$dst}"><![endif]-->
      <!--[if IE 7]><html lang="en" class="no-js ie7 {$dst}"><![endif]-->
      <!--[if IE 8]><html lang="en" class="no-js ie8 {$dst}"><![endif]-->
        <!--[if IE 9]><html lang="en" class="no-js ie9 {$dst}"><![endif]-->
        <!--[if IE]><![if (gt IE 9)|!(IE)]><![endif]-->
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    

<link rel="icon" type="image/ico" sizes="16x16" href="images/favicon.ico" />
  <link href="../css/bootstrap.css" rel="stylesheet" />
    <link href="../css/bootstrap-theme.css" rel="stylesheet" />  	
    <link rel="stylesheet" href="../css/font-awesome.min.css" />   	        
    <link href="../css/bootstrap-social.css" type="text/css" rel="stylesheet" />   
    <link href='//fonts.googleapis.com/css?family=Text+Me+One' rel='stylesheet' type='text/css' />
    <link href="../css/style.css" type="text/css" rel="stylesheet" /> 
    <link href="../css/bootstrap-multiselect.css" type="text/css" rel="stylesheet" /> 
    <script  src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap-multiselect.min.js"></script>	 

  <link rel="stylesheet" type="text/css" href="../css/bootstrap-tokenfield.min.css" />
  <link rel="stylesheet" type="text/css" href="../css/tokenfield-typeahead.min.css" />
  <script src="../js/bootstrap-tokenfield.min.js"></script>
   <link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css" /> 
    <script src="../js/jquery-ui.min.js"></script>
<!--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />
        

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />
                
       <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
                
                <link href="css/navbar.css" type="text/css" rel="stylesheet" />  
                 <link href="css/style.css" type="text/css" rel="stylesheet" /> 
                 <link href="css/one-page-wonder.css" rel="stylesheet" />
                 <link href='//fonts.googleapis.com/css?family=Text+Me+One' rel='stylesheet' type='text/css'>

                 <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css' />
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css' />

-->
<title>Admin || E-library</title>
 </head>
<?php 

//validate user data function
function validate_data($data)
 {
  global $conn;
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($conn,$data);
  return $data;    
 }
 function random_str($length,$keyspace = 'qwertyuiopasdfgnmABCDEFGH012hjklzxcvb3456789IJKLMNOPQRSTUVWXYZ')
	{
        			$str = '';
        			$max = mb_strlen($keyspace, '8bit') - 1;
        			for ($i = 0; $i < $length; ++$i) {
        				$str .= $keyspace[random_int(0, $max)];
        			}
        			return $str;
    }
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>