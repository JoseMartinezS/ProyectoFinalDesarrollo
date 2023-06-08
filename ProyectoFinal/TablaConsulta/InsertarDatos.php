<?php

$precioconsulta = $_POST["precioconsulta"];
$fecha = $_POST["fecha"];
$diagnostico = $_POST["diagnostico"];
$doctor = $_POST["doctor"];
$paciente = $_POST["paciente"];

require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO consulta (precioconsulta, fecha, diagnostico, idDoctor, idPaciente)
VALUES ('".$precioconsulta."', '".$fecha."', '".$diagnostico."', '".$doctor."', '".$paciente."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaConsulta.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>