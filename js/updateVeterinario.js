/* proceso modificar usuario */
/* boton */
var modificar = document.getElementById("modificar");
/* obtener valores de inputs en DOM */
var nombre = document.getElementById("nombre");
var apellido = document.getElementById("apellido");
var correo = document.getElementById("correo");
var tipo = document.getElementById("tipo");
var id = document.getElementById("idVeterinario");
/* accion del boton */
modificar.addEventListener("click", function(e) {
  /* checar si los inputs estan vacios */
  if (
    nombre.value != "" &&
    apellido.value != "" &&
    id.value != "" &&
    correo.value != "" &&
    tipo.value != ""
  ) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(correo.value)) {
      let dataSends = new FormData();
      dataSends.append("nombre", nombre.value);
      dataSends.append("apellido", apellido.value);
      dataSends.append("tipo", tipo.value);
      dataSends.append("correo", correo.value);
      dataSends.append("id", id.value);
      axios
        .post("http://localhost/animaLand/api/UpdateVeterinario.php", dataSends)
        .then(r => {
          if (r.data.code == 1) {
            location.reload();
          } else {
            alert("Alerta! \n" + "Correo electrónico no disponible");
          }
        })
        .catch(function(err) {
          console.log("Error " + err);
          alert("Alerta! \n" + "Error al intentar conectar al servidor");
        });
    }
  } else {
    alert("Alerta! \n" + "Error campos vacios");
  }
});
