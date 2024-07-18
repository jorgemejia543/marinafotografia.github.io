<?php
include("conectar.php");

$cod = $_POST["Opciondatos"];
$precio = $_POST["Extraditardatos"];
$nom = $_POST["Cambiardatos"];
$cant = $_POST["Borrardatos"];

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['limpiardatos'])) {
    
    header("Location: admin.php");

}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['grabardatos'])) {
    
    $sqlgrabar = "INSERT INTO productos(codigo, precio, nombre, cantidad) values ('$cod', '$precio', '$nom', '$cant')";

    if (mysqli_query($cone,$sqlgrabar)) {
        header("Location: admin.php");
    }else {
        echo "Error: ".$sql."<br>".mysqli_error($cone);
    }

}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['modificardatos'])) {
    
    $sqlmodificar = "UPDATE productos set precio = '$precio', nombre = '$nom', cantidad = '$cant' WHERE codigo = $cod";

    if (mysqli_query($cone,$sqlmodificar)) {
        header("Location: admin.php");
    }else {
        echo "Error: ".$sql."<br>".mysqli_error($cone);
    }
    
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eliminardatos'])) {
    
    $sqleliminar = "DELETE FROM productos WHERE codigo = $cod";

    if (mysqli_query($cone,$sqleliminar)) {
        header("Location: admin.php");
    }else {
        echo "Error: ".$sql."<br>".mysqli_error($cone);
    }

    
}


?>