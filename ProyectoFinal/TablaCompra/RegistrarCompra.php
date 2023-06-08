<!DOCTYPE html>
<html>
<title>Registrar Compra</title>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media (min-width: 1025px) {
      .h-custom {
        height: 100vh !important;
      }
    }
  </style>
</head>
<body>
  <section class="h-100 h-custom" style="background-color: #8fc4b7;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          <div class="card rounded-3">

            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registrar Compra</h3>

              <form action="InsertarDatos.php" method="post">

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1q">NoCompra</label>
                  <input type="text" name="nocompra" id="form3Example1q" class="form-control" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Paciente</label>
                  <select class="form-control" name="paciente">
                    <?php
                    require_once('../config.inc.php');
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $consulta = "SELECT * FROM paciente";
                    $result = $conn->query($consulta);
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['idPaciente'] . "'>" . $row['nombre'] . "</option>";
                    }
                    $conn->close();
                    ?>
                  </select>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label">Producto</label>
                  <select class="form-control" name="producto">
                    <?php
                    require_once('../config.inc.php');
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $consulta = "SELECT * FROM productonatural";
                    $result = $conn->query($consulta);
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['idProductoNatural'] . "'>" . $row['nombre'] . "</option>";
                    }
                    $conn->close();
                    ?>
                  </select>
                </div>

                <div class="form-outline mb-4">
                <?php
                if (isset($_POST['producto'])) {
                  require_once('../config.inc.php');
                  $conn = new mysqli($servername, $username, $password, $dbname);
                  $productoId = $_POST['producto'];
                  $consultaPrecio = "SELECT precio FROM producto WHERE idProducto = '$productoId'";
                  $resultPrecio = $conn->query($consultaPrecio);
                  if ($resultPrecio && $resultPrecio->num_rows > 0) {
                    $rowPrecio = $resultPrecio->fetch_assoc();
                    $precio = $rowPrecio['precio'];
                    echo "<input type='text' name='precio' id='precio' class='form-control' value='$precio' readonly />";
                  }
                  $conn->close();
                } else {
                  echo "<input type='text' name='precio' id='precio' class='form-control' readonly />";
                }
                ?>
                <label class="form-label" for="precio">Precio</label>
              </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1q">Cantidad</label>
                  <input type="text" name="cantidad" id="form3Example1q" class="form-control" />
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1q">Total</label>
                  <input type="text" name="total" id="form3Example1q" class="form-control" />
                </div>

                <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1q">Metodo de Pago</label>
                <select name="metodoPago" id="form3Example1q" class="form-control">
                  <option value="Efectivo">Efectivo</option>
                  <option value="Tarjeta">Tarjeta</option>
                </select>
                </div>




                

                <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
