<div class="loader"></div>
<style>.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('images/Rotate-Pulsating-Loading-Animation.gif') 50% 50% no-repeat rgb(34, 34, 34);
}</style>
<script>$(window).on('load',function(){
     $('.loader').stop().fadeOut('slow');
});//window.stop();
</script>
<div id="top-header">
<div class="col-md-12">
<div id="a1" class="col-md-6"><a id="welcome">Welcome</a></div>
<?php  if(!isset($_SESSION['user_is_login']) AND !isset($_SESSION['user_email'])){?>
<div id="a2" <?php if( $_SERVER['PHP_SELF'] === "/fill_full_user_details.php") {echo 'style="display:none"'; } ?> class="col-md-6"><a  href="login.php" >Login</a> | <a href="signup.php" >Signup</a></div>
<?php }
else{
        $email = base64_decode($_SESSION['user_email']);
        $stmt = mysqli_query($conn,"select * from `users_register` where username='$email' OR email='$email'");
        $stmt = mysqli_fetch_array($stmt);
       ?><div id="a2" class="col-md-6 user_name">
        <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href=""><?php  echo $stmt['name']; ?></a>
                      <ul class="dropdown-menu pull-right">
                            <li><a href="user_profile.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Profile</a></li>
                            <li><a href="#"><span class="fa-passwd-reset fa-stack"><i class="fa fa-undo fa-stack-2x"></i><i class="fa fa-lock fa-stack-1x"></i></span> &nbsp;&nbsp;change password</a></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; logout</a></li>
                          </ul>
       </div>   
       </div>
<?php } ?>
</div>
</div>
<div id="second-header">
<div class="col-md-12">
<div id="a1" style="opacity: 1;"  class="col-md-6"><img alt="Default logo" src="images/E-library b.png" width="50px" width="50px" /></div>
<div id="a2" class="col-md-6">
		<?php if( $_SERVER['PHP_SELF'] != "/fill_full_user_details.php") { ?>           
              <!--  <input type="hidden" name="search_param" value="all" id="search_param" />          -->  
               <form method="post">
                   <div class="input-group"> 
                    <span class="input-group-btn">
                    <div class="input-append btn-group">                            
                            <a class="btn btn-success dropdown-toggle" id="drop-btn" data-toggle="dropdown" href="#">Any
                                <span class="caret"></span>
                            </a>
                                <ul class="dropdown-menu">
                                    <li><a href="JavaScript:Void(0);" data-pdsa-dropdown-val="Any"></i>Any</a></li>
                                    <li><a href="JavaScript:Void(0);" data-pdsa-dropdown-val="author"></i>Author</a></li>
                                    <li><a href="JavaScript:Void(0);" data-pdsa-dropdown-val="title"></i>Title</a></li>
                                    <li><a href="JavaScript:Void(0);" data-pdsa-dropdown-val="isbn"></i>ISBN</a></li>
                                </ul>
                    </div>
                    </span>               <script> 
                    $(document).ready(function () {
                         $('[data-toggle="tooltip"]').tooltip(); 
                        $.removeCookie('type');
                        $.cookie('type','Any');
                                });
                    
                    $(function(){
                                    $(".dropdown-menu li a").click(function(){
                                        var id = $(this).data('pdsa-dropdown-val');
                                        $.cookie('type',id);
                            
                                      $("#drop-btn:first-child").text($(this).text());
                                      $("#drop-btn:first-child").val($(this).text());
                                
                                   });
                                
                                });</script>    
                    <input type="text" id="search-header-text" data-toggle="tooltip" data-placement="top" required="required" title="If your search is not showing in below list, just click on the search icon." class="form-control" name="header-search-all" placeholder="Search by title, author, ISBN" />
                    <span class="input-group-btn">
                        <button id="search-header-button" name="search-submit" class="btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span>               
                   </div>
                   <?php  if($_SERVER['PHP_SELF'] === '/e-library/yoursearch.php') {
                //  echo ' <a href="advancesearch.php" id="advance-search"> Advance Search</a>'; 
                }  ?>
               </form>
    <?php 
        if(isset($_POST['search-submit']) && isset($_POST['header-search-all']) && !empty($_POST['header-search-all'])){
           $search =  $_POST['header-search-all'];
           if(isset($search) && !empty($search)) {  $type = $_COOKIE['type'];  $url = 'yoursearch.php?search='.urlencode($search).'&type='.urlencode($type).'&start=0'; header("location:$url"); }
        }
     ?>
                <script>                   
                $("#search-header-text").autocomplete({
             source: function(request, response) {                  
              var id = $.cookie('type');  
              //alert(id);                                               
              $.ajax({
                url: "admin/ajaxprocess.php",
                method: "GET",   
                data: {term: request.term,type : id },
                dataType: "json",
                success: function(data) {
                    
                   // alert(data);
                             //$.each(data,function(i,v){
                             //  console.log(v.title);
                            //   
                            // });
                                //data = $.parseJSON(data);   
                                     response(data);           
        /**
         *                           response($.map(data, function (item) {
         *                                 return {
         *                                     value: item.authors,
         *                                     label: item.ISBN13 + ", " + item.ISBN10
         *                                 }
         *                             }));
         */
                               // console.log(data);
                        }
            });
        }
    });
          
          </script>
        
        <?php  } ?>
