<?php
	require("conexion.php");
	echo "</br>";
	
	$sql= "select * from producto order by nombre";
	$result=$mysqli->query($sql);
	while($row=$result->fetch_array()){
		echo $row['nombre']." - ".$row['precio']." - ".$row['descripcion']."</br>";
	}
?>