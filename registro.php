<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include './includes/meta.php';
  ?>
</head>
<body class="login-body">
<div class="login-container">
 <div class="card" style="width: 28rem;">
<!--   <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Registro</h5>
     <form>
        <div class="form-group">
          <label for="name">Nombres</label>
          <input type="text" class="form-control" id="name" aria-describedby="emailHelp" autocomplete="off" >
        </div>
        <div class="form-group">
          <label for="surname">Apellidos</label>
          <input type="text" class="form-control" id="surname" aria-describedby="emailHelp" autocomplete="off" >
        </div>
        <div class="form-group">
          <label for="address">Dirección</label>
          <input type="text" class="form-control" id="address" aria-describedby="emailHelp" autocomplete="off" >
        </div>
        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" autocomplete="off" >
        </div>
         <div class="form-group">
          <label for="psword1">Contraseña</label>
          <input type="password" class="form-control" id="psword1" autocomplete="off" >
        </div>
         <div class="form-group">
          <label for="paswr2">Repita su Contraseña</label>
          <input type="password" class="form-control" id="paswr2" autocomplete="off" >
        </div>
      </form>
      <a href="/AnimaLand" class="btn btn-danger">Cancelar</a>
      <a class="btn btn-success" style="color: white;" id="registry">Registrar</a>
      </div>
  </div>
</div>
</div> <!-- container -->
</body>
 <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="js/registro.js"></script>
</html>