<?php 
include "config.php";
$results_per_page = 7;

$mysql_1 = 'SELECT book_details.`book_id`,
       book_details.`name`,
       books_plus_categories_and_tags.*,
	   categories.*
  FROM books_plus_categories_and_tags
 INNER JOIN book_details ON book_details.book_id = books_plus_categories_and_tags.book_id
 INNER JOIN categories ON categories.main_id = books_plus_categories_and_tags.category_id
 ORDER BY books_plus_categories_and_tags.category_id';
 
$mysql_2 = "SELECT DISTINCT
    book_details.`book_id`,
    books_plus_categories_and_tags.category_id,
    categories.main_id,
    categories.cat_name
FROM
    books_plus_categories_and_tags
INNER JOIN book_details ON book_details.book_id = books_plus_categories_and_tags.book_id
INNER JOIN categories ON categories.main_id = books_plus_categories_and_tags.category_id
GROUP BY
    categories.cat_name
ORDER BY
    book_details.`book_id` ASC ";
    
    $retval = mysqli_query($conn,$mysql_2);


$row_cnt = $retval->num_rows;


if (!isset($_GET['page'])) 
{
$page = 1;
} else {
$page = $_GET['page'];
}             
$this_page_first_result = ($page-1)*$results_per_page; 

$mysql_2 = "SELECT DISTINCT
    book_details.`book_id`,
    books_plus_categories_and_tags.category_id,
    categories.main_id,
    categories.cat_name
FROM
    books_plus_categories_and_tags
INNER JOIN book_details ON book_details.book_id = books_plus_categories_and_tags.book_id
INNER JOIN categories ON categories.main_id = books_plus_categories_and_tags.category_id
GROUP BY
    categories.cat_name
ORDER BY
    book_details.`book_id` ASC limit $this_page_first_result,$results_per_page";
    
$mysql_query = mysqli_query($conn,$mysql_2);


while($fetch = mysqli_fetch_array($mysql_query)){

    
?>
    
        <div class="row categories-row" >                    
                        <div class="title-hr-1" ><hr /></div>
                        <div class="title-name col-md-6" ><?= $fetch['cat_name'] ?></div>
                        <div class="col-md-6" >
                            <div class="prev-next" >
                                        <div class="prev pull-right "  ><a class="left carousel-control" href="#myCarouse_<?=$fetch['main_id']?>" data-slide="prev">‹</a></div>
                                        <div class="prev pull-right "  ><a class="right carousel-control" href="#myCarouse_<?=$fetch['main_id']?>" data-slide="next">‹</a></div>                             
                                        <div class="next pull-right" ><i class="fa fa-angle-right"  aria-hidden="true"></i></div>
                                        <div class="next pull-right" ><i class="fa fa-angle-left"  aria-hidden="true"></i></div>
                            </div>
                        </div>
                        <div class="title-hr-2" ><hr /></div>
                        <div class="row bookshow-row" >            
                        <div id="myCarouse_<?=$fetch['main_id']?>" data-ride="carousel" data-type="multi" data-interval="3000" class="carousel slide">                
                        <!-- Carousel items -->
                        <div class="carousel-inner">
                                                    <?php $stmt_percat = "SELECT distinct \n"
                                                        
                                                            . "    book_details.*,\n"
                                                        
                                                            . "    books_plus_categories_and_tags.category_id\n"
                                                        
                                                            . "FROM\n"
                                                        
                                                            . "    books_plus_categories_and_tags\n"
                                                        
                                                            . "INNER JOIN book_details ON book_details.book_id = books_plus_categories_and_tags.book_id \n"
                                                        
                                                            . "Where books_plus_categories_and_tags.category_id =".$fetch['main_id']." ORDER BY RAND()";
                                                            $mysql_query2 = mysqli_query($conn,$stmt_percat);$count =0; 
                                                            while($fetch2 = mysqli_fetch_assoc($mysql_query2)){
                                                         ?>
                                                                    <div class="item <?= $count != 0 ?  '' :  'active'  ?>">
                                                                      <div class="col-md-3 col-sm-6 col-xs-12 allbook perbook_<?= $fetch2['book_id'] ?>">
                                                                      <?php $URL = "title=".urlencode($fetch2['name'])."&isbn10=".urlencode($fetch2['isbn-10'])."&key=".urlencode($fetch2['book_id'])."&isbn13=".urlencode($fetch2['isbn-13'])."&catid=".urlencode($fetch['main_id']); ?>
                                                                      <a href="bookdetails.php?<?=$URL?>"><img src="<?=($fetch2['book_pic'] ==='' OR $fetch2['book_pic'] === null )?$fetch2['online_pic_url'] :'../images/books_pics/'.$fetch2['book_pic']?>" alt="No image Available" class="img-responsive" /></a>
                                                                      <?= '<center>'.$fetch2['name'].'</center>'?>
                                                                      </div>
                                                                    </div>
                                                          <?php $count++;      
                                                          
                                                                                            
                                                          }
                                                          
                                                          $number_of_pages = ceil($row_cnt/$results_per_page); 
                                                          
                                                          ?> 
                         </div>                       
                            <!--/item-->
                        </div>
                    </div>     
                                            
        </div>  
        
<?php } ?>
