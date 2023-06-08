<?php
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$contraseña=$_POST["contraseña"];

require_once('config.inc.php');

$conn = new mysqli($servername, $username, $password, $dbname);

//$hash = password_hash($contraseña, PASSWORD_DEFAULT);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO usuario (Nombre, Correo, Contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) 
{
    $conn->close();
    header("location:login.html");
} else {
    echo "Error al registrar los datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>

