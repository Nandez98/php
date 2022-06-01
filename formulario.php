<?php
	session_start();
	$valoracion=array("Muy mala","Mala","Buena","Muy buena");
	
	if(!empty($_POST['nombre'])){$_SESSION['nombre']=$_POST['nombre'];};
	if(!empty($_POST['c_elec'])){$_SESSION['c_elec']=$_POST['c_elec'];};
	if(!empty($_POST['valoracion'])){$_SESSION['valoracion']=$_POST['valoracion'];};
	if(!empty($_POST['comentario'])){$_SESSION['comentario']=$_POST['comentario'];};
?>
<html>
	<head></head>
	<body>
		<fieldset>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
			<h1>VALORACIÓN</h1>
			<p>
				<label for="nombre">Nombre: </label>
				<input type="text" id="nombre" name="nombre"/>
			</p>
			<p>
				<label for="c_elec"> Correo electrónico: </label>
				<input type="text" id="c_elec" name="c_elec"/>
			</p>
			<p>
				<label for="valoracion">Valoración: </label>
				<?php
					foreach($valoracion as $val){
						echo "<input type='radio' value='".$val."' name='valoracion'/>" .$val; 
					};
				?>

			<p>
				<label for="comentario">Comentario: </label>
				<textarea id="comentario" name="comentario"></textarea>
			</p>
			<p>
				<input type="submit" id="enviar" name="enviar"/>
				<input type="reset" id="limpiar" name="limpiar"/>
			</p>
		</form>
		</fieldset>
		<?php if(!empty($_POST['enviar'])){ ?>
		
		<fieldset>
			<h2>DATOS VALORACIÓN</h2>
			<p>
				Nombre: <?php if(!empty($_POST['nombre'])){echo $_POST['nombre'];}; ?>
			</p>
			<p>
				Correo electrónico: <?php if(!empty($_POST['c_elec'])){echo $_POST['c_elec'];}; ?>
			</p>
			<p>
				Valoración: <?php if(!empty($_POST['valoracion'])){echo $_POST['valoracion'];}; ?>
			</p>
			<p>
				Comentario: <?php if(!empty($_POST['comentario'])){echo $_POST['comentario'];}; ?>
			</p>
			<h2>Página conectado.php</h2>
			<a href="./conectado.php">conetado.php</a>
		</fieldset>
		
		<?php } ?>
	</body>
</html>