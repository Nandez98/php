<?php
	
	function calcula_recargo ($precio, $recargos) {
		$rec_imp = $rec_dis = $rec_tem = $rec_pie = 0;
		if (in_array("Importación",$recargos))
			$rec_imp = $precio * 0.1;
		if (in_array("Diseño",$recargos))
			$rec_dis = $precio * 0.12;
		if (in_array("Temporada",$recargos))
			$rec_tem = $precio * 0.08;
		if (in_array("Piel",$recargos))
			$rec_pie = $precio * 0.15;
		return $rec_imp + $rec_dis + $rec_tem + $rec_pie;
	}
	
	function calcula_descuento ($precio, $recargo) {
		return ($precio + $recargo) * 0.05;
	}
	
	function calcula_total ($precio, $recargo, $descuento) {
		return $precio + $recargo - $descuento; 
	}
	
?>
