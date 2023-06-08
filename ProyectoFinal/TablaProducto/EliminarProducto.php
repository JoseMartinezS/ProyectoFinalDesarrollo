<?php

$idProductoNatural = $_POST["idProductoNatural"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM productonatural WHERE idProductoNatural='" . $idProductoNatural . "'";
if (mysqli_query($conn, $sql))
{
  $conn->close();
  header("location:TablaProducto.php");
} else {
  echo "Error al eliminar Producto: " . mysqli_error($conn);
}


mysqli_close($conn);

?>