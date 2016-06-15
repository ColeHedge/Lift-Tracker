<?php
	# Logs user out
	# deletes stored username
	# sends user back to start page
	setcookie("username", "blah", time() - 5);
	header("Location: start.php");
?>