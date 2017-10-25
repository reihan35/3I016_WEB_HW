<?php

function saisies_indicees($ens){
	if (!$ens) return '';
	
	$res = '';
	
	foreach($ens as $k=>$nom){
		$res .= "<li>".
		/* création d'un sous tableau d'indice ens dans le tableau $_GET
			 qui aura autant d'éléments que de cases cochées lors de l'envoi */
		"<input id='ens$K' value='$K' name='ens[]' type='checkbox'".
		"<label for='ens$K'>$nom</label>".
		"</li>\n".
	}
	return "<fieldset><ol>\n$res</ol><fieldset>\n";
}

function indices_choisis($ens, $indices){
	
}

?>
