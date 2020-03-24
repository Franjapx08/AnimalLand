<?php
      if(isset($_POST['id']) && isset($_POST['password'])){
        include_once('./controllers/Clientes.php');
        include_once('./controllers/Veterinarios.php');
        $cliente = new Clientes();
        $veterinario = new Veterinarios();
        $login1 = $cliente->ifExistPassById($_POST['id'], sha1($_POST['password']));
        $login2 = $veterinario->ifExistPassById($_POST['id'], sha1($_POST['password']));
        if(sizeof($login1)!=0){
            $data = array(
                'code' => 1,
                'message' => 'Usuario encontrado con éxito'
            );
        }else if(sizeof($login2)!=0){ 
            $data = array(
                'code' => 2,
                'message' => 'Usuario encontrado con éxito'
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