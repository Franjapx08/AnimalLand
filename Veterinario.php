
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
       /* si es cliente o veterinario */ 
      if($_SESSION["user"]["Tipo"] == 0  || $_SESSION["user"]["Tipo"] == 1){
         /* llamar al afuncion para traer datos segun el id */
         include_once("./api/controllers/Veterinarios.php");
         /* varaible para saber ruta */  
         $request = $_SERVER['REQUEST_URI'];
         $url_components = parse_url($request); 
         // get id 
         parse_str($url_components['query'], $params); 
         /* llamar la funcion en clase mascotas */
         $getVeterinario = new Veterinarios();
         $resultado = $getVeterinario->getVeterinarioById($params["veterinario"]);
         /* si encontro resultados */
         if(sizeof($resultado) != 0){
           include './components/informacionVeterinario.php';
         }else{
           include './components/notfound.php';
         }
       /* <!-- footer --> */
         include './includes/footer.php';
      }else{
         header("Location: http://localhost/AnimaLand/index.php?inicio");
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
  <script src="js/deleteVeterinario.js"></script>
  <script src="js/updateVeterinario.js"></script>