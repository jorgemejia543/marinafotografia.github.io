<?php
//Inicio de sesion
session_start();

//Destruir sesion
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CerrarSesion</title>
     <!-- agregar favicon -->
     <link rel="shortcut icon" href="../img/logo/portada1.png" type="image/x-icon">
    <!-- Agregar estilos -->
    <link rel="stylesheet" href="../css/cerrrar-sesion.css">
</head>

<body>
    <div class="cerrar-container">
        <h1>Has Cerrado Sesion Correctamente</h2>
        <button class="botones" ><a href="../index.php">Ir al login</a></button>
    </div>
</body>

</html>