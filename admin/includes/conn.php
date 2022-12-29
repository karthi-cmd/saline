<?php
	$conn = new mysqli('localhost', 'root', '', 'saline');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>
