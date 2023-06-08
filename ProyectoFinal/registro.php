<!DOCTYPE html>
<html>
<title>Registrar Usuario</title>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css%22%3E">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    .gradient-custom-3 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
}
.gradient-custom-4 {
/* fallback for old browsers */
background: #84fab0;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
}
</style>
<body>
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Crear una cuenta</h2>

              <form action="registrarusuario.php" method="POST">
              
                <div class="form-outline mb-4">
                <input type="text" id="Nombre" class="form-control form-control-lg" name="nombre" />
                  <label class="form-label" for="form3Example1cg">Nombre</label>
                </div>

                <div class="form-outline mb-4">
                <input type="email" id="Correo" class="form-control form-control-lg" name="correo" />
                  <label class="form-label" for="form3Example3cg">Correo</label>
                </div>

                <div class="form-outline mb-4">
                <input type="password" id="Contraseña" class="form-control form-control-lg" name="contraseña" />
                  <label class="form-label" for="form3Example4cg">Contraseña</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Vuelva a escribir la contraseña</label>
                </div>

                
                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Registrar</button>
                </div>
               


              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
