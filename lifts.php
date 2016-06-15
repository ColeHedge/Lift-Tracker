<?php
	# This file returns an XML document from the users stored data
	$username = $_GET["username"];

	createXML($username);

	# prints XML document containing all stored lifts
	function createXML($username) {
		$dom = new DOMDocument();
		$lifts = $dom->createElement("lifts");
		$dom->appendChild($lifts);
		$files = glob("./lifts/$username/*");
		foreach($files as $file) {
			$file_name = basename($file);
			$split_name = explode(".", $file_name);
			$lift_name = $split_name[0];
			$lift = $dom->createElement("lift");
			$lift->setAttribute("name", $lift_name);
			$lines = file($file);
			foreach($lines as $line) {
				$entry = $dom->createElement("entry");
				$split = explode("|", $line);
				list($weight, $date) = $split;
				$entry->setAttribute("date", $date);
				$entry->setAttribute("weight", $weight);
				$lift->appendChild($entry);
			}
			$lifts->appendChild($lift);
		}
		header("Content-type: text/xml");
		print $dom->saveXML();
	}

?>