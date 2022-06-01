<?php
	session_start();
	
	if(!isset($_SESSION['contador'])){
		$_SESSION['contador']=0;
	}elseif(isset($_SESSION['contador'])){
		$_SESSION['contador']++;
	};
	
	if(!isset($_SESSION['n'])){$_SESSION['n']=rand(1,100);}
?>
<html>
	<head></head>
	<body>
		<h1>El juego del número</h1>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
		<p>
			<label for="numero">Introduce un número: </label>
			<input type="number" name="numero" id="numero"/>
		</p>
		<p>
			<input type="Submit" name="comprobar" id="comprobar"/>
		</p>
		<form>
		
		<?php
			if(!isset($_SESSION['numeros'])){
				$_SESSION['numeros']=[];
			}
	
			if(isset($_POST['numero'])){
				$num=$_POST['numero'];
				array_push($_SESSION['numeros'],$num);
				if($num>$_SESSION['n']){echo "El número a adivinar es menor";};
				if($num<$_SESSION['n']){echo "El número a adivinar es mayor";};
				if($num==$_SESSION['n']){
					echo "<h2>Has acertado ;)</h2></br>"; 
					echo "El número de intentos ha sido: ".$_SESSION['contador']."</br>";
					echo "Los números introducidos han sido: ";
					foreach($_SESSION['numeros'] as $numero_int){
						echo $numero_int." ";
					}
					session_destroy();
					};
			}
			
		?>
	</body>
<html>