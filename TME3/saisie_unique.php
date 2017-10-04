<?php

require("debut_html.php");
require("desc_diplomes.php");
require("tableau_en_select.php");

echo debut_html("Identification");
echo "body\n", "<h1>Identification</h1>\n";

if (isset($_GET['id'] and intval($_GET['id']))){
	echo tableau_en_select($desc_diplomes
} else{
	echo "<form action='' method='get'><fieldset>\n".
		"<label for='identification'> Identification:</label>\n".
		"<input id='identification' name=id type=text/>\n".
		"</fieldset></form>\n";
}

?>
