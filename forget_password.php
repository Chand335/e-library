<?php  include("header.php"); ?>
<body>
<?php   include("header_1.php"); ?>
<?php   include("header_menu.php"); ?>
<div class="container">
    <div class="col-md-8" >
               
                <div id="ty567"><hr class="style1" /><h3>My Account</h3><small><center></center></small><hr class="style1" /></div>
                        <h4>Forget your password?</h4>
                       <div class="panel panel-default">                      
                              <div class="panel-body">
                              
                                    <form class="form-horizontal">
                                        <label class="">Enter your Username or E-mail<span style="color: red;">*</span></label>
                                        <input type="text" placeholder="" class="form-control" name="username_email" /><br />
                                        <button class="btn btn-block">Submit</button>
                                    </form>
                              
                              
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