<?php
//conexion
$db = new mysqli("localhost", "root", "", "ventas");
//Inicio de sesion
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartilla</title>
    <link rel="stylesheet" href="../css/dashboard.css">
     <!-- agregar favicon -->
     <link rel="shortcut icon" href="../img/logo/portada1.png" type="image/x-icon">
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

    <br><br><br><br><br>

    <form action="dashboard.php" method="post" enctype="multipart/form-data" class="main-container">
        <table>
            <tr>
                <td colspan="5" class="titulo-tabla"><label for="">Mantenimiento de Productos</label></td>
            </tr>

            <tr>
                <td colspan="2">Código</td>
                <td><input type="text" name="txtCodigo" maxlength="7" id=""></td>
                <td>Descripcion</td>
                <td><input type="text" name="txtDes" maxlength="50" id=""></td>
            </tr>

            <tr>
                <td colspan="2">Nombre</td>
                <td><input type="text" name="txtNombre" id="" maxlength="50"></td>
                <td>Precio</td>
                <td><input type="text" name="txtPrecio" id="" maxlength="9"></td>
            </tr>

            <tr>
                <td colspan="5">
                    <input type="file" name="image">
                </td>
            </tr><br><br>

            <tr>
                <td colspan="5" align="center">
                    <input type="submit" value="Nuevo" name="limpiardatos" class="botones"></input>

                    <!--  grabar datos --><input type="submit" value="Grabar" name="grabardatos" class="botones">

                    <?php
                    if (!empty($_POST["grabardatos"])) {
                        if (empty($_POST["txtNombre"]) or empty($_POST["txtDes"]) or empty($_POST["txtCodigo"]) or empty($_POST["txtPrecio"])) {
                            echo "<b><h class='aler1'>Campos Incompletos</h></b>";
                        } else {
                            $name = $_FILES['image']['name']; // nombre del archivo de img
                            $archivo = $_FILES['image']['tmp_name']; //ruta temporal del archivo
                            $ruta = "../img/carrito/" . $name;
                            /* $extension = pathinfo($name, PATHINFO_EXTENSION); */ // Get the file extension

                            move_uploaded_file($archivo, $ruta); //estructura condicional

                            $nom = $_POST['txtNombre'];
                            $des = $_POST['txtDes'];
                            $cod = $_POST['txtCodigo'];
                            $pre = $_POST['txtPrecio'];



                            $consulta = mysqli_query($db, "INSERT INTO mis_productos(id, name, description, price, img) 
                                VALUES ('$cod', '$nom','$des','$pre', '$name')");
                            /* if ($consulta == 1) {
                                echo "<b><h class='aler2'>Registro exitoso</h></b>";
                            } else {
                                echo "<b><h class='aler1'>Error de registro</h></b>";
                            } */
                        }
                    }
                    ?>
                    </input> <!-- final grabar datos -->

                    <!-- modificar datos --><input type="submit" value="Modificar" name="modificardatos" class="botones">
                    <?php
                    if (isset($_POST["modificardatos"])) {
                        $nom = $_POST['txtNombre'];
                        $des = $_POST['txtDes'];
                        $cod = $_POST['txtCodigo'];
                        $pre = $_POST['txtPrecio'];


                        if ($cod == "" or $nom == "" or $des == "" or $pre == "") {
                            echo "Los campos son obligatorios";
                        } else {

                            $consulta = mysqli_query($db, "UPDATE mis_productos SET id='$cod', name='$nom', description='$des', price='$pre' 
                                WHERE id=$cod");

                            if ($consulta == 1) {
                                echo "<b><h class='aler2'>Registro actualizado</h></b>";
                            } else {
                                echo "<b><h class='aler1'>Error</h></b>";
                            }
                        }
                    }


                    ?>
                    </input><!-- final de modificar datos -->

                    <!-- Eliminar datos --><input type="submit" value="Eliminar" name="eliminardatos" class="botones">
                    <?php
                    if (isset($_POST['eliminardatos'])) {
                        //declaración de variables
                        $cod = $_POST['txtCodigo'];

                        $carpeta = '../img/carrito/'; // Ruta a la carpeta donde se encuentra la imagen
                        $query = $db->query("SELECT * FROM mis_productos WHERE id='$cod'");
                        $row = $query->fetch_assoc();
                        $imagen = $carpeta . $row["img"]; // Nombre de la imagen a eliminar
                        unlink($imagen); //eliminar imagen de carpeta

                        $consulta = mysqli_query($db, "SELECT * FROM mis_productos WHERE id='$cod'");

                        //estructura condicional
                        if ($cod == "") {
                            echo "Los campos son obligatorios";
                        } else {
                            /* Actualizar datos */
                            $consulta = mysqli_query($db, "DELETE FROM mis_productos  WHERE id='$cod'");

                            echo "Registro eliminado existosamente";
                        }
                    }
                    ?>

                    </input><!-- final de eliminar datos -->

                    <input type="submit" class="botones" value="Generar PDF" onclick="openPdfInNewTab()"></input> <!-- Generar informme en pdf -->
                    <script> /* abri pdf en otra pesataña */
                        function openPdfInNewTab() {
                            // URL del archivo PDF
                            var pdfUrl = './cartilla-pdf.php';

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
                <td class="encabezados-tabla">Código</td>
                <td class="encabezados-tabla">Nombre</td>
                <td class="encabezados-tabla">Descripcion</td>
                <td class="encabezados-tabla">Precio</td>
                <td class="encabezados-tabla">Imagen</td>
            </tr>
            <?php

            $query = $db->query("SELECT * FROM mis_productos ORDER BY id ");
            /* funcion para limitar en la base ->  DESC LIMIT 5 */
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><?php echo 'S/ ' . $row["price"] . ' soles'; ?></td>
                        <td><img src="../img/carrito/<?php echo $row["img"]; ?>" width="35px" alt=""></td>
                    </tr>
            <?php
                }
            }
            ?>

        </table>
    </form>

</body>

</html>