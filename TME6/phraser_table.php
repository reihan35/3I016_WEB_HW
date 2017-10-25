<?php
require('phraser.php');

function ouvrante($analyseur, $nom, $attr){
	global $tableau;
	
	if ($nom == 'td'){
		if (!isset($tableau))
			$tableau = array();
		if (isset($tableau['td'])){
			foreach($attr as $k=>$v){
				$tableau['td'][$k] = $v; 
			}
			if (!isset($attr['colspan'])){
				$tableau['td']['colspan'] = 1;
			}
		}
	}
}

function fermante($analyseur, $nom){
	if ($nom == 'tr'){
		/* il faut considérer un nouveau sous-tableau pour une éventuelle nouvelle row */
	}
}


$file = fopen("testSimpleTable.html", "r");
$data = phraser($file);
var_dump($data);
fclose($file);

?>
