<?php   include("header.php"); ?><body><?php   include("header_1.php"); include("header_menu.php"); ?>
<?php if((!isset($_GET['search']) && empty($_GET['search'])) && (!isset($_GET['type']) && empty($_GET['type']))): header("location:index.php"); endif; ?>
<div class="container">
    <div class="row">
            <div class="col-md-12" >               
                        <?php if(isset($_GET['search']) && !empty($_GET['search'])  && isset($_GET['type']) && !empty($_GET['type'])    ): $search =  $_GET['search']; $search = str_replace(["-", "–"], '', $search); $results_per_page = 10;   $type =  $_GET['type'];  endif; ?>  
                        <?php       if (!isset($_GET['page'])) 
                                         {
                                         $page = 1;
                                         } else {
                                         $page = $_GET['page'];
                                         }             
                                         $this_page_first_result = ($page-1)*$results_per_page; 
      ?>
                                <?php   
                                     if($type === 'Any'): 
                                           $sql = "SELECT * FROM book_details WHERE (`name` LIKE '%$search%' OR  `isbn-13` LIKE '%$search%' OR  `isbn-10` LIKE '%$search%' OR `authors`LIKE '%$search%' OR  `publisher_name` LIKE '%$search%' ) GROUP BY `name` UNION  SELECT * FROM book_details WHERE MATCH(name)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) OR MATCH(`isbn-13`)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) OR MATCH(`isbn-10`)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) OR MATCH(authors)  AGAINST ('$search' IN NATURAL LANGUAGE MODE)  GROUP BY `name` ";
                                           $result = $conn->query($sql); $row_cnt = $result->num_rows;
                                           $sql = "SELECT * FROM book_details WHERE (`name` LIKE '%$search%' OR  `isbn-13` LIKE '%$search%' OR  `isbn-10` LIKE '%$search%' OR `authors`LIKE '%$search%' OR  `publisher_name` LIKE '%$search%' ) GROUP BY `name` UNION  SELECT * FROM book_details WHERE MATCH(name)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) OR MATCH(`isbn-13`)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) OR MATCH(`isbn-10`)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) OR MATCH(authors)  AGAINST ('$search' IN NATURAL LANGUAGE MODE)  GROUP BY `name` limit 10  offset $this_page_first_result";
                                           $result = $conn->query($sql);                                                
                                        elseif($type === 'title'): 
                                           $sql = "SELECT *  FROM book_details WHERE (`name` =  '%$search%' )GROUP BY `name` UNION ALL SELECT * FROM book_details WHERE MATCH(name)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) GROUP BY `name` UNION SELECT * FROM book_details WHERE (`name` LIKE '%$search%' )  GROUP BY `name` ";
                                           $result = $conn->query($sql); $row_cnt = $result->num_rows;
                                           $sql = "SELECT *  FROM book_details WHERE (`name` =  '%$search%' )GROUP BY `name` UNION ALL SELECT * FROM book_details WHERE MATCH(name)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) GROUP BY `name` UNION SELECT * FROM book_details WHERE (`name` LIKE '%$search%' )  GROUP BY `name`  limit 10  offset $this_page_first_result";
                                           $result = $conn->query($sql);
                                        elseif($type === 'author'): 
                                           $sql = "SELECT  * FROM book_details WHERE (`authors` = '%$search%' )GROUP BY `name` UNION ALL SELECT * FROM book_details WHERE MATCH(`authors`)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) GROUP BY `name` UNION  SELECT * FROM book_details WHERE (`authors` LIKE '%$search%' )  GROUP BY `name` ";
                                           $result = $conn->query($sql);$row_cnt = $result->num_rows;
                                           $sql = "SELECT  * FROM book_details WHERE (`authors` = '%$search%' )GROUP BY `name` UNION ALL SELECT * FROM book_details WHERE MATCH(`authors`)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) GROUP BY `name` UNION  SELECT * FROM book_details WHERE (`authors` LIKE '%$search%' )  GROUP BY `name`  limit 10  offset $this_page_first_result";
                                           $result = $conn->query($sql);
                                        elseif($type === 'isbn'): 
                                           $sql = "SELECT  * FROM book_details WHERE (`isbn-13` = '%$search%' OR  `isbn-10` = '%$search%' ) GROUP BY `name` UNION ALL SELECT * FROM book_details WHERE (MATCH(`isbn-10`)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) OR MATCH(`isbn-13`)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) ) GROUP BY `name` UNION SELECT DISTINCT * FROM book_details WHERE (`isbn-13` LIKE '%$search%' OR  `isbn-10` LIKE '%$search%' )  GROUP BY `name` ";
                                            $result = $conn->query($sql);$row_cnt = $result->num_rows;
                                            $sql = "SELECT  * FROM book_details WHERE (`isbn-13` = '%$search%' OR  `isbn-10` = '%$search%' ) GROUP BY `name` UNION ALL SELECT * FROM book_details WHERE (MATCH(`isbn-10`)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) OR MATCH(`isbn-13`)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) ) GROUP BY `name` UNION SELECT DISTINCT * FROM book_details WHERE (`isbn-13` LIKE '%$search%' OR  `isbn-10` LIKE '%$search%' )  GROUP BY `name`  limit 10 offset $this_page_first_result";
                                            $result = $conn->query($sql);
                                       endif;
                                       
                                          if(@mysqli_num_rows($result) === 0 OR !$result):
                                          
                                                  $sql = "SELECT *  FROM tags WHERE (`tag_title` =  '%$search%' ) UNION ALL SELECT * FROM tags WHERE MATCH(`tag_title`)  AGAINST ('$search' IN NATURAL LANGUAGE MODE) UNION ALL SELECT * FROM tags WHERE (`tag_title` LIKE '%$search%' ) GROUP BY  tag_id";
                                                  $result = $conn->query($sql); $result = @mysqli_fetch_array($result); $result = $result['tag_id']; if($result != 1 ):
                                                  $sql = "SELECT book_details.* ,books_plus_categories_and_tags.* FROM book_details INNER JOIN books_plus_categories_and_tags ON book_details.book_id = books_plus_categories_and_tags.book_id where books_plus_categories_and_tags.tag_id = $result GROUP BY book_details.name" ; 
                                                  $result = $conn->query($sql); $row_cnt = @$result->num_rows;
                                                  $sql = "SELECT book_details.* ,books_plus_categories_and_tags.* FROM book_details INNER JOIN books_plus_categories_and_tags ON book_details.book_id = books_plus_categories_and_tags.book_id where books_plus_categories_and_tags.tag_id = $result GROUP BY book_details.name  limit 10  offset $this_page_first_result" ; endif;
                                                  $result = $conn->query($sql); 
                                                  
                                          
                                           endif;
                                        
                                        
                                        
                                        // SQL
                                        // SELECT * FROM book_details WHERE MATCH(name)  AGAINST ('guide' IN NATURAL LANGUAGE MODE) ;
                                        //SELECT * FROM book_details WHERE MATCH(name)  AGAINST ('java' IN NATURAL LANGUAGE MODE) 
                                        
                        $number_of_pages = ceil($row_cnt/$results_per_page); 
                                 ?>
                                                  
                            <hr class="hr-1" />
                              <img onclick="goBack()" src="images/757ZZ.png" style="    height: 24px;position: absolute;margin: -12px 0 0 0;"  /><div id="Search-Results"><strong>Search Results for:</strong> "<?= $search?>"</div>  <div id="Showing-all" style="">Showing <?= @mysqli_num_rows($result) ?> results of <?= $row_cnt?></div>
                            <hr class="hr-2" /><br /><br />
                            
                            
                            
                            <?php   if(@mysqli_num_rows($result) === 0 OR @!$result):  echo '<h3>No Result Found</h3>' ;   endif;
                            
                            
                             while(@$row = mysqli_fetch_array($result)){ ?>
                                <div class="result-of-search col-md-12">
                                        <div class="book-image col-md-3">
                                         <?php $URL = "title=".urlencode($row['name'])."&isbn10=".urlencode($row['isbn-10'])."&key=".urlencode($row['book_id'])."&isbn13=".urlencode($row['isbn-13']); ?>                                                                     
                                                <a href="bookdetails.php?<?=$URL?>" id="ghjmnloyptjrnrn"><img src="<?= $row['book_pic'] ? '/images/book_pics/'.$row['book_pic'] : $row['online_pic_url']?>" width="190px" height="238px" alt="No Image" /></a>
                                        </div>
                                        <div class="book-details col-md-9">
                                                <div>
                                                    <a href="bookdetails.php?<?=$URL?>" id="hyuikk"><span id="title-name"><strong><?= $row['name'] ?></strong></span></a>&nbsp;&nbsp;<span><?= $row['publiction_year'] ?></span><br />
                                                    by <span id="title-authors"><?= $row['authors'] ?></span><br />
                                                    Publisher: <span id="title-publisher_name"><?= $row['publisher_name'] ?></span><br />
                                                   
                                                </div>           
                                        </div> 
                               </div> 
                               
<style>
#ghjmnloyptjrnrn{
   cursor: pointer; 
   text-decoration: none;
}
#hyuikk {
    text-decoration: none;
}                               
span#title-name {
    color: #39a0dc;
    font-size: 20px;
}
span#title-name:hover {
    color: #DC9039;
    cursor: pointer;
    text-decoration: none;
}

