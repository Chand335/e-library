<?php include "header.php";
include "header_menu.php";

include "side_menu.php"; 

$stmt = "SELECT * FROM `book_details`";
$stmt= $conn->query($stmt);
if($stmt){  ?>


    <table class="table table-responsive table-hover table-condensed table-bordered">
    
        <thead>
                <tr class="info">
                    <th>Id</th>
                    <th>Name</th>
                    <th>ISBN-13</th>
                    <th>ISBN-10</th>
                    <th>Author</th>
                    <th>Language</th>
                    <th>Publisher Name</th>
                    <th>Publisher Url</th>
                    <th>Publiction Year</th>
                    <th>Description</th>
                    <th>Paperback</th>
                    <th>Book Cover</th>
                    <th>Book file</th>
                    <th>Edit</th>
                </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_array($stmt)) { ?>        
        <tr>
                <td><?=$row['book_id']?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['isbn-13']?></td>
                <td><?=$row['isbn-10']?></td>
                <td><?=$row['authors']?></td>
                <td><?=$row['language']?></td>
                <td><?=$row['publisher_name']?></td>
                <td><a target="_blank" href="https://www.google.com/search?q=<?=$row['publisher_url']?>"><?=$row['publisher_url']?></a></td>
                <td><?=$row['publiction_year']?>
                <td><?=($row['description'] === '' OR $row['description'] === null )? 'No Description' :substr($row['description'], 0, 70).' ....'?>
                </td><td><?=$row['paperback']?></td>
                <td><img src="<?=($row['book_pic'] ==='' OR $row['book_pic'] === null )?$row['online_pic_url'] :'../images/books_pics/'.$row['book_pic']?>" class="img-rounded" alt="No Image" width="304" height="236" /></td>
                <td><?=$row['book_files']?></td>
                <td><a href="UpdateBookDetails.php?bookid=<?= $row['book_id']?>&isbn10=<?=$row['isbn-10']?>&isbn13=<?=$row['isbn-13']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                </tr>
       <?php  } ?>
        </tbody>
    </table>
    <style>
img.img-rounded {
    width: 50px;
    height: 80px;
}
i.fa.fa-pencil-square-o {
    font-size: 26px;
    text-align: center;
    padding-top: 100px;
}
img.img-rounded:hover + img.img-rounded{
    display: block;
}
</style>
<?php } include "footer.php"; mysqli_close($conn); ?>