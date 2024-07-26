<!-- THERE IS ONE QUERY YOU NEED TO FILL FOR THIS FILE. IT IS ON LINE 28. -->

<?php
	// Include PHP files
	require "dbconfig/config.php";
	require "inc/header.php";
?>

<body>
<div class="container mt-5" >

<div class="row justify-content-center align-items-center">

<div class="col-10 col-md-8 col-lg-6">
	<!-- PHP code to delete User account-->
	<?php
			
		$username = $password = $cpassword = "";
		
		if(isset($_POST["delete"])){
		
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			$query = "SELECT * from userinfo WHERE username ='$username' AND password = '$password'";
			$query_run = mysqli_query($con, $query);

			if(mysqli_num_rows($query_run)>0){
			
			// Delete User Account
			// Fill in the query to delete the user from the database
			$query = "DELETE from userinfo WHERE username = '$username'";
			
			$query_run = mysqli_query($con, $query);
			
				echo "<script> alert('Your account has been deleted! \\nYou will be redirected to the login page!')</script>";
				header('Refresh: 1; URL=index.php');

			} else {
			
				echo "<script> alert('Unable to delete account')</script>";
				}
			}
	?>

	<!-- Register Form -->


		<div class="d-flex justify-content-end">
		<!-- Back to login Button -->
		<input class="nav-pills btn btn-outline-dark" type="button" id="backbtn" value="Back to Login Page" onclick= "window.location.href = 'index.php'">
		</div>

		<!-- Heading -->
		<div class="mt-5">
		<h1 class="mt-5 mb-5">Delete your account</h1>
		</div>
		
		<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class = "loginbox">

			<!-- Username -->
			<div class="form-group">
				<label class="form-label"><i class="fas fa-user"></i> Username<label> 
				
			</div>

			<div class="form-group mb-3">
				<input class="form-control" type="text" placeholder="Key in your username..." name = "username" required>
				<!-- <input type="text" placeholder="Your Username" name = "username" required> -->
			</div>

			<!-- Password -->
			<div class="form-group">
				<label class="form-label"><i class="fas fa-lock"></i> Password<label>
			</div>
			<div class="form-group mb-3">
				<input class="form-control" type="password" placeholder="Key in your password..." name = "password" required>
				<!-- <input type="password" placeholder="Your Password" name = "password" required> -->
			</div>


			<!-- Confirm Delete Account Button -->
			<div class="form-group"> 
				<div class="d-grid gap-2 mb-5">
				<input class="nav-pills btn btn-outline-danger" type="submit" id="registerbtn" value="Confirm Delete Account" name="delete">
				<!-- <input type="submit" id="delbtn" value="Delete" name="delete"> -->
			</div>

		</form>

		</div>
		</div>
	</div>

<!-- Footer -->
<?php require "inc/footer.php"; ?>