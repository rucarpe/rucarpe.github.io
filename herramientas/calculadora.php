<?php

function calculadora ($numero1, $operador, $numero2) {
	$resultado = '$numero1'.$operador.'$numero2';
    echo '$numero1$operador$numero2' =$resultado;
}

/*if (isset($_GET ['numero1'], 
                ['operador'], 
                ['numero2'])){*/
    calculadora ($_GET ['numero1'], ['operador'], ['numero2']);
/*else {
    echo "<h3>¿Qué cojones pasa que no pones los números?</h3>";
}*/





/*

if (isset($_GET['numero'])){
    tablasMultiplicar($_GET['numero']);
}else {
    echo "<h3>Especifica el número de la tabla que quieres mostrar.</h3>";
}?>
<br><hr><br>
<h2>Todas las tablas</h2>
<?php
    for($multiplicador=0;$multiplicador<=10;$multiplicador++) {
        tablasMultiplicar($multiplicador);
    }
    */