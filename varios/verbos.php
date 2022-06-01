<?php 
	
	$verbos = array ("amar","cantar","ayudar","hablar","bailar","cocinar","estudiar","escuchar","comprar","viajar");
	$term_presente = array ("o","as","a","amos","áis","an");
	$term_pasado = array ("é","aste","ó","amos","asteis","aron");	
	$term_futuro = array ("aré","arás","ará","aremos","aréis","arán");
	
	$verbo = $verbos[array_rand($verbos)];
	echo "<br>Verbo: $verbo";
	
	$raiz = substr($verbo,0,-2);
	echo "<br>Raíz: $raiz";
	
	foreach ($term_presente as $terminacion)
			$presente[] = "$raiz"."$terminacion";
	foreach ($term_pasado as $terminacion)
			$pasado[] = "$raiz"."$terminacion";
	foreach ($term_futuro as $terminacion)
			$futuro[] = "$raiz"."$terminacion";
	
	echo "<br>Presente: "; 
	foreach ($presente as $tiempo) echo $tiempo." ";
	echo "<br>Pasado: ";
	foreach ($pasado as $tiempo) echo $tiempo." ";
	echo "<br>Futuro: "; 
	foreach ($futuro as $tiempo) echo $tiempo." ";

?>