</div>
</div>
</div>


<style>
ul#panel {
    margin: 1px 42px 0px 4px;
}
div#result-1 {
    padding: 0;
    margin-left: -29px;
}
button#search-header-button {
    font-size: 15px;
}
div#second-header>.col-md-12>#a1>img {
    margin-bottom: -66px;
    width: 47%;
    height: 272px;
    margin-top: -88px;
}
.fa-stack {
    position: relative;
    display: inline-block;
    width: 1em;
    height: 2em;
    line-height: 2em;
    vertical-align: middle;
    font-size: 10px;
}
.fa-passwd-reset > .fa-lock {
  font-size: 0.85rem;
      padding-left: 0.45rem;
}
.dropdown:hover .dropdown-menu {
    display: block;
}
a#welcome {
    text-decoration: none;
    color: #fff;
}
a#welcome{
    text-decoration: none;
    color: #fff;
}
a#welcome:hover {
    text-decoration: none;
    color: #9eb746;
    cursor: pointer;
}
div#second-header>.col-md-12 {
    padding: 60px 23px 53px 58px;
    background: url(images/header-bg.jpg) repeat;
}
div#second-header>.col-md-12>#a1>img:hover {
    cursor: pointer;
    opacity: 0.55;
}
div#second-header>.col-md-12>#a2 {    
width: 48%;
}
div#second-header>.col-md-12>#a2>.input-group {    
    padding: 37px 0 0 0;
}
div#top-header {
    background-color: #282828;
    padding: 6px 73px 42px;
    color: whitesmoke;
    font-size: inherit;
    font-family: -webkit-body;
    font-variant: petite-caps;
}
div#top-header>.col-md-12>#a1 {
text-align: right;
font-size: 25px;
width: 55%;
}
div#top-header>.col-md-12>#a2 {
text-align: right;
font-size: 20px;    
width: 45%;
}
div#top-header>.col-md-12>#a2>.dropdown>a {
color: whitesmoke;
text-decoration:none;
}
div#top-header>.col-md-12>#a2>.dropdown>a:hover{
color: #98b827;
text-decoration:none;

}
div#top-header>.col-md-12>#a2>a {
color: whitesmoke;
text-decoration:none;
}
div#top-header>.col-md-12>#a2>a:hover{
color: #98b827;
text-decoration:none;

}
</style>
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
function random_str_uptolo($str) {
        for ($i=0, $c=strlen($str); $i<$c; $i++)
            $str[$i] = (rand(0, 100) > 50
                ? strtoupper($str[$i])
                : strtolower($str[$i]));
        
        return $str; 
}
?>
<script>
setInterval(function(){
    var action = 'update_time';
        $.ajax({
        url : 'admin/ajaxprocess.php',
        method: "POST",
        data:{action:action},
        success:function(data){
          //alert(action);
        }
    });
},5000);
</script>