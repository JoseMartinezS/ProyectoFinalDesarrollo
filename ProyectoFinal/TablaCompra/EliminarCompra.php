<?php

$idCompra = $_POST["idCompra"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM compra WHERE idCompra='" . $idCompra . "'";
if (mysqli_query($conn, $sql))
{
  $conn->close();
  header("location:TablaCompra.php");
} else {
  echo "Error al eliminar Compra: " . mysqli_error($conn);
}


mysqli_close($conn);

?>