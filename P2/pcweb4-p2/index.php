<?php
// Connecting to DB & Config VAR
require "config/config.php";
require "config/db.php";

// Fetch Film' Title
if (isset($_GET["title"])) { //name
	$title = $_GET["title"]; //name
	
}
?>

<!-- Header -->
<?php include('inc/header.php'); ?>

<body>

	<!-- Posts Container  -->
	<div class = "container">
			<div class = "row">
				<div class = "col-4 text-warning mt-4 mb-4">
					<h3>Latest Entries</h3>
					
					<!-- Delete Entry -->
					<?php
						$title = "";
						if(isset($_POST["delete"])){
							$title = $_GET["title"];
							
							// Delete Entry
							$query = "DELETE FROM reviews WHERE title = '$title'";
							$query_run = mysqli_query($con, $query);
							if($query_run){
								echo 
								"<script> 
									alert('Movie deleted'); 
									location.href = 'index.php';
								</script>";
							}
						}
					?>
					
					<?php

						// Display Movie Title
						$query = "SELECT title FROM reviews ORDER BY RAND()";
						$result = mysqli_query($con, $query);
						
						while($row = mysqli_fetch_array($result)){
							$title = $row['title'];
							// echo "<h4><a href='index.php?name=$name'> $name<br></a></h4>";

							echo "
												
								<div class=\"list-group \" >
									<h6><a class=\"text-light list-group-item list-group-item-action btn-lg btn-dark \" style=\"text-decoration: none \"
									href='index.php?title=$title'> $title<br></a> </h6>
								</div>

									";
						}
					?>
				</div>

<!--  -->
				
				<!-- Display Image -->
				<div class = "col-8 mt-4" id="picpic">

				
					<?php
						
						if(isset($_GET["title"])){
						$title = $_GET["title"];
						$query = "SELECT image FROM reviews WHERE title = '$title'";
						
						$query_run = mysqli_query($con, $query);
						$row = mysqli_fetch_array($query_run);
						
						// Hide & Delete Button
						echo '
						<form method= "post" action ="index.php?title='.$title.'" >
						
							<div class="d-flex justify-content-center flex-row">
								
								<div class="p-2">
									<input class="btn btn-sm btn-outline-light" type="button" value="Hide Pic" id="hidebtn">
								</div>

								<div class="p-2">
									<input class="btn btn-sm btn-outline-danger" type="submit" name="delete" value="Delete Entry">
								</div>
							
							</div>
							
							<div class="d-flex justify-content-center flex-row">
								<div class="p-2 mt-4">
									<img class=" border border-light border-4" id="hide" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="300" />
								</div>
							</div>

						</form>';
						}						
					?>

				<div class = "">
					<?php
						if(isset($_GET["title"])){
						$title = $_GET["title"];
						$query = "SELECT body FROM reviews WHERE title = '$title' ";
						$query_run = mysqli_query($con, $query);
						$row = mysqli_fetch_array($query_run);
						$desc = $row['body'];

						echo 
						"
						<div class=\"d-flex justify-content-center flex-row\">
						<h3 class=\"mt-1 \">$title</h3>
						</div>
						<div class=\"d-flex justify-content-center flex-row\">
						<p class=\"mt-2 text-muted\">$desc <br></p>
						</div>
						";
						} else {
						
						echo 
						// HOW TO Info
												
						"<div class=\"list-group p-5\" >
							<div class=\"text-success\"><h4 class=\"display-6\">HOW TO</h4></div>
						
							<ul class=\"list-unstyled\">
								<li>To learn more about the athlete:
							<ul>
								<li>Click on their name on the left to find out more about them.</li>
							</ul>
						<br>							
							<li>To add a new entry / athlete:
							<ul>
								<li>Click on the Add button located on the navigation bar to add new entry.</li>
							</ul>
						<br>
							<li>To edit and modify exisitng entry / athlete:
						<ul>
							<li>Click on the Edit button located on the navigation bar to modify existing post.</li>	
						</ul>
						</div>
						";

						}
					?>
				</div>


				</div>

				
				
				
		</div>
	</div>

<!-- Footer -->
<?php include('inc/footer.php'); ?>