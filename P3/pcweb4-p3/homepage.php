<?php
	
	// Start Session
	session_start();
	if(!isset($_SESSION['username'])){
   		header("location:index.php");
	}

	// Logout Session
	if(isset($_POST["logout"])){
		session_destroy();
		header("location:index.php");
	}

	// Include PHP files
	require "dbconfig/config.php";
	require "inc/header.php";
	include "inc/footer.php";

	$user = $_SESSION['username'];

?>

<!-- Body -->
<body>

<!-- Include Navbar PHP -->
<?php include("inc/navbar.php"); ?>
	
<div class="container mt-5" >

<div class="row justify-content-center align-items-center">

<div class="col-10 col-md-8 col-lg-6">
		
				<!-- Welcome Heading -->
				<div class="mx-auto mt-4 mb-2">
					
						<h6 class="d-inline">Welcome </h6>
						<h6 class="d-inline text-danger"><?= strtoupper($user); ?></h6>
						<h6 class="d-inline"> !</h6>
					
				</div>
				
				<!-- Information -->
				<!-- <div class="card-body"> -->
				<div class="card p-4 mb-3" >
					<h4 class="text-center">Rate your favourite movie!</h4>
				
					<?php
						$query = "SELECT movie_name FROM movies";
						$result = mysqli_query($con, $query);

						while($row = mysqli_fetch_array($result)){
						$name = ucfirst($row['movie_name']); // ucfirst()
						
							echo "
							<div class=\"d-grid gap-2 col-8 mt-3 mx-auto\">
							
								
								
									<a class=\"btn btn-outline-danger\" style=\"text-decoration: none \" 
									href='review.php?name=$name'>$name<br></a>
								
								</button>

							</div>
							
							";
						} 
					?>
				</div>
			</div>
		</div>
	</div>
