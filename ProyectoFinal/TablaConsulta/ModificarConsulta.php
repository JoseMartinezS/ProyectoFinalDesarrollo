<?php
$idConsulta = $_POST["idConsulta"];
$precioconsulta = $_POST["precioconsulta"];
$fecha = $_POST["fecha"];
$diagnostico = $_POST["diagnostico"];
$doctor = $_POST["doctor"];
$paciente = $_POST["paciente"];

require_once('../config.inc.php');

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE consulta SET precioconsulta='" . $precioconsulta . "'
, fecha='" . $fecha . "', diagnostico='" . $diagnostico . "'
, idDoctor='" . $doctor . "', idPaciente='" . $paciente . "' WHERE idConsulta='" . $idConsulta . "'";


if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("location: TablaConsulta.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
