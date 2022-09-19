<?php

include 'config/db.php';

$query = "SELECT * FROM mypost ORDER BY created_at DESC";

$result = mysqli_query($conn,$query);

$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<?php include 'layout/header.php';?>
    
     <div class="row mt-5 justify-content-center">
     <?php foreach ($posts as $post) : ?>
         <div class="col-lg-4 mt-4">
             <div class="card">
                 <div class="card-header text-center bg-success">
                     <h4 class="card-title mt-4"><?php echo $post['title'];?></h4>
                 </div>
                 <div class="card-body mt-4">
                     <p><?php echo $post['body'];?></p>
                     <a href="post.php?id=<?php echo $post['id']; ?>" class="btn btn-success btn-sm">See More</a>
                 </div>
                 <div class="card-footer mt-4">
                     <p>Create On<?php echo $post['created_at'];?> By <?php echo $post['author'];?></p>
                 </div>
             </div>
         </div>
         <?php endforeach;?>
     </div>
     
     
<?php include 'layout/footer.php';?>
  
