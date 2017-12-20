<?php


define('RE_BALAPACHE', '/^(\s*<\S+)\s+(["\']?)([^>]+)\2\s*(>.*)$/');
define('RE_VIDE', '/^\s*(#.*)?$/');

function pseudo_xml_to_array_xml($file){
	
	$lines=file($file);
	
	$tab = array();
	
	foreach($lines as $line){
		if(!preg_match(RE_VIDE,$line,$r)){
			if(preg_match(RE_BALAPACHE,$line,$r)){
				var_dump($r);
			}
		}
	}
}

pseudo_xml_to_array_xml("apache2.conf");
?>


