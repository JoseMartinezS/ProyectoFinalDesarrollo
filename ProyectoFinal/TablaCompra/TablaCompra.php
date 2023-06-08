<!DOCTYPE html>
<html>
<title>Tabla Compra</title>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="estilo.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="../diseñoTabla.css" rel="stylesheet">
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
<h1>Tabla Compra</h1>
<div>
<?php
    require_once('../config.inc.php');

    $conn = new mysqli($servername, $username, $password, $dbname);
    $consulta = "SELECT compra.*, paciente.nombre AS nombre_paciente, paciente.apellidoPaterno AS apellidop_paterno
    , paciente.apellidoMaterno AS apellidom_materno, productonatural.nombre AS nombre_productonatural,
    productonatural.preciounitario AS precioproducto_natural
    FROM compra
    JOIN paciente ON compra.idPaciente = paciente.idPaciente
    JOIN productonatural ON compra.idProductoNatural = productonatural.idProductoNatural;";


    
    $datos = $conn->query($consulta);

    echo "<table class='table table-striped table-dark'>";
    echo 
    "
    <th scope='col'>NoCompra</th>
    <th scope='col'>Paciente que realiza compra</th>
    <th scope='col'>Nombre del Producto</th>
    <th scope='col'>Precio</th>
    <th scope='col'>Cantidad de producto</th>
    <th scope='col'>Total</th>
    <th scope='col'>Metodo de Pago</th>
    <th scope='col'>Fecha</th>
    <th scope='col'>
    </th>";

    while ($registro = $datos->fetch_assoc())
    {
        echo "<tr>";
        echo "<td class='table-secondary'>".$registro["nocompra"]."</td>";
        echo "<td class='table-secondary'>".$registro["nombre_paciente"]." ".$registro["apellidop_paterno"]." ".$registro["apellidom_materno"]."</td>";
        echo "<td class='table-secondary'>".$registro["nombre_productonatural"]."</td>";
        echo "<td class='table-secondary'>".$registro["precioproducto_natural"]."</td>";
        echo "<td class='table-secondary'>".$registro["cantidad"]."</td>";
        echo "<td class='table-secondary'>".$registro["total"]."</td>";
        echo "<td class='table-secondary'>".$registro["metodoPago"]."</td>";
        echo "<td class='table-secondary'>".$registro["fecha"]."</td>";
        echo "<td class='table-secondary'>

        <div class='button-container'>
        <form action='EliminarCompra.php' method='post' onsubmit=\"return confirm('¿Estás seguro de que deseas eliminar esta compra?')\">
            <input type='hidden' name='idCompra' value='".$registro["idCompra"]."'>
            <input class='btn btn-primary' type='submit' name='eliminar_".$registro["idCompra"]."' value='Eliminar'>
        </form>
        <form action='ActualizarCompra.php' method='post'>
            <input type='hidden' name='idCompra' value='".$registro["idCompra"]."'>
            <input class='btn btn-primary' type='submit' name='modificar_".$registro["idCompra"]."' value='Modificar'>
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
  
  <form action="RegistrarCompra.php" method="get">
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
