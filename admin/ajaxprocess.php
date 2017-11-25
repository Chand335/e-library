<?php  
ini_set('session.save_path',$_SERVER["DOCUMENT_ROOT"].'/not_for_world');
include_once "../config.php";
session_start();
function validate_data($data)
 {
  global $conn;
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($conn,$data);
  return $data;    
 }
 function random_str($length,$keyspace = 'qwertyuiopasdfgnmABCDEFGH012hjklzxcvb3456789IJKLMNOPQRSTUVWXYZ')
	{
        			$str = '';
        			$max = mb_strlen($keyspace, '8bit') - 1;
        			for ($i = 0; $i < $length; ++$i) {
        				$str .= $keyspace[random_int(0, $max)];
        			}
        			return $str;
    }
    
 if(isset($_POST['query3'])){
    $tag = $_POST['query3'];
   	$sql = "SELECT cat_name,main_id FROM `categories` WHERE `cat_name` LIKE '%$tag%'"; 

	$result = $conn->query($sql);

	$json = [];
	while($row = mysqli_fetch_assoc($result)){
	     $json[] = strtolower($row['cat_name']);
	}

	echo json_encode($json);
}

if(isset($_POST['query2'])){
    $tag = $_POST['query2'];
   	$sql = "SELECT `tag_title` FROM tags 
			WHERE `tag_title` LIKE '%$tag%'
			LIMIT 5"; 

	$result = $conn->query($sql);

	$json = [];
	while($row = mysqli_fetch_assoc($result)){
	     $json[] = $row['tag_title'];
	}

	echo json_encode($json);
}
if(isset($_POST['query'])){
    $tag = $_POST['query'];
   	$sql = "SELECT `tag_title` FROM tags 
			WHERE `tag_title` LIKE '%$tag%'
			LIMIT 5"; 

	$result = $conn->query($sql);

	$json = [];
	while($row = mysqli_fetch_assoc($result)){
	     $json[] = $row['tag_title'];
	}

	echo json_encode($json);
}


if(isset($_POST['book_update'])){
        if($_POST['book_update'] === 'book_update'){
           // error_reporting(0);
                    $name =  validate_data($_POST['name']);
                    //$category_id =  validate_data($_POST['category_id']);
                    $isbn_10 =  validate_data($_POST['isbn_10']);
                    $isbn_13 =  validate_data($_POST['isbn_13']); $isbn_13 = str_replace(["-", "–"], '', $isbn_13);
                    $author =  validate_data($_POST['author']);
                    $language =  validate_data($_POST['language']);
                    $Publisher_name =  validate_data($_POST['Publisher_name']);
                    $other_category =  validate_data($_POST['other_category']);
                    $Paperback =  validate_data($_POST['Paperback']);
                    $Publisher_url =  validate_data($_POST['Publisher_url']);
                    $Publisher_year =  validate_data($_POST['Publisher_year']);
                    $Description =  validate_data($_POST['Description']);
                    $tags =  $_POST['tags'];  
                    if(isset($_FILES['file_upload']) OR isset($_FILES['photo_upload'])) {
                    $imgFile_photo = $_FILES['photo_upload']['name'];
                    $tmp_dir_photo = $_FILES['photo_upload']['tmp_name'];
                    $imgSize_photo = $_FILES['photo_upload']['size'];                    
                     $File = $_FILES['file_upload']['name'];
                     $tmp_dir_file = $_FILES['file_upload']['tmp_name'];
                     $FileSize = $_FILES['file_upload']['size'];
                          
                            $upload_dir = "../images/books_pics/"; 
                            $upload_dir2 = "../book_files/"; 
     			            $imgExt_photo = strtolower(pathinfo($imgFile_photo,PATHINFO_EXTENSION));                            
                            $imgExt_photo=str_replace(' ','-',$imgExt_photo);
                            $imgExt_photo=str_replace('.','-',$imgExt_photo);
                            $File = strtolower(pathinfo($File,PATHINFO_EXTENSION));
                            $File=str_replace(' ','-',$File);
                            $File=str_replace('.','-',$File);
                            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                            $bookpic =random_str(100).".".$imgExt_photo;
                            $File =random_str(100).".".$File;
                            if(in_array($imgExt_photo, $valid_extensions) OR in_array($File) ){	
                            					move_uploaded_file($tmp_dir_photo,$upload_dir.$bookpic);
                                                move_uploaded_file($tmp_dir_file,$upload_dir2.$File);
                            				}
                            				
                         }   			                            
                       
                   if (empty($name) AND empty($isbn_10) AND empty($isbn_13) AND empty($imgFile_photo) ){ echo "<div class='alert alert-danger' role='alert'>Please Enter values</div><br />" ;}else {
                        
                    $sql = "SELECT * FROM `book_details` ";
                    $sql = $conn->query($sql); 
                    $sql = mysqli_fetch_array($sql);
                                   if( $sql['isbn-10'] === $isbn_10 OR  $sql['isbn-13'] === $isbn_13  OR $sql['name'] === $name ){
                                    echo '<div class="alert alert-success" role="alert">May be Boook is already enter.</div>';
                                   }else {
                                  
                   $sql = "UPDATE `book_details` SET `book_id`=[value-1],`name`=[value-2],`isbn-13`=[value-3],`isbn-10`=[value-4],`authors`=[value-5],`language`=[value-6],`publisher_name`=[value-7],`publisher_url`=[value-8],`publiction_year`=[value-9],`paperback`=[value-10],`description`=[value-11],`book_files`=[value-12],`book_pic`=[value-13],`categories_id`=[value-14],`tags`=[value-15] WHERE "; 
                   $sql = $conn->query($sql); 
                   }
                   
                   if($sql){
                   echo '<div class="alert alert-success" role="alert">New Book is added sucessfully</div>';
                   }else{
                    echo mysqli_error($conn);
                   }    }            

    }
}




