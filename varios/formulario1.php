<?php
	if(!empty($_POST['usuario']) && !empty($_POST['pass'])){
		if($_POST['usuario']=="jorge" && $_POST['pass']=="1234"){
			header("Location:index.php");
		}else{
			echo "Error";
		}
	}
?>

<html>
	<head></head>
	<body>
		<h1>LOGIN USUARIO</h1>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
		<p>
			<label for="usuario">USUARIO</label>
			<input value="<?php if(isset($_POST['usuario'])) echo $_POST['usuario'];?>" type="text" id="usuario" name="usuario">
		</p>
		<p>
			<label for="pass">CONTRASEÑA</label>
			<input type="password" id="pass" name="pass">
		</p>
			<input type="submit">
		</form>
	</body>
</html>