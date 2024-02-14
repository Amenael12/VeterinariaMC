<?php
require('./fpdf.php');

class PDF extends FPDF
{
   // Cabecera de página
   function Header()
   {
      $this->Image('logo.png', 185, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      $this->Cell(110, 15, utf8_decode('Veterinaria'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* TITULO DE LA TABLA */
      $this->SetTextColor(228, 100, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE CITAS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(18, 10, utf8_decode(' Cita'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Hora'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Mascota'), 1, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode(' Médico'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Propietario'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

include("config.php");
$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$consulta_reporte_citas = $mysqli->query("SELECT tb_citas.id_cita, tb_citas.fecha, tb_citas.hora, tb_mascota.nombre AS nombre_mascota, tb_medico.nombre AS nombre_medico, tb_propietario.nombre AS nombre_propietario, tb_citas.observaciones 
FROM tb_citas 
JOIN tb_mascota ON tb_citas.id_mascota = tb_mascota.id_mascota 
JOIN tb_medico ON tb_citas.id_medico = tb_medico.id_medico 
JOIN tb_propietario ON tb_citas.id_propietario = tb_propietario.id_propietario where tb_citas.estado = 1");

while ($datos_reporte = $consulta_reporte_citas->fetch_object()) {
    $pdf->Cell(18, 10, $datos_reporte->id_cita, 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $datos_reporte->fecha, 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $datos_reporte->hora, 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $datos_reporte->nombre_mascota, 1, 0, 'C', 0);
    $pdf->Cell(70, 10, $datos_reporte->nombre_medico, 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $datos_reporte->nombre_propietario, 1, 1, 'C', 0);
}

$pdf->Output();
?>
