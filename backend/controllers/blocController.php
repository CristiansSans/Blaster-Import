<?php

$culo = "hola";
$culito = split(',', $culo);
foreach ($culito as $row => $item) {
	if ($item == "aqui") {
		break;
	}
	echo $item;
}

?>