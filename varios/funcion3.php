<?php
	function estudio($c,$r,$t){
	
	
	function interessimple($c,$r,$t){
		$is=$c*$r*$ta;
		return $is;
	}
	
	function interescompuesto($c,$r,$t){
		$ic=$c*(1+$r)^$t - $c;	
		return $ic;
	}
	
	if($ic>$is){
		return "Interes simple";
	}else{
		return "Interes compuesto";
	}
	}
	
	
	$c = 10000;
	$r = 5;
	$t = 5;
	echo"El menor interes con capital: ".$c." Interes: ".$r." Y tiempo en años :".$t." Es el:". estudio($c,$r,$t);
?>