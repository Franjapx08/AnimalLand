<?php
      if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['tipo']) && isset($_POST['email']) && isset($_POST['password'])){
            include_once('./controllers/Clientes.php');
            include_once('./controllers/Veterinarios.php');
            $cliente = new Clientes();
            $veterinario = new Veterinarios();
            $exist = $cliente->isExist($_POST['email']);
            /* checar si ya existe ese correo en clientes */
            if(sizeof($exist) == 1){
                  $data = array(
                    'code' => -1,
                    'data' => array(),
                    'message' => 'Correo ya existente.'
                );
            }else{
                /* checar si esxite ese correo en veterinarios */
                $exist = $veterinario->isExist($_POST['email']);
                if(sizeof($exist) == 1){
                    $data = array(
                    'code' => -1,
                    'data' => array(),
                    'message' => 'Correo ya existente.'
                );
                }else{
                    /* insertar */
                    $registro = $veterinario->registro($_POST['nombre'], $_POST['apellido'], $_POST['email'], sha1($_POST['password']), $_POST["tipo"]);
                    $data = array(
                        'code' => 1,
                        'data' => array(),
                        'message' => 'Éxito al registrar al usuario'
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