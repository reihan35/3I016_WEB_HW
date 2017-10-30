<?php 
require_once('phraser.php'); 

global $table; 
$table = array(); 

function ouvrante($phraseur, $name, $attrs) 
{ 
    global $table; 

    switch ($name) { 
	    case "tr": 
	        $table[] = array(); /* nouvelle ligne dans le tableau */
	        break; 
	    case "td":  
	        if (!isset($attrs['colspan'])) /* colspan manquant */
	        	$attrs['colspan'] = 1;
	        if (!isset($attrs['style'])) /* attribut style manquant */
	        	$attrs['style'] = 'color: black'; 
					$table[count($table)-1][] = $attrs; /* ajout du tableau d'attributs */
	        break; 
    } 
} 
?> 
