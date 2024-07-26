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
		$title = $desc = ""; 
		if(isset($_POST["upload"])){
			$title = $_POST["title"]; //player -> title
			$desc = $_POST["body"];
			$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

			$query = "INSERT INTO reviews VALUES('$title', '$desc', '$file')";
			$query_run = mysqli_query($con, $query);

			if($query_run){
				echo "<script> alert('Movie review added')</script>";
			}
		}
	?>

	<!-- FORM -->
	<div class="container">
			
	<!-- Page Title -->
	<h3 class="text-warning mt-4 mb-3">Add New Entry</h3>
				
		
	<form method = "post" enctype="multipart/form-data" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<div class="form-group">
			<label class="form-label">Movie Title</label>		
			<input class="form-control" type="text" name="title">
		</div>

		<div class="form-group">
			<label class="form-label mt-2">Movie Description</label>
			<textarea class="form-control" name="body" rows="8"></textarea>
		</div>
		
		<!--  -->
		<div class="form-group">
			<label class="form-label mt-2">Upload Movie Image</label>
			<input class="form-control" type="file" name="image">
    </div>

		<div class="form-group d-flex justify-content-end">
		
			<input class="btn btn-lg btn-outline-light mt-4 mb-3" type="submit" value="Submit" name="upload">
		</div>
	</form>
<br>
<br>
<!-- Footer -->
<?php include('inc/footer.php'); ?>