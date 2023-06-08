<!DOCTYPE html>
<html>
<title>Tabla Consulta</title>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="estilo.css" rel="stylesheet">
</head>
<style>

.button-container {
    display: flex;
    gap: 5px;
}

.button-containerr {
    display: flex;
    justify-content: center;
    gap: 15px; /* Espacio entre los botones */
  }

.export-button {
        margin-top: 100px;
    }
</style>
<body>
<h1>Tabla Consulta</h1>
<div>
<?php
    require_once('../config.inc.php');


    $conn = new mysqli($servername, $username, $password, $dbname);
    $consulta = "SELECT consulta.*, doctor.nombre AS nombre_doctor, 
    doctor.apellidop AS apellidop_doctor, doctor.apellidom AS apellidom_doctor,
    paciente.nombre AS paciente_nombre, paciente.apellidoPaterno AS apellidop_paciente,
    paciente.apellidoMaterno AS apellidom_paciente
    FROM consulta
    JOIN doctor ON consulta.idDoctor = doctor.idDoctor
    JOIN paciente ON consulta.idPaciente = paciente.idPaciente";
    $datos = $conn->query($consulta);
    
    echo "<table class ='table table-striped table-dark'>";
    echo "
    <th scope=col>Precio de la Consulta </th>
    <th scope=col>Fecha</th>
    <th scope=col>Diagnostico de Consulta</th>
    <th scope=col>Doctor que atiende</th>
    <th scope=col>Paciente que se atiende</th>
    <th scope=col></th>";
    
    while ($registro = $datos->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='table-secondary'>" . $registro["precioconsulta"] . "</td>";
        echo "<td class='table-secondary'>" . $registro["fecha"] . "</td>";
        echo "<td class='table-secondary'>" . $registro["diagnostico"] . "</td>";
        echo "<td class='table-secondary'>".$registro["nombre_doctor"]." ".$registro["apellidop_doctor"]." ".$registro["apellidom_doctor"]."</td>";
        echo "<td class='table-secondary'>".$registro["paciente_nombre"]." ".$registro["apellidop_paciente"]." ".$registro["apellidom_paciente"]."</td>";
        echo "<td class='table-secondary'>
    
        <div class='button-container'>
        <form action='EliminarConsulta.php' method='post' onsubmit=\"return confirm('¿Estás seguro de que deseas eliminar esta compra?')\">
            <input type='hidden' name='idConsulta' value='".$registro["idConsulta"]."'>
            <input class='btn btn-primary' type='submit' name='eliminar_".$registro["idConsulta"]."' value='Eliminar'>
        </form>
        <form action='ActualizarConsulta.php' method='post'>
            <input type='hidden' name='idConsulta' value='".$registro["idConsulta"]."'>
            <input class='btn btn-primary' type='submit' name='modificar_".$registro["idConsulta"]."' value='Modificar'>
        </form>
        </div>
    
          </td>";
        echo "<td class='table-secondary'></td>";
        echo "<tr/>";
        echo "</div>";
    }
    
    echo "</table>";
    $conn->close();
?>

<div class="button-containerr">
  
  <form action="RegistrarConsulta.php" method="get">
    <input class="btn btn-primary" type="submit" value="Insertar">
  </form>
  <form action="../menu/menu.html" method="post" class="export-button">
    <input class="btn btn-primary" type="submit" value=" Regresar al menu">
  </form>
  <form action="pdf.php" method="post" class="export-button">
    <input class="btn btn-primary" type="submit" value="Exportar PDF">
  </form>
  <form action="excel.php" method="post" class="export-button">
    <input class="btn btn-primary" type="submit" value="Exportar Excel">
  </form>
  <form action="xml.php" method="post" class="export-button">
    <input class="btn btn-primary" type="submit" value="Exportar XML">
  </form>
  <form action="jason.php" method="post" class="export-button">
    <input class="btn btn-primary" type="submit" value="Exportar JSON">
  </form>
</div>
</body>
</html>