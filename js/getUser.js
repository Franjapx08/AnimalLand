/* obtener valores de id */
var id = document.getElementById("idUser");
/* accion del boton */
let dataSends = new FormData();
if (id.value != 0 || id.value != null) {
  dataSends.append("id", id.value);
  axios
    .post("http://localhost/animaLand/api/getUser.php", dataSends)
    .then(r => {
      if (r.data.code == 1) {
        console.log(r.data);
      } else {
        alert("Alerta! \n" + "Error al inesperado intente más tarde");
      }
    })
    .catch(function(err) {
      console.log("Error " + err);
      alert("Alerta! \n" + "Error al intentar conectar al servidor");
    });
}
