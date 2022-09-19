<?php

include 'config/db.php';

if (isset($_POST['submit'])) {
    $update_id = mysqli_real_escape_string($conn,$_POST['update_id']);
    $title = mysqli_real_escape_string($conn,$_POST['title']);
	$body = mysqli_real_escape_string($conn,$_POST['body']);
	$author = mysqli_real_escape_string($conn,$_POST['author']);

    $query = "UPDATE mypost SET title ='$title', body='$body', author='$author' WHERE id ={$update_id}";

    if (mysqli_query($conn,$query)) {
        header('Location: index.php');
    }else {
        echo "Error".mysqli_error($conn);
    }
}

$id = mysqli_real_escape_string($conn,$_GET['id']);

$query ="SELECT * FROM mypost WHERE id=".$id;

$result = mysqli_query($conn,$query);

$post = mysqli_fetch_assoc($result);


?>

<?php include 'layout/header.php';?>

<div class="row justify-content-center mt-5">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title text-center ">Edite Post</h4>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="form-group mt-4">
						<label>Title</label>
						<input type="text" name="title" class="form-control" value="<?php echo $post['title'];?>">
					</div>
					<div class="form-group mt-4">
						<label>Body</label>
						<textarea name="body" class="form-control"><?php echo $post['body'];?></textarea>
					</div>
					<div class="form-group mt-4">
						<label>Author</label>
						<input type="text" name="author" class="form-control" value="<?php echo $post['author'];?>">
					</div>
					<div class="form-group mt-4">
                        <input type="hidden" name="update_id" value="<?php echo $post['id'];?>">
						<input type="submit" name="submit" class="btn btn-success form-control" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'layout/footer.php';?>