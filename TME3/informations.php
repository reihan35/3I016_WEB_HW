<?php
	
phpinfo();

$string = "";
foreach($_SERVER as $key=>$value){
	$string .= "<tr>\n<td>".$key."</td>\n<td>".$value."</td>\n</tr>\n";
}
$th = "<tr>\n<th>Key</th>\n<th>Value</th>\n</tr>\n";
echo "<table>\n<caption>Ca marche pas</caption>\n".$th.$string."</table>\n";

/*version de PHP : 5.6.30-0
 date de fabrication :Feb 8 2017 08:50:48
 principale variable PHP superglobale disponible: $GLOBALS
*/


?>


