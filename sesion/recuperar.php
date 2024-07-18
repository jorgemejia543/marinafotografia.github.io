<!DOCTYPE html>
<html>
<head>
    <title>Formulario en PHP</title>
     <!-- agregar favicon -->
     <link rel="shortcut icon" href="../img/logo/portada1.png" type="image/x-icon">
</head>
<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $numeroOEmail = $_POST['numero_email'];

        echo "Has ingresado: $numeroOEmail";
        exit(); 
    }
    ?>

    <h2>Formulario</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label for="numero_email">Número o correo electrónico:</label>
        <input type="text" id="numero_email" name="numero_email" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
