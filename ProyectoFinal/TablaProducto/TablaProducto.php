<!DOCTYPE html>
<html>
<title>Productos Naturales</title>
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
<h1>Productos Naturales</h1>
<div>
<?php
    require_once('../config.inc.php');


    $conn = new mysqli($servername,$username,$password,$dbname);
    $consulta="SELECT productonatural.*, doctor.nombre AS nombre_doctor, doctor.apellidop AS apellidop_doctor,
    doctor.apellidom AS apellidom_doctor
    FROM productonatural
    JOIN doctor ON productonatural.idDoctor = doctor.idDoctor";
    $datos = $conn->query($consulta);

    echo "<table class ='table table-striped table-dark'>";
    echo "
    <th style='display: none;'>idProductoNatural</th>
    <th scope=col>Nombre</th>
    <th scope=col>Precio del Producto</th>
    <th scope=col>Cantidad de productos</th>
    <th scope=col>Descripcion del Producto</th>
    <th scope=col>Doctor que receta</th>
    <th style='display: none;'>estatus</th>
    <th scope=col></th>";

    while ($registro = $datos->fetch_assoc())
    {
        echo "<tr>";
        //echo "<td class='table-secondary'>".$registro["idProductoNatural"]."</td>";
        echo "<td class='table-secondary'>".$registro["nombre"]."</td>";
        echo "<td class='table-secondary'>".$registro["preciounitario"]."</td>";
        echo "<td class='table-secondary'>".$registro["cantidad"]."</td>";
        echo "<td class='table-secondary'>".$registro["descripcion"]."</td>";
        echo "<td class='table-secondary'>".$registro["nombre_doctor"]." ".$registro["apellidop_doctor"]." ".$registro["apellidom_doctor"]."</td>";
        //echo "<td class='table-secondary'>".$registro["estatus"]."</td>";
        echo "<td class='table-secondary'>
        
        <div class='button-container'>
        <form action='EliminarProducto.php' method='post' onsubmit=\"return confirm('¿Estás seguro de que deseas eliminar esta compra?')\">
            <input type='hidden' name='idProductoNatural' value='".$registro["idProductoNatural"]."'>
            <input class='btn btn-primary' type='submit' name='eliminar_".$registro["idProductoNatural"]."' value='Eliminar'>
        </form>
        <form action='ActualizarProducto.php' method='post'>
            <input type='hidden' name='idProductoNatural' value='".$registro["idProductoNatural"]."'>
            <input class='btn btn-primary' type='submit' name='modificar_".$registro["idProductoNatural"]."' value='Modificar'>
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
  
  <form action="RegistrarProducto.php" method="get">
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