<?php
	$precio_extras=0;
	$precio_habitacion=0;
	$rec_ten = $rec_mas = $rec_sau = $rec_pel = 0;
	$precio_base=100;
	$dias=0;
	
	if(isset($_POST['dias'])){$dias=$_POST['dias'];};
	
	if(isset($_POST[extras2])){
		$extras2=$_POST[extras2];
		if (in_array("Tenis",$extras2)){
			$rec_ten =10;
		};
		if (in_array("Masaje",$extras2)){
			$rec_mas =15;
		};
		if (in_array("Sauna",$extras2)){
			$rec_sau =10;
		};
		if (in_array("Peluqueria",$extras2)){
			$rec_pel =15;
		};
		$precio_extras= $rec_ten + $rec_mas + $rec_sau + $rec_pel;
	};
	
	if(isset($_POST['habitacion'])){
	if($_POST['habitacion']="suite"){
		$precio_habitacion=100*0.6;
	};
	if($_POST['habitacion']="familiar"){
		$precio_habitacion=100*0.4;
	};
	if($_POST['habitacion']="triple"){
		$precio_habitacion=100*0.3;
	};
	if($_POST['habitacion']="doble"){
		$precio_habitacion=100*0.2;
	};
	};

	$total=(100+$precio_habitacion + $precio_extras)*$dias;
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
					<input type="text" id="nombre_cliente" name="nombre_cliente" required>
				</p>
				<p>
					<label for="dias">Días:</label>
					<input type="number" id="dias" name="dias" required>
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
				<?php
					$extras = array ('Tenis','Masaje','Sauna','Peluqueria');
					foreach ($extras as $extra){
						print "<input type='checkbox' name='extras2[]' value='$extra' ";
						if (isset($_POST['extras2']) && in_array($extra,$_POST['extras2']))
							print "checked='checked'";
						print "/>";
						print "$extra ";
					}
				?>
				</p>
				<p>
					<input type="reset" id="limpiar" name="Limpiar"/>
					<input type="submit" id="reservar" name="Reservar"/>
				</p>
			</form>
		</fieldset>
		</div>
		
		<div>
		<fieldset>
		<legend><h3>Factura</h3></legend>
			<p>
				Nombre: <?php if(isset($_POST['nombre_cliente'])){echo $_POST['nombre_cliente'];};?>
			</p>
			<p>
				Días: <?php if(isset($_POST['dias'])){echo $_POST['dias'];};?>
			</p>
			<p>
				Precio base: <?php if(isset($_POST['nombre_cliente'])){echo $precio_base;};?>
			</p>
			<p>
				Tipo de habitación: <?php if(isset($_POST['habitacion'])){echo $_POST['habitacion'];};?>	
			</p>
			<p>
				Extras: <?php if(isset($_POST['extras2'])){echo implode(" ",$_POST[extras2]);};?>
			</p>
			<p>
				Total: <?php if(isset($_POST['nombre_cliente']) && isset($_POST['dias'])){echo "(100 + ".$precio_habitacion." + ".$precio_extras.")* ".$dias." = ".$total;};?>
			</p>
		</fieldset>
		</div>
	</body>
</html>