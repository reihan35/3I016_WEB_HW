<?php

function memorise_cookie(){
	if (!isset($_COOKIE['visite'])){
		$nom = md5(strval(mt_rand() . $_SERVER['REMOTE_ADDR'] . $_SERVER['REMOTE_HOST']));
		$N = 1;
	}else{
		$nom = $_COOKIE['visite'];
		$file = fopen($_COOKIE['visite'], 'r');
		$N = fgets($file);
		fclose($file);
	}

	$file = fopen($nom, 'w');
	fputs($file, $N+1);
	fclose($file);
	setcookie('visite', $nom);
	return $N;
}

// page à visiter
$n = isset($_POST['page'])?$_POST['page']:1;

$v = memorise_cookie();

$titre = "page $n";
echo debut_html($titre)."<body>\n".$titre."</h1>\n";

// on a sélectionné le voyage
if (!is_numeric($n))
  echo "<div>Bon voyage pour ".($bd[$n]*($v)?($v-1):1))." euros</div>";
else{
  echo naviguer($bd, $n, $v, $h);
}
echo "<body></html>\n";

?>
