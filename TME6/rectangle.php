<?php 
require_once('phraser_table.php'); 
require_once('envoi_svg.php'); 
define('RE_COLOR', "@color:\s*([^;]+)@"); 

function rectangle($table, $hauteur=11, $largeur=5) 
{ 
    $res = array(); 
    $i = 0; 
    foreach ($table as $ligne) { 
        $j = 0; 
        $i++; 
        foreach($ligne as $v) { 
            if (!preg_match(RE_COLOR, $v['style'], $f)) 
                return 'style incorrect: ' . $v['style']; 
            $f = $f[1]; /* couleur : propriété color dans l'attribut style */
            $h = $v['colspan']; /* hauteur du rectangle : valeur de l'index colspan */
            $x = $j*$largeur; /* coordonnée en X : 0 pour le premier rectangle, les suivants sont accolés au précédent sur la même ligne */
            $y = ($i*$hauteur) - $h; /* coordonnée en Y : position de la ligne courante - valeur de l'index colspan */
            $res[]= "<rect x='$x' y='$y' width='$largeur' height='$h' fill='$f' />\n"; 
            $j++; 
        } 
    } 
    envoi_svg($res, $j*$largeur, $i*$hauteur); 
} 
phraser('testSimpleTable.html', 'ouvrante'); 
rectangle($table); 
?> 
