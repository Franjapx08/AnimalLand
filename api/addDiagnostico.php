<?php
      if(isset($_POST['id']) && isset($_POST['diag'])){
            include_once('./controllers/Citas.php');
            $cita = new Citas();
            /* modificar */
            $result = $cita->addDiagnostico($_POST["id"], $_POST["diag"]);
            $data = array(
                'code' => 1,
                'message' => 'Modificado con éxtio.'
            );
        }else {
            $data = array(
                'code' => -1,
                'data' => array(),
                'message' => 'Error al enviar datos.'
            );
        }
echo(json_encode($data));