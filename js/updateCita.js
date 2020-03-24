/* proceso modificar usuario */
/* boton */
var modificar = document.getElementById("modificar");
/* obtener valores de inputs en DOM */
var mascota = document.getElementById("mascota");
var idCita = document.getElementById("idCita");
/* accion del boton */
modificar.addEventListener("click", function(e) {
  /* checar si los inputs estan vacios */
  if (mascota.value != "" && idCita.value != "") {
    let dataSends = new FormData();
    dataSends.append("mascota", mascota.value);
    dataSends.append("id", idCita.value);
    axios
      .post("http://localhost/animaLand/api/UpdateCita.php", dataSends)
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
