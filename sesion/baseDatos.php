<?php
$cone = mysqli_connect('localhost', 'root', '', 'ventas');
/* mysqli_close($cone); */

//Inicio de sesion
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
    <!-- agregar favicon -->
    <link rel="shortcut icon" href="../img/logo/portada1.png" type="image/x-icon">
    
    <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
    <div class="menu">
        <ul class="izqui">
            <li><a href="./dashboard.php">Cartilla</a></li>
            <li><a href="./baseDatos.php">Stock</a></li>
        </ul>
        <ul class="dere">
            <li><a href="../logeados/cerrar-sesion.php">Salir</a></li>
        </ul>
    </div>


    <br><br><br><br><br><br>


    <form name="Mantenimiento" action="./baseDatos.php" method="post" class="main-container">
        <table>

            <tr>
                <td colspan="4" class="titulo-tabla">Mantenimiento de Productos</td>
            </tr>

            <tr>
                <td>Código</td>
                <td><input type="text" name="txtCodigo" maxlength="7" id=""></td>
                <td>Precio</td>
                <td><input type="text" name="txtPrecio" maxlength="4" id="" size="10"></td>
            </tr>

            <tr>
                <td>Nombre</td>
                <td><input type="text" name="txtNombre" id="" maxlength="50"></td>
                <td>Cantidad (Stock)</td>
                <td><input type="text" name="txtCantidad" id="" maxlength="9" size="10"></td>
            </tr>

            <tr>
                <td colspan="4" align="center">
                    <input type="submit" value="Nuevo" name="limpiardatos" class="botones"></input>
                    <input type="submit" value="Grabar" name="grabardatos" class="botones">
                    <?php
                    if (!empty($_POST["grabardatos"])) {
                        if (empty($_POST["txtNombre"]) or empty($_POST["txtCantidad"]) or empty($_POST["txtCodigo"]) or empty($_POST["txtPrecio"])) {
                            echo "<b><h class='aler1'>Campos Incompletos</h></b>";
                        } else {
                            $nom = $_POST['txtNombre'];
                            $cant = $_POST['txtCantidad'];
                            $cod = $_POST['txtCodigo'];
                            $pre = $_POST['txtPrecio'];

                            $consulta = mysqli_query($cone, "INSERT INTO prueba(codigo, numero, nombre, cantidad) 
                                VALUES ('$cod', '$pre','$nom','$cant')");
                            if ($consulta == 1) {
                                echo "<b><h class='aler2'>Registro exitoso</h></b>";
                            } else {
                                echo "<b><h class='aler1'>Error de registro</h></b>";
                            }
                        }
                    }
                    ?>

                    </input>
                    <input type="submit" value="Modificar" name="modificardatos" class="botones">

                    <?php
                    if (isset($_POST["modificardatos"])) {
                        $nom = $_POST['txtNombre'];
                        $cant = $_POST['txtCantidad'];
                        $cod = $_POST['txtCodigo'];
                        $pre = $_POST['txtPrecio'];


                        if ($cod == "" or $nom == "" or $cant = "" or $pre == "") {
                            echo "Los campos son obligatorios";
                        } else {

                            $consulta = mysqli_query($cone, "UPDATE prueba SET codigo='$cod', numero='$pre', nombre='$nom', cantidad='$cant' 
                                WHERE codigo=$cod");

                            if ($consulta == 1) {
                                echo "<b><h class='aler2'>Registro actualizado</h></b>";
                            } else {
                                echo "<b><h class='aler1'>Error</h></b>";
                            }
                        }
                    }


                    ?>



                    </input>
                    <input type="submit" value="Eliminar" name="eliminardatos" class="botones">

                    <?php
                    if (isset($_POST['eliminardatos'])) {
                        //declaración de variables
                        $cod = $_POST['txtCodigo']; //SHIFT+ ALT + FLECHA ABAJO
                        $consulta = mysqli_query($cone, "SELECT * FROM prueba WHERE codigo='$cod'");
                        //estructura condicional
                        if ($cod == "") {
                            echo "Los campos son obligatorios";
                        } else {
                            /* Actualizar datos */
                            $consulta = mysqli_query($cone, "DELETE FROM prueba WHERE codigo='$cod'");
                            echo "Registro eliminado existosamente";
                        }
                    }
                    ?>


                    </input>

                    <input type="submit" class="botones" value="Generar PDF" onclick="openPdfInNewTab()"></input> <!-- Generar informme en pdf -->
                    <script>
                        /* abri pdf en otra pesataña */
                        function openPdfInNewTab() {
                            // URL del archivo PDF
                            var pdfUrl = './stock-pdf.php';

                            // Abrir en una nueva pestaña dentro del mismo navegador
                            window.open(pdfUrl, '_blank');
                        }
                    </script> <!-- fin de crear otra pestaña -->
                </td>
            </tr>

            <tr>
                <td colspan="5" align="center">Lista de Productos</td>
            </tr>

            <tr>
                <td class="encabezados-tabla">Codigo</td>
                <td class="encabezados-tabla">Precio</td>
                <td class="encabezados-tabla">Nombre</td>
                <td class="encabezados-tabla">Cantidad</td>
            </tr>

            <?php

            $sql = "SELECT * FROM prueba";
            $resul = mysqli_query($cone, $sql);


            while ($mostrar = mysqli_fetch_array($resul)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['codigo'] ?></td>
                    <td><?php echo "S/. " . $mostrar['numero'] . " soles" ?></td>
                    <td><?php echo $mostrar['nombre'] ?></td>
                    <td><?php echo $mostrar['cantidad'] ?></td>
                </tr>
            <?php
            }

            ?>

        </table>
    </form>
</body>

</html>