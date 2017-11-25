<?php   include("header.php"); ?>
<body>
<?php   include("header_1.php"); ?>
<?php   include("header_menu.php"); 


/**
 * $string  = 'Encoding and Decoding Encrypted PHP Code';
 * $encoded = str_rot13($string);
 * $decoded = str_rot13(str_rot13($string));
 * echo '<br />';
 * echo $encoded ."\n";echo '<br />';
 * echo $decoded;
 * echo '<br />';echo '<br />';echo '<br />';
 * // gzinflate()/gzdeflate() example
 * $string       = 'Encoding and Decoding Encrypted PHP Code';
 * $compressed   = gzdeflate($string);
 * $uncompressed = gzinflate($compressed);echo '<br />';
 * echo $compressed ."\n";echo '<br />';
 * echo $uncompressed;
 */

?>

<?php  if(isset($_GET['title']) AND isset($_GET['key']) AND isset($_GET['isbn10']) AND isset($_GET['isbn13']) OR isset($_GET['catid'])){
    
  $title = urldecode($_GET['title'])  ;  
  $id = urldecode($_GET['key']) ;
  $isbn10 = urldecode($_GET['isbn10']) ;
  $isbn13 = urldecode($_GET['isbn13']) ;  
  $sql = "SELECT * FROM `book_details` WHERE book_id='$id' AND 	`isbn-13`='$isbn13' AND `isbn-10` ='$isbn10' ";
  $mysql_query = mysqli_query($conn,$sql);
  $mysql_query = mysqli_fetch_assoc($mysql_query);
  
?>

<div class="container">
    <div class="col-md-8" >

        <div class="row bookdetails-row" >
                <div class="title-hr-1" ><hr /></div>
                <div class="title-name col-md-6" >Books details</div>
                <div class="title-hr-2 " ><hr /></div>  
                
         </div> 
         <div class="row" >
             <div class="panel" >                    
                    <div class="panel-body">
                        <div class="row" >
                            <div class="col-md-6" >
                           
                           <img src="<?= $mysql_query['book_pic'] ? '/images/book_pics/'.$mysql_query['book_pic'] : $mysql_query['online_pic_url']?>" alt="No image Available" width="350" height="470" />                        
                            </div>
                            <div class="col-md-6 pull-right" >                            
                                <div class="book-tile" ><span></span><strong><?= $mysql_query['name']?></strong></div>  <br />                    
                                <div class="book-Information" ><ins>Book Infomation</ins> :<br /><br />
                                    <div class="book-Information-under">
                                        <div>Author :<span><?= $mysql_query['authors']?></span></div> <br />
                                        <div>Publisher :<span><?= $mysql_query['publisher_name']?></span></div>    <br />
                                        <div>Publish Year:<span><?= $mysql_query['publiction_year']?></span></div>  <br />                             
                                        <div>ISBN-13 :<span><?= $mysql_query['isbn-13']?></span></div><br />
                                        <div>ISBN-10 :<span><?= $mysql_query['isbn-10']?></div> <br />
                                      <!--   <div>Edition :<span><?= $mysql_query['language']?></span></div> <br /> -->
                                        <div>Number of pages :<span><?= $mysql_query['paperback']?></span></div><br />
                                        <div>Language :<span><?= $mysql_query['language']?></span></div>
                                    </div>
                                </div><br />
                                <?php  if((isset($mysql_query['amazon_link']) AND $mysql_query['amazon_link'] != '') OR (isset($mysql_query['flipkart_link']) AND $mysql_query['flipkart_link'] != '' )): ?>
                                <div class="book-price" >Buy Books
                                    <div class="book-price-under">
                                   <?php if(isset($mysql_query['amazon_link']) AND $mysql_query['amazon_link'] != '' ):?><a id="buy-div" target="_blank" href="<?=$mysql_query['amazon_link'] ?>"><div > But At Amazon <img id="buy-img" src="images/Amazon.png" alt="" /></div></a><br /><?php  endif; ?>
                                   <?php if(isset($mysql_query['flipkart_link']) AND $mysql_query['flipkart_link'] != '' ):?><a id="buy-div" target="_blank" href="<?=$mysql_query['flipkart_link']?>"><div> But At Flipkart <img id="buy-img" src="images/flipkart.jpg" alt="" /></a></div><?php  endif; ?>

                                    </div>
                                </div>
                                <?php  endif; ?>
                                    <br />    
                            
                            </div>
                        </div>
                        <div class="row">   <?php if(isset($mysql_query['description']) AND $mysql_query['description'] != ''): ?>
                                            <div class="book-description" ><h2 style="color: #98b827;" id="h2"><ins>Description</ins> :</h2>
                                                        <div class="book-description-under">
                                                      <?= $mysql_query['description']?>
                                                        </div>                                
                                            </div>
                                            <?php endif; ?>
                        
                        </div>
                    </div>
                
             </div>
         </div>   
            
       
                
                                                   
    </div>      
    <div class="col-md-4">

        <?php include"right-side-bar.php"; ?>
                                        

    </div>
</div>
<div class="" ></div><br /><br /><br /><br /><br /><br /><br />
<?php  include("footer_2.php");?>
<?php  include("footer.php");?>
</body>
<style>
img#buy-img {
    width: 21px;
    height: 20px;
}
a#buy-div:hover {
    text-decoration: none;
    font-style: italic;
    font-size: large;
}
a#buy-div {
    color: #27b884;
    text-decoration: none;
    font-style: italic;
}
.book-description-under {
    font-size: 15px;
        color: #574b84;
    font-variant: historical-ligatures;
    text-align: justify;
}

