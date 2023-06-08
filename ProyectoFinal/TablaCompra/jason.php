<?php
require ("../conn.php");
$consulta="SELECT * FROM compra WHERE estatus = 1";
$resultado = $conn->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'cantidad' => $row['fecha'],
        'metodoPago' => $row['total'],
    );

    $grupos[] = $grupo;
}

$conn->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="compra.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>