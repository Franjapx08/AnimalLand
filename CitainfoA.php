
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
    /* ve si hay sesion iniciada y es usuario */
    if ($sesion){  
       /* si es cliente  */ 
      if($_SESSION["user"]["Tipo"] == 3){
         header("Location: http://localhost/AnimaLand/index.php?inicio");
      }else{
        /* llamar al afuncion para traer datos segun el id */
        include_once("./api/controllers/Citas.php");
        /* varaible para saber ruta */  
        $request = $_SERVER['REQUEST_URI'];
        $url_components = parse_url($request); 
        // get id 
        parse_str($url_components['query'], $params); 
        /* llamar la funcion en clase mascotas */
        $getCita = new Citas();
        $resultado = $getCita->getCitaByIdVeterinario($params["Cita"]);
        /* si encontro resultados */
        if(sizeof($resultado) != 0){
             ?>
            <div class="contenido" style="min-height: 1200px;">
            <?php
                include './components/informacionCitaV.php';
            ?>
            </div>
            <?php
        }else{
            ?>
            <div class="contenido" style="min-height: 500px;">
            <?php
                include './components/notfound.php';
            ?>
            </div>
            <?php
        }
      /* <!-- footer --> */
        include './includes/footer.php';
      }
    }else{
      header("Location: http://localhost/AnimaLand/index.php?inicio");
    }
  ?>
</div> <!-- container -->
</body>
  <?php
    include './includes/scripts.html';  
  ?>
</html>
  <script src="js/opCitaA.js"></script>
  <script src="js/addDiagnostico.js"></script>
