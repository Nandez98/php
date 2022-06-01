<?php
	if(!empty($_POST['dia']) && !empty($_POST['mes']) && !empty($_POST['ano'])){

		$dia= $_POST['dia'];
		$mes= $_POST['mes'];
		$anio= $_POST['ano'];
		date_default_timezone_set('Europe/Madrid');
				if (checkdate($mes,$dia,$anio)){
					$fecha = mktime(0,0,0,$mes,$dia,$anio);
					$numero_dia_semana = date("N", $fecha);
					switch($mes){
						case 1: $mes = "Enero";
							break;
						case 2: $mes = "Febrero";
							break;
						case 3: $mes = "Marzo";
							break;
						case 4: $mes = "Abril";
							break;
						case 5: $mes = "Mayo";
							break;
						case 6: $mes = "Junio";
							break;
						case 7: $mes = "Julio";
							break;
						case 8: $mes = "Agosto";
							break;
						case 9: $mes = "Septiembre";
							break;
						case 10: $mes = "Octubre";
							break;
						case 11: $mes = "Noviembre";
							break;
						case 12: $mes = "Diciembre";
							break;
					}
					switch($numero_dia_semana){
						case 1: $dia_semana = "Lunes";
							break;
						case 2: $dia_semana = "Martes";
							break;
						case 3: $dia_semana = "Miércoles";
							break;
						case 4: $dia_semana = "Jueves";
							break;
						case 5: $dia_semana = "Viernes";
							break;
						case 6: $dia_semana = "Sábado";
							break;
						case 7: $dia_semana = "Domingo";
							break;
					}
					echo "<p><center>".$dia_semana.", ".$dia." de ".$mes." de ".$anio."</center></p>";
	}
	}
	
?>
<html>
<head></head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>"method="POST">
		<p>
			<label for="Dia">Día:</label>
			<input type="text" id="dia" name="dia">
		</p>
		<p>
			<label for="Dia">Mes:</label>
			<input type="text" id="mes" name="mes">
		</p>
		<p>
			<label for="Dia">Año:</label>
			<input type="text" id="ano" name="ano">
		</p>
		<input type="submit">
	</form>
</body>
</html>