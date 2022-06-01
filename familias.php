<html>
	<head><link href="iaw.css" rel="stylesheet" type="text/css"></head>
	<body>
		<div id="encabezado">
			<h1>Ejercicio: Obtención de productos de una familia</h1>
			<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				Familia:<select name="familia">
				<?php
					if(isset($_POST['familia'])) $familia=$_POST['familia'];
					@ $iaw=new mysqli("localhost", "iaw", "abc123.", "iaw");
					$error= $iaw->connect_errno;
					if($error == null){
						$consulta="select cod, nombre from familia";
						$res_consulta=$iaw->query($consulta);
						if($res_consulta){
							$row=$res_consulta->fetch_assoc();
							while($row != null){
								echo "<option value='${row['cod']}'";
								if(isset($producto) && $familia=$row['cod'])
									echo "select='true'";
								echo ">${row['nombre']}</option>";
								$row=$resultado->fetch_assoc();
							}
							$res_consulta->close();
						}
					}else{
						$mensaje=$iaw->connect_errno();
					}
				?>
				</select>
				<input type value="Mostrar productos" name="mostrar"/>
			</form>
		</div>
	
		<?php if(isset($_POST['familia'])){ ?>
		<div id="contenido">
		
		</div>
		<?php } ?>
	</body>
</html>