var modeloUpdate1 = document.getElementById("modeloUpdate1");
var modeloUpdate3 = document.getElementById("modeloUpdate3");
var modeloUpdate2 = document.getElementById("modeloUpdate2");
var idCita = document.getElementById("idCita");
/* accion del boton */
modeloUpdate1.addEventListener("click", function(e) {
  /* checar si los inputs estan vacios */
  if (idCita.value != "") {
    let dataSends = new FormData();
    dataSends.append("opcion", 3);
    dataSends.append("id", idCita.value);
    axios
      .post("http://localhost/animaLand/api/OpsCita.php", dataSends)
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

modeloUpdate2.addEventListener("click", function(e) {
  /* checar si los inputs estan vacios */
  if (idCita.value != "") {
    let dataSends = new FormData();
    dataSends.append("opcion", 1);
    dataSends.append("id", idCita.value);
    axios
      .post("http://localhost/animaLand/api/OpsCita.php", dataSends)
      .then(r => {
        if (r.data.code == 1) {
          //location.reload();
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

modeloUpdate3.addEventListener("click", function(e) {
  /* checar si los inputs estan vacios */
  if (idCita.value != "") {
    let dataSends = new FormData();
    dataSends.append("opcion", 1);
    dataSends.append("id", idCita.value);
    axios
      .post("http://localhost/animaLand/api/DeleteCitaFromAdmin.php", dataSends)
      .then(r => {
        if (r.data.code == 1) {
          window.location = "http://localhost/AnimaLand/index.php?citas";
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
