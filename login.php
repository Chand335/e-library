<?php  include("header.php"); ?>
<body>
<?php   include("header_1.php"); ?>
<?php   include("header_menu.php"); ?>
<?= !isset($_SESSION['user_is_login']) ?: header("location:index.php")?>
<div class="container">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="js/login.js"></script>
    <div class="col-md-8" >
               
                <div id="ty567"><hr class="style1" /><h3>My Account</h3><small><center></center></small><hr class="style1" /></div>
                        <h4>Login</h4>
                       <div class="panel panel-default">                      
                              <div class="panel-body">
                                    <?php 
                                        if(isset($_POST['login-button'])){
                                             $email = validate_data($_POST['username_email']);
                                             $password = validate_data($_POST['password']);
                                             
                                             $stmt="SELECT `email`,`username` FROM `users_register` WHERE `username` = '$email' OR `email` ='$email' ";
                                             $stmt= $conn->query($stmt);
                                                         if($stmt){ 
                                                            if(mysqli_num_rows($stmt)){
                                                                $stmt = "SELECT `id`,`email`,`username`,`password`,`fill_full_details`,`is_admin` FROM `users_register` WHERE (`username` = '$email' OR `email` ='$email') AND `password` = AES_ENCRYPT('$password','user_password_encrytion_542540') limit 1";
                                                                $stmt = $conn->query($stmt);
                                                                if(mysqli_num_rows($stmt)) {
                                                                $stmt = mysqli_fetch_array($stmt);                                                                
                                                                $username = $stmt['username'];
                                                                $allac = $stmt['fill_full_details'];
                                                                $user_id=$stmt['id'];
                                                                $is_admin = $stmt['is_admin'];
                                                                    if($is_admin === 'YES_admin'){
                                                                        $_SESSION['id_Admin'] = 'admin'; 
                                                                        $_SESSION['db_admin_id'] = base64_encode($user_id);
                                                                        $_SESSION['admin_email']=  base64_encode($email);
                                                                        header("location:admin/admin_home.php");                                                                        
                                                                    }else {
                                                                    if($allac === 'Y'){                                                                  
                                                                        $_SESSION['user_is_login'] = TRUE;  
                                                                        $_SESSION['db_user_id'] = $user_id;
                                                                        $_SESSION['user_email']=  base64_encode($email);
                                                                        $session    = session_id();  
                                                                        $stmt = "INSERT INTO `current_active_users`(`user_id`,`last_active`,`user_session_value`) VALUES ($user_id,NOW(),'$session')";
                                                                        $stmt = $conn->query($stmt);
                                                                        $_SESSION['user_login_id'] =  mysqli_insert_id($conn);
                                                                      header("location:index.php");
                                                                      }                                                                      
                                                                      else{
                                                                      $key = random_str(55);$key2 = random_str(59);                                                                     
                                                                        $_SESSION['user_is_login'] = TRUE;  
                                                                        $_SESSION['user_email']=  $email;                                                                                                                                                                                               
                                                                        header("location:fill_full_user_details.php?key=$key&username=$username&ownid=$key2&email=$email");
                                                                        }  
                                                                        
                                                                        }
                                                                        
                                                                    }else{
                                                                  echo $conn->error;                                                        
                                                                  echo  $signuperror = '<div class="alert alert-info"><strong>Sorry! </strong>Password is wrong.</div>';
                                                            }
                                                                }else{
                                                                  echo $conn->error;                                                        
                                                                  echo  $signuperror = '<div class="alert alert-info"><strong>Sorry! </strong>Username or E-mail doesnot exit.</div>';
                                                            }

                                                        }else{
                                                                  echo $conn->error;                                                        
                                                                  echo  $signuperror = '<div class="alert alert-danger"><strong>Something! </strong>went to wrong</div>';
                                                            }
                                        }
                                    
                                     ?><!-- Display login status --><div id="status"></div>
                                    <form method="post" class="form-horizontal">
                                        <label class="">Username or E-mail<span style="color: red;">*</span></label>
                                        <input type="text" placeholder="Your Username or E-mail" class="form-control" required="required" name="username_email" /><br />
                                        <label class="">Password<span style="color: red;">*</span></label>
                                        <input type="password" name="password" placeholder="Your Password" class="form-control" required="required" /><br />
                                        <button type="submit" name="login-button" class="btn">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input name="rememberme" value="remeber_me" type="checkbox" />&nbsp;<label>Remember me</label><br /><br />
                                        <a href="forget_password.php">Lost your password?</a><br />
                                        <a href="signup.php">Not a member? signup here</a>
                                    </form>  
                                    
                                          <!-- Facebook login or logout button --><center><h2>OR Login With</h2></center><br />
                                        <a class="col-md-6" href="javascript:void(0);" onclick="fbLogin()" id="fbLink"><img src="images/fblogin.png"/></a>                                      
                                       <a class="g-signin2 col-md-6 pull-right" data-onsuccess="onSignIn"  ></a>
                                       <script>
                                                                      
                                       function onSignIn(googleUser){
                                        var profile = googleUser.getBasicProfile();
                                        console.log(profile.getEmail());
                                        console.log(profile.getId);
                                        signOut();
                                       }
                                        function signOut(){
                                               var auth2 = gapi.auth2.getAuthInstance();
                                               auth2.signOut().then(function () {
                                                });
                                        }        

                                        </script>
                                       <style>


		.profile{
			border: 3px solid #B7B7B7;
			padding: 10px;
			margin-top: 10px;
			width: 350px;
			background-color: #F7F7F7;
			height: 160px;
		}
		.profile p{margin: 0px 0px 10px 0px;}
		.head{margin-bottom: 10px;}
		.head a{float: right;}
		.profile img{width: 100px;float: left;margin: 0px 10px 10px 0px;}
		.proDetails{float: left;}

</style>
                                        <!--- <div id="userData"></div>  -->
                                        
                                        
                        </div> 
                
                </div>

    </div>
    <div class="col-md-4">

        <?php include"right-side-bar.php"; ?>
                                        

    </div>
</div>
<div class="" ></div><br /><br /><br /><br /><br /><br /><br />
<?php  include("footer_2.php");?>
<?php  include("footer.php");?>
</body>
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