<?php

$nombre = $_POST["nombre"];
$apellidoPaterno = $_POST["apellidoPaterno"];
$apellidoMaterno = $_POST["apellidoMaterno"];

require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO doctor (nombre, apellidop, apellidom)
VALUES ('".$nombre."', '".$apellidoPaterno."', '".$apellidoMaterno."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaDoctor.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>