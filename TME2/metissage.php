<?php
include 'debut_html.php';

$title = "date";
echo debut_html($title);

echo "	<body>\n";
echo "		<h1>";

echo date("d m y");

echo "</h1>\n";
echo "	</body>\n";
echo "</html>\n";

?>
