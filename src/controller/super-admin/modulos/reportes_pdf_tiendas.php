<?php
require "../../../model/dataBase_connection.php";
require('../../librerias/FPDF/fpdf.php');
/*Base de datos */
$base_datos = new BaseDatos();
$listaTiendas = $base_datos->getTiendas();


class PDF extends FPDF
{
    function Footer()
    {
        /* Pie de página */
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),0,0,'C');
    }
}

/*Encabezado pdf */
$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage("Landscape");
$pdf->SetFont('Arial', 'B',12);
$pdf->Image('../../../../public/img/mininopos-logo.png',10,8,35);
$pdf->SetX(60);
$pdf->MultiCell(0,5,utf8_decode(strtoupper("Lista de tiendas registradas")),0,'L',false);

/*Datos de quien genera el PDF*/
$fechaDoc = gmdate("d-m-Y");
$horaDoc = date("h:i:s");

$pdf->Ln(20);
$pdf->MultiCell(0,5,utf8_decode("Acerca del documento"),0,'L',false);
$pdf->MultiCell(0,5,utf8_decode("Fecha: " . $fechaDoc ),0,'L',false);
$pdf->MultiCell(0,5,utf8_decode("Hora: ". $horaDoc),0,'L',false);

/*Encabezados tabla */
$pdf->Ln(5);
$pdf->SetFillColor(69, 93, 252);
$pdf->Cell(30,10,'Identificador',1,0,'C', true);
$pdf->Cell(60,10,'Nombre',1,0,'C',true);
$pdf->Cell(80,10,utf8_decode('Dirección'),1,0,'C',true);
$pdf->Cell(40,10,utf8_decode('Teléfono'),1,0,'C',true);
$pdf->Cell(55,10,'Correo',1,0,'C',true);

/*Contenido tabla */
$pdf->SetFont('Arial', '',11);
while ($row = $listaTiendas->fetch_assoc()) {
    $pdf->Ln(10);
    $pdf->cell(30,10, utf8_decode($row['id']), 1, 0, 'C', 0);
    $pdf->cell(60,10, utf8_decode($row['nombre']), 1, 0, 'L', 0);
    $pdf->cell(80,10, utf8_decode($row['direccion']), 1, 0, 'L', 0);
    $pdf->cell(40,10, utf8_decode($row['telefono']), 1, 0, 'C', 0);
    $pdf->cell(55,10, utf8_decode($row['correo']), 1, 0, 'L', 0);
}
$listaTiendas->free_result();


/*+++++++++++++++++++++++++*/

$pdf->Output('./reportes/reporteTiendas.pdf', 'I');
?>