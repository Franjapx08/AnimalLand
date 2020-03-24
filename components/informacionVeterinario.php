  <div class="contenido" style="height: 500px;">
    <div class="row mb-2">
        <div class="col-md-12">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <!-- contenido -->
              <h5>Información del personal</h5>
              <div class="row">
                <ul class="list-group list-group-horizontal-lg">
                  <li class="list-group-item">Nombre: <?php  echo $resultado[0]["Nombre"]; ?></li>
                  <li class="list-group-item">Apellido: <?php echo $resultado[0]["Apellido"];  ?></li>
                </ul>
              </div>
              <br>
              <h5>Caracterisitcas generales</h5>
              <div class="row">
                <ul class="list-group list-group-horizontal-lg">
                  <li class="list-group-item">Tipo: <?php if($resultado[0]["Tipo"] == 4){
                        echo "Veterinario";
                    }else{
                        echo "Administrador";
                        } 
                   ?></li>
                    <li class="list-group-item">Correo electrónico: <?php echo $resultado[0]["Correo"];  ?></li>
                </ul>
              </div>
              <div class="row" style="margin-top: 20px; margin-left: 2px;">
                <ul class="list-group list-group-horizontal-lg">
                  <?php if($_SESSION["user"]["Tipo"] == 0){
                    ?>
                      <li class="list-group-item"><button class="btn btn-success" data-toggle="modal" data-target="#modalUpdate">Eliminar personal </button></li>
                    <?php
                  }
                  ?>
                  <li class="list-group-item"><button class="btn btn-success" data-toggle="modal" data-target="#modalPass">Modificar personal</button></li>
                </ul>  
              </div>
              <input type="hidden" class="form-control" id="idVeterinario" autocomplete="off" value="<?php echo $resultado[0]["id"];  ?>"> 
              <!-- modal modoficar -->
            <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Eliminar mascota</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <span>Una ves aceptado no se podra recuperar la mascota eliminada</span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-success" id="eliminar">Aceptar</button>
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
                        <label for="nombre">Nombre: </label>
                        <input type="text" class="form-control" id="nombre" value="<?=$resultado[0]["Nombre"];?>" autocomplete="off" >
                      </div>
                      <div class="form-group">
                        <label for="apellido">Apellido: </label>
                        <input type="text" class="form-control" id="apellido" value="<?=$resultado[0]["Apellido"];?>" autocomplete="off" >
                      </div>
                      <div class="form-group">
                        <label for="tipo">Tipo: </label>
                        <select class="form-control" id="tipo">
                            <option value="1">Administrador</option>
                            <option value="4">Veterinario</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="correo">Correo electrónico: </label>
                        <input type="text" class="form-control" id="correo" value="<?=$resultado[0]["Correo"];?>" autocomplete="off" >
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