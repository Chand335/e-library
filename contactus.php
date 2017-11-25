<?php  include("header.php"); ?>
<body>
<?php   include("header_1.php"); ?>
<?php   include("header_menu.php"); ?>
                            <?php 
                                if(isset($_POST['cuntactus_submit'])){
                                 $name =   validate_data($_POST['name']);
                                  $email =  validate_data($_POST['email']);
                                  $subject=   validate_data($_POST['sub']);
                                 $mobileno =   validate_data($_POST['mob']);
                                  $message =   validate_data($_POST['messaage']);
                                  $stmt = "INSERT INTO `contact_us`(`name`, `email`, `mob`, `sub`, `messaage`) VALUES ('$name','$email','$mobileno','$subject','$message')";
                                  $stmt= $conn->query($stmt); 
                                  if($stmt){ $success = '<div id="sucess-message" class="alert alert-success"><strong>Thank you </strong>for getting in touch!<br />We have received your message and would like to thank you for writing to us. One of our colleagues will get back to you shortly.<br /><strong>Have a great day!</strong></div>';
                                    }                                    
                                  
                                }
                            
                             ?>
<div class="container">
    <div class="col-md-8" >
                <div class="panel panel-default">
                      <div class="panel-body">
                      
            <div id="ty567"><hr class="style1" /><h3>Contact Us</h3><small><center>Leave your Message</center></small><hr class="style1" />
            <?php if(isset($success)){echo $success; $success = NULL; } ?>
            </div>
            <div id="ty567">
                            <form method="POST" class="cf">
                              <div class="half left cf">
                                <input type="text" id="input-name" required="required" name="name" placeholder="Name" />
                                <input type="email" id="input-email" required="required" name="email" placeholder="Email address" />
                                <input type="text" id="input-subject"  name="sub" placeholder="Subject" />
                              </div>
                              
                              <div class="half right cf">
                              <input type="text" id="input-subject" name="mob" placeholder="Phone Number" />
                                <textarea name="messaage" required="required"  id="input-message" placeholder="Message"></textarea>
                              </div>  
                              <input type="submit" value="Submit" name="cuntactus_submit" id="input-submit" />
                            </form>
                    </div>
                    
                    </div>
                    </div>
                    
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <center><h1>Location</h1></center>
                        <div class="row">
                            <div class="col-md-4">
                                        <form>
                                                <legend><span class="glyphicon glyphicon-globe"></span> Other ways to<br /> contact us</legend>
                                                <address>
                                                    <strong>Bhilai</strong><br />
                                                    Chhattisghar<br />
                                                    <abbr title="Phone">
                                                        Phone :</abbr>
                                                
                                                    9752503914
                                                    <br /><strong>E-mail :</strong>
                                                    <a href="mailto:#">electroniclibrary@mail.com</a>
                                                </address>
                                                Or Contact individual<br />
                                                <address>
                                                    <strong>Tushar kanti</strong><br />
                                                    <a href="mailto:#">tkparial1@gmail.com</a>
                                                </address>
    
                                                <address>
                                                    <strong>Chandraprakash</strong><br />
                                                    <a href="mailto:#">cprakashv07@gmail.com</a>
                                                </address>
                                        </form>

                            
                            
                            </div>     
                            <div class="col-md-8">
                            <?php
$address = "Bhilai Chhattisghar";
$address = str_replace(" ","+", $address);
$myapi = "AIzaSyDYjK1i64ZR6b-9LndxFzsE35xbYUvv0nk";
?>
<iframe
  width="100%"
  height="400"
  frameborder="0" style="border:0"
  src="https://www.google.com/maps/embed/v1/place?key=<?= $myapi; ?>
    &q=<?= $address ?>">
</iframe>
                            
                            
                            </div>                            
                        
                        </div>
                        
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

<style>


button.btn.btn-default {
    height: 34px;
    color: #98b827;
}
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
#sucess-message{
    font-family: 'Merriweather', sans-serif;
    font-size: 11px;
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
</body>