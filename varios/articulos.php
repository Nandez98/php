<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Artículos</title>
    </head>
    <body>
		<?php
			include_once 'articulos_funciones.php';
			if (isset($_POST['enviar']) && !empty($_POST['descripcion']) 
				&& !empty($_POST['categoria']) && !empty($_POST['precio']) 
				&& !empty($_POST['stock'])) {
				$descripcion = $_POST['descripcion'];
				$categoria = $_POST['categoria'];
				$precio = $_POST['precio'];
				$stock = $_POST['stock'];
				if (!empty($_POST['recargos'])) {
					$recargos = $_POST['recargos'];
					$recargo = calcula_recargo($precio, $recargos);
				}
				else
					$recargo = 0;
				$descuento = calcula_descuento($precio,$recargo);
				$pvp = calcula_total($precio, $recargo, $descuento); 
				print "<fieldset>";
				print "<legend><h2>Producto guardado</h2></legend>";
				print "<p>Descripción: ".$descripcion."</p>";
				print "<p>Categoría: ".$categoria."</p>";
				print "<p>Stock: ".$stock."</p>";
				if (!empty($_POST['recargos'])) {
					print "<p>Recargos: ";
					foreach ($recargos as $cargo)
						print $cargo."  ";
					print "</p>";
				} else
					print "<p>No hay recargos</p>";
				printf ("<p>Precio: %.2f€", $precio);		
				printf ("<br/>Recargo: %.2f€",$recargo);		
				printf ("<br/>Descuento: %.2f€",$descuento);		
				printf ("<br/><b>PVP: %.2f€.</b></p>",$pvp);		
				print "<p><a href='$_SERVER[PHP_SELF]'>Volver al inicio</a></p>";
				print"</fieldset>";
			} else {
		?>
		<fieldset>
		<legend><h2>Artículos</h2></legend>
		<form name="input" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<p>
				Descripción: 
				<input type="text" name="descripcion" value="<?php if (!empty($_POST['descripcion'])) echo $_POST['descripcion'];?>" />
				<?php	
					if (isset($_POST['enviar']) && empty($_POST['descripcion']))
						echo "<span style='color:red'> &lt;-- Debe introducir la descripción!!</span>"
				?>
			</p>
			<p>
				Categoría: 
				<select name="categoria" />
				<?php
					$categorias = array ("INF"=>"Infantil","JUV"=>"Juvenil","VET"=>"Veterano","ALE"=>"Alevín","CLASE_A"=>"Clase A","CLASE_B"=>"Clase B","CLASE_C"=>"Clase C");
					foreach ($categorias as $clave => $categoria){
						if (isset($_POST['enviar']) && !empty($_POST['categoria']) && $_POST['categoria']==$categoria)
							print "<option value=".$categoria." selected>".$clave."</option>";
						else
							print "<option value=".$categoria.">".$clave."</option>";
					}
				?>
				</select>
				<?php	
					if ((isset($_POST['enviar']) && empty($_POST['categoria'])))
						echo "<span style='color:red'> &lt;-- Debe introducir la categoría!!</span>"
				?>
			</p>
			<p>
				Precio: 
				<input type="number" name="precio" min="0" value="<?php if (!empty($_POST['precio'])) echo $_POST['precio'];?>" />€.
				<?php	
					if (isset($_POST['enviar']) && empty($_POST['precio']))
						echo "<span style='color:red'> &lt;-- Debe introducir el precio!!</span>"
				?>
			</p>
			<p>
				Stock: 
				<input type="number" name="stock"  min="1" value="<?php if (!empty($_POST['stock'])) echo $_POST['stock'];?>" />Uds.
				<?php	
					if (isset($_POST['enviar']) && empty($_POST['stock']))
						echo "<span style='color:red'> &lt;-- Debe introducir el stock!!</span>"
				?>
			</p>
			<p>
				Recargos:
			</p>
			<p>
				<?php
					$lista_recargos = array ("Importación","Diseño","Temporada","Piel");
					foreach ($lista_recargos as $recargo){
						print "<input type='checkbox' name='recargos[]' value='$recargo' ";
						if (isset($_POST['recargos']) && in_array($recargo,$_POST['recargos']))
							print "checked='checked'";
						print "/>";
						print "$recargo ";
					}
				?>
			</p>
			<p>
				<input type="reset" value="Limpiar campos" name="limpiar" />
				<input type="submit" value="Guardar artículo" name="enviar" />
			</p>
		</form>
		</table>
		</fieldset>
		<?php
			}
		?>
	</body>
</html>