<?php

function tablasMultiplicar ($numero) {
	echo "<h3>Tabla de multiplicar del $numero</h3>";
	
	for ( $multiplicador=0;$multiplicador<=10;$multiplicador++ ) {
	
	$resultado = $numero*$multiplicador;
	echo "$numero x $multiplicador = $resultado <br>";	
	}
}

if (isset($_GET['numero'])){
    tablasMultiplicar($_GET['numero']);
}else {
    echo "<h3>Especifica el número de la tabla que quieres mostrar.</h3>";
}

?>