<?php

function turnoMananas (){
	return "Tu turno de trabajo esta semana es de mañanas";
}

function turnoTardes () {
	return "Tu turno de trabajo esta semana es de tardes";
}

function turnoNoches () {
	return "Tu turno de trabajo esta semana es de noches";
}


$horario = "Noches";
/* Se crea una variable para concatenar un string invariable del nombre de la función a llamar 
con la segunda parte del nombre de la función que si es variables y hará ejecutar una función u otra.*/ 
$turnoTrabajo = "turno".$horario;

echo "<h3>".$turnoTrabajo()."</h3>";