if(isset($_POST['add_new'])){
        if($_POST['add_new'] === 'book_insert'){
            error_reporting(0);
                    $name =  validate_data($_POST['name']);
                    $category_id =  validate_data($_POST['category_id']);  
                    $isbn_10 =  validate_data($_POST['isbn_10']);
                    $photo_upload_url =  validate_data($_POST['photo_upload_url']);
                    $isbn_13 =  validate_data($_POST['isbn_13']);
                    $author =  validate_data($_POST['author']);
                    $flipkart_link =  validate_data($_POST['flipkart_link']);
                    $amazon_link =  validate_data($_POST['amazon_link']);
                    $language =  validate_data($_POST['language']);
                    $Publisher_name =  validate_data($_POST['Publisher_name']);
                    $Paperback =  validate_data($_POST['Paperback']);
                    $Publisher_url =  validate_data($_POST['Publisher_url']);
                    $Publisher_year =  validate_data($_POST['Publisher_year']);
                    $Description =  validate_data($_POST['Description']);
                    $tags =  validate_data($_POST['tags']);  $tags=preg_replace('/\s+/', '', $tags);                                                                                  
                    $imgFile_photo = $_FILES['photo_upload']['name'];
                    $tmp_dir_photo = $_FILES['photo_upload']['tmp_name'];
                    $imgSize_photo = $_FILES['photo_upload']['size'];                    
                    $File = $_FILES['file_upload']['name'];
                    $tmp_dir_file = $_FILES['file_upload']['tmp_name'];
                    $FileSize = $_FILES['file_upload']['size'];
                         
                         if($category_id === '') { echo '<div class="alert alert-danger" role="alert">Please Select any category</div>';  }
                         elseif(empty($name) OR empty($isbn_10) OR empty($isbn_13) OR empty($tags) OR $tags = ''  OR empty($imgFile_photo) AND empty($photo_upload_url) ){  echo '<div class="alert alert-warning" role="alert">Please Enter <span id="star-mark">*</span> mark values</div>';  }                          
                         else {
                            $st = "SELECT * FROM `book_details` WHERE `name` = '$name' AND  `isbn-10` = '$isbn_10' AND `isbn-13` = '$isbn_13'";
                            $result = mysqli_query($conn, $st);
                            if(mysqli_num_rows($result) > 0){
                                echo '<div class="alert alert-warning" role="alert">Book is already available</div>';
                            }else{
     
                                                                                         if(isset($imgFile_photo)) {             
                                                                                                        $upload_dir = "../images/books_pics/";                                                                                                         
                                                                                 			            $imgExt_photo = strtolower(pathinfo($imgFile_photo,PATHINFO_EXTENSION));                            
                                                                                                        $imgExt_photo=str_replace(' ','-',$imgExt_photo);
                                                                                                        $imgExt_photo=str_replace('.','-',$imgExt_photo);
                                                                                                        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                                                                                                        $bookpic =random_str(100).".".$imgExt_photo;
                                                                                                        
                                                                                                        if(in_array($imgExt_photo, $valid_extensions) OR in_array($File) ){	
                                                                                                        					move_uploaded_file($tmp_dir_photo,$upload_dir.$bookpic);
                                                                                                                           
                                                                                                        				}
                                                                                                        				
                                                                                                      }
                                                                                         if(isset($File)) {   
                                                                                                      $upload_dir2 = "../book_files/"; 
                                                                                                        $File = strtolower(pathinfo($File,PATHINFO_EXTENSION));
                                                                                                        $File=str_replace(' ','-',$File);
                                                                                                        $File=str_replace('.','-',$File);
                                                                                                        $File =random_str(100).".".$File;
                                                                                                        if(in_array($File) ){ move_uploaded_file($tmp_dir_file,$upload_dir2.$File);	 } }
                                                                                                        
                                    $tags = explode( ',', $tags );  $tag_array = array();
                                    foreach($tags as $tags_row){  
                                   $tags_row =   strtolower($tags_row);
                                   $sql_tag = "INSERT IGNORE INTO `tags`(`tag_title`) VALUES ('$tags_row')";mysqli_query($conn, $sql_tag);  
                                   $select_sql = "SELECT `tag_id`, `tag_title` FROM `tags` WHERE `tag_title` = '$tags_row'";
                                   $result_tag = mysqli_query($conn, $select_sql); $result_tag = mysqli_fetch_array($result_tag);
                                   $tag_array[] = $result_tag['tag_id'];
                                   } $array =  implode(',', $tag_array);$array =  explode(',', $array);                                                                                               
                                   $count_array =    count($array);
                                                                   /// die();                                                                   
                                $stmt = "INSERT INTO `book_details`(`name`, `isbn-13`, `isbn-10`, `authors`, `language`,`amazon_link`, `publisher_name`,`flipkart_link`, `publisher_url`,`online_pic_url`, `publiction_year`, `paperback`, `description`, `book_files`, `book_pic`)
                                         VALUES ('$name','$isbn_13','$isbn_10','$author','$language','$amazon_link','$Publisher_name','$flipkart_link','$Publisher_url','$photo_upload_url' ,'$Publisher_year','$Paperback','$Description','$File','$bookpic')";
                                $result = mysqli_query($conn, $stmt);
                                $last_id = mysqli_insert_id($conn); echo '<br /><br />';
                                            if($last_id > 0 ){ 
                                                $category_id = explode( ',', $category_id );
                                                for($j=1 ;$j<=$count_array;$j++)  {                                              
                                                foreach($category_id as $category_id_row){                                    
                                                                        $stmt = "INSERT INTO `books_plus_categories_and_tags`(`book_id`, `category_id` , `tag_id`) VALUES ('$last_id','$category_id_row' ,'$j')";
                                                                        $result2 = mysqli_query($conn, $stmt);
                                                                       // echo '<br /><br />';
                                                                       // echo $conn->error;
                                                                        }
                                            }
                                               foreach($array as $tags_row){     
                                                                        //echo '<br />'.$tags_row.'<br />';
                                                                        $stmt = "UPDATE IGNORE `books_plus_categories_and_tags` SET `tag_id`= '$tags_row' WHERE book_id = '$last_id'";
                                                                        $result3 = mysqli_query($conn, $stmt);
                                                                        // echo '<br /><br />';
                                                                        // echo $conn->error;
                                                                        }
                                            
                                            
                                            
                                            }
                                
                                    if($result AND $result2 AND $result3) { echo '<div id="success-of-book" class="alert alert-success" role="alert">Book is Successfully Added.</div>'; }else {  echo mysqli_error($conn);}
                                
                                }
                         }

    }
}


