<?php
	$host="localhost";
	$user="super";
	$password="super123";
	$database="tienda";
	@$mysqli=new mysqli($host,$user,$password,$database);
	
	if($mysqli->connect_errno){
		echo "<p>El error ".$mysqli->connect_error." conectando a la base de datos tienda.";
	}else{
		echo "La conexión del usuario <b>".$user."</b> ha sido satisfactoria.";
	}
?>