<!-- THERE IS ONE QUERY YOU NEED TO FILL FOR THIS FILE. IT IS ON LINE 29. -->
<!-- Completed  -->

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
		
		if(isset($_POST["change"])){
			
			$username = $_POST["username"];
			$password = $_POST["password"];
			$npassword = $_POST["npassword"];
			
			// Query to DB
			$query = "SELECT * from userinfo WHERE username ='$username' AND password = '$password'";
			$query_run = mysqli_query($con, $query);

			if(mysqli_num_rows($query_run)>0){
			
			// Fill in the query to update the user password with the new password that is submitted
			// Update User Info
			$query = "UPDATE userinfo SET password = '$npassword' WHERE username = '$username'";
			$query_run = mysqli_query($con, $query);
			
			echo "<script> alert('Password changed')</script>";
			
			} else {
					echo "<script> alert('Unable to change password')</script>";
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
		<h1 class="mt-5 mb-5">Change your password</h1>
		</div>


		
		<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class = "loginbox">
			<!-- Username -->
			<div class="form-group">
				<label class="form-label"><i class="fas fa-user"></i> Username<label> 
			</div>

			<div class="form-group mb-3">
				<input class="form-control" type="text" placeholder="Key in your username..." name = "username" required>
			</div>

<!--  -->
			<!-- Old Password -->
			<div class="form-group">
				<label class="form-label"><i class="fas fa-lock"></i> Old Password<label>
			</div>
			<div class="form-group mb-3">
				<input class="form-control" type="password" placeholder="Key in your old password..." name = "password" required>
			</div>

<!--  -->

			<!-- New Password -->
			<div class="form-group">
				<label class="form-label"><i class="fas fa-lock"></i> New Password<label>
			</div>
			<div class="form-group mb-3">
				<input class="form-control" type="password" placeholder="Key in your new password..." name = "npassword" required>
			</div>

<!--  -->
				<!-- Confirm Button -->
				<div class="form-group"> 
					<div class="d-grid gap-2 mb-5">
					<input class="nav-pills btn btn-outline-warning" type="submit" id="chgbtn" value="Update Password" name="change">
				</div>

		</form>
		
	</div>
	</div>
</div>

<!-- Footer -->
<?php require "inc/footer.php"; ?>