if (isset($_POST['notification']))
{
           if($_POST['notification'] === "show-notification"){
                $sql="UPDATE comments SET status=1 WHERE status=0";	
                $result=mysqli_query($conn, $sql);
                
                $sql="select * from comments ORDER BY id DESC limit 5";
                $result=mysqli_query($conn, $sql);
                
                $response='';
                while($row=mysqli_fetch_array($result)) {
                	$response = $response . "<div class='notification-item pull-left'>" .
                	"<div class='notification-subject pull-left'>". $row["subject"] . "</div><br />" . 
                	"<div class='notification-comment pull-left'>" . $row["comment"]  . "</div>" .
                	"</div>";
                }
                if(!empty($response)) {
                	print $response;
                }
        
        }

        
        if($_POST['notification'] === "count-notification"){
        $count=0;
        $sql2="SELECT * FROM comments WHERE status = 0";
        $result=mysqli_query($conn, $sql2);
        $count=mysqli_num_rows($result); 
        if($count != 0) { print $count;  }
        }

}


    if(isset($_POST['value'])){        
        $value = $_POST['value'];
        
        $sql = "SELECT * FROM `categories` WHERE (`parent_id` = $value AND `sub_cat_id` IS NULL)";
        $sub_category = $conn->query($sql);
        echo '<option >---Select One---</option>';
        while($row = mysqli_fetch_array($sub_category))
                    {
                        echo '<option value='.$row['main_id'].'>'.$row['cat_name'].'</option>';
                    } 
    
    
    
    }
    
    
