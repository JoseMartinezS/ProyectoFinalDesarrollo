<?php
require ("../config.inc.php");
require('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$consulta ="SELECT consulta.*, venta.cantidad AS cantidad_venta
FROM consulta
JOIN venta ON consulta.idVenta = venta.idVenta";

$statement = $conexion->query($consulta);
$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("LibroConsulta");

$hojaActiva->setCellValue('A1', 'Precio');
$hojaActiva->setCellValue('B1', 'Fecha');
$hojaActiva->setCellValue('C1', 'Motivo');
$hojaActiva->setCellValue('D1', 'Diagnostico');
$hojaActiva->setCellValue('E1', 'Cantidad de Venta');
$Fila = 2;

foreach ($datos as $row) {
    $hojaActiva->getColumnDimension('A')->setWidth(20);
    $hojaActiva->setCellValue('A'.$Fila, $row['precio']);
    $hojaActiva->getColumnDimension('B')->setWidth(20);
    $hojaActiva->setCellValue('B'.$Fila, $row['fecha']);
    $hojaActiva->getColumnDimension('C')->setWidth(20);
    $hojaActiva->setCellValue('C'.$Fila, $row['motivo']);
    $hojaActiva->getColumnDimension('D')->setWidth(20);
    $hojaActiva->setCellValue('D'.$Fila, $row['diagnostico']);
    $hojaActiva->getColumnDimension('E')->setWidth(20);
    $hojaActiva->setCellValue('E'.$Fila, $row['cantidad_venta']);
    $hojaActiva->getColumnDimension('F')->setWidth(20);
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="LibroConsulta.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
?>