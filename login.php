<?php

include 'config/db.php';

session_start();
if (isset($_POST['username'])) {
	$username = stripcslashes($_POST['username']);
	$password = stripcslashes($_POST['password']);

	$query= "SELECT * FROM users WHERE username='$username' and password='".md5($password)."'";

	$result = mysqli_query($conn,$query);

	$rows = mysqli_num_rows($result);
	

	if ($rows === 1) {
		$_SESSION['username']=$username;
		header('Location: deshbord.php');
	}else {
		header('Location: login.php');
	}
}


?>


<?php include 'layout/header.php';?>

<div class="row justify-content-center mt-5">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title text-center">Login Here</h4>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="form-group mt-4">
						<label>User Name</label>
						<input type="text" name="username" class="form-control" required>
					</div>
					<div class="form-group mt-4">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group mt-4">
						<input type="submit" name="submit" class="btn btn-success form-control" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'layout/footer.php';?>