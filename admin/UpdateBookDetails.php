<?php include "header.php";
include "header_menu.php";
   
include "side_menu.php";  ?>
<?php
if(isset($_GET['bookid']) AND isset($_GET['isbn10']) AND isset($_GET['isbn13'])) {
    
    $book_id = $_GET['bookid'];
    $isbn_10 = $_GET['isbn10'];
    $isbn_13 = $_GET['isbn13'];
    $stmt = "SELECT * FROM `book_details` WHERE `isbn-10` = '$isbn_10' AND `isbn-13` = '$isbn_13' AND `book_id` = '$book_id'";
    $stmt = $conn->query($stmt);
    $stmt = mysqli_fetch_array($stmt);
    $stmt2 = "SELECT tags.tag_title FROM `books_plus_categories_and_tags` INNER JOIN `tags` ON  tags.tag_id = books_plus_categories_and_tags.tag_id WHERE books_plus_categories_and_tags.book_id = '$book_id' GROUP by tags.tag_title";
    $stmt2 = $conn->query($stmt2); 
    $resultSet = array();
    while($row = mysqli_fetch_array($stmt2)){
     //$tag_array[] =  $row['tag_title'];
             $resultSet[] = $row['tag_title'];
    }$tag_array =  implode(',', $resultSet);    
}
 ?>
<div class="row col-md-12">
<div class="lable">
    <div class="" >Update book</div>
</div>
<div id="output-for-book-update" ></div><button id="show-div" class="btn btn-block btn-lg btn-default" style="display: none;">Add more books</button>
<div class="for-hidden"> <div class="for-hidden2"></div>
    <div class="col-md-6">  
            <label>Book Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $stmt['name']?>"  /><br />
            <label>Book ISBN-10</label>
            <input type="text" class="form-control" id="isbn_10" value="<?= $stmt['isbn-10']?>"  name="isbn_10"  /><br />
            <label>Book ISBN-13</label>
            <input type="text" class="form-control" id="isbn_13" value="<?= $stmt['isbn-13']?>"  name="isbn_13"  /><br />
            <label>Author Name</label>
            <input type="text" class="form-control" id="author" value="<?= $stmt['authors']?>"  name="author"  /><br />
            <label>Category</label><br />
            <input type="text" class="form-control" id="category" value=""  name="Category"  /><br />
            <label>Book Language</label>
            <input type="text" class="form-control" id="language" value="<?= $stmt['language']?>"  name="language"  /><br />
            <label>Publisher Name</label>
            <input type="text" class="form-control" id="Publisher_name" value="<?= $stmt['publisher_name']?>"  name="Publisher_name"  /><br />  
            <label>Tags</label>
            <input type="text" class="form-control" id="tag" value="<?= $tag_array ?>"  name="tags"  /><br />            
    </div>

    <div class="col-md-6">  
            
            <label>Photos (For Book cover)</label>
            <input type="file" class="form-control" id="photo_upload" value="<?= $stmt['book_pic']?>"  name="photo_upload"  /><br />            
            <label>Photos  URL(For Book cover)</label>
            <input type="text" class="form-control" id="photo_url" value="<?= $stmt['online_pic_url']?>"  name="photo_url"  /><br />            
            <label>Upload file (.pdf, .epub, .pdb, etc)</label>
            <input type="file" class="form-control" id="file_upload" value="<?= $stmt['book_files']?>"  name="file_upload"  /><br />
            <label>Paperback(Page No.)</label>
            <input type="text" class="form-control" id="Paperback" value="<?= $stmt['paperback']?>"  name="Paperback" /><br />
            <label>Publisher URL</label>
            <input type="text" class="form-control" id="Publisher_url" value="<?= $stmt['publisher_url']?>"  name="Publisher_url"  /><br /> 
            <label>Publisher year</label>
            <input type="text" class="form-control" id="Publisher_year" value="<?= $stmt['publiction_year']?>"  name="Publisher_year"  /><br />  
            <label>Book Description</label>
           <textarea name="" class="form-control" id="Description" rows="5" ><?= $stmt['description']?></textarea><br />  
    </div>
  
   <button type="submit" name="update_book" id="update_book" class="btn btn-lg btn-success btn-block" >Update this book</button> <br /><br /><br />
