<?php
      if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['tipo']) && isset($_POST['correo'])){
            include_once('./controllers/Clientes.php');
            include_once('./controllers/Veterinarios.php');
            $cliente = new Clientes();
            $veterinario = new Veterinarios();
            $exist = $cliente->isExist($_POST['correo']);
            $correo = false;
            /* checar si ya existe ese correo en clientes */
            if(sizeof($exist) != 0){
                    $data = array(
                    'code' => -1,
                    'data' => $exist,
                    'message' => 'Correo ya existente.'
                    );
            }else{
                /* checar si esxite ese correo en veterinarios */
                $exist2 = $veterinario->isExist($_POST['correo']);
                if(sizeof($exist2) != 0){
                    $getCorreo = $veterinario->getVeterinarioByIdGlobal($_POST["id"]);
                    if($getCorreo[0]["Correo"] == $_POST["correo"]){
                        $correo = true;
                        if($correo){
                            $modificar = $veterinario->updateVeterinario($_POST["id"], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['tipo']);
                            $data = array(
                            'code' => 1,
                            'message' => 'Éxito al mofiicar al usuario'
                            );
                        }
                    }else{
                        $data = array(
                        'code' => -1,
                        'message' => 'Correo ya existente.'
                        );
                    }
                }else{
                    $modificar = $veterinario->updateVeterinario($_POST["id"], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['tipo']);
                    $data = array(
                    'code' => 1,
                    'message' => 'Éxito al mofiicar al usuario'
                    );
                }
            }
        }else {
            $data = array(
                'code' => -1,
                'data' => array(),
                'message' => 'Error al enviar datos.'
            );
        }
echo(json_encode($data));