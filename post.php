<?php

include 'config/db.php';

$id = mysqli_real_escape_string($conn,$_GET['id']);

$query = "SELECT * FROM mypost WHERE id=".$id;

$result = mysqli_query($conn,$query);

$post = mysqli_fetch_assoc($result);


?>

<?php include 'layout/header.php';?>

<div class="row mt-5">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-success text-center">
                <h4 class="card-title"><?php echo $post['title'];?></h4>
            </div>
            <div class="card-body">
                <p><?php echo $post['body'];?></p>
            </div>
            <div class="card-footer">
                <p>Create On <?php echo $post['created_at'];?> By<?php echo $post['author']?></p>
                <a href="edit.php?id=<?php echo $post['id'];?>" class="btn btn-success ">Edit</a> ||
                <a href="delete.php?id=<?php echo $post['id']; ?>" class="btn btn-danger">Delete</a>
            </div>
           
        </div>
    </div>
</div>


<?php include 'layout/footer.php';?>