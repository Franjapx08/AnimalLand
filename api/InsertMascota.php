<?php
      if(isset($_POST['nombre']) && isset($_POST['tipo']) && isset($_POST['color']) && isset($_POST['caracteristicas'])){
            include_once('./controllers/Clientes.php');
            $cliente = new Clientes();
            /* insertar */
            session_start();
            $id = $_SESSION["user"]["id"];
            $nuevaMascota = $cliente->insertMascota($_POST['nombre'], $_POST['tipo'], $_POST['color'], $_POST['caracteristicas'], $id);
            $data = array(
                'code' => 1,
                'data' => array(),
                'message' => 'Éxito al registrar la mascota'
            );
        }else {
            $data = array(
                'code' => -1,
                'data' => array(),
                'message' => 'Error al enviar datos.'
            );
        }
echo(json_encode($data));