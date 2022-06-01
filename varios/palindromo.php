<?php 
	function palindromo ($az) {
		$az=str_split($az);
		echo "<br>array: "; print_r($az); echo "<br>";
		
		foreach ($az as $posicion => $caracter)
			if ($caracter==" ") unset($az[$posicion]);

//		Otra forma de quitar los espacios:
//		while ($key=array_search("a",$az))
//			unset($az[$key]);

		echo "<br>array: "; print_r($az); echo "<br>";
		
		$az=array_values($az);
		echo "<br>array: "; print_r($az); echo "<br>";
		
		$za=array_reverse($az);
		echo "<br>yarra: "; print_r($za); echo "<br>";

		if ($az==$za) 
			return true;
		else 
			return false;
	}

	function palindromo2 ($ay) {
		$ay=str_split($ay);
		echo "<br>array: "; print_r($ay); echo "<br>";

		for ($i=0;$i<count($ay);$i++)
			if ($ay[$i]==" ") unset($ay[$i]);
		echo "<br>array: "; print_r($ay); echo "<br>";

		reset($ay);
		for ($i=0;$i<count($ay);$i++) {
			$az[$i]=current($ay);
			next($ay);
		}
		echo "<br>array: "; print_r($az); echo "<br>";
		
		for ($i=0;$i<count($az);$i++)
			$za[$i]=$az[count($az)-1-$i];
		echo "<br>yarra: "; print_r($za); echo "<br>";

		if ($az==$za) 
			return true;
		else 
			return false;
	}
	
	function palindromo3 ($cad) {
		$cad=strtolower($cad);
		echo "<br>cadena: "; echo "$cad"; echo "<br>";
		
		$cad=str_replace(" ","",$cad);
		echo "<br>cadena: "; echo "$cad"; echo "<br>";

		$cadrev=strrev($cad);
		echo "<br>cadena: "; echo "$cad"; echo "<br>";

		if ($cad==$cadrev) 
			return true;
		else 
			return false;
	}	
	
	$cadena = "arriba la birra"; //"amad a la dama"

	if (palindromo($cadena))
		echo "<br>La cadena \"$cadena\" SI es un palíndromo<br>";		
	else
		echo "<br>La cadena \"$cadena\" NO es un palíndromo<br>";

	if (palindromo2($cadena))
		echo "<br>La cadena \"$cadena\" SI es un palíndromo<br>";		
	else
		echo "<br>La cadena \"$cadena\" NO es un palíndromo<br>";

	if (palindromo3($cadena))
		echo "<br>La cadena \"$cadena\" SI es un palíndromo<br>";		
	else
		echo "<br>La cadena \"$cadena\" NO es un palíndromo<br>";
?>