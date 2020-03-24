<?php   
    include_once("./controllers/Citas.php");
    include_once("./controllers/Veterinarios.php");
    $citas = new Citas();
    $veterinario = new Veterinarios();
    session_start();
    $id = $_SESSION["user"]["id"];
    $correo = $_SESSION["user"]["Correo"];
    $resultVeterinario = $veterinario->isExist($correo);
    if(sizeof($resultVeterinario) != 0){
        date_default_timezone_set('America/Mazatlan'); /* zona horaria */
        $result = $citas->getCitaByAdmin(); /* traer datos de consulta */
        $max = sizeof($result);
        $year = date("Y"); /* datos horarios */
        $mounth = date("m");
        $day = date("d");
        $hour = date("H");
        for($i = 0; $i < $max; $i++){
            $date = explode("-", $result[$i]["Fecha"]); /* Fecha */
            $hours = explode(":00 - ", $result[$i]["Hora"]); /* horas de inicio y fin */
            if($year <= $date[0]){
                if($mounth <= $date[1]){
                    if($day <= $date[2]){             
                        if($hour >= $hours[0]){
                            /* cancela si ya paso la fecha y hora y el estatus quedo pendiente*/
                            if($result[$i]["Estatus"] == "0"){
                                $citas->setEstatusCita($result[$i]["id"], 3);
                            }
                        }
                    }else{
                        $citas->setEstatusCita($result[$i]["id"], 3);
                    }
                }else{
                    $citas->setEstatusCita($result[$i]["id"], 3);
                }
            }else{
                /* fecha paso cancela cita */
                $citas->setEstatusCita($result[$i]["id"], 3);
            }
        }
        $result = $citas->getCitaByAdmin(); /* traer datos de consulta */
        $data = array(
            'code' => 1,
            'data' =>$result
        );
    }else{
         $data = array(
            'code' => -1,
            'data' => 'error al intentar encontrar el recurso'
        );
    }
    echo(json_encode($data));