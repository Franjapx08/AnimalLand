  <header class="blog-header py-3">

    <div class="row flex-nowrap justify-content-between align-items-center">
      <!-- si hay sesion abierta -->
      <?php
        if($sesion){
          ?>
          <!-- si hay sesion abierta -->
          <div class="col-4 pt-1">
            <a class="btn btn-sm btn-outline-secondary" href="http://localhost/AnimaLand/index.php?perfil">
            <?php
              echo "Perfil ". $_SESSION['user']['Nombre'];
            ?>
            </a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="http://localhost/AnimaLand/index.php?inicio">AnimaLand</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">  
            <a class="btn btn-sm btn-outline-secondary" id="sessionOff">Cerrar sesión</a>
          </div>
          <?php
        }else{
          ?>
          <!-- contenido si no hay session -->
          <div class="col-4 pt-1">
            <a class="btn btn-sm btn-outline-secondary" href="registro.php">Registro</a>
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="http://localhost/AnimaLand/index.php?inicio">AnimaLand</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">  
            <a class="btn btn-sm btn-outline-secondary" href="login.php" data-toggle="modal" data-target="#exampleModal">Iniciar Sesión</a>
          </div>
          <?php
        }
      ?>
    </div>
    <nav class="navbar navbar-dark" id="header-class">
      <button class="navbar-toggler bg-ligth" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php?inicio">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?acercade">Acerca de</a>
          </li>
          <?php
            /* si esta conectado */
            if($sesion){
              ?>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?perfil">Información personal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?citas">Citas</a>
              </li>
              <?php
            }
            if($sesion && $_SESSION["user"]["Tipo"] == 3){
            ?>
              <li class="nav-item">
                <a class="nav-link" id="getMascotas" href="index.php?misMascotas">Mis mascotas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?nuevaMascota">Agregar mascota</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?nuevaCita">Agendar Cita</a>
              </li>
            <?php
            }
            ?>
            <?php
            if($sesion && $_SESSION["user"]["Tipo"] == 0 || $sesion && $_SESSION["user"]["Tipo"] == 1){
            ?>
              <li class="nav-item">
                <a class="nav-link" id="getMascotas" href="index.php?Veterinarios">Personal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?nuevoPersonal">Agregar Personal</a>
              </li>
            <?php
            }
            ?>
        </ul>
      </div>
    </nav>
  </header>