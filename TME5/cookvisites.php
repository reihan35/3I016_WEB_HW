<?php

require('debut_html.php');
include('naviguer.php');

// page à visiter
$n = isset($_POST['page'])?$_POST['page']:1;

if (isset($_COOKIE['visite']){
	setcookie('visite', 1); // envoie de l'entête SetCookie 
	$v = 1;
}else{
	$v = $_COOKIE['visite'];
}

$titre = "page $n";
echo debut_html($titre)."<body>\n".$titre."</h1>\n";

// on a sélectionné le voyage
if (!is_numeric($n))
	setcookie('visite', 1, time()-1);
  echo "<div>Bon voyage pour ".($bd[$n]*($v)?($v-1):1))." euros</div>";
else{
	setcookie('visite', $v+1);
  echo naviguer($bd, $n, $v, $h);
}
echo "<body></html>\n";
?>



