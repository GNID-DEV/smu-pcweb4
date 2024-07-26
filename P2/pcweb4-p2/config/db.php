<?php

// Connecting to DB
$con = mysqli_connect("localhost", "root", "") or die("Unable to connect");
// Selecting DB
mysqli_select_db($con, "films_review");
?>