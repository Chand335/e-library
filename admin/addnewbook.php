<?php include "header.php";
include "header_menu.php";

include "side_menu.php";  ?>
<div class="row col-sm-5 col-md-5">
    <label>Select Categories</label><span id="star-mark"> *</span> <br />
    <select name="output-according[]" id="output-according" class="form-control" multiple="multiple">
    <?php               $sql = "SELECT * FROM `categories` WHERE (`parent_id` IS NOT NULL OR `sub_cat_id` IS NOT NULL ) ORDER BY `categories`.`cat_name` ASC";
                        $sub_category = $conn->query($sql);                        
                        while($row = mysqli_fetch_array($sub_category))
                        {
                            echo '<option value='.$row['main_id'].'>'.strtolower($row['cat_name']).'</option>';
                        } 
    ?>
   </select>  
</div>
<div class="row col-md-12">
<div class="lable">
    <div class="add-new-show-books" >Add New book</div>
</div>
<div id="output-for-book-inserted" ></div><button id="show-div" class="btn btn-block btn-lg btn-default" style="display: none;">Add more books</button>
<div class="for-hidden"> <div class="for-hidden2"></div> 
    <div class="col-md-6">  
        <form id="add-form" method="post">
            <label>Enter Book Name</label><span id="star-mark"> *</span> 
            <input type="text" class="form-control" required="required" id="name" name="name"  /><br />
            <label>Enter Author Name</label>
            <input type="text" class="form-control" id="author" name="author"  /><br />
            <label>Enter Book ISBN-10</label><span id="star-mark"> *</span> 
            <input type="text" class="form-control" id="isbn_10" name="isbn_10"  /><br />
            <label>Enter Book ISBN-13</label><span id="star-mark"> *</span> 
            <input type="text" class="form-control" id="isbn_13" name="isbn_13"  /><br />
            <label>Enter Book Language</label>
            <input type="text" class="form-control" id="language" name="language"  value="English" /><br />
            <label>Enter  Flipkart Link</label>
            <input type="text" class="form-control" id="flipkart_link" name="flipkart_link"  /><br /> 
            <label>Enter Publisher Name</label>
            <input type="text" class="form-control" id="Publisher_name" name="Publisher_name"  /><br />  
            <label title="Press enter for select" >Select Tags Or Create New One</label><span id="star-mark"> *</span> <br />
            <input type="text"required="required"  class="form-control" placeholder="Select tag by press Enter key" id="tag" value="" /> 
<br /><br /><br /><br />

                                <script type="text/javascript">
                                function call_on() {
                                  $('#tag').tokenfield({
                                    autocomplete: {
                                      source: function (request, response) {
                                          jQuery.post("ajaxprocess.php", {
                                              query: request.term
                                          }, function (data) {
                                              data = $.parseJSON(data);
                                              response(data);
                                          });
                                      },
                                      delay: 100
                                    },
                                    showAutocompleteOnFocus: true,
                                  });
                                  $('#tag').on('tokenfield:createtoken', function (event) {
                                            var existingTokens = $(this).tokenfield('getTokens');
                                            $.each(existingTokens, function(index, token) {
                                                if (token.value === event.attrs.value)
                                                    event.preventDefault();
                                            });
                                        }); 
                                        }
                                        
                                  
                                </script>
    </div>

    <div class="col-md-6">  
            
            <label>Upload photos (For Book cover)</label><span id="star-mark"> *</span> 
            <input type="file" class="form-control" id="photo_upload" accept="image/*" name="photo_upload"  /><br />     
            <label>Upload photos URL (For Book cover)</label><span id="star-mark"> *</span> 
            <input type="text" class="form-control" id="photo_upload_url" accept="image/*" name="photo_upload_url"  /><br />         
            <label>Upload file (.pdf, .epub, .pdb, etc)</label>
            <input type="file" class="form-control" id="file_upload" name="file_upload"  /><br />
            <label>Enter Paperback(Page No.)</label>
            <input type="text" class="form-control" id="Paperback" name="Paperback"  /><br />
            <label>Enter Publisher URL</label>
            <input type="text" class="form-control" id="Publisher_url" name="Publisher_url"  /><br /> 
            <label>Enter  Amazon Link</label>
            <input type="text" class="form-control" id="amazon_link" name="amazon_link"  /><br /> 
            <label>Enter Publisher year</label>
            <input type="text" class="form-control" id="Publisher_year" name="Publisher_year"  /><br />  
              <label>Enter Book Description</label>
           <textarea name="Description" class="form-control" id="Description" rows="2" ></textarea><br />  
           
    </div>
  </form>
   <button type="submit" name="add_new_book" id="add_new_book" class="btn btn-lg btn-success btn-block" >Add this book</button> <br /><br /><br />
