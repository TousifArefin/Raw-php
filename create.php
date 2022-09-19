<?php
include 'config/db.php';

if (isset($_POST['submit'])) {
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$body = mysqli_real_escape_string($conn,$_POST['body']);
	$author = mysqli_real_escape_string($conn,$_POST['author']);

	$query= "INSERT INTO mypost(title,body,author) VALUES ('$title','$body','$author')";

	if (mysqli_query($conn,$query)) {
		header('Location:index.php');
	}
}
?>

<?php include 'layout/header.php';?>
<div class="row justify-content-center mt-5">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title text-center">Create Post</h4>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="form-group mt-4">
						<label>Title</label>
						<input type="text" name="title" class="form-control">
					</div>
					<div class="form-group mt-4">
						<label>Body</label>
						<textarea name="body" class="form-control"></textarea>
					</div>
					<div class="form-group mt-4">
						<label>Author</label>
						<input type="text" name="author" class="form-control">
					</div>
					<div class="form-group mt-4">
						<input type="submit" name="submit" class="btn btn-success form-control">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'layout/footer.php';?>