if(isset($_POST['action'])){
            if($_POST['action'] == 'update_time'){
                $user_login_id = $_SESSION['user_login_id'];
                //echo '<pre>'.print_r($_SESSION).'</pre>';
                 $session    = session_id();
                 $user_id = $_SESSION['db_user_id'];
                 $stmt = "SELECT * FROM `current_active_users`";
                 $stmt = mysqli_query($conn,$stmt);
                 $number_of_results = mysqli_num_rows($stmt);
                if($number_of_results > 0) {  
                            $stmt = "UPDATE `current_active_users` SET `last_active`= NOW() , user_session_value = '$session'  WHERE user_login_id = $user_login_id";
                            mysqli_query($conn,$stmt);                
                
                }   
                
                }    
  }  
  
  
   if(isset($_POST['action'])){ 
                    if($_POST['action'] == 'show_time'){    
                    $stmt = "SELECT * FROM `current_active_users` INNER JOIN `users_register` ON users_register.id = current_active_users.user_id WHERE last_active > DATE_SUB(NOW(), INTERVAL 8 SECOND ) ORDER BY `current_active_users`.`user_login_id` ASC";
                    $stmt = mysqli_query($conn,$stmt);
                    $number_of_results = mysqli_num_rows($stmt);     
                    if($number_of_results > 0) {   
                             $sql = "DELETE FROM `current_active_users`  WHERE last_active < DATE_SUB(NOW(), INTERVAL 50 SECOND)"; 
                             mysqli_query($conn,$sql); 
                        //$stmt = mysqli_fetch_array($stmt);
                        echo ' <div class="panel panel-default">
                                                    <div class="panel-heading"> <span style="color:#504BAE; text-align:left;">No of user Online :  <strong>'.$number_of_results.'</strong></span></div>
                                                    <div class="panel-body">';
                        echo '
                        <div class="table-responsive">
                        <table class="table table-responsive table-striped table-condensed table-hover table-bordered">
                        
                        <thead class="">
                        <tr><th>User ID<br /><small>In database</small></th><th>Name</th><th>Username</th><th>E-mail</th><th>Image</th></tr>
                        </thead>';
                        while($row2  = mysqli_fetch_array($stmt)){
                       echo '
                        <tbody>
                        <tr><td>'.$row2['id'].'</td><td>'.$row2['name'].'</td><td>'.$row2['username'].'</td><td>'.$row2['email'].'</td><td><img src="../images/user_profile_photo/'.$row2['user_pic'].'" class="img-thumbnail" alt="No Photo" style="width:50px;height:50px;"></td></tr>
                        </tbody>
                        ';
                        }
                        echo '
                        </table>
                        </div></div></div>';
                        
                        }else {
                        echo "<div class='alert alert-danger'>No User Active at Now !</div>";
                        
                    } } 
    
    }
 
 
 if(isset($_GET['term']) && isset($_GET['type'])) {
    $search = validate_data($_GET['term']); 
    $type= validate_data($_GET['type']);
    $search = str_replace(' ', '', $search); 
    if($search != ''):  
    
        if($type === 'Any'): 
           $sql = "SELECT DISTINCT `name`,`isbn-13`,`isbn-10`,`publisher_name`,`publiction_year`,`authors` FROM book_details WHERE (`name` LIKE '%$search%' OR  `isbn-13` LIKE '%$search%' OR  `isbn-10` LIKE '%$search%' OR `authors`LIKE '%$search%' OR  `publisher_name` LIKE '%$search%' ) GROUP BY `name` LIMIT 15";
        elseif($type === 'title'): 
           $sql = "SELECT DISTINCT `name` FROM book_details WHERE (`name` LIKE '%$search%' )  GROUP BY `name` LIMIT 15";
        elseif($type === 'author'): 
           $sql = "SELECT DISTINCT `authors` FROM book_details WHERE (`authors`LIKE '%$search%' )  GROUP BY `authors` LIMIT 15";
        elseif($type === 'isbn'): 
           $sql = "SELECT DISTINCT `isbn-13`,`isbn-10` FROM book_details WHERE (`isbn-13` LIKE '%$search%' OR  `isbn-10` LIKE '%$search%' )  GROUP BY `isbn-13` LIMIT 8";
       endif;
       
       $result = $conn->query($sql); 
	   $json = [];
        	while($row = mysqli_fetch_assoc($result)){
        	   if(is_numeric($search)) {$json[] =  $row['isbn-13'];$json[] =  $row['isbn-10'];  }
               
               elseif(ctype_alnum($search)) {  
                
                       if($type === 'Any'): 
                        
                            $json[] = $row['name']; 
                            
                        elseif($type === 'title'): 
                                
                               if(ctype_alnum($search)): $json[] = $row['name']; endif;
                                
                        elseif($type === 'author'): 
                           
                                $json[] = $row['authors']; 
                        
                       endif;
               
               
               }
        	}

	echo  json_encode($json);

    
    
    endif;

 }
 mysqli_close($conn);        
?>