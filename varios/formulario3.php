<?php
	include_once 'articulos_funciones.php';
?>
<html>
<head></head>
<body>
	<div>
		<fieldset>
		<legend><h1>Registro de producto</h1></legend>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
		<p><label for="Descripcion">Descripcion:</label>
			<input type="text" id="Descripcion" name="Descripcion"></p>
		<p><label for="Clave categoria">Clave categoría:</label>
			<select name="Clave categoria" id="Clave categoria">
				<option value="INF">INF</option>
				<option value="JUV">JUV</option>
				<option value="VET">VET</option>
				<option value="ALE">ALE</option>
				<option value="CLASE_A">CLASE_A</option>
				<option value="CLASE_B">CLASE_B</option>
				<option value="CLASE_C">CLASE_C</option>
			</select></p>
		<p><label for="Precio">Precio:</label>
			<input type="number" id="Precio" name="Precio"> $</p>
		<p><label for="Stock">Stock:</label>
			<input type="number" id="Stock" name="Stock"> Ud.</p>
			
			<p><b>Recargos:</b></p>

			<input type="checkbox" value="importacion" name="check[]">  Importacion   

			<input type="checkbox" value="diseño" name="check[]">  Diseño

			<input type="checkbox" value="temporada" name="check[]">  Temporada

			<input type="checkbox" value="piel" name="check[]">  Piel
			
			<p><input type="Submit" value="guardar" name="check[]"></p>
			</form>
		</fieldset>
	</div>
</body>
</html>