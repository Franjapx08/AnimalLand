
  <div class="row mb-2">
    <div class="col-md-12">
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
          <!-- contenido -->
            <div class="row" style="width: 100%;">
              <div class="card" style="width: 100%;">
                <div class="card-header">
                  Nuevo veterinario
                </div>
                <div class="card-body">
                   <div class="form-group">
                    <label for="password">Nombre</label>
                    <input type="text" class="form-control" id="nombre" autocomplete="off" >
                  </div>
                   <div class="form-group">
                    <label for="password">Apellidos</label>
                    <input type="text" class="form-control" id="apellido" autocomplete="off" >
                  </div>
                   <div class="form-group">
                    <label for="password">Tipo:</label>
                    <select class="form-control" id="tipo" autocomplete="off">
                        <option value="1">Administrador</option>
                        <option value="4">Veterinario</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="password">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" autocomplete="off" >
                  </div>
                  <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="pass1" autocomplete="off" >
                  </div>
                  <div class="form-group">
                    <label for="password">Repita su contraseña</label>
                    <input type="password" class="form-control" id="pass2" autocomplete="off" >
                  </div>
                   <div class="modal-footer">
                  <button type="button" class="btn btn-danger" ><a style="color: white;" href="?misMascotas">Cancelar</a></button>
                  <button type="button" class="btn btn-success" id="aceptar">Aceptar</button>
                  </div>
                </div>
              </div>  
            </div>

        </div>
      </div>
    </div>
  </div>
  <script src="js/nuevoVeterinario.js"></script>