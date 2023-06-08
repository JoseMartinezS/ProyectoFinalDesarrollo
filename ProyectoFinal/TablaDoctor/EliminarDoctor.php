<?php

$idDoctor = $_POST["idDoctor"];

require_once('../config.inc.php');

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM paciente WHERE idDoctor='" . $idDoctor . "'";
if (mysqli_query($conn, $sql))
{
  $conn->close();
  header("location:TablaDoctor.php");
} else {
  echo "Error al eliminar Paciente: " . mysqli_error($conn);
}


mysqli_close($conn);

?>