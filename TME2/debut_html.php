<?php

function debut_html($title){
	$html_string = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN'
'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>\n";
	$html_string = $html_string . "<html lang='fr' xmlns='http://www.w3.org/1999/xhtml'>\n";
	$html_string = $html_string . "	<head>\n";
	$html_string = $html_string . "		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />\n";
	$html_string = $html_string . "		<title>" .$title. "</title>\n";
	/* autres balises */
	$html_string = $html_string . "	</head>\n";
	return $html_string;
}

?>
