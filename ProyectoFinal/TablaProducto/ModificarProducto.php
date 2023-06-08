<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idProductoNatural = $_POST['idProductoNatural'];
    $nombre = $_POST['nombre'];
    $preciounitario = $_POST['preciounitario'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];
    $doctor = $_POST['doctor'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE productonatural SET nombre='$nombre', preciounitario='$preciounitario', cantidad='$cantidad', descripcion='$descripcion', doctor='$doctor' WHERE idProductoNatural='$idProductoNatural'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaProducto.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
