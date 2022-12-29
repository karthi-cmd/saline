<?php
	// $conn = new mysqli('eu-cdbr-west-02.cleardb.net','b49c4a3d9ebc27','6220abf1','heroku_5a855cb951c334c');
	$conn = new mysqli('localhost', 'root', '', 'saline');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>