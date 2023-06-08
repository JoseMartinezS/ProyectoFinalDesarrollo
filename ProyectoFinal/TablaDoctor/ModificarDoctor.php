<?php
    require_once('../config.inc.php');

    // Obtener los datos del formulario
    $idDoctor = $_POST['idDoctor'];
    $nombre = $_POST['nombre'];
    $apellidom = $_POST['apellidop'];
    $apellidom = $_POST['apellidom'];

    // Crear la conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Actualizar los datos del paciente
    $sql = "UPDATE doctor SET nombre='$nombre', apellidop='$apellidom', 
    apellidom='$apellidom' WHERE idDoctor='$idDoctor'";

    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header("location: TablaDoctor.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
