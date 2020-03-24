/* proceso modificar usuario */
/* boton */
var modificar = document.getElementById("modificar");
/* obtener valores de inputs en DOM */
var nombre = document.getElementById("nombre");
var color = document.getElementById("color");
var tipo = document.getElementById("tipo");
var caracteristica = document.getElementById("caracteristica");
var id = document.getElementById("idMascota");
var idCliente = document.getElementById("idUser");
/* accion del boton */
modificar.addEventListener("click", function(e) {
  /* checar si los inputs estan vacios */
  if (
    nombre.value != "" &&
    id.value != "" &&
    color.value != "" &&
    tipo.value != "" &&
    caracteristica.value != "" &&
    idCliente.value != ""
  ) {
    let dataSends = new FormData();
    dataSends.append("nombre", nombre.value);
    dataSends.append("color", color.value);
    dataSends.append("tipo", tipo.value);
    dataSends.append("caracteristica", caracteristica.value);
    dataSends.append("id", id.value);
    dataSends.append("idCliente", idCliente.value);
    axios
      .post("http://localhost/animaLand/api/UpdateMascota.php", dataSends)
      .then(r => {
        if (r.data.code == 1) {
          location.reload();
        } else {
          alert(
            "Alerta! \n" + "Error al intentar encontar los datos requeridos"
          );
        }
      })
      .catch(function(err) {
        console.log("Error " + err);
        alert("Alerta! \n" + "Error al intentar conectar al servidor");
      });
  } else {
    alert("Alerta! \n" + "Error campos vacios");
  }
});
