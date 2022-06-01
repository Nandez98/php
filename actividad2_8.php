<?php
	session_start();
	$agenda=array("Jose"=>600000000,"Primo"=>610000000,"Rivera"=>620000000,"Paquito"=>630000000,"Ramiro"=>640000000,"Lusiana"=>650000000);
	if(!isset($_SESSION['listado'])){$_SESSION['listado']=array();};
	if(isset($_POST['cerrar'])){session_destroy();};
?>

<html>
<head></head>
<body>
	<fieldset style="border-color:blue; align:center; border:7">
		<h1>LOCALIZADOS</h1>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
			<p>
				<label for="titular">Titular: </label>
				<input type="text" name="titular" id="titular"/>
			</p>
			<p>
				<input type="Submit" name="buscar" value="Buscar">
				<input type="Submit" name="listar" value="Listar" align="right">
				<input type="Submit" name="cerrar" value="Cerrar" align="right">
			</p>
			<p>
			<?php 
				if(isset($_POST['buscar'])){
					if(array_key_exists($_POST['titular'],$agenda)){
						echo "Titular:".$_POST['titular']." Número: ".$agenda[$_POST['titular']];
						$_SESSION['listado'][$_POST['titular']]=$agenda[$_POST['titular']];
					};
					if(!array_key_exists($_POST['titular'],$agenda)){
						echo "El contacto: ".$_POST['titular']." No existe.";
					};
				};
			?>
			<?php if(isset($_POST['listar'])){ ?>
				<table border="1" align="center">
					<tr><th>TITULAR</th><th>NÚMERO</th></tr>
					<?php
						foreach($_SESSION['listado'] as $titular => $numero){
							echo "<tr><td>".$titular."</td><td>".$numero."</td></tr>";
						};
					?>
				</table>
			<?php }; ?>
			</p>
		</form>
	</fieldset>
<body>
</html>