<?php
include('debut_html.php');

/* le script a reçu une donnée nommée id en méthode get et représentant un identifiant numérique non nul */
if (isset($_GET['id'] AND intval($_GET['id'])){
	include('desc_diplomes.php');
	include('tableau_en_select.php');
	echo tableau_en_select($desc_diplomes, $_GET['id']);
}
/* sinon, le script envoie une page HTML valide avec un formulaire */
else{
	/* le titre de la page et du corps est Identification, mais comportera en plus le mot "Erreur" si la donnée est présente mais erronnée */
	$title = (isset($_GET['id']))?'Erreur':'').'Identification';
	$body = "<body>\n$title".
		"<form action='saisie_unique.php' method='get'><fieldset>\n".
		"<label for id='nom'>Identification Numerique:</label>\n".
		/* unique balise du formulaire, pas besoin de bouton de soumission. 
			formulaire envoyé en méthode GET à lui même */
		"<input id='id' type='text' name='id'/>\n".
		"</fieldset></form></body></html>\n";
	echo debut_html($title).$body;
}

?>
