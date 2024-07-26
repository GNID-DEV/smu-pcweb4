<!-- THERE ARE TWO QUERIES(ONE SELECT AND ONE INSERT) YOU NEED TO FILL FOR THIS FILE. 
	 THEY ARE ON LINES 28 AND 35. // Completed 
--> 

<?php
	// Include PHP files
	require "dbconfig/config.php";
	include "inc/header.php";
?>

<body>
<div class="container mt-5" >

<div class="row justify-content-center align-items-center">

<div class="col-10 col-md-8 col-lg-6">
	<!-- PHP code to register User -->
	<?php

		$username = $password = $cpassword = "";

		if(isset($_POST["reg_btn"])){

			$username = $_POST["username"];
			$password = $_POST["password"];
			$cpassword = $_POST["cpassword"];
			
			if($password == $cpassword){

				// Completed 
				// Fill in the query to check if there are any existing records of the username submitted
				$query = " SELECT * from userinfo WHERE username ='$username' ";
				
				$query_run = mysqli_query($con, $query);

				if(mysqli_num_rows($query_run)>0){
						echo "<script> alert('Username taken')</script>";
				} else {
				
				// Completed 
				// Fill in the query to register the user details into the database
				$query = " INSERT INTO userinfo VALUES (NULL, '$username', '$password') ";
				
				$query_run = mysqli_query($con, $query);

				if($query_run){

					echo "<script> alert('Your new user account has been registered! \\nYou will be redirected to the login page!')</script>";
					header('Refresh: 1; URL=index.php');
				
				} else {
					echo "<script> alert('Unable to create account')</script>";
					}
				}

				} else {
					echo "<script> alert('Passwords do not match!')</script>";
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
			<h1 class="mt-5 mb-5">Register a new account</h1>
			</div>
		

			<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class = "loginbox">
			
				<!-- Username -->
				<div class="form-group">
					<label class="form-label"><i class="fas fa-user"></i> Username<label> 
				</div>

				<div class="form-group mb-3">
					<input class="form-control" type="text" placeholder="Key in your username..." name = "username" required>
				</div>

				<!-- Password -->
				<div class="form-group">
					<label class="form-label"><i class="fas fa-lock"></i> Password<label>
				</div>
				<div class="form-group mb-3">
					<input class="form-control" type="password" placeholder="Key in your password..." name = "password" required>
				</div>

				<!-- Confirm Password -->
				<div class="form-group">
					<label class="form-label"><i class="fas fa-lock"></i> Confirm Password<label>
				</div>
				<div class="form-group mb-3">
					<input class="form-control" type="password" placeholder="Confirm your password..." name = "cpassword" required>
				</div>

				<!-- Sign Up Button -->
				<div class="form-group"> 
					<div class="d-grid gap-2 mb-5">
					<input class="nav-pills btn btn-outline-success" type="submit" id="registerbtn" value="Sign Up" name="reg_btn">
				</div>
				


			</form>

		</div>
	</div>
	</div>

<!-- Footer -->
<?php require "inc/footer.php"; ?>
