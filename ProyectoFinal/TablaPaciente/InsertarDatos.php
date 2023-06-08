<?php

$nombre = $_POST["nombre"];
$apellidoPaterno = $_POST["apellidoPaterno"];
$apellidoMaterno = $_POST["apellidoMaterno"];
$telefono = $_POST["telefono"];
$doctor = $_POST["doctor"];

require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO paciente (nombre, apellidoPaterno, apellidoMaterno, telefono, idDoctor)
VALUES ('".$nombre."', '".$apellidoPaterno."', '".$apellidoMaterno."', '".$telefono."', '".$doctor."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaPaciente.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>