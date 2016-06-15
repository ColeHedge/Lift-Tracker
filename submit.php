<?php
	# This file's function is to store data from the user
	$user = $_POST["name"];
	$weight = $_POST["weight"];
	$lift = $_POST["lift"];
	$date = date("y-m-d");

	$file = "lifts/$user/$lift.txt";
	$input = "$weight|$date";

	file_put_contents($file, "$input\n", FILE_APPEND);

	header("Location: home.php");
?>