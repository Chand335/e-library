<?php   include("header.php"); ?>
<body>
<?php   include("header_1.php"); ?>
<?php   include("header_menu.php");  mysqli_report(MYSQLI_REPORT_STRICT);?>
<div class="container"><script src="js/login.js"></script>
    <div class="row">
    <div class="col-md-8" >
               
                <div id="ty567"><hr class="style1" /><h3>My Account</h3><small><center></center></small><hr class="style1" /></div>
                       <h4>Signup</h4>
                       <div class="panel panel-default">                      
                              <div class="panel-body">
                                    <?php 
                                    if(isset($_POST['signup'])){                                                
                                           $email = validate_data($_POST['email']);
                                           $username = validate_data($_POST['username']);
                                           $password = validate_data($_POST['password']);
                                           $confirm_password = validate_data($_POST['confirm_password']);  
                                                  $stmt = "SELECT `email`,`username` FROM `users_register` WHERE `username` = '$email' OR `email` ='$email' ";
                                                  $stmt= $conn->query($stmt);
                                                    if(mysqli_num_rows($stmt) > 0){                                                        
                                                         echo  $signuperror = '<div class="alert alert-danger"><strong>Warning! </strong>Username or E-mail already exits.</div>';                                                 
                                                        }else {                                                                               
                                                if($password === $confirm_password ){                                  
                                    
                                                    
                                                   $stmt = $conn->prepare("INSERT INTO users_register (username, email, password) VALUES (?, ?, ?)");
                                                    $stmt->bind_param("sss", $username, $email, $confirm_password);
                                                    if($stmt->execute()){ 
                                                        $key = random_str(55);$key2 = random_str(59); 
                                                        //$_SESSION['user_is_login'] = TRUE;                                                          
                                                        header("location:fill_full_user_details.php?key=$key&username=$username&ownid=$key2&email=$email");
                                                        exit();                                                        
                                                    }else{                                                                                                            
                                                     echo  $signuperror = '<div class="alert alert-danger"><strong>Warning! </strong>Something went wrong.</div>';
                                                    }
                                                    /** 
                                                        i - integer
                                                        d - double
                                                        s - string
                                                        b - BLOB 
                                                         
                                                    **/                                                   
                                                }else {
                                                   echo  $signuperror = '<div class="alert alert-warning"><strong>Warning! </strong>Enter password does not match.</div>';                                                 
                                                }
                                                }
                                        
                                         }
                                         
                                    
                                     ?>
                                         <!-- Display login status --><div id="status"></div>
                                    <form method="POST" class="form-horizontal">
                                        <label class="">E-mail<span style="color: red;">*</span></label>
                                        <input type="email" placeholder="" required="required" class="form-control" name="email" /><br />
                                        <label class="">Username<span style="color: red;">*</span></label>
                                        <input type="text" placeholder="" required="required" class="form-control" name="username" /><br />
                                        <label class="">Password<span style="color: red;">*</span></label>
                                        <input type="password" placeholder="" required="required" class="form-control" name="password" /><br />
                                        <label class="">confirm Password<span style="color: red;">*</span></label>
                                        <input type="password" placeholder="" required="required" class="form-control" name="confirm_password" /><br />
                                        <button type="submit" name="signup" class="btn">Sign up</button><br />
                                        <a href="login.php">Already a member? Login here</a>
                                        <!-- Facebook login or logout button --><center><h1>OR</h1></center>
                                        <a href="javascript:void(0);"  onclick="fbLogin()" id="fbLink"><img style="width: 202px;" src="images/fb-logo.png"/></a><br /><br />
                                    </form>

                              </div>
                
                </div>

    </div>
    <div class="col-md-4">

        <?php include"right-side-bar.php"; ?>
                                        

    </div>
    </div>
</div>
<div class="" ></div><br /><br /><br /><br /><br /><br /><br />
<?php  include("footer_2.php");?>
<?php  include("footer.php");?>
<style>
*,
*:before,
*:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

html, body {
  font-family: 'Merriweather', sans-serif;
}
h3 {
    text-align: center;
    font-weight: 700;
    font-size: 33px;
    color: rgba(179, 99, 97, 0.6);
    text-shadow: 0px 5px 17px #332f2f;
}
hr.style1{
	border-top: 1px solid #8c8b8b;
}
#ty567 {
    background-color: rgba(208, 226, 200, 0.12);
}
#ty567>form {
  max-width: 600px;
  text-align: center;
  margin: 20px auto;
}
#ty567>form input, form textarea {
  border: 0;
  outline: 0;
  padding: 1em;
  -moz-border-radius: 8px;
  -webkit-border-radius: 8px;
  border-radius: 8px;
  display: block;
  width: 100%;
  margin-top: 1em;
  font-family: 'Merriweather', sans-serif;
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  resize: none;
}
#ty567>form input:focus, form textarea:focus {
  -moz-box-shadow: 0 0px 2px #e74c3c !important;
  -webkit-box-shadow: 0 0px 2px #e74c3c !important;
  box-shadow: 0 0px 2px #e74c3c !important;
}
#ty567>form #input-submit {
  color: white;
  background: #e74c3c;
  cursor: pointer;
}
#ty567>form #input-submit:hover {
  -moz-box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
  -webkit-box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
  box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
}
#ty567>form textarea {
  height: 126px;
}

.half {
  float: left;
  width: 48%;
  margin-bottom: 1em;
}

.right {
  width: 50%;
}

.left {
  margin-right: 2%;
}

@media (max-width: 480px) {
  .half {
    width: 100%;
    float: none;
    margin-bottom: 0;
  }
}
/* Clearfix */
.cf:before,
.cf:after {
  content: " ";
  /* 1 */
  display: table;
  /* 2 */
}

.cf:after {
  clear: both;
}
</style>