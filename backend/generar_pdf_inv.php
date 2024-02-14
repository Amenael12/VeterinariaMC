<?php
include("config.php");
require('fpdf/fpdf.php');


$sql = "SELECT * FROM tb_inventario WHERE estado =   1";
$result = $mysqli->query($sql);

$pdf = new FPDF();
$pdf->AddPage();


$logoPath = '../backend/logo.png'; // Asegúrate de que esta ruta sea correcta
$pdf->Image($logoPath, $pdf->GetX(), $pdf->GetY(),   30,   0, 'PNG'); // Ajusta el tamaño y la posición según sea necesario

// Mover la posición inicial de la tabla hacia la derecha y más abajo
$pdf->SetX(50); // Ajusta este valor para mover la tabla más a la derecha
$pdf->SetY(50); // Ajusta este valor para mover la tabla más abajo

// Título
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(241, 236, 225); // Color de fondo verde
$pdf->Cell(0,10,'Inventario',0,1,'C', true); // El último parámetro 'true' indica que se debe rellenar la celda con el color de fondo

// Calcular el ancho de cada celda
$pageWidth = $pdf->GetPageWidth() -   30; // Restamos   20 para tener en cuenta los márgenes
$numColumns =   5; // Número de columnas en la tabla
$cellWidth = ($pageWidth / $numColumns) -   5; // Reducimos el ancho de las celdas en   5 unidades

// Encabezados de la tabla
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(0,   255,   0); // Color de fondo verde
for ($i =   0; $i < $numColumns; $i++) {
    $pdf->Cell($cellWidth,10,'Encabezado ' . ($i +   1),1,($i < $numColumns -   1 ?   0 :   1),'C', true);
}

// Datos de la tabla
$pdf->SetFont('Arial','',12);
while ($row = $result->fetch_assoc()) {
    $pdf->Cell($cellWidth,10,$row['id_producto'],1,0,'C');
    $pdf->Cell($cellWidth,10,$row['nombre'],1,0,'L');
    $pdf->Cell($cellWidth,10,$row['descripcion'],1,0,'C');
    $pdf->Cell($cellWidth,10,$row['cantidad'],1,0,'C');
    $pdf->Cell($cellWidth,10,number_format($row['costo'],   2),1,1,'R');
    
   
    if ($pdf->GetY() >   270) { // El valor   270 es aproximadamente la altura de una página A4 menos el espacio para encabezados y márgenes
        $pdf->AddPage();
        // Vuelve a imprimir los encabezados de la tabla en la nueva página
        $pdf->SetX(50); // Ajusta este valor para mover la tabla más a la derecha
        $pdf->SetY(50); // Ajusta este valor para mover la tabla más abajo
        for ($i =   0; $i < $numColumns; $i++) {
            $pdf->Cell($cellWidth,10,'Encabezado ' . ($i +   1),1,($i < $numColumns -   1 ?   0 :   1),'C', true);
        }
    }
}

$pdf->Output('inventario.pdf', 'I');
?>
