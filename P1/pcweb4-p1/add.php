<?php
	// Connecting to DB & Config VAR
	require "config/config.php";
	require "config/db.php";
?>

<!-- Header -->
<?php include('inc/header.php'); ?>

<body>
		
	<!-- Add New Entry -->
	<?php
		$player = $desc = "";
		if(isset($_POST["upload"])){
			$player = $_POST["player"];
			$desc = $_POST["description"];
			$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

			$query = "INSERT into players VALUES('$player', '$desc', '$file')";
			$query_run = mysqli_query($con, $query);

			if($query_run){
				echo "<script> alert('Player added')</script>";
			}
		}
	?>

	<!-- FORM -->
	<div class="container">
			
	<!-- Page Title -->
	<h3 class="text-warning mt-4 mb-4">Add New Entry</h3>
				
		
	<form method = "post" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<div class="form-group">
			<label class="form-label ">Athlete's Name</label>		
			<input class="form-control" type="text" name="player">
		</div>

		<div class="form-group">
			<label class="form-label mt-2">Athlete's Biography</label>
			<textarea class="form-control" name="description" rows="8"></textarea>
		</div>
		
		<!--  -->
		<div class="form-group">
			<label class="form-label mt-2">Upload Athlete's Picture</label>
			<input class="form-control" type="file" name="image">
    	</div>

		<div class="form-group d-flex justify-content-end">
			<input class="btn btn-lg btn-outline-light mt-4 mb-3" type="submit" value="Submit" name="upload">
		</div>
	</form>

<!-- Footer -->
<?php include('inc/footer.php'); ?>