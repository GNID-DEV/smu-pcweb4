<!-- THERE ARE TWO QUERIES
(ONE INSERT AND ONE JOIN) YOU NEED TO FILL FOR THIS FILE. 
THEY ARE ON LINES 62 AND 107. -->

<?php
	
	session_start();
	if(!isset($_SESSION['username'])){
   		header("location:index.php");
	}
	
	if(isset($_GET["name"])){
		$name = $_GET["name"];
	}

	// Logout Session
	if(isset($_POST["logout"])){
		session_destroy();
		header("location:index.php");
	}
	
	// Include PHP files
	require "dbconfig/config.php";
	include "inc/header.php";
	include "inc/footer.php";
	include "inc/navbar.php";
	

?>

<!-- Body -->
<body>
		
	<?php
		// User's Session
		$user = $_SESSION['username'];
		$query = "SELECT user_id FROM userinfo WHERE username = '$user'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$userid = $row['user_id'];

		// User selected Movie Title
		$movie = $_GET["name"];
		$query = "SELECT movie_id FROM movies WHERE movie_name = '$movie'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$movieid = $row['movie_id'];

		// Rating
		$rating = "";
		
		if(isset($_POST["rate"])){
			$rating = $_POST["rating"];

			// Fill in the query to insert the rating into the database. 
			// Use $userid and $movieid for the values of user_id and movie_id columns respectively
			
			// Insert rating values to DB
			$query = "	INSERT INTO movie_reviews VALUES ('$userid', '$movieid', '$rating')  ";

			$query_run = mysqli_query($con, $query);

			if($query_run){
				
				echo "<script> alert('Rating added')</script>";
			}
			
			else {
				
				echo "<script> alert('You have already rated, please edit your previous review')</script>";
			}
		}
	?>
	
	<!-- Fetch Selected Movie Title -->
	<div class="container mt-5">

		<div class="row mx-auto" style="max-width: 80%">

			<div class="mx-auto mt-4 mb-2">
				<h2 class="d-inline">You had chosen to rate: </h2>
				<h2 class="d-inline text-danger"><?= $_GET['name']?></h2>
			</div>

			<form method = "post" action = "<?php echo htmlspecialchars('review.php?name='.$name.'');?>">

				<!-- Rating Form -->
				<fieldset class="form-group">
					<legend class="mt-4">Rate from (0 to 5)</legend>
								
					<label class="form-label">Drag the slider to give your rating!</label>
					
<!-- Slider -->
					<!-- type="range" | type="number" -->
					<input class="form-range" min="0" max="5" step="1" value="0" type="range" name="rating">
					

					<!-- <input class="form-control" type="number" name="rating" step="0.1" min="0" max="5"> -->
					
					<!-- Rate Button -->
					<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
					<input class="btn btn-lg btn-outline-danger" type="submit" value="Rate" name="rate">

				</fieldset>
				
			</form>

			<!-- All Ratings -->

			<div class="container mt-5">
				<div class="row">

				<div class="mx-auto mt-4 mb-3">
				<h2 class="d-inline">All Ratings for: </h2>
					<h2 class="d-inline text-danger"><?= $_GET['name']?></h2> 
				</div>

						<?php
							$moviename = $_GET['name'];
							$query = "SELECT movie_id FROM movies WHERE movie_name = '$moviename' ";
							$result = mysqli_query($con, $query);
							$row = mysqli_fetch_array($result);
							$movieid = $row['movie_id'];

							// Fill in the query(JOIN) to join the userinfo and movie_reviews table together 
							// so that you can display the respective rating given by each username. 
							// Use $movieid to filter the records so that only the ratings for the selected movie is shown.
							
							// All Rating for Selected Movie
							$query = "	SELECT movie_reviews.movie_id, userinfo.username, movie_reviews.ratings 
										FROM movie_reviews
										LEFT JOIN userinfo
										ON movie_reviews.user_id = userinfo.user_id
										WHERE movie_reviews.movie_id = $movieid;		
									 ";
							
							$result = mysqli_query($con, $query);
							
							while($row = mysqli_fetch_array($result)){
								$userrating = $row['ratings'];
								$userthatrated = $row['username'];

								echo '
								
								<div class="mt-2">
								<h5 class="d-inline text-danger"> ' .strtoupper($userthatrated). ' </h5>
								<h5 class="d-inline"> had given a rating of: </h5>
								<h5 class="d-inline text-danger"> ' .$userrating. ' </h5>
								<h5 class="d-inline"> / 5.0</h6>
								
								</div>
									';
							}
						?>
			</div>
		</div>
	</div>
</div>
