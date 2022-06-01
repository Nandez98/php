<?php
	require("conexion.php");
	
	$nif="12345678Z";
	$cantidad=500;

	$sql="update cliente set saldo=saldo+'$cantidad' where nif='$nif'";
	
	$result=$mysqli->query($sql);
?>