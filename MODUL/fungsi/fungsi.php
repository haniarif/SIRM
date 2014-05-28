<?php

	function auto_rm($param){
		$string = "0000000".$param;
		$pnj = strlen($string);
		$start = $pnj-6;
		$value = substr($string, $start,6);
		return $value;
	}

?>