<?php   include("header.php"); 
?>
<body>
<?php   include("header_1.php"); 

if(isset($_GET['username']) && isset($_GET['email'])){   
  $email = validate_data($_GET['email']);
  $username = validate_data($_GET['username']);
  $username = explode('@',$username); $username = $username[0];
    $stmt = "SELECT fill_full_details,oauth_provider FROM `users_register` WHERE email='$email' AND username='$username'";
    $stmt = mysqli_query($conn,$stmt);
    $row = mysqli_fetch_array($stmt);
    if($row['fill_full_details'] != 'Y'){
        
        if(isset($row['oauth_provider'])){
            $stmt = "SELECT * FROM `users_register` WHERE email='$email' AND username='$username'";
            $stmt = mysqli_query($conn,$stmt);
            $row = mysqli_fetch_array($stmt);
        }
        
       if(isset($_POST['save_full_details'])){
            $name = validate_data($_POST['name']);
            $phonenumber = validate_data($_POST['phonenumber']);
            //$city = validate_data($_POST['city']);
            //$country = validate_data($_POST['country']);
            //$state = validate_data($_POST['state']);
            $address = validate_data($_POST['address']);
            $date_of_birth = validate_data($_POST['date_of_birth']);
            
            $city = $state ='NULL'; $status = 'Y';
            $stmt = "UPDATE `users_register` SET `name`='$name',`phoneno`='$phonenumber', `date_of_birth`= '$date_of_birth',`address`='$address',`fill_full_details`='Y' WHERE email='$email' AND username='$username'";
            if($conn->query($stmt) === TRUE){ 
                $_SESSION['user_is_login'] = TRUE;  
                $_SESSION['user_email']=  base64_encode($email);
                header("location:index.php");
                exit();
            }else{
            echo $conn->error;                                                        
            echo  $signuperror = '<div class="alert alert-danger"><strong>Warning! </strong>Something went wrong.</div>';
            }
       }
       
    
    
    
    }else {
        header("location:login.php");
    }

?>

<div id="container" class="container">
			<div class="row main">
                            <h4 class="title">Fill your Full deatils :</h4>
				<div class="main-login main-center">
					<form class="" method="post">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Name :</label><span style="color: red;">*</span>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required="required" name="name" id="name" value="<?= isset($row['name']) ? $row['name'] : ''?>"  placeholder="Enter your Full Name"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label  class="cols-sm-2 control-label">Email :</label><span style="color: red;">*</span>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" required="required"  title="Not Changeable" disabled="disabled" value="<?= isset($row['email']) ? $row['email'] : ''?>" name="email" id="email"  placeholder="your Email"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label  class="cols-sm-2 control-label">Username :</label><span style="color: red;">*</span>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required="required" title="Not Changeable" disabled="disabled"  name="username"  value="<?= isset($row['username']) ? $row['username'] : ''?>" id="email"  placeholder="your username"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label  class="cols-sm-2 control-label">Phone number :</label><span style="color: red;">*</span>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" required="required" name="phonenumber" id="phone_number" value="<?= isset($row['phoneno']) ? $row['phoneno'] : ''?>"  placeholder="Enter your Phone Number"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label  class="cols-sm-2 control-label">Date Of Birth :</label>
							<div class="cols-sm-10">
								<div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                     <input class="form-control" type="date"  id="date_of_birth" name="date_of_birth" value="<?= isset($row['date_of_birth']) ? $row['date_of_birth'] : ''?>"/>              
                                    <script>//$('#date_of_birth').datepicker();</script>
                            
                            	</div>
							</div>
						</div>
						<div class="form-group">
							<label  class="cols-sm-2 control-label">State :</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span> 						          
                            </div>
							</div>
						</div>
						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">City :</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
							
                            
                            	</div>
							</div>
						</div>
						<div class="form-group">
							<label  class="cols-sm-2 control-label">Address :</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<textarea placeholder="Enter your Address" class="form-control" rows="3" name="address" id="address"><?= isset($row['address']) ? $row['address'] : ''?></textarea>
								</div>
							</div>
						</div>

						<div class="form-group ">
					           <button type="submit" id="button" name="save_full_details" class="btn btn-primary btn-lg btn-block login-button">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>


<section class="social-ico-bar">
        <section class="container">
                <section class="row-fluid">
                        <article class="span6 copy-left">Copyright &copy 2017. <span>Designed by Tushar.</span>
                                <article class="span6 copy-right">                    
                        </article>
                </section>
        </section>
</section>
<style>
#address{
    resize: none;
}
 #container {
    margin-right: auto;
    margin-left: auto;
    margin-top: 232px;
}
#playground-container {
    height: 500px;
    overflow: hidden !important;
    -webkit-overflow-scrolling: touch;
}
body, html{
     height: 100%;
 	background-repeat: no-repeat;
 	font-family: 'Oxygen', sans-serif;
     background-size: cover;
}

.main{
 	margin:50px 15px;
}

h4.title { 
    text-align: center;
	font-family: 'Passion One', cursive; 
	font-weight: 400; 
}

hr{
	width: 10%;
	color: #fff;
}
button#button:hover {
    color: #413E3E;
    background: -webkit-linear-gradient(top, rgba(43, 189, 135, 0) 0%, rgba(70, 72, 64, 0.53) 100%);
}
.form-group{
	margin-bottom: 15px;
}

label{
	margin-bottom: 15px;
}

input,
input::-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 3px;
}

.main-login{
 	background-color: #fff;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}
.form-control {
    height: auto!important;
padding: 8px 12px !important;
}
.input-group {
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
}
#button {
    border: 1px solid #ccc;
    margin-top: 28px;
    padding: 6px 12px;
    color: #666;
    text-shadow: 0 1px #fff;
    cursor: pointer;
    -moz-border-radius: 3px 3px;
    -webkit-border-radius: 3px 3px;
    border-radius: 3px 3px;
    -moz-box-shadow: 0 1px #fff inset, 0 1px #ddd;
    -webkit-box-shadow: 0 1px #fff inset, 0 1px #ddd;
    box-shadow: 0 1px #fff inset, 0 1px #ddd;
    background: #f5f5f5;
    background: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #eeeeee));
    background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -o-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -ms-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);
}
.main-center{
 	margin-top: 30px;
 	margin: 0 auto;
 	max-width: 400px;
    padding: 10px 40px;
	background:#FFF;
	    color: #4F3131;
    text-shadow: none;
	-webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);

}
span.input-group-addon i {
    color: #009edf;
    font-size: 17px;
}

.login-button{
	margin-top: 5px;
}

.login-register{
	font-size: 11px;
	text-align: center;
}

</style>
<?php } include("footer.php");?>
</body>
</html>