</div>
</div>

<script>

                                      $(document).ready(function(){
                                                $('#update_book').on('click',function(event){
                                                var photo_upload = $('input[type=file]')[0].files[0];
                                                var file_upload = $('input[type=file]')[1].files[0];
                                                var name = $('#name').val();
                                                var book_id = <?php echo $book_id ;?>;
                                                var isbn_10 = $('#isbn_10').val();
                                                var isbn_13 = $('#isbn_13').val();
                                                var author = $('#author').val();
                                                var language = $('#language').val();
                                                var Publisher_name = $('#Publisher_name').val();
                                                var other_category = $('#other_category').val();
                                                var Paperback = $('#Paperback').val();
                                                var Publisher_url = $('#Publisher_url').val();
                                                var Publisher_year = $('#Publisher_year').val();
                                                var Description = $('#Description').val();
                                                var tags = $('#tags').val();
                                                                                            
                                                var formData = new FormData();
                                                formData.append('photo_upload',photo_upload); formData.append('file_upload',file_upload);
                                                formData.append('name',name);
                                                formData.append('isbn_10',isbn_10);
                                                formData.append('isbn_13',isbn_13);
                                                formData.append('author',author);
                                                formData.append('language',language);
                                                formData.append('Publisher_name',Publisher_name);
                                                formData.append('other_category',other_category);
                                                formData.append('Paperback',Paperback);
                                                formData.append('Publisher_url',Publisher_url);
                                                formData.append('Publisher_year',Publisher_year);
                                                formData.append('Description',Description);
                                                formData.append('tags',tags);
                                                //formData.append('category_id',output_according);
                                                formData.append('book_update','book_update');
                                                $.ajax({
                                                            url : 'ajaxprocess.php',
                                                            method: "POST",                                                           
                                                            data:formData,
                                                            contentType: false, 
                                                            processData: false,
                                                            success:function(data){
                                                                
                                                              $('#output-for-book-update').html(data);
                                                              //$('.for-hidden').css('display','none');
                                                              //$('#show-div').css('display','');
                                                              
                                                             
                                                            }
                                                        });
                                                        
                                                        
                                              });
                                      
                                         });
                                $('#category').tokenfield({
                                    autocomplete: {
                                      source: function (request, response) {
                                          jQuery.post("ajaxprocess.php", {
                                              query3: request.term
                                          }, function (data) {
                                              data = $.parseJSON(data);
                                              response(data);
                                          });
                                      },
                                      delay: 100
                                    },
                                    showAutocompleteOnFocus: true,         
                                  });
                                  $('#tag').tokenfield({
                                    autocomplete: {
                                      source: function (request, response) {
                                          jQuery.post("ajaxprocess.php", {
                                              query2: request.term
                                          }, function (data) {
                                              data = $.parseJSON(data);
                                              response(data);
                                          });
                                      },
                                      delay: 100
                                    },
                                    showAutocompleteOnFocus: true,         
                                  });
                                  $('#tag,#category').on('tokenfield:createtoken', function (event) {
                                            var existingTokens = $(this).tokenfield('getTokens');
                                            $.each(existingTokens, function(index, token) {
                                                if (token.value === event.attrs.value)
                                                    event.preventDefault();
                                            });
 
                                            
                                  });
 </script>
                                <style>span.tag.label.label-info {
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
                             .lable {
                                padding: 17px 0 20px 0;
                                text-align: center;
                                /* border: 1px solid; */
                                /* margin-right: -89px; */
                                margin: 1px -88px 25px -1px;
                                background-color: rgb(0, 67, 106);
                                color: whitesmoke;
                            }</style>
<?php  include "footer.php"; mysqli_close($conn); ?>