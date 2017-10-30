<?php

function naviguer($catalogue, $n, $v=1, $corps=''){
	$att = "type='submit' name='page'";

	if (($n <= 0) or ($n > count($catalogue))) 
		$n = 1;
	if ($n > 1)
		$p = "<input $att style='float: left' value='".($n-1)."'/>\n";
	else
		$p = '';

	if ($n < count($catalogue))
		$s = "<input $att style='float: right' value='".($n+1)."'/>\n";
	else
		$s = '';

	$choix = '';

	foreach($catalogue as $nom=>$prix){
		if (!--$n){
			$choix = "<input $att value='".$nom."'/>".($v*$prix)."euros";
			break;
		}
	}
	$corps = "<fieldset>$p</fieldset>$choix</fieldset>\n";
	return "<form action='' method='post' style='width:15%'/>\n$corps</form>";
}

$bd = array('Londres'=>100, 'Madrid'=>200, 'Berlin'=>300);
require('debut_html.php');
$n = isset($_POST['page']?$_POST['page']:1;
$titre = "Page $n";
echo debut_html($titre)."<body>\n<h1>".$titre."</h1>\n";
if (!is_numeric($n)) /* on a sélectionné un voyage */
	echo "<div>Bon voyage pour ".$bd[$n]."euros</div>";
else /* on navigue à la page n */
	echo naviguer($bd, $n);
echo "</body></html>\n";

?>
