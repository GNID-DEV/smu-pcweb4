<?php
	// Connecting to DB & Config VAR
	require "config/config.php";
	require "config/db.php";

	if(isset($_GET["name"])){

		$name = $_GET["name"];
		$query = "SELECT * FROM players WHERE PlayerName = '$name' ";
		$query_run = mysqli_query($con, $query);
		$row = mysqli_fetch_array($query_run);
	
		$playername = $row["PlayerName"];
		$playerdesc = $row["Description"];
	
		} else {
	
		}
?>

<!-- Header -->
<?php include('inc/header.php'); ?>

<body>
	<!--  -->
	<div class = "container">
		<div class = "row">
			<?php
				$player = $desc = $oldplayer = "";
				
				if(isset($_POST["upload"])){
					$oldplayer = $_GET["name"];
					$player = $_POST["player"];
					$desc = $_POST["description"];
					$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

					$query = "UPDATE players SET PlayerName = '$player', Description = '$desc', Image = '$file' WHERE PlayerName = '$oldplayer'";
					$query_run = mysqli_query($con, $query);

					if($query_run){
						echo "<script> alert('Player updated');
						location.href = 'edit.php';
						</script>";
					}
				}
			?>
		</div>
	</div>

	<!-- Left Menu -->
	<div class = "container">
		<div class = "row">
			<div class = "col-4 text-warning mt-4 mb-4" id="pname">
				<h3>Athlete's Name</h3>
				
				<!-- Display Athlete's Name -->
				<?php
					$query = "SELECT PlayerName FROM players";
					$result = mysqli_query($con, $query);
					
					while($row = mysqli_fetch_array($result)){
						$name = $row['PlayerName'];
						
						echo 
						"
						
						<div class=\"list-group \" >
						<h6><a class=\"text-light list-group-item list-group-item-action btn-lg btn-dark \" style=\"text-decoration: none \"
						href='edit.php?name=$name'> $name<br></a> </h6>
						</div>
						
						";
					}
				?>
			</div>
		
			<!-- Form -->
			<div class = "col-8 mt-4">
				<?php
				
					if(isset($_GET["name"])){
					$name = $_GET["name"];

					echo '

					<div class="text-success mb-2">
					<h3 class="mt-1 ">Edit Entry</h3>
					</div>

					<form method = "post" enctype="multipart/form-data" action = "';
					
					echo htmlspecialchars("edit.php?name=$name");
					
					echo '">';
					
					echo '

					<div class="form-group">
					
					<label class="form-label ">Athlete\'s Name</label>		
						<input class="form-control" value="'.$playername.'"" type="text" name="player">
					</div>
					
					<div class="form-group">
						<label class="form-label mt-2">Athlete\'s Biography</label>
						<textarea class="form-control" name="description" rows="8">'.$playerdesc.'</textarea>
					</div>
					
					<label class="form-label mt-2">Upload Athlete\'s Picture</label>
					<div class="form-group d-flex justify-content-end ">
						<input class="form-control" type="file" name="image">
					</div>

					<div class="form-group d-flex justify-content-end">
						<input class="btn btn-lg btn-outline-light mt-4 mb-3" type="submit" value="Submit" name="upload">
					</div>		
					
					</form>';
				}
				else {
					
					echo 
					// HOW TO Info
												
					"<div class=\"list-group p-5\" >
					<div class=\"text-success\"><h4 class=\"display-6\">HOW TO</h4></div>
				
					<ul class=\"list-unstyled\">
					
					<li>To edit and modify exisitng entry / athlete:
				<ul>
					<li>Click on the Athlete's name on the left to modify their existing information.</li>
					<li>You will need to fill up all* fields to update properly.</li>	
					
					<ol>
					
						<li>Athlete's Name</li>	
						<li>Athlete's Biography</li>	
						<li>Athlete's Image (less than 64k)</li>	

					</ol>
				</ul>
				</div>
				";

				}
				?>
					
				</div>
			</div>
		</div>

<!-- Footer -->
<?php include('inc/footer.php'); ?>