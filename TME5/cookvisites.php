<?php

require('debut_html.php');
include('naviguer.php');

// page à visiter
$n = isset($_POST['page'])?$_POST['page']:1;
$v = isset($_COOKIE['visite'])?$_COOKIE['visite']:1;

$titre = "page $n";
setcookie('visite', $v+1); // envoi d'un entête HTTP comportant la valeur à mémoriser 

echo debut_html($titre)."<body>\n".$titre."</h1>\n";

// on a sélectionné le voyage
if (!is_numeric($n))
	setcookie('visite', 1, time()-1);
  echo "<div>Bon voyage pour ".($bd[$n]*($v)?($v-1):1))." euros</div>";
else{
  $h = "";
  echo naviguer($bd, $n, $v, $h);
}
echo "<body></html>\n";
?>



