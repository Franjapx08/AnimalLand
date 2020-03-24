/* proceso login */
/* obtener valores de inputs en DOM */
var aceptar = document.getElementById("aceptar");
var nombre = document.getElementById("nombre");
var color = document.getElementById("color");
var tipo = document.getElementById("tipo");
var caracteristicas = document.getElementById("caracteristicas");
/* accion del boton */
aceptar.addEventListener("click", function(e) {
  /* checar campos vacios */
  if (
    (nombre.value != "",
    color.value != "",
    tipo.value != "",
    caracteristicas.value != "")
  ) {
    let dataSends = new FormData();
    dataSends.append("nombre", nombre.value);
    dataSends.append("color", color.value);
    dataSends.append("tipo", tipo.value);
    dataSends.append("caracteristicas", caracteristicas.value);
    console.log(dataSends);

    axios
      .post("http://localhost/animaLand/api/InsertMascota.php", dataSends)
      .then(r => {
        console.log(r.data.code);

        if (r.data.code == 1) {
          alert("Mascota creada con éxito");
          window.location = "http://localhost/AnimaLand/index.php?misMascotas";
        } else {
          alert("Error! \n" + "Correo electrónico ya existente");
        }
      })
      .catch(function(err) {
        console.log("Error " + err);
      });
  } else {
    /* contraseñas diferentes*/
    alert("Error! \n" + "Campos vacios");
  }
});
