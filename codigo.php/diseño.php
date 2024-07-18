<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <form name="Mantenimiento" action="mantenimiento.php" method="post">
            <table border="1">

                <tr>
                    <td colspan="4"><label for="">Comida rapida</label></td>
                </tr>

                <tr>
                <td><label for="">marca</label></td> <td><input type="text" name="txtmarca" maxlength="7" id=""></td>
                <td><label for="">moneda</label></td> <td><input type="text" name="txtmoneda" maxlength="4" id="" size="10"></td>
                </tr>

                <tr>
                    <td><label for="">datos</label></td> <td><input type="text" name="txtdatos" id="" maxlength="50"></td>
                    <td><label for="">monto </label></td> <td><input type="text" name="txtmonto" id="" maxlength="9" size="10"></td>
                </tr>

                <tr>
                    <td colspan="4" align="center">
                        <input type="submit" value="Opcion" name="Opciondatos">
                        <input type="submit" value="Extraditar" name="Extraditardatos">
                        <input type="submit" value="Cambiar" name="Cambiardatos">
                        <input type="submit" value="Borrar" name="Borrardatos">
                    </td>
                </tr>

                <tr>
                    <td colspan="4"><label for="">Lista de Productos</label></td>
                </tr>

                <tr>
                    <td><label for="">marca</label></td>
                    <td><label for="">moneda</label></td>
                    <td><label for="">datos</label></td>
                    <td><label for="">monto</label></td>
                </tr>

                <?php

                $sql = "SELECT * FROM productos";
                $resul = mysqli_query($cone,$sql);


                while ($mostrar = mysqli_fetch_array($resul)) {
                    ?>
                    <tr>
                        <td><?php echo $mostrar['marca'] ?></td>
                        <td><?php echo $mostrar['moneda'] ?></td>
                        <td><?php echo $mostrar['datos'] ?></td>
                        <td><?php echo $mostrar['monto'] ?></td>
                    </tr>
                    <?php
                }

                ?>

            </table>
        </form>
    </center>
</body>
</html>