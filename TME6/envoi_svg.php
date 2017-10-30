<?php
function envoi_svg($svg, $largeur, $hauteur, $transX=10, $transY=10, $scaleX=10, $scaleY=10){
	header("Content-Type: image/svg+xml");
	echo "<!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>\n";
	echo "<svg width='".$largeur*$scaleX."' height='".$hauteur*$scaleY."' xmlns='http://www.w3.org/2000/svg'>\n";
	echo "<g transform='translate($transX, $transY),scale($scaleX, $scaleY)'>\n";
	
	foreach($svg as $balise){
		echo $balise."\n";
	}
	
	echo "</g></svg>\n";
	
}
envoi_svg(array("<text x='0' y='10'>Ca marche</text>"), 100, 100);
?>
