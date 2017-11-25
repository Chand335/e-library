<?php include "header.php";
include "header_menu.php";
   
include "side_menu.php";  ?>
<?php 

if(isset($_POST['submit-save'])) {
        $title_1 = validate_data($_POST['title_1']);
        $title_2 = validate_data($_POST['title_2']);
        $text= validate_data($_POST['text']);
        
    $stmt = "INSERT INTO `about_page`(`title_1`, `title_2`, `text`) VALUES ('$title_1','$title_2','$text')"; 
    if($conn->query($stmt)){
        
        $_SESSION['success'] = '<div class="alert alert-info"><center>Successfully Save.</center></div><br />';
        //header("Refresh:0");
    }else{
        
        $_SESSION['error']  =  '<div class="alert alert-info"><center>unable to save.</center></div><br />';
       // header("Refresh:0");
    }
}
$stmt = "SELECT * FROM `about_page` ORDER BY `about_page`.`id` DESC"; 
$stmt = $conn->query($stmt);
$stmt = mysqli_fetch_array($stmt);

$title_1 = $stmt['title_1'];
$title_2 = $stmt['title_2'];
$text = $stmt['text'];
?>
<div class="row">

    <div class="alert"><center>About Us Page Setup</center></div><br />
    <div class="col-md-10 col-md-offset-1">
        <?php  if(isset($_SESSION['success'])) { echo $_SESSION['success']; unset($_SESSION['success']);}  elseif(isset($_SESSION['error'])) { echo $_SESSION['error'];}  unset($_SESSION['error']);  ?> 
    <form class="form-horizontal" method="post">
    <label class="">Title 1</label><br />
    <textarea name="title_1" class="form-control" rows="2"><?=$title_1?></textarea>
     <label>Title 2</label><br />
     <textarea name="title_2" class="form-control" rows="3"><?=$title_2?></textarea>
     <label>Description</label><br />
     <textarea name="text" class="form-control" rows="8"><?=$text?></textarea><br />
     <button type="submit" name="submit-save" class="btn btn-default btn-lg">Save</button>
     <button type="reset" class="btn btn-default  btn-lg">Reset</button>
     <a href="../about.php"><button type="button" class="btn btn-default  btn-lg">Go to About page</button></a>
     
    </form>
</div>
</div>
<style>.alert {
    color: rgb(255, 255, 255);
    background-color: rgb(63, 160, 31);
    font-size: 20px;
    font-family: sans-serif;
}</style>
<?php  include "footer.php"; mysqli_close($conn); ?>