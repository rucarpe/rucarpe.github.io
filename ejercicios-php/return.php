
<h2>Practicando con return en funciones</h2>
<?php

$nombreUsuario = "David";

function nombreUsuario($nombreUsuario) {

	return "Tu nombre de usuario es: $nombreUsuario";
}

echo nombreUsuario($nombreUsuario);
?>

<h3>Concatenar variables dentro de una fución y devolver con return</h3>

<?php

$semanaEmpieza = "Lunes";

function diasSemana($semanaEmpieza) {

    array (
    [$diaUno = "Lunes"],
    [$diaDos = "Martes"],
    [$diaTres = "Miércoles"],
    [$diaCuatro = "Jueves"],
    [$diaCinco = "Viernes"],
    [$diaSeis = "Sábado"],
    [$diaSiete = "Domingo"]
    );

    $semanaEmpieza = $semanaEmpieza;

    $diasSemana = "";

    if ($diasSemana) {
        $mostrarSemana .= "<h3>";
    }

    $mostrarSemana.= "</hr>";

    return $mostrarSemana;
}

echo diasSemana($semanaEmpieza);