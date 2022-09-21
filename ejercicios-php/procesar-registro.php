<?php

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])){
    $error = false;

    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
} else {
    $error = true;
}

if ($error = true) {
    header("Location:registro.php");
    echo "<h1>Hay errores en el formulario.</h1>";
}