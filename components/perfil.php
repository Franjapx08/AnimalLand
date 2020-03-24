
  <div class="row mb-2">
    <div class="col-md-12">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
          <!-- contenido -->
          <h5>Información principal</h5>
           <div class="row">
            <ul class="list-group list-group-horizontal-lg">
              <li class="list-group-item">Nombres: <?php  echo $_SESSION["user"]["Nombre"]; ?></li>
              <li class="list-group-item">Apellidos: <?php echo $_SESSION["user"]["Apellido"];  ?></li>
            </ul>
          </div>
          <br>
          <h5>Contacto</h5>
          <div class="row">
            <ul class="list-group list-group-horizontal-lg">
              <li class="list-group-item">Correo electrónico: <?php echo $_SESSION["user"]["Correo"];  ?></li>
                <?php 
                if (array_key_exists("Direccion",$_SESSION["user"])){
                  ?>
                    <li class="list-group-item">Dirección: <?php echo $_SESSION["user"]["Direccion"];  ?></li>
                  <?php
                }
                ?>
            </ul>
          </div>
          <div class="row" style="margin-top: 20px; margin-left: 2px;">
            <ul class="list-group list-group-horizontal-lg">
             <?php 
                if (array_key_exists("Direccion",$_SESSION["user"])){
                  ?>
                    <li class="list-group-item"><button class="btn btn-success" data-toggle="modal" data-target="#modalUpdate">Modificar información</button></li>
                  <?php
                }
                ?>
             <li class="list-group-item"><button class="btn btn-success" data-toggle="modal" data-target="#modalPass">Modificar contraseña</button></li>
             </ul>  
          </div>
          <input type="hidden" class="form-control" id="idUser" autocomplete="off" value="<?php echo $_SESSION["user"]["id"];  ?>">
          <!-- modal modoficar -->
         <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modificar información</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form>
                  <span>Una ves aceptado se cerrara sesión automáticamente para guardar los datos nuevos</span>
                  <div class="form-group">
                    <label for="email">Direción</label>
                    <textarea class="form-control" id="direccion" aria-describedby="emailHelp" autocomplete="off"><?php echo $_SESSION["user"]["Direccion"];?></textarea>
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
            <!-- modal cambiar pass -->
            <div class="modal fade" id="modalPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modificar contraseña</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form>
                  <span>Una ves aceptado se cerrara sesión automáticamente para guardar los datos nuevos</span>
                  <div class="form-group">
                    <label for="password">Contraseña actual: </label>
                    <input type="password" class="form-control" id="password" autocomplete="off" >
                  </div>
                  <div class="form-group">
                    <label for="password1">Nueva contraseña: </label>
                    <input type="password" class="form-control" id="password1" autocomplete="off" >
                  </div>
                  <div class="form-group">
                    <label for="password2">Confirmar contraseña: </label>
                    <input type="password" class="form-control" id="password2" autocomplete="off" >
                  </div>
                </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-success" id="modificarPass">Aceptar</button>
                </div>
              </div>
            </div> 
          </div>
            <!-- fin modal -->
        </div>
      </div>
    </div>
  </div>
  <script src="js/updateUser.js"></script>
  <script src="js/updatePass.js"></script>