<?php

	error_reporting(E_ALL ^ E_NOTICE);
	
	function SpinTax($s) {
	    preg_match('#{(.+?)}#is',$s,$m);
	    if(empty($m)) return $s;

	    $t = $m[1];

	    if(strpos($t,'{')!==false){
	            $t = substr($t, strrpos($t,'{') + 1);
	    }

	    $parts = explode("|", $t);
	    $s = preg_replace("+{".preg_quote($t)."}+is", $parts[array_rand($parts)], $s, 1);

	    return SpinTax($s);
	}
	
	$ouput = @file_get_contents("http://www.soizastudios.com/rocket/output.txt"); 
	
	$str = "";
	
	if ($output === false ) {
   		$str= "";
	} else {
		$str = $ouput;
	}

	echo SpinTax($str);
	
	
?>