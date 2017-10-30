<?php

require('debut_html.php');
include('naviguer.php');

// page à visiter 
$n = isset($_POST['page'])?$_POST['page']:1;
// facteur par lequel on multiplie le prix, est calculé en fonction du nombre de visitesde la page 
$v = isset($_POST['visite'])?$_POST['visite']:1;

$titre = "page $n";
echo debut_html($titre)."<body>\n".$titre."</h1>\n";

// on a sélectionné le voyage
if (!is_numeric($n))
	echo "<div>Bon voyage pour ".($bd[$n]*($v)?($v-1):1))." euros</div>";
else{
	$h = "<div><input type='hidden' name='visite' value'=".($v+1)."'/></div>";
	echo naviguer($bd, $n, $v, $h);
}
echo "<body></html>\n";
?>
