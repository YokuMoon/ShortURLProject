<?php
	$conn = mysqli_connect("localhost", "root", "root", "url_short");
	if(!$conn) {
		echo "Database connection error".mysqli_connect_error;
	}
?>