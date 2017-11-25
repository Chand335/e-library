<?php  ini_set('session.save_path',$_SERVER["DOCUMENT_ROOT"].'/e-library/not_for_world');
//Load the database configuration file
include 'config.php';
session_start();
//Convert JSON data into PHP variable
$userData = json_decode($_POST['userData']);
if(!empty($userData)){
    $oauth_provider = $_POST['oauth_provider'];
    //Check whether user data already exists in database
    $prevQuery = "SELECT * FROM `users_register` WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$userData->id."'";
    $prevResult = $conn->query($prevQuery);
    echo mysqli_error($conn);
    $name = $userData->name;
    $birthday = $userData->birthday;  $birthday = date('Y-m-d', strtotime($birthday));
    $oauth_uid = $userData->id;  
    $email = $userData->email;  
    $username = explode('@',$email); $username = $username[0];
    $gender = $userData->gender;
    $user_pic = $userData->picture->data->url;
    $link = $userData->link;
    $create_date = date("Y-m-d H:i:s");
    $modify_date = date("Y-m-d H:i:s");
    
    
       
    if($prevResult->num_rows > 0){ 
        //Update user data if already exists
        $query = "UPDATE `users_register` SET name = '$name', email = '$email', gender = '$gender',`date_of_birth` = '$birthday',user_pic = '$user_pic', link = '$link', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$userData->id."'";
        $update = $conn->query($query);
        $prevResult = mysqli_fetch_array($prevResult);
        $_SESSION['user_is_login'] = TRUE;  
        $_SESSION['db_user_id'] = $prevResult['id'];
        $_SESSION['user_email']=  base64_encode($email);
        echo mysqli_error($conn);
    }else{
        //Insert user data
        $query = "INSERT INTO `users_register`(`name`, `username`, `oauth_provider`,`oauth_uid`, `email`, `gender`,`date_of_birth` ,`password`, `link`, `user_pic`,`fill_full_details`, `created`, `modified`) 
        VALUES ('$name','$username','$oauth_provider','$oauth_uid','$email','$gender', '$birthday' ,'NULL','$link','$user_pic','N','$create_date','$modify_date')";
        $insert = $conn->query($query);
         $_SESSION['db_user_id'] =  mysqli_insert_id($conn);
        $_SESSION['user_is_login'] = TRUE;         
        $_SESSION['user_email']=  base64_encode($email);
        echo mysqli_error($conn);
    }
}

mysqli_close($conn);
?>