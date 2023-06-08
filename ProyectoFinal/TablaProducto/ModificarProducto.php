<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idProducto = $_POST['idProducto'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE producto SET nombre='$nombre', precio='$precio', cantidad='$cantidad', descripcion='$descripcion' WHERE idProducto='$idProducto'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaProducto.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
