<?php
//llamar a fpdf
require('./FPDF/fpdf.php');
//Llamar bd
$cone = new mysqli('localhost', 'root', '', 'ventas');


//consulta a BD
$consulta = "SELECT id, name, description, price, created, modified, status, img FROM mis_productos";
$result = $cone->query($consulta);

//Crear objeto de la clase fpdf
$pdf = new FPDF("P", "pt", "A4");

//Agregar pagina
$pdf->AddPage("L", "A4");

//Definir encabezado
$pdf->SetFont("Times", "B", 22);
$pdf->SetTextColor(117, 48, 25);

//Añadir elemento textual
$pdf->Cell(800, 20, "Reporte de Cartilla", 0, 2, "C");
$pdf->Ln();

//Image(archivo, x, y, w, h, tipo, enlace)
$pdf->Image("../img/portada.png", 30, 15, 50, 50);

//Agregar fecha
$pdf->SetFont("Times", "B", 11);
$pdf->SetTextColor(117, 48, 25);
$pdf->Cell(100, 15, utf8_decode("Fecha de impresion: ") . date("d/m/y"), 0, 1, "L");

//Añadir ancho de linea
$pdf->SetLineWidth(3);
$pdf->SetDrawColor(148, 51, 12);

//Añadir linea
$pdf->Line(28, 90, 788, 90);

//color de fondo
$pdf->SetFillColor(117, 48, 25);
$pdf->SetTextColor(255, 255, 255);
$pdf->Ln();

//Añadir ancho de linea
$pdf->SetLineWidth(0);



//Encabezado del reporte
$pdf->SetFont("Arial", "B", 12);

$pdf->Cell(50, 20, "Codigo", 1, 0, "C", "true");
$pdf->Cell(150, 20, "Nombre", 1, 0, "C", "true");
$pdf->Cell(450, 20, "Descripcion", 1, 0, "C", "true");
$pdf->Cell(60, 20, "Precio", 1, 0, "C", "true");
$pdf->Cell(50, 20, "Imagen", 1, 1, "C", "true");

$pdf->SetFillColor(254, 246, 238);
$pdf->SetTextColor(70, 20, 2);

//Mostrar los datos de la tabla
$h1 = 102;

while ($datos = mysqli_fetch_array($result)) {
    $pdf->Cell(50, 20, $datos['id'], 1, 0, "C", "true");
    $pdf->Cell(150, 20, $datos['name'], 1, 0, "C", "true");
    $pdf->Cell(450, 20, $datos['description'], 1, 0, "C", "true");
    $pdf->Cell(60, 20, "S/. " . $datos['price'], 1, 0, "C", "true");

    //Image(archivo, x, y, w, h, tipo, enlace)
    $h1 = $h1 + 20;
    $pdf->Cell(50, 20, "", 1, 1, "C", "true");
    $pdf->Image("../img/portada.png", 750, $h1, 20, 10);
    /* $rutaa = "../img/carrito/" . $datos['img']; */
    /* $pdf->Image("$rutaa", 750, $h1, 20, 10); */
}


//Salida
$pdf->OutPut();
