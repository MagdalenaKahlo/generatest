<?php
    
	$host = "localhost:3307";
	$user = "root";
	$contrasena = "usbw";
	$db = "generatest";

	$con = new mysqli($host,$user,$contrasena,$db) or die("Error" .mysqli_error($con));

?>
