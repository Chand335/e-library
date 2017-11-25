  <!-- I was motivated to create this after seeing BhaumikPatel's http://bootsnipp.com/snippets/featured/accordion-menu; I adapted it to a list format rather than a table so that it would be easy to create a nav toggle button when viewed on mobile devices -->
<div class="col-md-3 col-sm-4 col-xs-3">
  <div id="sidenav1">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sideNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    </div>
    <div class="collapse navbar-collapse" id="sideNavbar">
      <div class="panel-group" id="accordion">
        <div class="panel  ">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="admin_home.php"><span class="glyphicon glyphicon-home"></span>Active Users</a> </h4>
          </div>
        </div>
        <div class="panel  ">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-book"> </span>Categories<span class="caret"></span></a> </h4>
          </div>
          <!-- Note: By adding "in" after "collapse", it starts with that particular panel open by default; remove if you want them all collapsed by default --> 
          <div id="collapseOne" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="navlink2"><a href="listofcategories.php"><span class="glyphicon glyphicon-book"></span>List of Categories</a></li>
              <li><a href="createnewcatories.php" class="navlink">Create New Categories</a></li>
              <li><a href="updatecatories.php" class="navlink">Update Categories Names</a></li>
            </ul>
          </div>
        </div>
        <div class="panel  ">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-cog"> </span>Register Users<span class="caret"></span></a> </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="navlink2"><a href="listofalluser.php" class="navlink"><span class="glyphicon glyphicon-cog"></span>List of Users</a></li>
              <li><a href="" class="navlink">Create User as Admin</a></li>
              <li><a href="" class="navlink">Set Roles for others Admin</a></li>
            </ul>
          </div>
        </div>
        <div class="panel  ">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-calendar"> </span>Books<span class="caret"></span></a> </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="navlink2"><a href="listofallbook.php"><span class=""></span>List of all Books</a></li>
              <li><a href="addnewbook.php" class="navlink">Add new Books</a></li>
              
              
            </ul>
          </div>
        </div>
        <div class="panel  ">
          <div class="panel-heading">
            <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-user"></span>Others<span class="caret"></span></a></h4>
          </div>
          <div id="collapseFive" class="panel-collapse collapse">
            <ul class="list-group">
              <li><a href="createnewphppage.php" class="navlink">Add New Page</a></li>
              <li><a href="about_update_section.php" class="navlink">Update About Section</a></li>
              <li><a href="" class="navlink">Add & update Semester</a></li>
              <li><a href="" class="navlink">Open a file</a></li>
              <li><a href="" class="navlink">Create new tags</a></li>
              <li><a href="" class="navlink"></a></li>
            </ul>
          </div>
        </div>
        <!-- This is in case you want to add additional links that will only show once the Nav button is engaged; delete if you don't need -->
        <div class="menu-hide">
          <div class="panel  ">
            <div class="panel-heading">
              <h4 class="panel-title"><a href=""><span class="glyphicon glyphicon-new-window"></span>External Link</a> </h4>
            </div>
          </div>
          <div class="panel  ">
            <div class="panel-heading">
              <h4 class="panel-title"><a href=""><span class="glyphicon glyphicon-new-window"></span>External Link</a> </h4>
            </div>
          </div>
        </div>
        <!-- end hidden Menu items --> 
      </div>
    </div>
  </div>
</div>
<style>/********* SIDE NAV BAR ***********/
div#sidenav1 {
    margin: 22px 63px 0px -14px;
    height: 100%;
}
a {
color:#000;
}

li {
list-style:none;
} 

.panel-heading {
    color: #fff;
    background-color: #00436a;
    border-color: #ddd;
}

.panel-group .panel+.panel {
    margin-top: 0px;
}
.panel-group {
	margin-top: 35px;
}
.panel-collapse {
	background-color:rgba(220, 213, 172, 0.5);
}

.glyphicon { 
margin-right:10px; 
}


ul.list-group {
	margin:0px;
}

ul.bulletlist li {
	list-style:disc;
}


ul.list-group  li a {
 display:block;
 padding:5px 0px 5px 15px;
 text-decoration:none;
}

ul.list-group li {
	border-bottom: 1px dotted rgba(0,0,0,0.2);
}
	.panel-group .panel+.panel {
    margin-top: 0px;
}

ul.list-group  li a:hover, ul li a:focus {
 color:#fff;
 background-color: #00436a;
}

.panel-title a:hover,
.panel-title a:active,
.panel-title a:focus,
.panel-title .open a:hover,
.panel-title .open a:active,
.panel-title .open a:focus
 {
	text-decoration:none;
	color:#fff;
}

.panel-title>.small, .panel-title>.small>a, .panel-title>a, .panel-title>small, .panel-title>small>a {
        display: block;
}

@media (min-width: 768px){
.navbar-collapse.collapse 
	{
    display: block!important;
    height: auto!important;
    padding-bottom: 0;
    overflow: visible!important;
	padding-left:0px; 
}
}

@media (min-width: 992px){
.menu-hide {
    display: none;
}

}
.menu-hide>.panel-heading {
    color: #fff;
    background-color: #8e8c8c;
    border-color: #ddd;
}

/********** END SIDEBAR *************/

/********** NAVBAR TOGGLE *************/

.navbar-toggle .icon-bar {
    background-color: #fff;
}
.navbar-toggle {
    padding: 11px 10px;
    margin-top: 8px;
    margin-right: 15px;
    margin-bottom: 8px;
    background-color: #a32638;
    border-radius: 0px;
}

/********** END NAVBAR TOGGLE *************/
#right-display-area{
    margin: 76px 0px 0 -72px;
}
</style>
<div id="right-display-area" class="col-md-9 col-sm-4 col-xs-9">