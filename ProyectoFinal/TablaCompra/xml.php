<?php
require ("../conn.php");
$consulta="Select * from compra WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('compra.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('compra');
    $xml->writeElement('cantidad', $row['cantidad']);
    $xml->writeElement('fecha', $row['fecha']);
    $xml->writeElement('metodoPago', $row['metodoPago']);
    $xml->writeElement('total', $row['total']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="compra.xml"');
header('Content-Length: ' . filesize('compra.xml'));

readfile('compra.xml');
exit();
?>