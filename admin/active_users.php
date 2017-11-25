
  <?php include "side_menu.php"; ?>

           	<script>
            setInterval(function(){
                var action = 'show_time';
                    $.ajax({
                    url : 'ajaxprocess.php',
                    method: "POST",
                    data:{action:action},
                    success:function(data){
                      //alert(action);
                      $('#user_online_data').html(data);
                      $('.load').hide();
                    }
                });
            },3000);
            </script>  
<style>


.loader {
    border: 8px solid #f3f3f3;
    border-radius: 50%;
    border-top: 8px solid #825527;
    width: 80px;
    height: 80px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
                           <div class="load">Please wait....<div class="loader" ></div></div><div id="user_online_data"></div>
                            
                    

  
  
 