span#title-publisher_name {
    font-size: 18px;
    font-family: monospace;
    color: #82432c;
}

</style>
                              <?php } 
                                    
                                    echo '<center>';
                                       for($i=1;$i<=$number_of_pages;$i++){?>
                                          <ul class="pagination pagination-sm"><li<?php if($i == $page) { echo ' class="active"'; } ?>><a href="yoursearch.php?search=<?=$search?>&type=<?=$type?>&page=<?= $i ?>"><?=$i?></a></li></ul>    
                                     <?php } echo '</center>';?>  
                                     <style>.pagination>li>a {
                                                      border: 1px solid #98b827;
                                                    }
                                                .pagination>li.active>a {
                                                          background: #98b827;
                                                          color: #fff;
                                                        }

</style>
        
            </div>
            

    </div>
</div><br /><br /><br /><br />
<script>
function goBack() {
    window.history.back();
}

</script>
<style>
.result-of-search.col-md-12 {
    padding: 30px 32px 30px 8px;
    border-top: 1px solid;
}
div#Showing-all {
    position: absolute;
    right: 0;    margin: -17px 18px 0 22px;     font-size: 12px;
}
div#Search-Results{
    position: absolute;
    left: 90px;    margin: -10px 0 0 22px; 
}
hr.hr-2 {
    margin-top: 38px;
}
</style>
<?php  include("footer_2.php");?>
<?php  include("footer.php");?>