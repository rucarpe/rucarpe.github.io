<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de multiplicar</title>
</head>
<body>
    <form action="">
        <label for="GET-numero">Número:</label>
        <input id="GET-numero" type="number" name="numero">
        <input type="submit" value="Ver tabla">
    </form>
</body>
</html>
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
}?>
<br><hr><br>
<h2>Todas las tablas</h2>
<?php
    for($multiplicador=0;$multiplicador<=10;$multiplicador++) {
        tablasMultiplicar($multiplicador);
    }
?>

<ul>
<li><a class="button" href="../../">Inicio</a></li>
<li><a class="button" href="../">Herramientas</a></li>
</ul>
