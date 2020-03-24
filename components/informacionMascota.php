  <div class="contenido" style="height: 500px;">
    <div class="row mb-2">
        <div class="col-md-12">
          <div class="card flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <!-- contenido -->
              <h5>Información de la mascota</h5>
              <div class="row">
                <ul class="list-group list-group-horizontal-lg">
                  <li class="list-group-item">Nombre de mascota: <?php  echo $resultado[0]["Nombre"]; ?></li>
                  <li class="list-group-item">Tipo de mascota: <?php echo $resultado[0]["Tipo"];  ?></li>
                </ul>
              </div>
              <br>
              <h5>Caracterisitcas generales</h5>
              <div class="row">
                <ul class="list-group list-group-horizontal-lg">
                  <li class="list-group-item">Color de mascota: <?php echo $resultado[0]["Color"];  ?></li>
                    <li class="list-group-item">Caracterisitcas: <?php echo $resultado[0]["Caracteristica"];  ?></li>
                </ul>
              </div>
              <div class="row" style="margin-top: 20px; margin-left: 2px;">
                <ul class="list-group list-group-horizontal-lg">
                  <li class="list-group-item"><button class="btn btn-success" data-toggle="modal" data-target="#modalUpdate">Eliminar mascota</button></li>
                  <li class="list-group-item"><button class="btn btn-success" data-toggle="modal" data-target="#modalPass">Modificar información</button></li>
                </ul>  
              </div>
              <input type="hidden" class="form-control" id="idUser" autocomplete="off" value="<?php echo $_SESSION["user"]["id"];  ?>">
              <input type="hidden" class="form-control" id="idMascota" autocomplete="off" value="<?php echo $resultado[0]["id"];  ?>"> 
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
                      <button type="button" class="btn btn-success" id="eliminarMascota">Aceptar</button>
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
                        <label for="nombre">Nombre de la mascota: </label>
                        <input type="text" class="form-control" id="nombre"  value=" <?php echo $resultado[0]["Nombre"] ?>" autocomplete="off" >
                      </div>
                      <div class="form-group">
                        <label for="tipo">Tipo de mascota: </label>
                        <input type="text" class="form-control" id="tipo" value=" <?php echo $resultado[0]["Tipo"] ?>" autocomplete="off" >
                      </div>
                      <div class="form-group">
                        <label for="color">Color de la mascota: </label>
                        <input type="text" class="form-control" id="color" value=" <?php echo $resultado[0]["Color"] ?>" autocomplete="off" >
                      </div>
                      <div class="form-group">
                        <label for="caracteristica">Caracteristica de la mascota: </label>
                        <input type="text" class="form-control" id="caracteristica" value=" <?php echo $resultado[0]["Caracteristica"] ?>" autocomplete="off" >
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