<?php
require("debut_html.php");
function cherche_index_n($tab, $n)
{
    foreach($tab as $k => $v) {
        if (!--$n) return $k;
    }
}

function naviguer($tab,$num,$multiple,$string=''){

	$s="<form action='' method='post' style='width:15%'>\n";
	$i=1;
	
	$n = cherche_index_n($tab, $num);
	$f = "<fieldset>";
	
	if ($num != 1){
	//	s.="<input id=$num-1 name='page' style="float: left"/>\n";
		$s.="<input type='submit' value='".($num-1)."' style='float: left'/>\n";
		$f .= "<input type='submit' value='".($num-1)."' style='float: left'/>\n";
	}
	
	//s.="<input id=$num+1 name='page' style="float: right"/>\n";
	$s.="<input type='submit' value='".($num+1)."' style='float: left'/>\n";
	$f.="<input type='submit' value='".($num+1)."' style='float: left'/>\n";

	$s.="<input type='submit' value='$n'/>\n";
	$s.="<input id=$n name=$n value=$n />\n";
	$s.="<fieldset>$tab[$n]</fieldset>";
		

	$s.="</form>";
	echo $s;
	
}
$tab=array('Amsterdam' => 50, 'Londres' => 100, 'Madrid' => 200 , 'Berlin' => 300);
debut_html("Exercice 1");
naviguer($tab,1,1,"");
naviguer($tab,2,1,"");
naviguer($tab,3,1,"");
naviguer($tab,4,1,"");

?>
