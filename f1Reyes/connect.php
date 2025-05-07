<?php 
	$connection = new mysqli('localhost', 'root','','dbf1Reyes');
	
	if (!$connection){
		die (mysqli_error($mysqli));
	}
		
?>