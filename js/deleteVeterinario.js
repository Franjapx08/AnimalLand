var eliminar = document.getElementById("eliminar");
/* obtener valores de inputs en DOM */
var id = document.getElementById("idVeterinario");
/* accion del boton */
eliminar.addEventListener("click", function(e) {
  /* checar si los inputs estan vacios */
  if (id.value != "") {
    let dataSends = new FormData();
    dataSends.append("id", id.value);
    axios
      .post("http://localhost/animaLand/api/deleteVeterinario.php", dataSends)
      .then(r => {
        if (r.data.code == 1) {
          location.href = "http://localhost/AnimaLand/index.php?Veterinarios";
        } else {
          alert("Alerta! \n" + "Error al intentar encontrar el recurso");
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
