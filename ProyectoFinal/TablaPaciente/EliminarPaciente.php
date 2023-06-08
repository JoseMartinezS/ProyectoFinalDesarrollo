<?php

$idPaciente = $_POST["idPaciente"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM paciente WHERE idPaciente='" . $idPaciente . "'";
if (mysqli_query($conn, $sql))
{
  $conn->close();
  header("location:TablaPaciente.php");
} else {
  echo "Error al eliminar Paciente: " . mysqli_error($conn);
}


mysqli_close($conn);

?>