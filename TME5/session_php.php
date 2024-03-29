<?php 

session_start(); 

// nouvel utilisateur 
if (!isset($_GET["envoi"])) { 
  $_SESSION["compte"]=0; 
  $_SESSION["REMOTE_ADDR"] = $_SERVER['REMOTE_ADDR']; 
  $_SESSION["HTTP_USER_AGENT"] = $_SERVER['HTTP_USER_AGENT']; 
  $rappel=1; 
  $message="Initialisation"; 
} 
else {
	if (isset($_GET["envoi"])){ 
		// les adresses IP ou les noms clients HTTP ne correspondent pas 
    if ($_SESSION["REMOTE_ADDR"] != $_SERVER['REMOTE_ADDR'] || 
    $_SESSION["HTTP_USER_AGENT"] != $_SERVER['HTTP_USER_AGENT']) 
      { 
			$message = "Voleur de Cookie!"; 
    	$rappel = 0;
    } 
    else { 
    	if ($_GET["envoi"] == "Incrementer") { 
        $_SESSION["compte"]++; 
        $rappel = 1; 
        $message = "Valeur du compteur : ".$_SESSION["compte"];  
      } 
      else {
      	if ($_GET["envoi"] == "Terminer") { 
        	$message = "Valeur du compteur : ".$_SESSION["compte"];  
        	session_destroy(); 
        	$rappel=0; 
        } 
      } 
  	} 
	} 
} 
  
echo '<html><head><title>Sessions sous PHP</title></head><body>'; 
echo "<h1>", $message , "</h1>\n"; 
echo "<form action=".$_SERVER['PHP_SELF'].">"; 

if ($rappel) { 
    echo '<input type="submit" name="envoi" value="Incrementer"/> '; 
    echo '<input type="submit" name="envoi" value="Terminer"/> '; 
} else { 
   echo '<input type="submit" value="Recommencer"/> '; 
} 

echo '</form></body></html>'; 
?>
