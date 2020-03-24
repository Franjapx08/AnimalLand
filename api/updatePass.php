<?php
      if(isset($_POST['id']) && isset($_POST["password"]) && isset($_POST["TipoUser"])){
            include_once('./controllers/Clientes.php');
            include_once('./controllers/Veterinarios.php');
            $cliente = new Clientes();
            $veterinario = new Veterinarios();
            if($_POST["TipoUser"] == "1"){
                /* si es igual a 1 es cliente */
                $result = $cliente->updatePass($_POST['id'], sha1($_POST["password"]));
                $data = array(
                    'code' => 1,
                    'message' => 'Modificado con éxtio.'
                );
                session_start();
                session_destroy();
            }else{
                 /* si es igual a 1 es cliente */
                $result = $veterinario->updatePass($_POST['id'], sha1($_POST["password"]));
                $data = array(
                    'code' => 1,
                    'message' => 'Modificado con éxtio.'
                );
                session_start();
                session_destroy();
            }
        }else {
            $data = array(
                'code' => -1,
                'data' => array(),
                'message' => 'Error al enviar datos.'
            );
        }
echo(json_encode($data));