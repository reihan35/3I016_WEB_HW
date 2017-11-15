<?php

require_once('fusionne_ics.php');

function envoi_ics($tab, $name){

	header("Content-Type: text/calendar; charset=utf-8");
	header("Content-Transfer-Encoding: 8bit");
	header("Content-Disposition: inline; filename='" . $name . "'; creation-date=" .gmdate("M d Y H:i:s", time()));

	if (count($tab) == 0){
		header("Content-Type: text/plain");
		echo $name;
	}	
	else{
		foreach($tab as $ligne)
			echo $ligne;
	}
}

//envoi_ics(fusionnerics("SACS 9692.ics","SACS Groupe 1 Licence.ics"), "Fara.ics");

?>
