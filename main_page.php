<div class="container">

<div id="main-page-categories-list" class="col-md-3">
    <div id="categories" class="categories">
    <div class="panel panel-default">
                  <div class="panel-heading"><span>Categories</span></div>
                  <div class="panel-body">
                  <?php  
                            $sql2 ="SELECT * FROM `categories` WHERE (`parent_id` IS NULL AND `sub_cat_id` IS NULL) GROUP BY categories.cat_name";
                            $sql2= mysqli_query($conn,$sql2); ?>
                                
                                <?php                              
                                while($row = mysqli_fetch_array($sql2)){  ?>
                                   <div class="list-group list-group-root">                                          
                                          <a href="#item-<?= $cat_id = $row['main_id'];?>" class="list-group-item" data-toggle="collapse">
                                            <i class="glyphicon glyphicon-chevron-right"></i><?=ucwords($row['cat_name']);?>
                                          </a>
                                            <div class="list-group collapse" id="item-<?=$cat_id?>">
                                           <?php 
                                              $sql = "SELECT * FROM `categories` WHERE ( categories.parent_id = $cat_id)";
                                              $sql= mysqli_query($conn,$sql); 
                                              while($row2 = mysqli_fetch_array($sql)){  
                                                
                                                $sql3 = "SELECT * FROM books_plus_categories_and_tags INNER JOIN categories ON categories.main_id = books_plus_categories_and_tags.category_id INNER JOIN book_details ON book_details.book_id = books_plus_categories_and_tags.book_id WHERE ( categories.main_id = ".$row2['main_id'].")";
                                                $sql3= mysqli_query($conn,$sql3);  $row3 = mysqli_fetch_array($sql3); $num_rows = mysqli_num_rows($sql3);
                                                if($sql3):?>                                              
                                              <a href="categories.php?cat=<?= $row2['cat_name']?>&cat_id=<?= $row2['parent_id']?>&main_id=<?= $row2['main_id']?>" class="list-group-item"><?= $row2['cat_name']?><span class="badge"><?=$num_rows?></span> </a><?php else:  ?>                                 
                                            <?php  endif;  } ?>      </div>                                      
                                          
                                   </div>     
                                <?php } ?>
                                
    <style>
    .just-padding {
    padding: 15px;
}

.list-group.list-group-root {
    padding: 0;
    overflow: hidden;
}

.list-group.list-group-root .list-group {
    margin-bottom: 0;
}

.list-group.list-group-root .list-group-item {
    border-radius: 0;
    border-width: 1px 0 0 0;
}

.list-group.list-group-root > .list-group-item:first-child {
    border-top-width: 0;
}

.list-group.list-group-root > .list-group > .list-group-item {
    padding-left: 30px;
}

.list-group.list-group-root > .list-group > .list-group > .list-group-item {
    padding-left: 45px;
}

.list-group-item .glyphicon {
    margin-right: 5px;
}</style>
<script>$(function() {
        
  $('.list-group-item').on('click', function() {
    $('.glyphicon', this)
      .toggleClass('glyphicon-chevron-right')
      .toggleClass('glyphicon-chevron-down');
  });

});</script>

  


                  </div>                      
                  </div>
    </div>
                                
    </div>
    

    <div class="col-md-9" id="padding-left">
            <?php include"display_books_in_main.php" ?>    
    </div>
</div><br /><br /><br /><br />
<style>
div#categories {
    margin-left: -21px;
    margin-top: 18px;
}
img.img-responsive {
    padding: 12px 0px 8px 7px;
    margin: -3px 0 0px -4px;
    height: 249px;
    width: 189px;
}
.title-name {
    margin-top: -14px;
    font-size: 25px;
    font-variant: small-caps;
}
.prev-next {
    margin-top: -14px;
}
.title-hr-2 {
        margin-top: 43px;
}
.allbook:hover {
    border: 1px solid;
    border-color: #0c9023;
}
a.left.carousel-control {
    opacity: 0;
    color: black;
    margin-left: 89%;
    height: 26px;
    width: 19px;
    margin-top: -10px;
}
a.right.carousel-control {
    opacity: 0;
    height: 27px;
    width: 13px;
    margin-top: -11px;
    margin-right: 17px;
}
i.fa.fa-angle-right {
    font-size: 34px;
    color: #8b008b;
    margin-left: -12px;
}
.next>i.fa.fa-angle-left {
    font-size: 34px;
    padding: 0px 22px 0 0px;
    color: #8b008b;
}
.carousel-control 			 { width:  4%; }
.carousel-control.left,.carousel-control.right {margin-left:15px;background-image:none;}
@media (max-width: 767px) {
	.carousel-inner .active.left { left: -100%; }
	.carousel-inner .next        { left:  100%; }
	.carousel-inner .prev		 { left: -100%; }
	.active > div { display:none; }
	.active > div:first-child { display:block; }

}
@media (min-width: 767px) and (max-width: 992px ) {
	.carousel-inner .active.left { left: -50%; }
	.carousel-inner .next        { left:  50%; }
	.carousel-inner .prev		 { left: -50%; }
	.active > div { display:none; }
	.active > div:first-child { display:block; }
	.active > div:first-child + div { display:block; }
}
@media (min-width: 992px ) {
	.carousel-inner .active.left { left: -25%; }
	.carousel-inner .next        { left:  25%; }
	.carousel-inner .prev		 { left: -25%; }	
}


div#padding-left {
    padding-left: 27px;
}
</style>

<script>

           initialise();


function initialise()
{

                    // create event here that needs re-initialising
                                $('.carousel[data-type="multi"] .item').each(function(){
                              var next = $(this).next();
                              if (!next.length) {
                                next = $(this).siblings(':first');
                              }
                              next.children(':first-child').clone().appendTo($(this));  
                              for (var i=0;i<2;i++) {
                                next=next.next();
                                if (!next.length) {
                                	next = $(this).siblings(':first');
                              	}
                                
                                next.children(':first-child').clone().appendTo($(this));
                              }
                            });
                

}
</script>


                                 <?php   echo '<center>';
                                       for($i=1;$i<=$number_of_pages;$i++){?>
                                          <ul class="pagination pagination-sm"><li<?php if($i == $page) { echo ' class="active"'; } ?>><a href="index.php?page=<?= $i ?>"><?=$i?></a></li></ul>    
                                     <?php } echo '</center>';?>  
                                     <style>.pagination>li>a {
                                                      border: 1px solid #98b827;
                                                    }
                                                .pagination>li.active>a {
                                                          background: #98b827;
                                                          color: #fff;
                                                        }