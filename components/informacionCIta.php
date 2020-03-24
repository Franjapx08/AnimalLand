  <div class="contenido" style="height: 500px;">
    <div class="row mb-2">
        <div class="col-md-12">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <!-- contenido -->
              <h5>Información de cita</h5>
              <div class="row">
                <ul class="list-group list-group-horizontal-lg">
                    <li class="list-group-item">Fecha: <?php echo $resultado[0]["Fecha"];  ?></li>
                    <li class="list-group-item">Hora de cita: <?php echo $resultado[0]["Hora"];  ?></li>
                    <li class="list-group-item">Estatus: 
                    <?php 
                    if($resultado[0]["Estatus"] == 0){
                        echo "Pendiente a confirmación"; 
                    }else if($resultado[0]["Estatus"] == 1){
                        echo "Confirmada";
                    }else if($resultado[0]["Estatus"] == 2){
                        echo "Concluida";
                    }else if($resultado[0]["Estatus"] == 3){
                        echo "Cancelada";
                    }
                    ?>
                    </li>
                </ul>
              </div>
               <div class="row">
                <ul class="list-group list-group-horizontal-lg">
                   <li class="list-group-item">Diagnostico: <?php echo $resultado[0]["Diagnositco"];  ?></li>
                </ul>
              </div>
              <br>
              <h5>Veterinario asignado</h5>
              <div class="row">
                <ul class="list-group list-group-horizontal-lg">
                    <li class="list-group-item">Nombre: <?php echo $resultado[0]["NombreV"];  ?></li>
                    <li class="list-group-item">Apellido: <?php echo $resultado[0]["Apellido"];  ?></li>
                    <li class="list-group-item">Correo electrónico: <?php echo $resultado[0]["Correo"];  ?></li>
                </ul>
              </div>
               <h5>Mascota</h5>
              <div class="row">
                <ul class="list-group list-group-horizontal-lg">
                    <li class="list-group-item">Nombre de mascota: <?php  echo $resultado[0]["NombreM"]; ?></li>
                    <li class="list-group-item">Tipo de mascota: <?php echo $resultado[0]["Tipo"];  ?></li> 
                </ul>
              </div>
              <div class="row" style="margin-top: 20px; margin-left: 2px;">
                <ul class="list-group list-group-horizontal-lg">
                  <?php
                    date_default_timezone_set('America/Mazatlan');
                    $cancelar = false;
                    $confirmar = false;
                    $date = explode("-", $resultado[0]["Fecha"]); /* Fecha */
                    $hours = explode(" - ", $resultado[0]["Hora"]); /* horas de inicio y fin */
                    $year = date("Y");
                    $mounth = date("m");
                    $day = date("d");
                    $hour = date("H");
                    if($year <= $date[0]){
                      if($mounth <= $date[1]){
                        if($day <= $date[2]){                     
                           if($hours[0] >= $hour){
                              $cancelar = true;
                            }
                        }
                      }
                    }
                      if($resultado[0]["Estatus"] == 0){
                        ?>
                          <li class="list-group-item"><button class="btn btn-success" data-toggle="modal" data-target="#modeloConfirmar">Confirmar cita</button></li>
                          <li class="list-group-item"><button class="btn btn-danger" data-toggle="modal" data-target="#modeloCancelar">Cancelar cita</button></li>
                          <li class="list-group-item"><button class="btn btn-success" data-toggle="modal" data-target="#modalPass">Modificar información</button></li>
                        <?php
                      }
                       if($resultado[0]["Estatus"] == 1){
                        ?>
                         <li class="list-group-item"><button class="btn btn-danger" data-toggle="modal" data-target="#modeloCancelar">Cancelar cita</button></li>
                         <li class="list-group-item"><button class="btn btn-success" data-toggle="modal" data-target="#modalPass">Modificar información</button></li>
                        <?php
                      }
                      if($resultado[0]["Estatus"] >= 2){
                        ?>
                        <li class="list-group-item"><button class="btn btn-danger" data-toggle="modal" data-target="#modelEliminar">Eliminar cita</button></li>
                        <?php
                      }
                      ?>
                      <?php
                  ?>
                </ul> 
              </div>
              <input type="hidden" class="form-control" id="idCita" autocomplete="off" value="<?php echo $resultado[0]["id"];  ?>"> 
              <!-- modal cancelar cita -->
            <div class="modal fade" id="modeloCancelar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cancelar cita</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <span>Una ves aceptado no se podra recuperar</span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-success" id="modeloUpdate1">Aceptar</button>
                    </div>
                  </div>
                </div> 
              </div>
                <!-- modal confirmar cita -->
            <div class="modal fade" id="modeloConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmar cita</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <span>¿Confirmar cita?</span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-success" id="modeloUpdate2">Aceptar</button>
                    </div>
                  </div>
                </div> 
              </div>
                <!-- modal eliminar cita -->
            <div class="modal fade" id="modelEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Eliminar cita</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <span>Una ves aceptado no se podra recuperar</span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-success" id="modeloUpdate3">Aceptar</button>
                    </div>
                  </div>
                </div> 
              </div>
                <!-- modal cambiar info -->
              <div class="modal fade" id="modalPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modificar mascota</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <form>
                        <div class="form-group">
                        <label for="mascota">Mascota a consultar: </label>
                        <select class="form-control" id="mascota">
                        </select>
                        </div>  
                    </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-success" id="modificar">Aceptar</button>
                    </div>
                  </div>
                </div> 
              </div>
                <!-- fin modal -->
                </div>
              </div>
            </div>
          </div>
        </div>