<?php   
    include_once("./controllers/Mascotas.php");
    include_once("./controllers/Clientes.php");
    $mascota = new Mascotas();
    $cliente = new Clientes();
    session_start();
    $id = $_SESSION["user"]["id"];
    $correo = $_SESSION["user"]["Correo"];
    $resultCliente = $cliente->isExist($correo);
    if(sizeof($resultCliente) != 0){
        $result = $mascota->getMascotaById($id);
        $data = array(
            'code' => 1,
            'data' =>$result
        );
    }
    echo(json_encode($data));