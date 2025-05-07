<?php
	include 'connect.php';

	if (!$connection) {
	    die('Could not connect: ' . mysqli_connect_error());
	}

	$query = 'SELECT * FROM tbluser';
	$resultset = mysqli_query($connection, $query);

	if (!$resultset) {
	    die('Query Failed: ' . mysqli_error($connection));
	}
?>