<?php


include 'config/db.php';
// if(isset($_POST['username'])){
    // $username = stripcslashes($_POST['username']);
    // $username = mysqli_real_escape_string($conn, $username);
    // $email = stripcslashes($_POST['email']);
    // $email = mysqli_real_escape_string($conn, $email);
    // $password = stripcslashes($_POST['password']);
    // $password = mysqli_real_escape_string($conn, $password);

    // $query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','".md5($password)."')";

    // if(mysqli_query($conn, $query)){
        // header('Location: login.php');
    // }
// }
if (isset($_POST['username'])) {
    $username = stripcslashes($_POST['username']);
    $username = mysqli_real_escape_string ($conn,$username);
    $email = stripcslashes($_POST['email']);
    $email = mysqli_real_escape_string ($conn,$email);
    $password = stripcslashes($_POST['password']);
    $password = mysqli_real_escape_string ($conn,$password);

    $query = "INSERT INTO users(username,email,password) VALUES('$username','$email','".md5($password)."')";

    if (mysqli_query($conn,$query)) {
        header('Location: login.php');
    }
}

?>


<?php include 'layout/header.php';?>

<div class="row justify-content-center mt-5">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title text-center">Registration Here</h4>
			</div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="form-group mt-4">
						<label>User Name</label>
						<input type="text" name="username" class="form-control" required>
					</div>
					<div class="form-group mt-4">
						<label>Email</label>
						<input type="text" name="email" class="form-control">
					</div>
					<div class="form-group mt-4">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group mt-4">
						<input type="submit" name="submit" class="btn btn-success form-control" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'layout/footer.php';?>