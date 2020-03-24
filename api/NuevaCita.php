<?php
    if(isset($_POST['mascota']) && isset($_POST['veterinario']) && isset($_POST['hora']) && isset($_POST['fecha'])){
        include_once('./controllers/Citas.php');
        $cita = new Citas();
        session_start();
        $id = $_SESSION["user"]["id"];
        $result = $cita->insertCitaFromUser($id, $_POST["mascota"], $_POST["veterinario"], $_POST["fecha"], $_POST["hora"]);
        $data = array(
            'code' => 1,
            'data' => array(),
            'message' => 'Éxito al agendar cita.'
            );
    }else{
        $data = array(
            'code' => -1,
            'data' => array(),
            'message' => 'Error al enviar datos.'
            );
     }
    echo(json_encode($data));