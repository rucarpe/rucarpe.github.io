<?php

$numero='8';

function tablasMultiplicar ($numero) {

    echo "<h3>Tabla de multiplicar del $numero</h3>";

	for ($m=0;$m<= 10; $m++) {
        $resultado = $numero*$m;
        echo "$numero x $m = $resultado <br>";
    }
}

tablasMultiplicar($numero);