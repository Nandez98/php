<?php
	$extras=array('tenis'=>10,'masaje'=>15,'sauna'=>10,'peluqueria'=>15);
	$cliente=$_POST['nombre_cliente'];
	$dias=$_POST['cliente'];
	if($_POST['habitacion']="suite"){$habitacion=suite; $precio_habitacion=100*1.6;}
	if($_POST['habitacion']="familiar"){$habitacion=familiar;$precio_habitacion=100*1.4;}
	if($_POST['habitacion']="triple"){$habitacion=triple&&$precio_habitacion=100*1.3;}
	if($_POST['habitacion']="doble"){$habitacion=doble&&$precio_habitacion=100*1.2;}
	if($_POST['habitacion']="individual"){$habitacion=individual&&$precio_habitacion=100;}

	
?>

<html>
	<head></head>
	<body>
		<h1>Reserva de habitaciones - Hotel</h1>
		<div>
		<fieldset>
		<legend><h2>Hotel</h2></legend>
			<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
				<p>
					<label for="nombre_cliente">Nombre Cliente:</label>
					<input type="text" id="nombre_cliente" name="nombre_cliente">
				</p>
				<p>
					<label for="dias">Días:</label>
					<input type="text" id="dias" name="dias">
				</p>
				<p>
					<label for="habitacion">Tipo de habitación</label>
					<select id="habitacion" name="habitacion">
						<option value="suite">Suite</option>
						<option value="familiar">Familiar</option>
						<option value="triple">Triple</option>
						<option value="doble">Doble</option>
						<option value="individual">Individual</option>
					</select>
				</p>
				<p>
					Extras: 
					<input type="checkbox" value="<?php echo $extras['tenis'] ?>" name="check[]">Tenis 
					<input type="checkbox" value="<?php echo $extras['masaje'] ?>" name="check[]">Masaje
					<input type="checkbox" value="<?php echo $extras['sauna'] ?>" name="check[]">Sauna 
					<input type="checkbox" value="<?php echo $extras['peluqueria'] ?>" name="check[]">Peluqueria
				</p>
				<p>
					<input type="submit" id="limpiar" name="Limpiar"/>
					<input type="submit" id="reservar" name="Reservar"/>
				</p>
			</form>
		</fieldset>
		</div>
		
		<div>
		<fieldset>
		<legend><h3>Factura</h3></legend>
			<p>
				Nombre: 
				<?php ?>
			</p>
			<p>
				Días:
				
			</p>
			<p>
				Precio base:
				100 €
			</p>
			<p>
				Tipo de habitación:
				
			</p>
			<p>
				Extras: 
			</p>
			<p>
				Total: 
			</p>
		</fieldset>
		</div>
	</body>
</html>