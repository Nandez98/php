<?php
	require("conexion.php");
	echo "</br>";
	
	$nif="10978289V";
	$nombre="Gonzalo";
	$direccion="Cuatro caminos";
	$email="gonzalo@alisal.es";
	$telefono="683489331";
	$saldo=3500;
	
	$sql="insert into cliente values('$nif','$nombre','$direccion','$email','$telefono','$saldo')";
	$sql2="select nombre from cliente where nombre='$nombre'";
	
	$result=$mysqli->query($sql);
	$result2=$mysqli->query($sql2);
	if($result2!=null){
		echo "El usuario <b>".$nombre."</b> ha sido insertado correctamente";
	}else{
		echo "El usuario <b>".$nombre."</b> NO ha sido insertado correctamente";
	}
?>