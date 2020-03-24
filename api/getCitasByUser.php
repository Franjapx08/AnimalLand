<?php   
    include_once("./controllers/Citas.php");
    include_once("./controllers/Clientes.php");
    $citas = new Citas();
    $cliente = new Clientes();
    session_start();
    $id = $_SESSION["user"]["id"];
    $correo = $_SESSION["user"]["Correo"];
    $resultCliente = $cliente->isExist($correo);
    if(sizeof($resultCliente) != 0){
        date_default_timezone_set('America/Mazatlan'); /* zona horaria */
        $result = $citas->getCitasByUser($id); /* traer datos de consulta */
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
                /* fecha paso cancela cita si es que nunca fue modificado el estatus */
                if($result[$i]["Estatus"] == "0"){
                    $citas->setEstatusCita($result[$i]["id"], 5);
                }
            }
        }
        $result = $citas->getCitasByUser($id); /* traer datos de consulta */
        $data = array(
            'code' => 1,
            'data' =>$result
        );
    }
    echo(json_encode($data));