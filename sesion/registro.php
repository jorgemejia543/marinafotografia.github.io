<?php
$cone = new mysqli("localhost", "root", "", "ventas");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- agregar favicon -->
    <link rel="shortcut icon" href="../img/logo/portada1.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/registrarse.css">

    <!-- agregar favicon -->
    <link rel="shortcut icon" href="../img/logo/portada1.png" type="image/x-icon">
    <title>Registrarse</title>
</head>

<body>
    <?php
    /* if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $edad = $_POST['edad'];
        $telefono = $_POST['telefono'];
        $identificacion = $_POST['identificacion'];
        $genero = $_POST['genero'];
        $comentarios = $_POST['comentarios'];

        echo "¡Gracias por registrarte! Los datos enviados son:<br>";
    echo "Nombres: $nombres<br>";
    echo "Apellidos: $apellidos<br>";
    echo "Edad: $edad<br>";
    echo "Teléfono: $telefono<br>";
    echo "Tipo de identificación: $identificacion<br>";
    echo "Género: $genero<br>";
    echo "Comentarios: $comentarios<br>";

        exit(); 
    } */
    ?>
    <form action="./registro.php" method="POST" class="form">
        <h2>Formulario</h2>
        <?php
        if (!empty($_POST["regi"])) {
            if (empty($_POST["nombres"]) or empty($_POST["apellidos"]) or empty($_POST["edad"]) or empty($_POST["correo"]) or empty($_POST["contra"])) {
                echo "<b><h class='aler1'>Campos Incompletos</h></b>";
            } else {
                $nom = $_POST['nombres'];
                $ape = $_POST['apellidos'];
                $edad = $_POST['edad'];
                $correo = $_POST['correo'];
                $contra = $_POST['contra'];

                $consulta = mysqli_query($cone, "INSERT INTO registrar(Nombre, Apellido, Edad, Correo, Contrasena)
                VALUES ('$nom','$ape','$edad' ,'$correo' ,'$contra')");


                if ($consulta == 1) {
                    echo "<b><h class='aler2'>Registro exitoso</h></b>";
                } else {
                    echo "<b><h class='aler1'>Error de registro</h></b>";
                }
            }
        }
        ?>
        <p><input type="text" id="nombres" placeholder="Nombres:" name="nombres" required></p>
        <p><input type="text" id="apellidos" placeholder="Apellidos:" name="apellidos" required></p>
        <p><input type="number" id="edad" placeholder="Edad:" name="edad" required></p>
        <p><input type="correo" id="correo" placeholder="Correo:" name="correo" required></p>
        <p><input type="password" id="contra" placeholder="Contraseña:" name="contra" required></p>
        <input class="inp" type="submit" value="Enviar" name="regi"><br><br>
        <a href="../pages/Ejercicio5.php">VOLVER</a>

    </form>

</body>

</html>