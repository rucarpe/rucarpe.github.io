<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Ejercicio 1</title>
</head>
<body>
    <h1>Array - Ejercicio 1</h1>
<section class="main-section">
    <article class="article-1">
        <p>Crear un array con 8 elementos y llevar a cabo las siguientes 
            funciones propias de los arrays.</p>
        <ol>
            <li>Recorrer y mostar elementos</li>
            <li>Ordenar y motrar elementos</li>
            <li>Mostrar longitud</li>
            <li>Buscar un elemento</li>
        </ol>
    </article>
</section>
</body>
</html>

<?php
    $loteria8 = array ('38','46','22','15','8','69','41','83');
    $diasSemana = array ('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');

    echo "<h3>Números premiados de la lotería Súper 8:</h3>";
    foreach ($loteria8 as $nPremiados) {
        //var_dump($nPremiados);
        echo "<b>".$nPremiados."</b>-";
    }

echo "<hr><br><br>";
echo "<h3>Números premiados ordenados:</h3>";
echo sort($loteria8);
    foreach ($loteria8 as $nPremiados) {
        //var_dump($nPremiados);
        echo "<b>".$nPremiados."</b>-";
    }




/*foreach ($loteria8 as $order) {
    //var_dump($nPremiados);
    echo "<b>".sort($order)."</b>-";
}*/
?>