<?php

function fusionnerics($fic1,$fic2){
	
	$tab1=file($fic1);
	$tab2=file($fic2);
	
	array_shift($tab2);//l'entete du 2
	array_pop($tab1);//l'en-pied du 1
	$merged=array_merge($tab1,$tab2);
	
	//var_dump($merged);
	return $merged;


}

//fusionnerics("SACS 9692.ics","SACS Groupe 1 Licence.ics");

?>
