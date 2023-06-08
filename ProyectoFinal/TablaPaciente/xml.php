<?php
require ("../conn.php");
$consulta="Select * from paciente WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('paciente.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('paciente');
    $xml->writeElement('nombre', $row['nombre']);
    $xml->writeElement('apellidoPaterno', $row['apellidoPaterno']);
    $xml->writeElement('apellidoMaterno', $row['apellidoMaterno']);
    $xml->writeElement('telefono', $row['telefono']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="paciente.xml"');
header('Content-Length: ' . filesize('paciente.xml'));

readfile('paciente.xml');
exit();
?>