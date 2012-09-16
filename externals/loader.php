<?php

function load_external($external, $rec = false) {
	$gen_path  = dirname(__FILE__)."/$external.php";
	$data_path = dirname(__FILE__)."/data/$external.txt";
	
	if(file_exists($data_path)):
		return file_get_contents($data_path);
	elseif($rec):
		exit('Unable to load external data');
	else:
		require $gen_path;
		return load_external($external, true);
	endif;
}
