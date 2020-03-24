<?php
      if(isset($_POST['email']) && isset($_POST['password'])){
        include_once('./controllers/Clientes.php');
        include_once('./controllers/Veterinarios.php');
        $cliente = new Clientes();
        $veterinario = new Veterinarios();
        $login1 = $cliente->login($_POST['email'], sha1($_POST['password']));
        $login2 = $veterinario->login($_POST['email'], sha1($_POST['password']));
        if(sizeof($login1)!=0){   
            session_start();
            $_SESSION["user"] = $login1[0];
            $data = array(
                'code' => 1,
                'data' => $login1[0],
                'message' => 'Usuario logeado con éxito'
            );
        }else if(sizeof($login2)!=0){ 
            session_start();
            $_SESSION["user"] = $login2[0];
            $data = array(
                'code' => 1,
                'data' => $login2[0],
                'message' => 'Usuario logeado con éxito'
            );
        }else{
            $data = array(
                'code' => -1,
                'message' => 'Error al encontrar el usuario'
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