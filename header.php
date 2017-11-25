<?php  ini_set('session.save_path',getcwd().'/not_for_world'); session_start(); include"config.php";   date_default_timezone_set('Asia/Kolkata');?>
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
    <meta name="google-signin-client_id" content="282635082919-elrh9jm7nj1suhnrs7k3s6nujv15mo7u.apps.googleusercontent.com" />
    <meta name="google-signin-scope" content="profile email https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.me" />
    
<link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png" />
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png" />
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png" />
<link rel="manifest" href="images/favicon/manifest.json" />
<link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#5bbad5" />
<link rel="shortcut icon" href="images/favicon/favicon.ico" />
<meta name="msapplication-config" content="images/favicon/browserconfig.xml" />
<meta name="theme-color" content="#ffffff" />
 <?php  
$page = $_SERVER['PHP_SELF']; 
switch ($page){
case '/index.php' :
 $title= 'HOME || E-library';
 $description = 'Home description here';
 break;

case '/about.php' :
 $title= 'ABOUT || E-library';
 $description = 'about description here';
 break;
 
 case '/contactus.php' :
 $title= 'CONTACT US || E-library';
 $description = 'about description here';
 break;
 
  case '/signup.php' :
 $title= 'SIGNUP || E-library';
 $description = 'about description here';
 break;
 
  case '/login.php' :
 $title= 'LOGIN || E-library';
 $description = 'about description here';
 break;
  
 case '/forget_password.php' :
 $title= 'FORGET PASSWORD || E-library';
 $description = 'about description here';
 break;
}
?>  <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap-theme.css" rel="stylesheet" />  	
    <link rel="stylesheet" href="css/font-awesome.min.css" />   	        
    <link href="css/bootstrap-social.css" type="text/css" rel="stylesheet" />   
    <link href="css/style.css" type="text/css" rel="stylesheet" /> 
    <script  src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jssocials.min.js"></script>    
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="css/jssocials.css" />
    <link rel="stylesheet" type="text/css" href="css/jssocials-theme-flat.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" /> 
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/modernizr.js"></script>
  
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
<?php 
if(isset($title)){ echo '<title>'.$title.'</title>'; }?>

 </head>
