<?php 
// Le paramètre facultatif $style servira plus tard et n'était pas demandé 

function envoi_svg($res, $largeur, $hauteur, 
                   $transX=10, $transY=10, 
                   $scaleX=10, $scaleY=10, 
                   $style='') 
{ 
  $width = ($largeur + $transX)*$scaleX; 
  $height = ($hauteur + $transY)*$scaleY; 
  header("Content-Type: image/svg+xml"); 
  echo "<!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>\n";
  if ($style) 
  	echo "<?xml-stylesheet type='text/css' href='$style' ?>\n"; 
  echo "<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='$width' height='$height'>\n";      
  echo "<g transform='translate($transX,$transY),scale($scaleX,$scaleY)'>\n"; 
  foreach ($res as $line) 
  	echo $line; 
  echo "</g>\n</svg>";  
} 
// test 
// envoi_svg(array("<text x='0' y='10'>Ca marche</text>"), 100, 100) 
?>
