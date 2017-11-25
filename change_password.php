
<?php   include("header.php"); ?>
<body>
<?php 
if(!isset($_SESSION['user_is_login'])) {
   header("location:index.php");
   exit();
}

 ?>
<?php   include("header_1.php"); ?>

<?php   include("header_menu.php"); ?>


<?php 
$email = base64_decode($_SESSION['user_email']);
$stmt = "SELECT * FROM `users_register` WHERE email='$email' OR username='$email'" ;
$stmt = mysqli_query($conn,$stmt);
$stmt = mysqli_fetch_array($stmt);
?>


<div class="container" >
     <div class="col-md-8" >
    
    </div>
    <div class="col-md-4">

        <?php include"right-side-bar.php"; ?>
                                        

    </div>
</div>

<?php  include("footer_2.php");?>
<?php  include("footer.php");?>
</body>
