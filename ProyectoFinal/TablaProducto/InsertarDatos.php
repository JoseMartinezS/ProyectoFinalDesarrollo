<?php

$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$cantidad = $_POST["cantidad"];
$descripcion = $_POST["descripcion"];
$cantidad = $_POST["cantidad"];

require_once('../config.inc.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO producto (nombre, precio, cantidad, descripcion, idVenta)
VALUES ('".$nombre."', '".$precio."', '".$cantidad."', '".$descripcion."' , '".$cantidad."')";

if ($conn->query($sql) === TRUE)
{
  $conn->close();
  header("location:TablaProducto.php");

} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


//Ctrl+D Selecciona las siguientes palabras

//Shift+Alt Selecion de los caracteres

?>