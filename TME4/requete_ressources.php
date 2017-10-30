<?php
require('re_entete.php');
require('re_url.php');

function requete_ressources($req, $url){
	/* r[0] : tout l'url
		 r[1] : serveur
		 r[2] : port
		 r[3] : ressource */
	/* décomposition de l'URL 
	   Erreur si l'URL ne respecte pas l'expression rationnelle ou si le serveur spécifié est la chaîne vide */
	if ((!preg_match('RE_URL', $url, $r) or (!$r[1]))
		return "URL incorrect";
	
	/* on peut aussi affecter les cases du tableau r à des variables */
	list(,$serveur, $port, $ressource) = $r;

	if (!$port) $port = 80; /* par défaut */

	$d = fsockopen($serveur, $port); /* on établit la connexion */
	if (!$d){
		return ($serveur." sur le port ".$port." ne répond pas.");
	}else{
		fputs($d, "$req $url http/1.1\nHost:$serveur\n"); /* envoi au serveur */

		$status = fgets($d); /* première ligne n'est pas un entête mais le code de retour à 3 chiffres*/

		$entetes = array();
		/* lecture ligne à ligne des réponses jusqu'à la première ligne vide */
		while (strlen($l = fgets()) > 2){
			if (preg_match("RE_ENTETE", $l, $x)){
				/* index : nom de l'entete 
					 valeur : valeur qui suit dans la ligne */
				$entetes[$x[1]] = $x[2];
			}
		}
		$page = '';
		while (!feof($d)){ /* on a pas atteint la fin du fichier */
			$page .= fgets($d); /* récupération de la page */
		}
		return array($status, $entetes, $page);
	}
}
?>
