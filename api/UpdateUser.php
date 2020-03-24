<?php
      if(isset($_POST['id']) && isset($_POST['direccion'])){
            include_once('./controllers/Clientes.php');
            $cliente = new Clientes();
            $result = $cliente->isExistById($_POST['id']);
            /* checar si ya existe ese correo en clientes */
            if(sizeof($result) != 0){
                /* modificar */
                $result2 = $cliente->updateInf($_POST["id"], $_POST["direccion"]);
                $data = array(
                    'code' => 1,
                    'message' => 'Modificado con éxtio.'
                );
                session_start();
                session_destroy();
            }else{
                $data = array(
                    'code' => -1,
                    'data' => array(),
                    'message' => 'Error al intentar encontrar al usuario'
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