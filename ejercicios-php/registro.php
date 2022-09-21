<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de registro</title>
</head>
<body>
    <h1>Registro</h1>    
    
    <form action="procesar-registro.php" method="GET">
        <label for="user_name">Nombre de usuario: </label>
        <input type="text" name="user_name" required><br>
        <label for="email">Email:</label>
        <input type="text" name="email" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="send" value="Registrarme">    
    </form>

</body>
</html>