<?php include "header.php";
include "header_menu.php";

include "side_menu.php"; ?>

<div class="row">
<ul class="nav nav-tabs">
  <li class="active main"><a href="#main">Main Category List</a></li>
  <li class="sub"><a href="#sub">Sub Category List</a></li>
  <li class="sub-sub"><a href="#sub-sub">Sub-Sub Category List</a></li>
</ul>

<div class="">
<?php 
$sql = "SELECT * FROM `categories` WHERE (`parent_id` IS NULL AND `sub_cat_id` IS NULL)";
$main_category = $conn->query($sql);
$sql = "SELECT * FROM `categories` WHERE (`parent_id` IS NOT NULL AND `sub_cat_id` IS NULL)";
$sub_category = $conn->query($sql);
?>
<form method="POST" class="form-horizontal"><br /><br />
            <div id="main" >
                
                <?php
                    echo  '
                    <div class="table-responsive col-md-5">                    
                    <table class="table table-responsive table-striped table-condensed table-hover table-bordered">
                    <thead class="">
                        <tr><th>Name</th></tr>
                    </thead><tbody>
                    ';                
              while($row = mysqli_fetch_array($main_category)){  
                
                echo '<tr><td>'.$row['cat_name'].'</td></tr>';
                
              }  
                        echo '
                        </tbody></table> ';
                
                ?>
                
            </div>
            
            <div id="sub" style="display: none;">



            </div>
            
            <div id="sub-sub" style="display: none;">   



            </div>


</form>
</div>

</div>
<script>
                                      $('.main').on('click',function(){
                                        $('.sub,.sub-sub').removeClass('active');
                                        $('.main').addClass('active');
                                        $('#sub,#sub-sub').css('display','none');
                                        $('#main').css('display','');                                                                        
                                      });
                                      $('.sub').on('click',function(){
                                        $('.main,.sub-sub').removeClass('active');
                                        $('.sub').addClass('active');
                                        $('#main,#sub-sub').css('display','none');
                                        $('#sub').css('display','');                                                                        
                                      });
                                      $('.sub-sub').on('click',function(){
                                        $('.sub,.main').removeClass('active');
                                        $('.sub-sub').addClass('active');
                                        $('#sub,#main').css('display','none');
                                        $('#sub-sub').css('display','');                                                                        
                                      });
                                      
                                      
                                      


</script>
<?php  include "footer.php"; mysqli_close($conn); ?>