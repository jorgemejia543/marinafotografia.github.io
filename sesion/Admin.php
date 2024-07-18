<?php
//Inicio de sesion
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- agregar favicon -->
    <link rel="shortcut icon" href="../img/logo/portada1.png" type="image/x-icon">

    <title>Admin</title>
</head>

<body>

    <div class="container">

        <div class="form-content">
            <h1 id="title">INICIO</h1>

            <form>
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="user" placeholder="Nombre" required>

                    </div>


                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="pass" placeholder="Contraseña" required>
                    </div>
                    <div class="btn-field">

                        <button type="button" onclick="admin()"> Login </button>

                    </div>
                </div>
            </form>

        </div>

    </div>
    <script src="../js/admin.js"></script>
</body>

</html>