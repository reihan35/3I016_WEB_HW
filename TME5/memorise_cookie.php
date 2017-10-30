<?php
require_once('debut_html.php');
include('naviguer.php');
define("COOKIE_path", "COOKIE/");

function memorise_cookie()
{	
	// pas de cookie nommé visite
  if (!isset($_COOKIE['visite'])) {
    $v = 1;
    // visiteur nouveau => création d'un fichier dans le répertoire avec un nom arbitraire suivi de l'adresse IP du visiteur et du nom client HTTP 
    $f = COOKIE_path .  md5(mt_rand() . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
  } else { // un cookie nommé visite est présent 
    $f = $_COOKIE['visite']; 
    $v = array_shift(file($f)); // récupération de la valeur dans le fichier (file lit un file dans un tableau)
  }
  if ($d = fopen($f, 'w')) { 
    fputs($d, $v+1); // mettre v+1 dans le fichier
    fclose($d);
  }
  setcookie('visite', $f); // pose d'un cookie de nom visite et de valeur le nom du fichier 
  return $v;

}

$n = isset($_POST['page']) ? $_POST['page'] : 1;
$titre = "Page $n";
$v = memorise_cookie();
echo debut_html($titre), "<body>\n<h1>", $titre , "</h1>\n";
if (!is_numeric($n))
  echo "<div>Bon voyage pour " . ($bd[$n] * (($v > 1) ? ($v-1) : 1)) . "€ </div>";
else {
  $h = "";
  echo naviguer($bd, $n, $v, $h);
}
echo "</body</html>\n";

?>
