<?php
      if(isset($_POST['id'])){
            include_once('./controllers/Veterinarios.php');
            $veterinario = new Veterinarios();
            $result = $veterinario->isExistById($_POST['id']);
            if(sizeof($result) != 0){
                /* eliminar */
                $result = $veterinario->deleteVeterinario($_POST["id"]);
                $data = array(
                    'code' => 1,
                    'message' => 'Modificado con éxtio.'
                );
            }else{
                $data = array(
                    'code' => -1,
                    'data' => array(),
                    'message' => 'Error al intentar encontrar a la mascota'
                );
            }
        }else {
            $data = array(
                'code' => -1,
                'data' => array(),
                'message' => 'Error al enviar datos.'
            );
        }
echo(json_encode($data));