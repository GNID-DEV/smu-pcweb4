<?php
	// Connecting to DB & Config VAR
	require "config/config.php";
	require "config/db.php";

	if(isset($_GET["title"])){

		$title = $_GET["title"];
		$query = "SELECT * FROM reviews WHERE title = '$title' ";
		$query_run = mysqli_query($con, $query);
		$row = mysqli_fetch_array($query_run);
		
		//$playername $playerdesc
		$movieTitle = $row["title"]; //PlayerName
		$movieDesc = $row["body"]; //Description
	
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
				$title = $desc = $oldtitle = "";
				
				if(isset($_POST["upload"])){
					$oldtitle = $_GET["title"]; //name
					$title = $_POST["player"]; //player
					$desc = $_POST["body"];
					$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

					$query = "UPDATE reviews SET title = '$title', body = '$desc', image = '$file' WHERE title = '$oldtitle'";
					$query_run = mysqli_query($con, $query);

					if($query_run){
						echo "<script> alert('Movie information has been updated');
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
				<h3>Movie Title</h3>
				
				<!-- Display Athlete's Name -->
				<?php
					$query = "SELECT title FROM reviews";
					$result = mysqli_query($con, $query);
					
					while($row = mysqli_fetch_array($result)){
						$title = $row['title'];
						
						echo 
						"
						
						<div class=\"list-group \" >
						<h6><a class=\"text-light list-group-item list-group-item-action btn-lg btn-dark \" style=\"text-decoration: none \"
						href='edit.php?title=$title'> $title<br></a> </h6>
						</div>
						
						";
					}
				?>
			</div>
		
			<!-- Form -->
			<div class = "col-8 mt-4">
				<?php
				
					if(isset($_GET["title"])){
					$title = $_GET["title"];

					echo '

					<div class="text-success mb-2">
					<h3 class="mt-1 ">Edit Entry</h3>
					</div>

					<form method = "post" enctype="multipart/form-data" action = "';
					
					echo htmlspecialchars("edit.php?title=$title");
					
					echo '">';
					
					echo '

					<div class="form-group">
					
					<label class="form-label ">Movie Title</label>		
						<input class="form-control" value="'.$movieTitle.'"" type="text" name="player">
					</div>
					
					<div class="form-group">
						<label class="form-label mt-2">Movie Description</label>
						<textarea class="form-control" name="body" rows="8">'.$movieDesc.'</textarea>
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