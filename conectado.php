<?php
	session_start();
	echo "Tu sesión es: ".session_id();
?>
<html>
	<head></head>
	<body>
		<fieldset>
			<h2>DATOS DE LA VALORACIÓN</h2>
			<p>
				Nombre: <?php if(!empty($_SESSION['nombre'])){echo $_SESSION['nombre'];}; ?>
			</p>
			<p>
				Correo electrónico: <?php if(!empty($_SESSION['c_elec'])){echo $_SESSION['c_elec'];}; ?>
			</p>
			<p>
				Valoración: <?php if(!empty($_SESSION['valoracion'])){echo $_SESSION['valoracion'];}; ?>
			</p>
			<p>
				Comentario: <?php if(!empty($_SESSION['comentario'])){echo $_SESSION['comentario'];}; ?>
			</p>
		
		</fieldset>
	</body>
</html>