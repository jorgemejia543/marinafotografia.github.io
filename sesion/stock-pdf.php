<?php
//llamar a fpdf
require('./FPDF/fpdf.php');
//Llamar bd
$cone = new mysqli('localhost', 'root', '', 'ventas');


//consulta a BD
$consulta = "SELECT codigo, numero, nombre, cantidad FROM prueba";

$result = $cone->query($consulta);

//Crear objeto de la clase fpdf
$pdf = new FPDF("P", "pt", "A4");

//Agregar pagina
$pdf->AddPage("P", "A4");

//Definir encabezado
$pdf->SetFont("Arial", "B", 22);
$pdf -> SetTextColor(117, 48, 25);

//Añadir elemento textual
$pdf->Cell(500, 20, "Reporte de Stock", 0, 2, "C");
$pdf->Ln();

//Image(archivo, x, y, w, h, tipo, enlace)
$pdf->Image("../img/portada.png", 30, 15, 50, 50);

//Agregar fecha
$pdf->SetFont("Times", "B", 10);
$pdf->SetTextColor(117, 48, 25);
$pdf->Cell(100, 15, utf8_decode("Fecha de impresion: ") . date("d/m/y"), 0, 1, "L");

//Añadir ancho de linea
$pdf -> SetLineWidth(3);

$pdf -> SetDrawColor(148, 51, 12);
//Añadir linea
$pdf -> Line(29, 90, 578, 90);

//color de fondo
$pdf -> SetFillColor(117, 48, 25);

$pdf->SetTextColor(255, 255, 255);
$pdf->Ln();

//Añadir ancho de linea
$pdf -> SetLineWidth(0);

//Encabezado del reporte
$pdf->SetFont("Times", "B", 12);

$pdf->Cell(100, 15, "Codigo", 1, 0, "C", "true");
$pdf->Cell(100, 15, "Precio", 1, 0, "C", "true");
$pdf->Cell(250, 15, "Nombre", 1, 0, "C", "true");
$pdf->Cell(100, 15, "Cantidad", 1, 1, "C", "true");


$pdf -> SetFillColor(254, 246, 238);
$pdf->SetTextColor(70, 20, 2);

//Mostrar los datos de la tabla
while ($datos = mysqli_fetch_array($result)) {
    $pdf->Cell(100, 20, $datos['codigo'], 1, 0, "C", "true");
    $pdf->Cell(100, 20, "S/. " . $datos['numero'], 1, 0, "C", "true");
    $pdf->Cell(250, 20, $datos['nombre'], 1, 0, "C", "true");
    $pdf->Cell(100, 20, $datos['cantidad'], 1, 1, "C", "true");
}


//Salida
$pdf->OutPut();
