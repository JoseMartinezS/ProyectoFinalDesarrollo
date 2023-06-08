<?php
require ("../config.inc.php");
require('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$consulta ="SELECT compra.*, representante.nombre AS nombre_representante, empleado.nombre AS nombre_empleado
FROM compra
JOIN representante ON compra.idRepresentante = representante.idRepresentante
JOIN empleado ON compra.idEmpleado = empleado.idEmpleado;";

$statement = $conexion->query($consulta);
$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("LibroCompra");

$hojaActiva->setCellValue('A1', 'Cantidad');
$hojaActiva->setCellValue('B1', 'Fecha');
$hojaActiva->setCellValue('C1', 'Metodo de Pago');
$hojaActiva->setCellValue('D1', 'Total');
$hojaActiva->setCellValue('E1', 'Nombre del Representante');
$hojaActiva->setCellValue('F1', 'Nombre del Empleado');
$Fila = 2;

foreach ($datos as $row) {
    $hojaActiva->getColumnDimension('A')->setWidth(20);
    $hojaActiva->setCellValue('A'.$Fila, $row['cantidad']);
    $hojaActiva->getColumnDimension('B')->setWidth(20);
    $hojaActiva->setCellValue('B'.$Fila, $row['fecha']);
    $hojaActiva->getColumnDimension('C')->setWidth(20);
    $hojaActiva->setCellValue('C'.$Fila, $row['metodoPago']);
    $hojaActiva->getColumnDimension('D')->setWidth(20);
    $hojaActiva->setCellValue('D'.$Fila, $row['total']);
    $hojaActiva->getColumnDimension('E')->setWidth(20);
    $hojaActiva->setCellValue('E'.$Fila, $row['nombre_representante']);
    $hojaActiva->getColumnDimension('F')->setWidth(20);
    $hojaActiva->setCellValue('F'.$Fila, $row['nombre_empleado']);
    $hojaActiva->getColumnDimension('G')->setWidth(20);;
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="LibroCompra.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
?>