<?php
require_once('../TME2/debut_html.php');
include('naviguerCorrection.php');
define('COOKIE_path', 'COOKIE/');

function protege_cookie(){
	if (!isset($_COOKIE['visite'])){
		$v = 1;
		$a = mt_rand();
		$f = COOKIE_path . md5(mt_rand() . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
	} else {
		$f = $_COOKIE['visite'];
		
		if ($_COOKIE['visite'] and is_readable($f)) {
			list($v, $a) = file($f);
			$f2 = COOKIE_path . md5($a . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
		} else {
			$f2 = '';
		}
		// vérifie que le nom recalculé du fichier est bien le même 
		if ($_COOKIE['visite'] != $f2) {
      header('HTTP/1.1 403 Forbidden');
      die("Vol de cookie mon gaillard");
    }
	}
	if ($d = fopen($f, 'w')) {
  	fputs($d, $v+1 . "\n$a");
    fclose($d);
 	}
  setcookie('visite', $f);
  return $v;
}
?>
