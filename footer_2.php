    <div id="social-menu-div" class="col-md-12"> 
       
            <div id="social-footer-icon" class="text-left col-md-6">
             <div id="shareIcons"></div> 
                            <script>$("#shareIcons").jsSocials("refresh");$("#shareIcons").jsSocials({
                                showLabel: false,
                                showCount: true,
                                shareIn : "popup",
                                shares: ["facebook", "googleplus","email", "linkedin", "pinterest","twitter"]});</script>

            </div>
            <div id="footer-menu" class="col-md-6">
            <a href="index.php" >Home</a><a href="about.php" >About</a><a href="contactus.php" >Contact Us</a>
            </div>
    </div>
    <style>
    #social-menu-div{
      background: #282828;  
      padding: 16px 66px 16px;
    }
    #footer-menu{
        text-align: right;        
    }
    #footer-menu>a{
    padding-right: 20px;
    text-decoration: none;
    font-size: 20px;
    font-family:  Times, serif;
    font-weight: lighter;
    font-variant: additional-ligatures;  
    color: whitesmoke;      
    }
#social-footer-icon>a{
    color: rgba(175, 174, 170, 0.85);
    background-color: rgba(37, 32, 32, 0.94);
    font-size: 11px;
}
.jssocials-share-facebook .jssocials-share-link {
     background: #252020;
}
.jssocials-share-googleplus .jssocials-share-link {
     background: #252020;
}
.jssocials-share-linkedin .jssocials-share-link {
     background: #252020;
}
.jssocials-share-pinterest .jssocials-share-link {
    background: #252020;
}
.jssocials-share-twitter .jssocials-share-link {
    background: #252020;
}
.jssocials-share-email .jssocials-share-link {
    background: #252020;
}
.jssocials-share-facebook .jssocials-share-link:hover {
    background: #3b5998;
}
.jssocials-share-googleplus .jssocials-share-link:hover {
    background: #dd4b39;
}
.jssocials-share-linkedin .jssocials-share-link:hover {
    background: #007bb6;
}
.jssocials-share-pinterest .jssocials-share-link:hover {
    background: #cb2027;
}
.jssocials-share-twitter .jssocials-share-link:hover {
    background: #00aced;
}
.jssocials-share-email .jssocials-share-link:hover {
    background: #3490F3;
}
.jssocials-share {
    display: inline-grid;
    vertical-align: top;
    margin: 0.1em 0.3em 0.2em 0;
    font-size: 0.9em;
}
    
    </style>
<div id="footer1" class="containers">
        <div class="col-md-12">
            <div class="col-md-4">
                <h2 class="custom-sidebar-title footer-title-color cp-title">Top rated Books</h2>
                <hr />
                <ol>
                <?php                 
              //  if(!isset($_SESSION['rand_id'])){ $_SESSION['rand_id'] = rand();  } else { $_SESSION['rand_id'] = $_SESSION['rand_id']; }           
                $sql = "SELECT `name`,`isbn-13`,`isbn-10`,`book_pic`,`online_pic_url` FROM `book_details` limit 5 offset 20"; $sql = $conn->query($sql);
                while($row  = mysqli_fetch_array($sql)) {  ?>    
                                        <a href="#" id="top" class="thumbnail">
                                            <div>
                                                <img src="<?=($row['book_pic'] ==='' OR $row['book_pic'] === null )?$row['online_pic_url'] :'../images/books_pics/'.$row['book_pic']?>" width="50px" style="margin-top: 8px;" height="50px" alt="thumbnail" />
                                            </div>
                                            <div id="ff1256" class="col-md-">                                              
                                                <?php echo $row['name']; ?>                                             
                                            </div>
                                        </a>
                                    
                         
                            
                      <?php } ?>
                              <style>
a.thumbnail{
    display: inline-flex;
        float: left;
    margin: 5%;
}
a.thumbnail div>img{
    height:50px;
    width:50px;
}

a.thumbnail div:last-child{
    margin-top: 5px;
}

</style>
         <style>
#footer1{
overflow: hidden;
background-color: #393933;
color: whitesmoke;    
padding: 21px 51px 66px;
font-family:  Times, serif;
}


</style>       </ol>

            
            </div>       
            <div class="col-md-4">
                <h2 class="custom-sidebar-title footer-title-color cp-title">Top rated Books</h2>
                <hr />
                <ol>
                <?php                 
              //  if(!isset($_SESSION['rand_id'])){ $_SESSION['rand_id'] = rand();  } else { $_SESSION['rand_id'] = $_SESSION['rand_id']; }           
                $sql = "SELECT `name`,`isbn-13`,`isbn-10`,`book_pic`,`online_pic_url` FROM `book_details` limit 5 offset 20"; $sql = $conn->query($sql);
                while($row  = mysqli_fetch_array($sql)) {  ?>    
                                        <a href="#" id="top" class="thumbnail">
                                            <div>
                                                <img src="<?=($row['book_pic'] ==='' OR $row['book_pic'] === null )?$row['online_pic_url'] :'../images/books_pics/'.$row['book_pic']?>" width="50px" style="margin-top: 8px;" height="50px" alt="thumbnail" />
                                            </div>
                                            <div id="ff1256" class="col-md-">                                              
                                                <?php echo $row['name']; ?>                                             
                                            </div>
                                        </a>
                                    
                         
                            
                      <?php } ?>
<style>
a#top {
margin-bottom: 0px;
    width: 68%;
    height: 73px;
}
a.thumbnail{
    display: inline-flex;
        float: left;
    margin: 5%;
}
a.thumbnail div>img{
    height:50px;
    width:50px;
}

a.thumbnail div:last-child{
    margin-top: 5px;
}
</style>
            </ol>            
            </div>  
            <div class="col-md-4">
                <h2 class="custom-sidebar-title footer-title-color cp-title">Popular Books</h2>
                <hr />
                <ol>
                <?php                 
              //  if(!isset($_SESSION['rand_id'])){ $_SESSION['rand_id'] = rand();  } else { $_SESSION['rand_id'] = $_SESSION['rand_id']; }           
                $sql = "SELECT `name`,`isbn-13`,`isbn-10`,`book_pic`,`online_pic_url` FROM `book_details` limit 5 offset 21"; $sql = $conn->query($sql);
                while($row  = mysqli_fetch_array($sql)) {  ?>    
                                        <a href="#" id="top" class="thumbnail">
                                            <div>
                                                <img src="<?=($row['book_pic'] ==='' OR $row['book_pic'] === null )?$row['online_pic_url'] :'../images/books_pics/'.$row['book_pic']?>" width="50px" style="margin-top: 8px;" height="50px" alt="thumbnail" />
                                            </div>
                                            <div id="ff1256" class="col-md-">                                              
                                                <?php echo $row['name']; ?>                                             
                                            </div>
                                        </a>
                                    
                         
                            
                      <?php } ?>
                              <style>
                              div#ff1256 {
    margin-left: 12px;
}
a.thumbnail{
    display: inline-flex;
        float: left;
    margin: 5%;
}
a.thumbnail div>img{
    height:50px;
    width:50px;
}

a.thumbnail div:last-child{
    margin-top: 5px;
}
</style>
                </ol>

            
            </div>  
        </div>
</div>
<section class="social-ico-bar">
        <section class="container">
                <section class="row-fluid">
                        <article class="span6 copy-left">Copyright &copy <?php echo date('Y');  ?>. <span>Designed by Tushar.</span>
                                <article class="span6 copy-right">                    
                        </article>
                </section>
        </section>
</section>