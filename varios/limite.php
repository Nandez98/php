<?php 
	function limitar ($arraynum,$numero) {
		//echo "<br>"; print_r($arraynum); echo "<br>";
		
		foreach ($arraynum as $clave => $valor)
			if ($valor>=$numero) unset($arraynum[$clave]);
		//echo "<br>"; print_r($arraynum); echo "<br>";
		
		$arraynum=array_values($arraynum);
		//echo "<br>"; print_r($arraynum); echo "<br>";
		
		return $arraynum;
	}
	
	$numeros = array (2,4,6,12,32,7,10,15,3,8,24);
//	$numeros = array (2.5,4,6.3,12,32.7,7,10,15.6,3,8,24);
	$limite = 10;
	echo "<br>Array inicial: "; print_r($numeros);
	$limitado=limitar($numeros,$limite);
	echo "<br>Array limitado: "; print_r($limitado);

	?>