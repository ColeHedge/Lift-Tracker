<?php	
	# This page validates login for users
	# Creates new accounts for new users and sets up data storage for new accounts

	# dies if parameters are not set
	# if new user information is passed creates account
	# if returning user is passed validates login
	if(!isset($_POST["newname"]) && !isset($_POST["newpassword"]) && !isset($_POST["existname"]) && !isset($_POST["existpassword"])) {
		header("location: login.php");
		die();
	} elseif(isset($_POST["newname"])) {
		new_user($_POST["newname"], $_POST["newpassword"]);
	} else {
		existing_user($_POST["existname"], $_POST["existpassword"]);
	}

	# creates account for new users
	# stores username and password on server
	# creates storage for lift information
	# returns error if the chosen username is already stored (someone else is using it)
	function new_user($name, $password) {
		$users = file("users.txt");
		foreach($users as $user) {
			$line = explode(":", $user);
			list($username, $user_password) = $line;
			if(trim($username) == $name) {
				setcookie("error", "Username Already Exists");
				header("location: login.php");
				die("username already exists");
			}
		}
		file_put_contents("users.txt", "\n$name:$password",FILE_APPEND);
		mkdir("lifts/$name");
		fopen("lifts/$name/bench.txt", "w");
		fopen("lifts/$name/squat.txt", "w");
		fopen("lifts/$name/deadlift.txt", "w");
		log_in($name);	
	}

	# validates returning user's names
	# if username is recongized validates password
	# dies and sets error if username and password doesn't match stored data
	# dies and sets error if username isn't recongized
	function existing_user($name, $password) {
		$users = file("users.txt");
		$flag = false;
		foreach($users as $user) {
			$line = explode(":", $user);
			list($username, $user_password) = $line;
			if(trim($username) == $name) {
				validate_password($name, $password, trim($user_password));
				$flag = true;
			}
		}
		if(!$flag) {
			setcookie("error", "Username Not Recongized");
			header("location: login.php");
			die("invalid login");
		}
	}

	# validates returning user's paswords
	# if username matches stored password logs user in
	# dies if username and password don't match
	function validate_password($name, $password, $user_password) {
		if($password == $user_password) {
			log_in($name);
		} else {
			setcookie("error", "Invalid Password");
			header("location: login.php");
			die("invalid password");
		}
	}

	# Logs user into their account
	# removes errors
	# stores logged in username
	# sends user to home page
	function log_in($name) {
		setcookie("error", "blah", time() - 5);
		setcookie("username", "$name");
		header("location: home.php");
	}
?>