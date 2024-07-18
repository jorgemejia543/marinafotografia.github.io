<?php
$cone = new mysqli("localhost", "root", "", "ventas");

//Inicio de sesion
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/diseño.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- agregar favicon -->
    <link rel="shortcut icon" href="../img/logo/Black and White Minimalist Illustrative Photographer Logo (1).png" type="image/x-icon">
    <title>login</title>
</head>

<body>

    <div class="container">

        <div class="form-content">
            <h1 id="title">INICIO</h1>

            <form action="./Ejercicio5.php" method="post">
                <?php
                if (isset($_POST["logear"])) {
                    if (empty($_POST["nom"]) or empty($_POST["corr"]) or empty($_POST["contra"])) {
                        echo "<b><h class='aler1'>Campos Incompletos</h></b>";
                    } else {
                        if ($_POST["nom"] == "admin" && $_POST["corr"] == "marina"  && $_POST["contra"] == "123") {
                            header('location: ../sesion/dashboard.php');
                        } else {
                            $nom = $_POST['nom'];
                            $corr = $_POST['corr'];
                            $contra = $_POST['contra'];

                            //Consulta
                            $sql = "SELECT Nombre, Correo, Contrasena FROM registrar WHERE Nombre='$nom'";
                            $resultado = mysqli_query($cone, $sql);



                            if ($resultado->num_rows > 0) { //Si existe algun registro

                                //Validar usuario y contraseña
                                $row = $resultado->fetch_assoc(); //resultado de la bd
                                $nombre_bd = $row['Nombre'];
                                $correo_bd = $row['Correo'];
                                $contra_bd = $row['Contrasena'];


                                //condicion
                                if ($nom = $nombre_bd) {
                                    if ($corr = $correo_bd) {
                                        if ($contra = $contra_bd) {
                                            header('location: ../logeados/index-copy.php');

                                            $_SESSION['nommm'] = "hola";
                                            /* $_SESSION['nombre'] = $row['id'];------------------------------------------------- */
                                        } else {
                                            echo "<h1>La contraseña no existe</h1><br>";
                                        }
                                    } else {
                                        echo "<h1>Correo no existe</h1><br>";
                                    }
                                } else {
                                    echo "<h1>Usuario no existe</h1><br>";
                                }
                            }
                        }
                    }
                }

                ?>



                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="user" name="nom" placeholder="Nombre" required>
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" id="mail" name="corr" placeholder="Correo" required>
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="pass" name="contra" placeholder="Contraseña" required>
                    </div>



                    <div class="btn-field">
                        <a type="button" class="botonesadmin" href="../sesion/registro.php">Registrarse </a>
                        <!-- <a type="button" class="botonesadmin" id="logear" name="logear"> Login </a> -->
                        <input type="submit" class="botonesadmin" name="logear" Value="Login"></inpu>

                    </div>

                    <br><br>
                    <p>¿Olvidaste tu contraseña? <a href="../sesion/recuperar.php">Haz click aquí</a></p>

                </div>


            </form>

        </div>

    </div>
</body>

</html>