<?php  include("header.php"); ?>
<body>
<?php   include("header_1.php"); ?>
<?php   include("header_menu.php"); ?>

<div class="container">
<?php    

        if(isset($_GET['cat']) && isset($_GET['cat_id']) && isset($_GET['main_id'])) {
            
          $cat =   $_GET['cat'];
          $parent_id  = $_GET['cat_id'];
          $main_id = $_GET['main_id'];
            
          $sql3 = "SELECT * FROM books_plus_categories_and_tags INNER JOIN categories ON categories.main_id = books_plus_categories_and_tags.category_id INNER JOIN book_details ON book_details.book_id = books_plus_categories_and_tags.book_id WHERE ( categories.main_id = $main_id)";
          $sql = $conn->query($sql3);                              
       
        

?>
    <div class="show-book-list col-md-12">
    <div class="row">
                                <hr class="hr-1" />
                              <img onclick="goBack()" src="images/757ZZ.png" style="    height: 24px;position: absolute;margin: -12px 0 0 0;"  /><div id="Search-Results"><strong>Category :</strong> <?= $cat?></div>  <div id="Showing-all" style=""></div>
                            <hr class="hr-2" /><br /><br />
<style>hr.hr-2 {
    margin-top: 13px; }
    div#Search-Results {
    margin-left: 76px;
    margin-top: -9px;
}
</style>
                            
    <?php   while($fetch2 = mysqli_fetch_array($sql)) { 
        $URL = "title=".urlencode($fetch2['name'])."&isbn10=".urlencode($fetch2['isbn-10'])."&key=".urlencode($fetch2['book_id'])."&isbn13=".urlencode($fetch2['isbn-13'])."&catid=".urlencode($main_id);
        ?>        
                <div class="per-books-1452 col-md-3 ">
                   <div class="books-books-45625">
                   <a href="bookdetails.php?<?=$URL?>"><img src="<?=($fetch2['book_pic'] ==='' OR $fetch2['book_pic'] === null )?$fetch2['online_pic_url'] :'../images/books_pics/'.$fetch2['book_pic']?>" alt="No image Available" class="img-responsive" /></a>
                   <center><a href="bookdetails.php?<?=$URL?>"><?=$fetch2['name']?></a></center>                                                                    
                   </div>
                </div>        
          
            <?php   } ?>
    </div>  </div>
    <style>.per-books-1452.col-md-3 {
            padding: 58px 30px 14px 30px;
                        }
img.img-responsive {
    padding: 12px 0px 8px 7px;
    margin: -3px 0 0px 17px;
    height: 249px;
    width: 189px;
}
</style>
</div>
<div class="" ></div><br /><br /><br /><br /><br /><br /><br />
<?php } include("footer_2.php");?>
<?php  include("footer.php");?>