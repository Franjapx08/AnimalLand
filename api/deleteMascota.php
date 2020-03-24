<?php
      if(isset($_POST['id'])){
            include_once('./controllers/Mascotas.php');
            $mascota = new Mascotas();
            $result = $mascota->ifExistMascota($_POST['id']);
            if(sizeof($result) != 0){
                /* eliminar */
                $result = $mascota->deleteMascota($_POST["id"]);
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