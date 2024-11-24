<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'noah', 'noah1234', 'tescom_inventories');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>