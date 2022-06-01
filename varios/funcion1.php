<?php
	define ("PI", 3.1415926);

	function area_circulo($radio){
		define("pi", 3.1415926);
		$area=$radio^pi * pi;
		return $area;
	}
	
	function perimetro_circulo($radio){

		$perimetro=$radio*pi*2;
		return $perimetro;
	}
	
	function volumen_radio($radio){

		$volumen=(4/3*pi)*$radio^3;
		return $volumen;
	}
	
	$radio=34;	
	echo"Area de $radio = ".area_circulo($radio)."</br>";
	$radio=267;	
	echo"Perímetro de $radio = ".perimetro_circulo($radio)."</br>";
	$radio=22;	
	echo"Volumen de $radio = ".volumen_radio($radio)."</br>";
?>