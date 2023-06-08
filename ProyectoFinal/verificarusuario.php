<?php
$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];

require_once('config.inc.php');

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuario WHERE Correo = '$correo' AND Contraseña = '$contraseña'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Datos válidos, redireccionar a otra página
    header("Location: /web/ProyectoFinal/menu/menu.html");
} else {
    // Datos inválidos, mostrar mensaje de error o realizar alguna acción adicional
    echo "Usuario o contraseña incorrectos";
}

// Cerrar la conexión
$conn->close();
?>