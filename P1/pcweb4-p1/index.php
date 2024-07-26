<?php
// Connecting to DB & Config VAR
require "config/config.php";
require "config/db.php";

// Fetch Athletes' Name
if (isset($_GET["name"])) {
	$name = $_GET["name"];
}
?>

<!-- Header -->
<?php include('inc/header.php'); ?>

<body>

	<!-- Posts Container  -->
	<div class = "container">
			<div class = "row">
				<div class = "col-4 text-warning mt-4 mb-4" id="pname">
					<h3>Latest Entries</h3>
					
					<!-- Delete Entry -->
					<?php
						$name = "";
						if(isset($_POST["delete"])){
							$name = $_GET["name"];
							
							// Delete Entry
							$query = "DELETE FROM players WHERE PlayerName = '$name'";
							$query_run = mysqli_query($con, $query);
							if($query_run){
								echo 
								"<script> 
									alert('Player deleted'); 
									location.href = 'index.php';
								</script>";
							}
						}
					?>
					
					<?php
						// Display Athletes' Name
						$query = "SELECT PlayerName FROM players ORDER BY RAND()";
						$result = mysqli_query($con, $query);
						
						while($row = mysqli_fetch_array($result)){
							$name = $row['PlayerName'];
							// echo "<h4><a href='index.php?name=$name'> $name<br></a></h4>";

							echo "
												
							<div class=\"list-group \" >
								<h6><a class=\"text-light list-group-item list-group-item-action btn-lg btn-dark \" style=\"text-decoration: none \"
								href='index.php?name=$name'> $name<br></a> </h6>
							</div>

									";
						}
					?>
				</div>

<!--  -->
				
				<!-- Display Image -->
				<div class = "col-8 mt-4" id="picpic">

				
					<?php
						
						if(isset($_GET["name"])){
						$name = $_GET["name"];
						$query = "SELECT Image FROM players WHERE PlayerName = '$name'";
						
						$query_run = mysqli_query($con, $query);
						$row = mysqli_fetch_array($query_run);
						
						// Hide & Delete Button
						echo '
						<form method= "post" action ="index.php?name='.$name.'" >
						
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
									<img class="rounded-circle" id="hide" src="data:image/jpeg;base64,'.base64_encode($row['Image'] ).'" height="200" />
								</div>
							</div>

						</form>';
						}						
					?>

				<div class = "">
					<?php
						if(isset($_GET["name"])){
						$name = $_GET["name"];
						$query = "SELECT Description FROM players WHERE PlayerName = '$name' ";
						$query_run = mysqli_query($con, $query);
						$row = mysqli_fetch_array($query_run);
						$desc = $row['Description'];

						echo 
						"
						<div class=\"d-flex justify-content-center flex-row\">
						<h3 class=\"mt-1 \">$name</h3>
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