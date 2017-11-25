<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<style>
li.active { 
    background-color: #E9E2E2;
}
#header-navbar {
    width: 100%;
    height: 100%;
    text-align: left;
    padding: 0px 75px 0px;
    background-color: rgba(37, 36, 36, 0.04);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

#header-menu {    
    z-index: 1;
    padding-top: 3%;
    padding-bottom: 3%;
    margin-bottom: 1%;
    background: url(images/header-bg.jpg) repeat;
    border-top: 1px solid rgba(37,36,36,0.1);    

}
.nav.navbar-nav{
    cursor: pointer;
}
.nav.navbar-nav>li:hover{
    cursor: pointer;
    background-color: rgba(31, 31, 30, 0.22);
    -webkit-transition: background 2s;
    font-family: sans-serif;
    border-bottom-width: 2px;
    border-bottom-color: #b11616;
    border-bottom-style: solid;
    font-size: 16px;

}
.nav.navbar-nav>li>a:hover{
    cursor: pointer;
    background-color: rgba(31, 31, 30, 0.22);
    -webkit-transition: background 50000s;
}
ul.dropdown-menu>li:hover {
    cursor: pointer;
    background-color: rgba(31, 31, 30, 0.22);
    -webkit-transition: background 5s;
}
.navbar-nav > li {
    float: left;
    padding: 0px 7px 0px;
    font-family: sans-serif;
    font-size:15px;
}
.navbar-brand, .navbar-nav > li > a {
        padding: 32px 12px 27px;
}
#header-navbar.affix-top {
   position: absolute;
   top:0;
   left:0;
   z-index:10;
   background-color:transparent;
   border:0;
}

#header-navbar.affix {
   position: fixed;
   top: 0;
   z-index:10;
   -webkit-transition: all .8s ease-in-out;
}
</style>
    <div id="header-menu" class="col-md-12 col-lg-12">    
            <nav id="header-navbar" class="navbar  navbar-static-top" > <!---  data-spy="affix" data-offset-top="310"  -->
                    <div class="container-fluid">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand visible-sm visible-xs">Home</a>
                      </div>
                      <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                          <li class="<?= ($activePage == 'index') ? 'active':''; ?>"><a href="index.php">Home</a></li>
                          <li class="<?= ($activePage == 'about') ? 'active':''; ?>" ><a href="about.php">About</a></li>
                          <li class="<?= ($activePage == 'contactus') ? 'active':''; ?>"><a href="contactus.php">Contact</a></li>

                        </ul>
                      </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                  </nav>
        
        </div>

