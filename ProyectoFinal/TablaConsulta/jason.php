<?php
require ("../conn.php");
$consulta="SELECT * FROM consulta WHERE estatus = 1";
$resultado = $conn->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'precio' => $row['fecha'],
        'motivo' => $row['diagnostico'],
    );

    $grupos[] = $grupo;
}

$conn->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="consulta.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>