<?php
require ("../conn.php");
$consulta="Select * from producto WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('producto.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('producto');
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('precio', $row['precio']);
    $xml->writeElement('cantidad', $row['cantidad']);
    $xml->writeElement('descripcion', $row['descripcion']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="producto.xml"');
header('Content-Length: ' . filesize('producto.xml'));

readfile('producto.xml');
exit();
?>