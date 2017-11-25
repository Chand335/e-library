<?php 
include_once "../config.php";
$count=0;
$sql2="SELECT * FROM comments WHERE status = 0";
$result=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result); 

?>
           	<script>
            $(document).ready(function() {
                    $('#notification-click').on('click',function(){
                            var action = 'show-notification';
                                $.ajax({
                                url : 'ajaxprocess.php',
                                method: "POST",
                                data:{notification:action},
                                success:function(data){                                                              
                                  $('#notification-latest').html(data);
                                  $('#notification-count').hide();
                                }
                            });
                    }); 
                 
                                
                setInterval(function(){

                            var action = 'count-notification';
                                $.ajax({
                                url : 'ajaxprocess.php',
                                method: "POST",
                                data:{notification:action},
                                success:function(data){ 
                                  $('#notification-count').css('display','').html(data);
                                  
                                }
                            });
                        },4000); 
            
            
              });                
            </script>  

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown"  id="notification-click">
 
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span><span class="badge badge-notify" id="notification-count"><?php if($count>0) { echo $count; } ?></span></a>
                      <ul class="dropdown-menu">
                      
                      <div id="notification-latest"></div>
                      
                      </ul>
                            
                 </li>
            <li class=""><a href="../logout.php">Logout</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
<style>
.notification-item {
    padding: 10px 0 10px 16px;
    border-bottom: 1px solid rgba(78, 156, 30, 0.65);
}.notification-subject {
    font-weight: 600;
    font-size: 14px;
    margin: 0px 41px 0 0px;
}.notification-comment {
    font-size: 11px;
    padding: 1px 0px 4px 27px;
    margin: 0px 41px 0 -18px;
}
div#notification-latest {
   
}
span#notification-count {
    margin-left: -18px;
    margin-top: -2px;
    color: white;
    font-size: 16px;
    position: absolute;
    background-color: brown;
}

</style>