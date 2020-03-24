<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include './includes/meta.php';
  ?>
</head>
<body>
<div class="container"> 
  <?php
  /* incluir header */
    include './includes/header.php';
    /* varaible para saber ruta */
    ?>
    <div class="contenido" style="min-height: 800px;">
     <?php
    $request = $_SERVER['REQUEST_URI'];
    /* casos de rutas */
    switch ($request) {
        /* casos globales */
       case '/AnimaLand/index.php' :
            require __DIR__ . './components/inicio.php';
            break;  
        case '/AnimaLand/index.php?inicio' :
            require __DIR__ . './components/inicio.php';
            break;
        case '/AnimaLand/index.php?acercade' :
            require __DIR__ . './components/acercaDe.php';
            break;
            /* casos para usuarios */
        case '/AnimaLand/index.php?perfil' :
            if($sesion){
              require __DIR__ . './components/perfil.php';
            }else{
              require __DIR__ . './components/inicio.php';
            }
            break;
             /* caso usaurios */
        case '/AnimaLand/index.php?citas' :
            if($sesion){
              if($_SESSION["user"]["Tipo"] == 4){
                 require __DIR__ . './components/citasVeterinarios.php';
              }else if($_SESSION["user"]["Tipo"] == 3){
                require __DIR__ . './components/citas.php';
              }else if($_SESSION["user"]["Tipo"] == 0 || $_SESSION["user"]["Tipo"] == 1){
                require __DIR__ . './components/citasAdmin.php';
              }
            }else{
              require __DIR__ . './components/inicio.php';
            }
            break; 
            /* casos para usuario */
        case '/AnimaLand/index.php?misMascotas' :
            if($sesion && $_SESSION["user"]["Tipo"] == 3){
              require __DIR__ . './components/misMascotas.php';
            }else{
              require __DIR__ . './components/inicio.php';
            }
            break;
        case '/AnimaLand/index.php?nuevaMascota' :
            if($sesion && $_SESSION["user"]["Tipo"] == 3){
              require __DIR__ . './components/nuevaMascota.php';
            }else{
              require __DIR__ . './components/inicio.php';
            }
            break;
        case '/AnimaLand/index.php?Mascota' :
            if($sesion && $_SESSION["user"]["Tipo"] == 3){
              require __DIR__ . './components/citas.php';
            }else{
              require __DIR__ . './components/inicio.php';
            }
            break;
        case '/AnimaLand/index.php?nuevaCita' :
            if($sesion && $_SESSION["user"]["Tipo"] == 3){
              require __DIR__ . './components/nuevaCita.php';
            }else{
              require __DIR__ . './components/inicio.php';
            }
            break;
            /* casos para admin */
        case '/AnimaLand/index.php?Veterinarios' :
            if($sesion && $_SESSION["user"]["Tipo"] == 0  || $_SESSION["user"]["Tipo"] == 1){
              require __DIR__ . './components/veterinarios.php';
            }else{
              require __DIR__ . './components/inicio.php';
            }
            break;
        case '/AnimaLand/index.php?nuevoPersonal' :
            if($sesion && $_SESSION["user"]["Tipo"] == 0 || $_SESSION["user"]["Tipo"] == 1){
              require __DIR__ . './components/nuevoVeterinario.php';
            }else{
              require __DIR__ . './components/inicio.php';
            }
            break;
        default:
            require __DIR__ . './components/inicio.php';
          break;
        }
        ?>
        </div>
        <?php
    /* <!-- footer --> */
      include './includes/footer.php';
  /* <!-- Modal login --> */
      /* si no esta login */
      if(!$sesion){
        include './components/login.php';
      }
    ?>
</div> <!-- container -->
</body>
  <?php
    include './includes/scripts.html';
  ?>
</html>