var addDiagnostico = document.getElementById("addDiagnostico");
var idCita = document.getElementById("idCita");
var diag = document.getElementById("diagnostico");
/* accion del boton */
addDiagnostico.addEventListener("click", function(e) {
  /* checar si los inputs estan vacios */
  if (idCita.value != "" && diag.value != "") {
    let dataSends = new FormData();
    dataSends.append("diag", diag.value);
    dataSends.append("id", idCita.value);
    axios
      .post("http://localhost/animaLand/api/addDiagnostico.php", dataSends)
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
