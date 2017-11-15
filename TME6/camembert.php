<?php 
require_once('phraser_table.php'); 
require_once('envoi_svg.php'); 
define('RE_COLOR', "@color:\s*([^;]+)@"); 

// somme des nombres sur une ligne 
define('TOTAL', 10); 

function camembert($table, $hauteur=11, $largeur=5) 
{ 
    $i = 0; 
    $angle = 0; 
    $res = array(); 
    foreach ($table as $ligne) { 
        $res[]= sprintf("<g transform='translate(%d,%d)'>\n", (($i*5)+3) * $largeur, $hauteur); 
        $x = $hauteur; 
        $y = 0; 
        foreach($ligne as $v) { 
            $val = $v['colspan']; 
            $angle += $val*(3.14*2/TOTAL); 
            $xx = cos($angle) * $hauteur; 
            $yy = sin($angle) * (0 - $hauteur); 
            if (!preg_match(RE_COLOR, $v['style'], $m)) 
                die('style incorrect: ' . $v['style']); 
            $res[]= sprintf("<path d='M0,0 %f %f A %d,%d 0 %d 0 %f %f' fill='%s'/>\n", 
                      $x, 
                      $y, 
                      $hauteur, // cmd lineto implicite lorsque M a + de 2 args 
                      $hauteur, 
                      (($val > 5) ? 1 : 0), 
                      $xx, 
                      $yy, 
                      $m[1]); 
          $x = $xx; 
          $y = $yy; 
      } 
      $i++; 
      $res[]= "</g>\n"; 
    } 
    envoi_svg($res, $largeur*(($i*5)+3), $hauteur*2); 
} 

phraser('testSimpleTable.html', 'ouvrante'); 
camembert($table); 
?> 
