<?php
require ("../conn.php");
$consulta="Select * from consulta WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('consulta.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('consulta');
    $xml->writeElement('precio', $row['precio']);
    $xml->writeElement('fecha', $row['fecha']);
    $xml->writeElement('motivo', $row['motivo']);
    $xml->writeElement('diagnostico', $row['diagnostico']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="consulta.xml"');
header('Content-Length: ' . filesize('consulta.xml'));

readfile('consulta.xml');
exit();
?>