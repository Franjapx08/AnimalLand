
  <div class="row mb-2">
    <div class="col-md-12">
    <h4>Nueva cita</h4>
      <div class="card flex-md-row mb-4 shadow-sm h-md-250">
        <div class="card-body d-flex flex-column align-items-start">
          <div class="card"  style="margin: 0 auto; float: none; margin-bottom: 10px;">
              <h3 class="card-header" id="monthAndYear"></h3>
              <table class="table table-bordered table-responsive-sm" id="calendar">
                  <thead>
                  <tr>
                      <th>do.</th>
                      <th>lu.</th>
                      <th>ma.</th>
                      <th>mi.</th>
                      <th>ju.</th>
                      <th>vi</th>
                      <th>sá.</th>
                  </tr>
                  </thead>
                  <tbody id="calendar-body">
                  </tbody>
              </table>
               <div class="form-inline">
                <span style="margin-left: 5px;">Fecha disponible: <i class="fa fa-square" style="color: #ABA8A8;"></i></span>
               </div>
                <div class="form-inline">
                <button class="btn btn-outline-primary col-sm-6" id="previous" onclick="previous()">Anterior</button>
                <button class="btn btn-outline-primary col-sm-6" id="next" onclick="next()">Siguiente</button>
               </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva cita</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form>
            <div class="form-group">
              <label for="nombre" id="fechaString">Fecha: </label>
              <input type="hidden" id="fecha">
            </div>  
            <div class="form-group">
              <label for="mascota">Mascota a consultar: </label>
              <select class="form-control" id="mascota">
              </select>
            </div>
            <div class="form-group">
              <label for="veterinarios">Veterinario disponible: </label>
              <select class="form-control" id="veterinarios" onClick="veterinarioClick()">
              </select>
            </div>
              <label for="hora">Hora de la consulta: </label>
            <div class="form-group" id="divP">
            </div>    
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-success" id="" onClick="addCita()">Aceptar</button>
        </div>
      </div>
    </div> 
  </div>
  <script>

</script>
  <script src="js/calendario.js">
  </script>
  <script src="js/getMascotaById.js"></script>
  <script src="js/getVeterinarioParaCita.js"></script>
  <script src="js/calendario.js"></script>