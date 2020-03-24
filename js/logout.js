/* proceso login */
/* obtener valores de inputs en DOM */
var botonLogout = document.getElementById("sessionOff");
/* accion del boton */
botonLogout.addEventListener("click", function(e) {
  let dataSends = new FormData();
  axios
    .post("http://localhost/animaLand/api/LogOut.php", dataSends)
    .then(r => {
      if (r.data.code == 1) {
        location.href = "http://localhost/AnimaLand/index.php?inicio";
      } else {
        alert("Alerta! \n" + "Error al inesperado intente más tarde");
      }
    })
    .catch(function(err) {
      console.log("Error " + err);
      alert("Alerta! \n" + "Error al intentar conectar al servidor");
    });
});
