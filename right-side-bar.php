 <div  class="side-holder" >  
    <?php
    $sql = "SELECT * FROM `books_plus_categories_and_tags` INNER JOIN `tags` ON  tags.tag_id = books_plus_categories_and_tags.tag_id GROUP BY tags.tag_id ; ";
    $sql2 ="SELECT * FROM `books_plus_categories_and_tags` INNER JOIN `categories` ON  categories.main_id = books_plus_categories_and_tags.category_id  GROUP BY categories.cat_name;";
    $sql = mysqli_query($conn,$sql);
    $sql2= mysqli_query($conn,$sql2);
      ?>                        
                <div class="panel panel-default">
                  <div class="panel-heading"><span>Search</span></div>
                                  <div class="panel-body">
                                        <form class="form-inline" method="post">                                        
                                        <input class="form-control" type="text" name="side_search_bar" placeholder="Type here" />
                                        <button type="submit" name="search-submit-2" class="btn">Search</button>
                                        </form>
                                            <?php 
                                                if(isset($_POST['search-submit-2']) && isset($_POST['side_search_bar']) && !empty($_POST['side_search_bar'])){
                                                   $search =  $_POST['side_search_bar'];
                                                   if(isset($search) && !empty($search)) {  $type = $_COOKIE['type'];  $url = 'yoursearch.php?search='.urlencode($search).'&type='.urlencode($type).'&start=0'; header("location:$url"); }
                                                }
                                             ?>                                        
                                </div>
                </div>
                
                <div class="panel panel-default">
                  <div class="panel-heading"><span>Categories</span></div>
                                  <div class="panel-body">
                                    <ul>                                        
                                    <?php 
                                    while($row = mysqli_fetch_array($sql2)){
                                        echo "<li><a href='categories.php?cat=".$row['cat_name']."&cat_id=".$row['parent_id']."&main_id=".$row['main_id']."'>".ucwords($row['cat_name'])."</a></li>";
                                        
                                    }?>
                                    </ul>
                                </div>
                </div>
                 
                <div class="panel panel-default">
                  <div class="panel-heading"><span>Tags</span></div>
                                  <div id="tag-area" class="panel-body">
                                  <?php   while($row = mysqli_fetch_array($sql)){
                                        echo "<a>".random_str_uptolo($row['tag_title'])."</a>,";                                         
                                    } ?>
                                </div>
                </div>      
      </div>     

<style>
.side-holder {
    padding: 18px 0 0 41px;
}
div#tag-area {
    word-wrap: break-word;
}
#tag-area>a{
    padding: 5px;
}

div.side-holder>div.panel.panel-default{
    background-color: rgba(245, 245, 245, 0.62);
    border: none;
    box-shadow: 11px 8px 2px rgba(0, 0, 0, 0.12);
}

button.btn {
    background-color: rgb(152, 184, 39);
    color: white;
    font-size: 16px;
}

.panel-default > .panel-heading {
background-image: linear-gradient(to bottom, #98b827 0%, #98b827 100%); }
</style>