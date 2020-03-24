<?php   
    include_once("./controllers/Veterinarios.php");
    $veterinario = new Veterinarios();
    $result = $veterinario->getVeterinariosActivos();
    $data = array(
        'code' => 1,
        'data' =>$result
    );
    echo(json_encode($data));