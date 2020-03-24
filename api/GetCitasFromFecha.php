<?php
    if(isset($_POST["fecha"])){
        include_once("./controllers/Citas.php");
        $citas = new Citas();
        $result = $citas->getCitasFromFecha($_POST["fecha"]);
        $data = array(
            'code' => 1,
            'data' =>$result
        );
    }else{
         $data = array(
            'code' => -1,   
            'message' => "No resultados"
        );
    }
    echo(json_encode($data));