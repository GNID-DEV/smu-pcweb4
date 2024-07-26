<!-- THERE IS ONE QUERY YOU NEED TO FILL FOR THIS FILE. IT IS ON LINE 24. -->
<!-- Completed  -->

<?php
	session_start();
	// Include PHP files
	require "dbconfig/config.php";
	include "inc/header.php";
	include "inc/footer.php";

?>

<body>
		
	<?php
		// Login 
		$username = $password = "";
				
		if(isset($_POST["login"])){
					
		$username = $_POST["username"];
		$password = $_POST["password"];

		// Completed 
		// Fill in the blank query here to allow user to log into the page
		$query = "	SELECT * from userinfo 
					WHERE username = '$username' AND password = '$password'  
				 ";
		
		
		
		$query_run = mysqli_query($con, $query);

		if(mysqli_num_rows($query_run) > 0){
			$_SESSION["username"] = $username;
			header("location:homepage.php");
			} else {
				echo "<script> alert('Username or Password is incorrect.')</script>";
				}
			}
	?>
<!--  -->





<!--  -->
	<!-- Login Form -->

	<div class="container mt-5" >

		<div class="row justify-content-center align-items-center">

		<div class="col-10 col-md-8 col-lg-6">
		

				<!-- Heading -->
				<div class="mt-5">
		<h1 class="mt-5 mb-5">Login</h1>
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
				
				<!-- Login Button -->
				<div class="form-group"> 
					<div class="d-grid gap-2 mb-4">
					<input class="nav-pills btn btn-outline-primary" type="submit" id="loginbtn" value="Login" name="login">
				</div>

			<!--  -->

			
				<!-- Register -->
				<div class="d-flex flex-sm-fill gap-2" > <!-- style="max-width: 100%" -->
				<input class="flex-sm-fill nav-pills btn btn-outline-success" type="button" id="regbtn" value="Register Account" onclick= "window.location.href = 'register.php'">

				<!-- Change Password Button  -->
				<input class="flex-sm-fill nav-pills btn btn-outline-warning" type="button" id="chgbtn" value="Change Password" onclick= "window.location.href = 'changepassword.php'">

				<!-- Delete Button -->
				<input class="flex-sm-fill nav-pills btn btn-outline-danger" type="button" id="delbtn" value="Delete Account" onclick= "window.location.href = 'delete.php'">

				</div>
				
			</form>
		</div>
		</div>
	</div>
	