.book-tile {
    margin-left: 0px;
    text-align: left;
    font-size: 21px;
    color: #98b827;
    font-variant: titling-caps;
}  
.title-name.col-md-6 {
    font-size: 22px;
    font-variant: petite-caps;
    font-weight: 600;
    margin-top: -20px;
    padding-left: 33px;
}
.book-Information-under,.book-price-under {
    font-size: 16px;
    color: #2063da;
    font-style: normal;
    margin-left: 19px;
    font-variant: slashed-zero;
    text-align: justify;
}
.book-Information-under>div>span {
    color: rgb(119, 8, 64);
    font-size: 15px;
    font-family: monospace;
}
.book-Information {
    color: #98b827;
    font-size: 26px;
}
.title-hr-2 {
    padding: 0px 0 0px 0;
    border-top: 1px solid #235623;
    margin-bottom: -22px;
    margin-top: 37px;
}
.title-hr-1 {
    padding: 19px 0 0px 0;
    border-top: 1px solid #235623;
    margin-bottom: -37px;
    margin-top: 37px;
}
*,
*:before,
*:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

html, body {
  font-family: 'Merriweather', sans-serif;
}
h3 {
    text-align: center;
    font-weight: 700;
    font-size: 33px;
    color: rgba(179, 99, 97, 0.6);
    text-shadow: 0px 5px 17px #332f2f;
}
hr.style1{
	border-top: 1px solid #8c8b8b;
}
#ty567 {
    background-color: rgba(208, 226, 200, 0.12);
}
#ty567>form {
  max-width: 600px;
  text-align: center;
  margin: 20px auto;
}
#ty567>form input, form textarea {
  border: 0;
  outline: 0;
  padding: 1em;
  -moz-border-radius: 8px;
  -webkit-border-radius: 8px;
  border-radius: 8px;
  display: block;
  width: 100%;
  margin-top: 1em;
  font-family: 'Merriweather', sans-serif;
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  resize: none;
}
#ty567>form input:focus, form textarea:focus {
  -moz-box-shadow: 0 0px 2px #e74c3c !important;
  -webkit-box-shadow: 0 0px 2px #e74c3c !important;
  box-shadow: 0 0px 2px #e74c3c !important;
}
#ty567>form #input-submit {
  color: white;
  background: #e74c3c;
  cursor: pointer;
}
#ty567>form #input-submit:hover {
  -moz-box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
  -webkit-box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
  box-shadow: 0 1px 1px 1px rgba(170, 170, 170, 0.6);
}
#ty567>form textarea {
  height: 126px;
}

.half {
  float: left;
  width: 48%;
  margin-bottom: 1em;
}

.right {
  width: 50%;
}

.left {
  margin-right: 2%;
}

@media (max-width: 480px) {
  .half {
    width: 100%;
    float: none;
    margin-bottom: 0;
  }
}
/* Clearfix */
.cf:before,
.cf:after {
  content: " ";
  /* 1 */
  display: table;
  /* 2 */
}

.cf:after {
  clear: both;
}
</style>
<?php  }else { die();}  ?>