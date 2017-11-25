<?php include "header.php";
include "header_menu.php";

include "side_menu.php"; ?>

<div class="row">
<ul class="nav nav-tabs">
  <li class="active main"><a href="#main">Create Main Category</a></li>
  <li class="sub"><a href="#sub">Create Sub Category</a></li>
  <li class="sub-sub"><a href="#sub-sub">Create Sub-Sub Category</a></li>
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
                    <label>Create Main categories</label>
                    <input type="text" class="form-control" name="main_category" /><br />
            </div>
            
            <div id="sub" style="display: none;">
                    <label>Select Main category</label>
                    <select class="form-control"><option>---Select One---</option>
                    <?php  
                    while($row = mysqli_fetch_array($main_category))
                    {
                        echo '<option value='.$row['main_id'].'>'.$row['cat_name'].'</option>';
                    }    
                                 
                    ?>
                    </select>
                    <br />
                    <label>Enter Sub categories</label>
                    <input type="text" class="form-control" name="sub_category" /><br />
            </div>
            
            <div id="sub-sub" style="display: none;">   
                                        
                                            <label>Select Main category</label>
                                            <select id="main-select-2" class="form-control"><option>---Select One---</option>
                                            <?php  
                                            // set the pointer back to the beginning
                                    mysqli_data_seek($main_category, 0);
                                            while($row = mysqli_fetch_array($main_category))
                                            {
                                                echo '<option value='.$row['main_id'].'>'.$row['cat_name'].'</option>';
                                            }   
                                                mysqli_free_result($main_category);             
                                            ?>
                                            </select><br />
                                            <script> 
                                                                                 
                                            $('#main-select-2').on('change',function(){
                                            var value = $('#main-select-2').val();
                                            $.ajax({    
                                                  url: 'ajaxprocess.php',                         
                                                  data:{value:value},                  
                                                  method: "POST",                                             
                                                  success: function(data)          
                                                  { 
                                                    $('#output-sub').html(data);                          
                                                  } 
                                                });
                                             
                                        
                                      });
                                      
                                      </script>
                                    <label>Select Sub category</label>
                                        <select id="output-sub" class="form-control">
                                        </select>     
                                        
                                        <br />
                    <label>Enter Sub-Sub categories</label>                    
                    <input type="text" class="form-control" name="sub-sub_category" /><br />
            </div>
            
            <button type="button" name="create-cat" class="btn btn-block btn-success" >Create</button>
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




