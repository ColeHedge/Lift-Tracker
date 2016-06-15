<?php
	# This document displays the logged in user's homescreen
	#

	$username = $_COOKIE["username"]; #logged in user
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" />
		<script src="https://code.jquery.com/jquery-2.2.1.min.js" type="text/javascript"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link href="lift-tracker.css" type="text/css" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script type="text/javascript" src="home.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
		<link href="home.css" type="text/css" rel="stylesheet" />
		<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
	</head>
	<body>
		<div class="container-fluid" id="content">
			<div id="row 1">
				<p class="row" id="welcome">Welcome <?=$username?></p>
				<button class="btn btn-default" id="logout">Logout</button>
			</div>
			<div class="container" class="row" id="buttons">
				<button class="btn btn-success btn-lg" id="display">Display</button>
				<button class="btn btn-primary btn-lg" id="record">Record New Lift</button>
			</div>
			<div class="row" class="col-lg-6" id="graph">
			</div>
			<div class="container" id="track">
				<form role="form" action="submit.php" method="post">
					<div class="radio">
						<label><input type="radio" name="lift" value="bench"/>Bench Press</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="lift" value="squat"/>Squat</label>
					</div>
					<div class="radio">
						<label><input type="radio" name="lift" value="deadlift"/>Dead Lift</label>
					</div>
					<a class="btn btn-info" href="http://www.bodybuilding.com/fun/other7.htm">One Rep Max Calculator</a>
					<div class="form-group">
						<label for="Weight">One Rep Max:</label>
						<input type="number" class="form-control" id="weight" name="weight"/>
					</div>
					<input type="hidden" name="name" value=<?=$username?>>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
	</body>
</html>