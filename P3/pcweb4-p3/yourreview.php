<!-- THERE ARE THREE QUERIES(JOIN, DELETE AND UPDATE) 
YOU NEED TO FILL FOR THIS FILE. 
THEY ARE ON LINES 61, 89 and 100 RESPECTIVELY. -->

<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("location:index.php");
}

if (isset($_GET["name"])) {
	$name = $_GET["name"];
}

// Logout Session
if (isset($_POST["logout"])) {
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
	$user = $_GET['user'];
	$query = "SELECT user_id FROM userinfo WHERE username = '$user'";

	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$userid = $row['user_id'];
	?>
	<!--  -->

	<div class="container mt-5">
		<div class="row">
			<div class="container">

				<div class="row justify-content-center align-items-center">

					<div class="col-10 col-md-8 col-lg-6">

						<div class="my-3">
							<!-- $_GET['user'] -->
							<h2 class="d-inline text-danger"><?= strtoupper($user); ?></h2>
							<h2 class="d-inline">'s Reviews</h2>
						</div>

						<?php

						# Complete the query(JOIN) to join the movies and movie_reviews table together 
						# so that you can display the respective rating for each movie. 
						# Use $userid to filter the records so that only the ratings given by the selected user is returned.
						# Complete the query from here 

						$query = "	SELECT movies.movie_name, movie_reviews.ratings, movie_reviews.user_id, movie_reviews.movie_id
									FROM movies
									LEFT JOIN movie_reviews
									ON movies.movie_id = movie_reviews.movie_id
									WHERE movie_reviews.user_id = $userid;
								 ";

						$result = mysqli_query($con, $query);

						while ($row = mysqli_fetch_array($result)) {

							$movieid = $row['movie_id'];
							$userrating = $row['ratings'];
							$movierated = $row['movie_name'];



							// Movie Title & Rating							
							echo '
									<div class="mt-5">
									<h5 class="d-inline"> Your had rated: </h5>
									<h5 class="d-inline text-danger"> ' . strtoupper($movierated) . ' </h5>
									</div>
									
									<div class="mb-3">
									<h6 class="d-inline"> and given a rating of: </h6>
									<h6 class="d-inline text-danger">' . $userrating . '</h6>
									<h6 class="d-inline"> / 5.0</h6>
									</div>
								';


							// Slider
							// <input class="form-range" min="0" max="5" step="1" value="0" type="range" name="rating">

							// Delete and Update Button
							if ($_GET["user"] == $_SESSION["username"]) {

								echo ' <form class="" method="post" action = " ';
								echo htmlspecialchars('./yourreview.php?user=' . $user . '');
								echo '">';

								echo "
										<div class='d-flex flex-row-reverse'>
									
										<button class='btn btn-sm btn-outline-danger' name='delrecord' type='submit'>
										<i class='fas fa-trash'></i> Delete </button>
										
										<input class='' type='hidden' name='movieid' value='$movieid' readonly>
									
										</div>

										
										</form>								
									 ";

								echo '

								<form class="hiddenform" method="post" action = " ';

								echo htmlspecialchars('./yourreview.php?user=' . $user . '');
								echo '">';

								echo "
									<div class='d-grid mb-4'>
										
										<label class='form-label'>Drag the slider to update your rating!</label>
										<input class='form-range' min='0' max='5' step='1' value='$userrating' type='range' name='rating'>
										
										<input class='btn btn-sm btn-outline-success' type='submit' value='Update Your Rating' name='rate'>
										
										<input class='btn' type='hidden' name='movieid' value='$movieid'>
										
									</div>
									
									<hr class='text-light'>
									
								</form>
								
								";
							}
						}

						if (isset($_POST["delrecord"])) {
							$movieid = $_POST["movieid"];

							// Fill in the query to delete a specific movie review given by the current user. 
							// Use $userid and $movieid to correctly identify the composite key in the movie_reviews table 
							// to delete the specific movie review.

							$query = "	DELETE FROM movie_reviews 
										WHERE user_id = $userid 
										AND movie_id = $movieid; 

									 ";

							$query_run = mysqli_query($con, $query);

							if ($query_run) {
								echo "<script> alert('Rating removed'); location.href = 'yourreview.php?user=$user'; </script>";
							}
						}

						if (isset($_POST["rate"])) {
							$rating = $_POST["rating"];
							$movieid = $_POST["movieid"];

							// Fill in the query to update a specific movie review given by the current user. 
							// Use $rating as the new value of rating submitted by the user. 
							// Use $userid and $movieid to correctly identify the composite key in the movie_reviews table to update the specific movie review.

							$query = "	UPDATE movie_reviews 
											SET ratings = $rating
											WHERE user_id = $userid
											AND movie_id = $movieid; 
								
										 ";

							$query_run = mysqli_query($con, $query);

							if ($query_run) {
								echo "<script> alert('Rating changed'); location.href = 'yourreview.php?user=$user'; </script>";
							}
						}

						?>

					</div>
				</div>
			</div>
		</div>
	</div>

	</div>

	<div class="mb-5"></div>

	<br>