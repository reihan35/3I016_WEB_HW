<?php
require('debut_html.php');

function tableau_en_select($desc_diplomes, $id){
	$sel = '<option></option>';
	foreach($desc_diplomes as $diplome=>$annees){
		$les_annees = ' ';
		foreach($annees as $annee=>$ens){
			$les_annees .= "<option>$annee</option>\n";
		}
		$sel .= "<optgroup label='$diplome'>$lesannees</optgroup>\n";
	}

	if (!isset($desc_diplomes)){
		$titre = "Erreur:";
		$sel = "pas de groupe";
	}
	else{
		$titre = "Choisir l'enseignement";
		$sel = "<form action='choisir_enseignement.php' method='post'><fieldset>\n".
		"<label for='annee'>Choisir une annee</label>\n".
		"<select id='annee' name='annee'>$sel</select>\n".
		"<input type='hidden' name='id' value='$id'/>\n".
		"<input type='submit'/>".
		"</fieldset></form>\n";
		return debut_html($titre."choix de l'annee pour $id").
		"<body>$sel</body></html>\n";
	}
}

?>
