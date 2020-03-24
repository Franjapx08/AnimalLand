<?php
      if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['color']) && isset($_POST['caracteristica']) && isset($_POST['idCliente'])){
            include_once('./controllers/Mascotas.php');
            $mascota = new Mascotas();
            $result = $mascota->ifExistMascota($_POST['id']);
            if(sizeof($result) != 0){
                /* modificar */
                $result = $mascota->updateMascota($_POST["id"], $_POST["nombre"], $_POST["tipo"], $_POST["color"], $_POST["caracteristica"], $_POST["idCliente"]);
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