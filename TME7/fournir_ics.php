<?php

include('debut_html.php');
include('envoi_ics.php');

if(!isset($_FILES['fichier1']['name']) and !isset($_FILES['fichier2']['name'])){
	$body="<body\n><form action='' method='post' enctype='multipart/form-data'>\n<fieldset>\n".
	"<input name='fichier1' type='file'>\n".
	"<input name='fichier2' type='file'>\n".
	"<input type='submit'>\n".
	"</fieldset>\n</form>\n</body>\n";
	echo debut_html("F-A-R-A") . $body . "</html>\n"; 
} else {
	envoi_ics(fusionnerics($_FILES['fichier1']['name'],$_FILES['fichier2']['name']), "Fara.ics");
	
}

?>
