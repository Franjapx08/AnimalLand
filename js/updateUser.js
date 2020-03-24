/* proceso modificar usuario */
/* boton */
var modificar = document.getElementById("modificar");
/* obtener valores de inputs en DOM */
var direccion = document.getElementById("direccion");
var id = document.getElementById("idUser");
/* accion del boton */
modificar.addEventListener("click", function(e) {
  /* checar si los inputs estan vacios */
  if (direccion.value != "" && id.value != "") {
    let dataSends = new FormData();
    dataSends.append("direccion", direccion.value);
    dataSends.append("id", id.value);
    axios
      .post("http://localhost/animaLand/api/UpdateUser.php", dataSends)
      .then(r => {
        if (r.data.code == 1) {
          location.reload();
        } else {
          alert("Alerta! \n" + "Error al intentar encontar el usuario");
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
