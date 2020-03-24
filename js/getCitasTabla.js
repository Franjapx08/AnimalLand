document.addEventListener("DOMContentLoaded", function() {
  /* traer datos para el usuario */
  axios
    .get("http://localhost/animaLand/api/getCitasByUser.php")
    .then(r => {
      if (r.data.code == 1) {
        var newArray = r.data.data.map(e => {
          return e;
        });
        datosFormat(newArray);
      } else {
        alert("Alerta! \n" + "Error al intentar encontar el usuario");
      }
    })
    .catch(function(err) {
      console.log("Error " + err);
      alert("Alerta! \n" + "Error al intentar conectar al servidor");
    });
  /* proceso de rellenar dom html */
  /* funcion para formatear cada resultado obetnido del array */
  datosFormat = datos => {
    for (var i in datos) {
      datosFormatByKey(
        datos[i]
      ); /* enviar a la funcion que se encarga de insert */
    }
  };
  datosFormatByKey = datos => {
    /* variable para identificar donde insertar los datos en html */
    var $tabla = document.getElementById("tabla");
    /* se itera los resultados al dom html */
    var estatus;

    if (datos["Estatus"] == 0) {
      estatus = "Pendiente a confirmar";
    } else if (datos["Estatus"] == 1) {
      estatus = "Confirmada";
    } else if (datos["Estatus"] == 2) {
      estatus = "Concluida";
    } else if (datos["Estatus"] == 3) {
      estatus = "Cancelada";
    }
    $tabla.innerHTML += `<tr>
                <td>${datos["Fecha"]}</td>
                <td>${datos["Hora"]}</td>
                <td>${datos["Nombre"]}</td>
                <td>${estatus}</td>
                <td><a href="Citainfo.php?Cita=${datos["id"]}">Ver más</a></td>
              </tr>`;
  };
});
