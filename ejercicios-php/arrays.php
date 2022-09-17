<?php 

$semana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

for ($i=0;$i<count($semana);$i++) {
    echo "<li>".$semana[$i]."</li>";
}


echo "<hr><br>";


foreach ($semana as $dia) {
    echo "<li>".$dia."</li>";
}

echo "<hr><br>";
var_dump($semana);

//Array asociativo
$datos_personales = array (
	'nombre' => 'Rubén',
	'apellidos' => 'Carvalhor Pérez',
	'email' => 'rucarpe@icloud.com',
    'web' => 'rucarpe.com',
    'otros_proyectos' => 'limondigital.es, murcia.market, laacademia.pro, academiagc.pro'
);

echo "<hr><br>";
var_dump ($datos_personales);
echo "<hr><br>";

//Cierro PHP ?>

<h1>Array asociativo</h1>
<h2> Datos cliente </h2>
<ul>
    <li>Nombre: <?php echo "<b>".$datos_personales['nombre']."</b>"; ?></li>
    <li>Apellidos: <?php echo "<b>".$datos_personales['apellidos']."</b>"; ?></li>
    <li>Email: <?php echo "<b>".$datos_personales['email']."</b>"; ?></li>
    <li>Web: <?php echo "<b>".$datos_personales['web']."</b>"; ?></li>
    <li>Otros proyectos:  <?php echo "<b>".$datos_personales['otros_proyectos']."</b>"; ?></li>
</ul>

<img alt="imagen del código para mostrar los datos desde un array asociativo." src="/img/array-asociativo.jpg">

<?php // Abro PHP
echo "<hr><br>";

$agenda = array(
    array (
        'id' => '1',
        'nombre' => 'Rubén C.P.',
        'contacto' => 'info@murcia.market'
    ),

    array (
        'id' => '2',
        'nombre' => 'Jennifer M.M.',
        'contacto' => 'hola@tumakerup.es'
    ),

    array (
        'id' => '3',
        'nombre' => 'Jorge M.C.',
        'contacto' => 'info@asistentevirtual.com'
    )
);

echo "<hr><br>";

// Recoger un dato específico de un array multidimiensional
var_dump ($agenda[1]['id']);

echo "<hr><br>";

// Recorrer array multidimensional
foreach ($agenda as $contacto) {
    echo "<b>ID:</b> ".$contacto['id']."<br>";
    echo "<b>Nombre:</b> ".$contacto['nombre']."<br>";
    echo "<b>Contacto:</b> ".$contacto['contacto']."<br><br>";
}

// Funciones para arrays
/*

// ORDENAR:
# asort // Ordenar alfabéticamente. A-Z
# arsort // Ordenar alfabéticamente invertido. Z-A
# sort  // Ordenar alfanuméricamente. A-Z y 1-100...

// AÑADIR Y SUSTRAER:
# $semana[] = "Miércoles"; // Añadir elemento
# array_push($semana, "Juernes");

// ELIMINAR:
array_pop($semana);
unset($semana[3]);

// ALEATORIO: 
#$indice es una variable que se crea para recoger, almacenar y mostrar el valor aleatorio.
$indice = array_rand($semana);
echo $semana[$indice];

//DAR LA VUELTA: #Ver documentación.
var_dump(array_reverse($semana));

// BUSCAR DENTRO DE UN ARRAY
$resultado = array_search('búsqueda', '$semana');
var_dump($resultado);

// CONTAR NÚMERO DE ELEMENTOS:
var_dump count($semana);
var_dump sizeof($semana);

#VER MÁS EN DOCUMENTACIÓN
*/