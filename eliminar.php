<?php
	require("conexion.php");
	echo "</br>";
	
	$nif="98765432A";
	$sql="delete from cliente where nif='$nif'";
	$sql_1="delete from pedido where cliente='$nif'";
	$sql2="select nombre from cliente where nif='$nif'";
	
	$result=$mysqli->query($sql_1);
	$result=$mysqli->query($sql);
	$result2=$mysqli->query($sql2);
	
	if($result2){
		echo "El usuario con nif <b>".$nif."</b> ha sido eliminado.";
	}else{
		echo "El usuario con nif <b>".$nif."</b> NO ha sido eliminado.";
	}
?>