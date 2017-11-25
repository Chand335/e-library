
<?php   include("header.php"); ?>
<body>
<?php 
if(!isset($_SESSION['user_is_login'])) {
   header("location:index.php");
   exit();
}

 ?>
<?php   include("header_1.php"); ?>

<?php   include("header_menu.php"); ?>

<?php 
$email = base64_decode($_SESSION['user_email']);
$stmt = "SELECT * FROM `users_register` WHERE email='$email' OR username='$email'" ;
$stmt = mysqli_query($conn,$stmt);
$stmt = mysqli_fetch_array($stmt);
?>


<div class="container" >
    <div class="col-md-8">
    <div class="row display-set-none" style="display:  ;">
                          <div class="panel panel-info">
                            <div class="panel-heading">
                              <h3 class="panel-title"><?php  echo $stmt['name']; ?></h3>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                    <?php if(!isset($stmt['user_pic'])){ echo "<div id='circle' class='alert text-center'>No photo uploaded. Please upload one</div>"; }else { ?>
                                   <img src="" alt="profile photo" width="200" height="150" />  <?php  } ?>
                                     
                               <div class="col-md-9 col-md-offset-1 col-lg-9 "> 
                               <!-- File Button --> 
                                  <table class="table table-user-information">
                                    <tbody>
                                      <tr>
                                        <td>Username</td>
                                        <td><?php  echo $stmt['username']; ?></td>
                                      </tr>
                                      <tr>
                                        <td>Email</td>
                                        <td><a href="<?php  echo $stmt['email']; ?>"><?php  echo $stmt['email']; ?></a></td>
                                      </tr>
                                        <tr>
                                        <td>Address</td>
                                        <td><?php  echo $stmt['address']; ?></td>
                                      </tr>
                                        <td>Phone Number</td>
                                        <td><?php  echo $stmt['phoneno']; ?><br />
                                        </td>                           
                                      </tr>                     
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                                 <div  class="panel-footer">
                                         <span class="pull-right">
                                            <a id="click-to-edit" title="Edit your Details" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                        </span>
                                        <script>
                                                    $(document).ready(function(){
                                                            $("#click-to-edit").click(function(){
                                                                $(".display-set-none").css("display", "none");
                                                                $("#edit-user-show").css("display", "");
                                                            });
                                                            
                                                             $("#set-none-display").click(function(){
                                                                $(".display-set-none").css("display", "");
                                                                $("#edit-user-show").css("display", "none");
                                                            });
                                                            
                                                        });
                                        
                                        </script>
                                    </div>
                            
                          </div>
                          
                          
                          
                          
                        
                    

                    </div><br /><br />
                                        <div id="edit-user-show" class="container" style="display: none">
                                                            <h1>Edit your Profile</h1>
                                                          	<hr />
                                                        	<div class="row">
                                                              <!-- left column -->
                                                              <div class="col-md-3">
                                                                <div class="text-center">
                                                                  <img src="//placehold.it/100" class="avatar img-circle" alt="avatar" />
                                                                  <h6>Upload a different photo...</h6>
                                                                  
                                                                  <input type="file" class="form-control" />
                                                                </div>
                                                              </div>
                                                              
                                                              
                                                              <!-- edit form column -->
                                                              <div class="col-md-9 personal-info">
                                                              <?php if(isset($error_smessage))  {?>
                                                                <div class="alert alert-info alert-dismissable">
                                                                  <a class="panel-close close" data-dismiss="alert">×</a> 
                                                                  <i class="fa fa-coffee"></i>
                                                                  This is an <strong>.alert</strong>. Use this to show important messages to the user.
                                                                </div>                                                                
                                                                <?php $error_smessage = NULL;} ?>
                                                                <form class="form-horizontal" role="form">
                                                                  <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Name:</label>
                                                                    <div class="col-lg-8">
                                                                      <input class="form-control" type="text" value="<?php  echo $stmt['name']; ?>" />
                                                                    </div>
                                                                  </div>    
                                                                  <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Email:</label>
                                                                    <div class="col-lg-8">
                                                                      <input class="form-control" type="text" value="<?php  echo $stmt['email']; ?>" />
                                                                    </div>
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label class="col-md-3 control-label">Username:</label>
                                                                    <div class="col-md-8">
                                                                      <input class="form-control" type="text" value="<?php  echo $stmt['username']; ?>" />
                                                                    </div>
                                                                  </div>                                                                 
                                                                  <div class="form-group">
                                                                    <label class="col-md-3 control-label">Phone Number:</label>
                                                                    <div class="col-md-8">
                                                                      <input class="form-control" type="text" value="<?php  echo $stmt['phoneno']; ?>" />
                                                                    </div>
                                                                  </div>                                                              
                                                                  <div class="form-group">
                                                                    <label class="col-md-3 control-label">State:</label>
                                                                    <div class="col-md-8">
                                                                     <select name="state" class="form-control states" id="stateId" required="required">
                                                                            <option value="">---Select State---</option>
                                                                            <option value="1">Andaman and Nicobar Islands</option><option value="2">Andhra Pradesh</option><option value="3">Arunachal Pradesh</option><option value="4">Assam</option><option value="5">Bihar</option><option value="6">Chandigarh</option><option value="7">Chhattisgarh</option><option value="8">Dadra and Nagar Haveli</option><option value="9">Daman and Diu</option><option value="10">Delhi</option><option value="11">Goa</option><option value="12">Gujarat</option><option value="13">Haryana</option><option value="14">Himachal Pradesh</option><option value="15">Jammu and Kashmir</option><option value="16">Jharkhand</option><option value="17">Karnataka</option><option value="18">Kenmore</option><option value="19">Kerala</option><option value="20">Lakshadweep</option><option value="21">Madhya Pradesh</option><option value="22">Maharashtra</option><option value="23">Manipur</option><option value="24">Meghalaya</option><option value="25">Mizoram</option><option value="26">Nagaland</option><option value="27">Narora</option><option value="28">Natwar</option><option value="29">Odisha</option><option value="30">Paschim Medinipur</option><option value="31">Pondicherry</option><option value="32">Punjab</option><option value="33">Rajasthan</option><option value="34">Sikkim</option><option value="35">Tamil Nadu</option><option value="36">Telangana</option><option value="37">Tripura</option><option value="38">Uttar Pradesh</option><option value="39">Uttarakhand</option><option value="40">Vaishali</option><option value="41">West Bengal</option></select>
                                                                    </div>
                                                                  </div>                                                                                                                                    
                                                                  <div class="form-group">
                                                                    <label class="col-md-3 control-label">Address:</label>
                                                                    <div class="col-md-8">
                                                                      <textarea name="address" class="form-control" rows="4" ><?php  echo $stmt['address']; ?></textarea>
                                                                    </div>
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label class="col-md-3 control-label"></label>
                                                                    <div class="col-md-8">
                                                                      <input type="button" class="btn btn-primary" value="Save Changes" />
                                                                      <span></span>
                                                                      <input type="reset" id="set-none-display" class="btn btn-default" value="Cancel" />
                                                                    </div>
                                                                  </div>
                                                                </form>
                                                              </div>
                                                          </div>
                                                          <br /><hr />
                                                        </div>
                                                        
    
    </div>
    <div class="col-md-4 display-set-none" style="display: ;">

        <?php include"right-side-bar.php"; ?>
                                        

    </div>
</div>

<style>
span.pull-right {
    margin-top: -5px;
}
.panel-footer {
    padding-bottom: 31px;
}.img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img {
    display: block;
    max-width: 42%;
    height: auto;
}
img.img-responsive.img-circle {
    margin: -14px 0 21px 263px;
}
.table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
    padding: 5px 44px 24px 72px;
    /* line-height: 1.42857143; */
    font-size: 19px;
    /* vertical-align: top; */
    color: darkmagenta;
    border-top: 1px solid #98b827;
    border-bottom: 1px solid #98b827;
}.row {
    margin-right: -15px;
    margin-left: 5px;
}
.alert.text-center {
    margin: 5px 241px 27px 259px;
    color: brown;
    background-color: cornsilk;
}div#circle {
    height: 103px;
    width: 124px;
    border-radius: 50%;
    padding-left: 24px;
}</style>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

</script>
<?php  include("footer_2.php");?>
<?php  include("footer.php");?>
</body>
