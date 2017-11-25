<?php include "header.php";
include "header_menu.php";

include "side_menu.php"; 


$stmt ="SELECT `id`, `name`, `username`, `email`, `is_admin`, `user_pic`, `phoneno`, `state`, `address`, `fill_full_details` FROM `users_register`";
$stmt= $conn->query($stmt);
if($stmt){  ?>
    <table class="table table-responsive table-hover table-bordered">
    
        <thead>
            <tr class="info"><th>Id</th><th>Name</th><th>Username</th><th>E-mail</th><th>Phone Number</th><th>State</th><th>Address</th><th>Profile Pic</th></tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($stmt)) { ?>        
        <tr><td><?=$row['id']?></td><td><?=$row['name']?></td><td><?=$row['username']?></td><td><?=$row['email']?></td><td><?=$row['phoneno']?></td><td><?=$row['state']?></td><td><?=$row['address']?></td><td><?=$row['user_pic']?></td></tr>
       <?php  } ?>
        </tbody>
    
    
    
    </table>
    
<?php } include "footer.php"; mysqli_close($conn); ?>