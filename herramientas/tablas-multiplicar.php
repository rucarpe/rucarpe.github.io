<?php

$numero = '8';

function tablasMultiplicar ($numero) {
	$m = 0;
	for ($m<= 10; $m++) {
        $resultado = $numero*$m;
        return "$numero x $m = $resultado <br>";
    }
}