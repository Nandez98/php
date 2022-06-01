<?php
	require("conexion.php");
	echo "</br>";
		$sql="select * from cliente order by nif";
		$result=$mysqli->query($sql);
		while($row=$result->fetch_array()){
			echo $row['nombre']." - ".$row['direccion']." - ".$row['telefono']."</br>";
		}
?>