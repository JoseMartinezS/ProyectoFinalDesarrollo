<?php

$nocompra = $_POST["nocompra"];
$paciente = $_POST["paciente"];
$producto = $_POST["producto"];
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];
$total = $_POST["total"];
$metodoPago = $_POST["metodoPago"];

require_once('../config.inc.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO compra (nocompra, paciente, producto, precio, idcantidad, idtotal, metodoPago)
VALUES ('$nocompra', '$paciente', '$producto', '$precio', '$cantidad', '$total','$metodoPago')";

if ($conn->query($sql) === TRUE) {
  $conn->close();
  header("location:TablaCompra.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
