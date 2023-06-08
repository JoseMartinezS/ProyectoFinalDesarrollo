<?php
require('../PDF/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',13);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(70,10,'Reporte de Compras',0,0,'C');
        // Salto de línea
        $this->Ln(20);

        $this->Cell(25,10,'Cantidad',1,0,'C',0);
        $this->Cell(25,10,'Fecha',1,0,'C',0);
        $this->Cell(30,10,'MetodoPago',1,0,'C',0);
        $this->Cell(20,10,'total',1,0,'C',0);
        $this->Cell(40,10,'Representante',1,0,'C',0);
        $this->Cell(40,10,'Empleado',1,1,'C',0);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
    }
}

require_once('../config.inc.php');

$conn = new mysqli($servername, $username, $password, $dbname);
$consulta = "SELECT compra.*, representante.nombre AS nombre_representante, empleado.nombre AS nombre_empleado
FROM compra
JOIN representante ON compra.idRepresentante = representante.idRepresentante
JOIN empleado ON compra.idEmpleado = empleado.idEmpleado;";
$datos = $conn->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while ($row = $datos->fetch_assoc()) {
    $pdf->Cell(25,10,$row['cantidad'],1,0,'C',0);
    $pdf->Cell(25,10,$row['fecha'],1,0,'C',0);
    $pdf->Cell(30,10,$row['metodoPago'],1,0,'C',0);
    $pdf->Cell(20,10,$row['total'],1,0,'C',0);
    $pdf->Cell(40,10,$row['nombre_representante'],1,0,'C',0);
    $pdf->Cell(40,10,$row['nombre_empleado'],1,1,'C',0);
} 

$pdf->Output('Compras.pdf', 'I');
?>