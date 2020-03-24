<?php
      if(isset($_POST['id']) && isset($_POST['opcion'])){
            include_once('./controllers/Citas.php');
            $cita = new Citas();
            /* modificar */
            $result = $cita->setEstatusCita($_POST["id"], $_POST["opcion"]);
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