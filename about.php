<?php include("header.php"); ?>
<body>
<?php   include("header_1.php"); ?>
<?php   include("header_menu.php"); ?>
<div class="container">
    <div class="col-md-8" >
        
        <div class="row">
        
          <div class="panel panel-default">
                      <div class="panel-body">
                      <?php $stmt = "SELECT * FROM `about_page` ORDER BY id DESC LIMIT 1"; $stmt = mysqli_query($conn,$stmt); $stmt = mysqli_fetch_assoc($stmt);?>
                      
                      <center><h1>- <?=nl2br(str_replace(" ", " &nbsp;",$stmt['title_1']))?> -</h1>
                    <h3><?=nl2br(str_replace(" ", " &nbsp;",$stmt['title_2']))?></h3>

                    <h2>About</h2>

                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=nl2br(str_replace(" ", " &nbsp;",$stmt['text']))?></p>
                          </center>                    
                     </div>
            </div>
            <div class="panel panel-default">
                      <div class="panel-body">
                       <center> <h1>Team</h1>
                                <div class="row">
                                      <div class="col-xxs-12 col-xs-6 col-sm-6 col-lg-6 m-b-xxl"><img srcset="" class="img-circle img-fluid m-x-auto m-b" style="width: 112px;" src="images/04aefa47-bbed-4957-b424-5584f35e6c94.jpg" alt="chandraprakash" /><h3 class="text-sm text-bold">Chandraprakash</h3><p class="text-xxxs text-uppercase">Software Engineer</p></div>          
                                    <div class="col-xxs-12 col-xs-6 col-sm-6 col-lg-6 m-b-xxl"><img srcset="" class="img-circle img-fluid m-x-auto m-b" style="width: 112px;" src="images/1332cbc3-cb8e-4b01-b69d-10fc98f1220b.jpg" alt="tushar" /><h3 class="text-sm text-bold">Tushar kanti</h3><p class="text-xxxs text-uppercase">Software Engineer</p></div>                   
                               </div>
                      </center> 
                      
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
</body>
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
center{
    color:#7A6D6D;
}
center>p{
     font-family: 'Merriweather', sans-serif;
     text-align: justify;
         padding: 5px 37px 20px 35px;
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