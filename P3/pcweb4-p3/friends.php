<!-- THERE ARE 3 QUERIES: ONE JOIN, ONE DELETE AND ONE SELECT..WHERE..LIKE) 
YOU NEED TO FILL FOR THIS FILE. THEY ARE ON LINES 75, 96 AND 123. -->

<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("location:index.php");
}

// Logout Session
if (isset($_POST["logout"])) {
	session_destroy();
	header("location:index.php");
}

// Include PHP files
require "dbconfig/config.php";
require "inc/header.php";
include "inc/navbar.php";
include "inc/footer.php";
?>

<!-- Body -->

<body>

	<?php

	// 
	$follower = $_SESSION['username'];

	$query = "SELECT user_id FROM userinfo WHERE username = '$follower' ";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$followerid = $row['user_id'];

	if (isset($_POST["follow"])) {
		$followee = $_POST["followee"];

		$query = "SELECT user_id FROM userinfo WHERE username = '$followee' ";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
		$followeeid = $row['user_id'];

		$query = "INSERT into user_relation(follower_id, followee_id) VALUES('$followerid', '$followeeid')";
		$query_run = mysqli_query($con, $query);

		if ($query_run) {

			echo "<script> alert('Friend added')</script>";
		} else {
			echo "<script> alert('Already added as friend')</script>";
		}
	}
	?>

	<!-- Start -->
	<div class="container mt-5">
		<div class="row">

			<!-- #1 Username -->
			<div class="col-sm mb-3">
				
				<h2 class="d-inline text-danger"> <?= strtoupper($follower); ?></h2>
				<h2 class="d-inline">'s Friends</h2>
			
			</div>


			<!-- #2 Following-->
			<div class="col-sm mt-2">
			<h5 class='d-inline'> You had followed: </h5>
				<?php

				# 1st Query
				# Complete this query to join the userinfo and user_relation tables so that you can display 
				# the usernames of the friends that the current user has. 
				# Use $followerid to filter the records so that only those that are friends with the current user is returned.

				$query = "	SELECT userinfo.username, user_relation.follower_id, user_relation.followee_id
							FROM userinfo
							LEFT JOIN user_relation
							ON userinfo.user_id = user_relation.followee_id
							WHERE user_relation.follower_id = $followerid;
							
						";

				$result = mysqli_query($con, $query);

				while ($row = mysqli_fetch_array($result)) {
					$followee = $row['followee_id'];
					$name = $row['username'];

					echo '
					
					<div class="card border-light p-2 mt-3 mb-3">
						
						<form class="inlineform"  method="post" action = " ';

						echo htmlspecialchars($_SERVER['PHP_SELF']);
						echo '">';

						echo "
					
						<div class='d-flex justify-content-around'>
						
						<div class='d-inline'>
						       
						<h6 class='d-inline'>
						<a class='btn btn-success' href='yourreview.php?user=$name'> " . strtoupper($name) . "</a></h4>
						
						

						<button class='btn btn-outline-dark' type='submit' name='delrecord'>
						Unfollow
						<i class='far fa-times-circle'> </i> 
						</button>

						<input class='hiddeninput' type='hidden' name='followee' value='$followee'></div>
					  	

						</div>
									
						</form>

					</div>
						";
				}

				if (isset($_POST["delrecord"])) {
					$followeeid = $_POST["followee"];


					# 2nd Query
					# Fill in this query to delete the selected friend that the current user is following
					# (delete from the user_relation table). 
					# $followerid is the id of the current user and $followeeid is the id of the followee that you want to delete.	

					$query = "	DELETE FROM user_relation
								WHERE followee_id = $followeeid
								AND follower_id = $followerid;
							
							";

					$query_run = mysqli_query($con, $query);

					if ($query_run) {
						echo "<script> alert('Friend removed'); location.href = 'friends.php';</script>";
					}
				}
				?>
			</div>


			<!-- #3 -->
			<div class="col-sm">
				<div class="col-sm mt-2 mb-3">
				<h5 class='d-inline'> Find your friend! </h5>			
			</div>

				
				<!-- Search Username Input -->
				<div class="card border-light mb-3 p-3">
					
					<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					
					<input class="form-control" type="text" placeholder="Search username" name="user">
				
					<!-- Search Button -->
					<div class="d-grid gap-2">
					<input class="btn btn-sm btn-info mt-2" type="submit" value="Search" name="search" placeholder="Search" class="btn btn-primary">
					</div>
				
					</form>
				</div>

				<div class="card border-light p-3">
			
					<?php
					if (isset($_POST["search"])) {
						$search = $_POST["user"];


						# 3rd Query
						// Fill in this query to select the usernames which contain the search term entered by the user. 
						// The search term is stored in $search.
						$query = "	SELECT *
									FROM userinfo
									WHERE username
									LIKE '%$search%';
								";

						$result = mysqli_query($con, $query);

						while ($row = mysqli_fetch_array($result)) {
							$name = $row['username'];

							if ($name != $_SESSION['username']) {

								echo '

								<form method="post" action = " ';
								echo htmlspecialchars($_SERVER['PHP_SELF']);
								echo '">';
							
								echo '

								
								<div class="d-grid mt-3">
								
									<h6 class="badge rounded-pill bg-warning"> ' . strtoupper($name) . '</h6>

									<button class="badge rounded-pill bg-success btn" name="follow">
										<i class="fas fa-plus-circle"></i> 
										Add as Friend
									</button>
								
									<input class="hiddeninput" type="hidden" name="followee" value='. $name .'>
								</div>
								
							
							</form>
							<br>
							';
							
						} else {

								echo '<div class=""></div>';
								// echo '<h2>' . $name . '</h2>';
							}
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>

	<br>
	<br>
	<br>