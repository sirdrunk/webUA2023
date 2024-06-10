<html>
<body style="background-color:transparent;margin:0 auto;padding:0">
<?php

$fgame = @fsockopen("servidor.ultima-alianza.com", 2593,$un,$sinn,2);
if (!$fgame) { $fgame = @fsockopen("servidor.ultima-alianza.com", 2593,$un,$sinn,2); } // Segundo intento para evitar falsos negativos
if ($fgame)
	echo "<img src=\"assets/img/online.png\" alt=\"online\" longdesc=\"online\" />";
else
	echo "<img src=\"assets/img/offline.png\" alt=\"offline\" longdesc=\"offline\" />";
?>