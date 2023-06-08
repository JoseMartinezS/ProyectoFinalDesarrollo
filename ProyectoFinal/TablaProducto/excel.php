<?php
require ("../config.inc.php");
require('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);


$consulta ="SELECT producto.*, venta.cantidad AS cantidad_venta
FROM producto
JOIN venta ON producto.idVenta = venta.idVenta";

$statement = $conexion->query($consulta);
$datos = $statement->fetchAll(PDO::FETCH_ASSOC);

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("Libroproducto");

$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->setCellValue('B1', 'Precio');
$hojaActiva->setCellValue('C1', 'Cantidad');
$hojaActiva->setCellValue('D1', 'Descripcion');
$hojaActiva->setCellValue('E1', 'Cantidad de Venta');
$Fila = 2;

foreach ($datos as $row) {
    $hojaActiva->getColumnDimension('A')->setWidth(20);
    $hojaActiva->setCellValue('A'.$Fila, $row['nombre']);
    $hojaActiva->getColumnDimension('B')->setWidth(20);
    $hojaActiva->setCellValue('B'.$Fila, $row['precio']);
    $hojaActiva->getColumnDimension('C')->setWidth(20);
    $hojaActiva->setCellValue('C'.$Fila, $row['cantidad']);
    $hojaActiva->getColumnDimension('D')->setWidth(20);
    $hojaActiva->setCellValue('D'.$Fila, $row['descripcion']);
    $hojaActiva->getColumnDimension('E')->setWidth(20);
    $hojaActiva->setCellValue('E'.$Fila, $row['cantidad_venta']);
    $hojaActiva->getColumnDimension('F')->setWidth(20);
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Libroproducto.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
?>