<!DOCTYPE html>
<html>
	<head>
		<title>Lift Tracker Login</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-2.2.1.min.js" type="text/javascript"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<link href="lift-tracker.css" type="text/css" rel="stylesheet">
		<link href="login.css" type="text/css" rel="stylesheet">
	</head>
	<body>
		<?php
		if(isset($_COOKIE["error"])) {
		?>
		<div class="btn btn-danger" id="error">Error: <?=$_COOKIE["error"]?></div>
		<?php
		}
		?>
		<div class="container-fluid" id="content">
			<fieldset id="returning-user">
				<legend>Existing User</legend>
				<form id="loginform" action="login-submit.php" method="post">
					<div><input name="existname" type="text" size="8" autofocus="autofocus" /> <strong class="input">User Name</strong></div>
					<div><input name="existpassword" type="password" size="8" /> <strong class="input">Password</strong></div>
					<div><input type="submit" value="Log in" /></div>
				</form>
			</fieldset>
			<fieldset id="new-user">
				<legend>Sign Up</legend>
				<form id="newuserform" action="login-submit.php" method="post">
					<div><input name="newname" type="text" size="8" autofocus="autofocus" /> <strong class="input">User Name</strong></div>
					<div><input name="newpassword" type="password" size="8" /> <strong class="input">Password</strong></div>
					<div><input type="submit" value="Log in" /></div>
				</form>
			</fieldset>
		</div>
	</body>
</html>