</div>
</div>

<script>
                 $(document).ready(function(){
                   call_on();
                                     
                                      $('#show-div').on('click',function(){
                                            $('#show-div').css('display','none');    
                                            $('.for-hidden').css('display','');    
                                        });
                                        
                                        $('#output-according').multiselect({
                                            nonSelectedText :'---Select One---',
                                            enableFiltering : true,
                                            buttonWidth : '380px',
                                            enableFullValueFiltering: false,
                                            enableClickableOptGroups: true,
                                            maxHeight: 500,
                                            inheritClass: true,
                                            //delimiterText : ', ',
                                            
                                        });
                                        
                                                $('#add_new_book').on('click',function(event){
                                                var photo_upload = $('input[type=file]')[0].files[0];
                                                var photo_upload_url = $('#photo_upload_url').val();                                                                                                
                                                var file_upload = $('input[type=file]')[1].files[0];
                                                var name = $('#name').val();
                                                var isbn_10 = $('#isbn_10').val();
                                                var isbn_13 = $('#isbn_13').val();
                                                var author = $('#author').val();
                                                var language = $('#language').val();
                                                var Publisher_name = $('#Publisher_name').val();                                               
                                                var Paperback = $('#Paperback').val();
                                                var Publisher_url = $('#Publisher_url').val();
                                                var amazon_link = $('#amazon_link').val();
                                                var flipkart_link = $('#flipkart_link').val();
                                                var Publisher_year = $('#Publisher_year').val();
                                                var Description = $('#Description').val();
                                                var tags = $('#tag').val();
                                                //alert(tags);
                                                var output_according = $('#output-according').val(); 
                                                //alert(output_according);           
                                                var formData = new FormData();
                                                formData.append('photo_upload',photo_upload); formData.append('file_upload',file_upload);
                                                formData.append('name',name);
                                                formData.append('isbn_10',isbn_10);
                                                formData.append('amazon_link',amazon_link);
                                                formData.append('flipkart_link',flipkart_link);
                                                formData.append('isbn_13',isbn_13);
                                                formData.append('photo_upload_url',photo_upload_url);
                                                formData.append('author',author);
                                                formData.append('language',language);
                                                formData.append('Publisher_name',Publisher_name);                                              
                                                formData.append('Paperback',Paperback);
                                                formData.append('Publisher_url',Publisher_url);
                                                formData.append('Publisher_year',Publisher_year);
                                                formData.append('Description',Description);
                                                formData.append('tags',tags);
                                                formData.append('category_id',output_according);
                                                formData.append('add_new','book_insert');
                                                $.ajax({
                                                            url : 'ajaxprocess.php',
                                                            method: "POST",                                                           
                                                            data:formData,
                                                            contentType: false, 
                                                            processData: false,
                                                            success:function(data){
                                                                $("html, body").animate({ scrollTop: 0 }, "fast");                                                                
                                                                $('#output-for-book-inserted').html(data);
                                                                      var $response=$(data);
                                                                      var oneval = $response.filter('#success-of-book').text();
                                                                      if(oneval == 'Book is Successfully Added.') { $('#tag').tokenfield('destroy');  $("#add-form")[0].reset(); call_on();  }
                                                                    }
                                                       });
                                                        
                                                        
                                              });
                                      
                                         });
</script>
<style>


span.tag.label.label-info {
    /* height: 32px; */
    font-size: 12px;
}



#star-mark {
    color: #ef1010;
}
.lable {
    padding: 17px 0 20px 0;
    text-align: center;
    /* border: 1px solid; */
    /* margin-right: -89px; */
    margin: 1px -88px 25px -1px;
    background-color: rgb(0, 67, 106);
    color: whitesmoke;
}
.row.col-md-12 {
    margin: 12px 54px 10px -16px;
}
</style>
<?php  include "footer.php"; mysqli_close($conn); ?>