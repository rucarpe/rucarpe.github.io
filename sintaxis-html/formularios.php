<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios HTML </title>
</head>
<body>
    <section class="mainsection">
        <article class="articulo-1">
            <h2>Formularios con HTML</h2>
            <form action="" method="get" class="form-example">
                <div class="form-example">
                    <label for="name">Nombre: </label>
                    <input type="" name="name" id="name" autofocus="autofocus" required>
                </div>
                <div class="form-example">
                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-example">
                    <input type="submit" value="Suscríbete">
                </div>
            </form>
        </article>
    </section>
</body>

<!--
<form method="POST" action="procesar formulario.php">
    <label for="nombre">Nombre</label><br>
    <input type="text" name-"nombre" required-"required" pattern="[A-Za-2]+"><br>
    <label for="apellidos">Apellidos</label><br>
    <input type="text" name="apellidos" required-"required" pattern="[A-Za-z]+"><br>
    <label for="edad">Edad</label><br>
    <input type="number" name-"edad" required-"required" pattern="[0-9]+"><br>
    <label for="email">Email</label><br> <input type-"email" name="email" required="required"><br>
    <label for="pass">Contraseña</label><br>
    <input type-"password" name="pass" required-"required"><br>
    <input type="submit" value-"Enviar"/>
</form>
-->

</html>