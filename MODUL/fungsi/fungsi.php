<?php

	function auto_rm($param){
		$string = "0000000".$param;
		$pnj = strlen($string);
		$start = $pnj-8;
		$value = substr($string, $start,8);
		return $value;
	}

?>