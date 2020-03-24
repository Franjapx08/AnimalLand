/* proceso modificar usuario */
/* boton */
var aceptar = document.getElementById("aceptar");
/* obtener valores de inputs en DOM */
var nombre = document.getElementById("nombre");
var apellido = document.getElementById("apellido");
var correo = document.getElementById("correo");
var tipo = document.getElementById("tipo");
var pass = document.getElementById("pass1");
var pass2 = document.getElementById("pass2");
/* accion del boton */
aceptar.addEventListener("click", function(e) {
  /* checar si los inputs estan vacios */
  if (
    nombre.value != "" &&
    apellido.value != "" &&
    pass.value != "" &&
    correo.value != "" &&
    tipo.value != "" &&
    pass2.value != ""
  ) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(correo.value)) {
      if (pass.value == pass2.value) {
        let dataSends = new FormData();
        dataSends.append("nombre", nombre.value);
        dataSends.append("apellido", apellido.value);
        dataSends.append("tipo", tipo.value);
        dataSends.append("email", correo.value);
        dataSends.append("password", pass.value);
        axios
          .post(
            "http://localhost/animaLand/api/InsertVeterinario.php",
            dataSends
          )
          .then(r => {
            if (r.data.code == 1) {
              window.location =
                "http://localhost/AnimaLand/index.php?Veterinarios";
            } else {
              alert("Alerta! \n" + "Correo electrónico no disponible");
            }
          })
          .catch(function(err) {
            console.log("Error " + err);
            alert("Alerta! \n" + "Error al intentar conectar al servidor");
          });
      } else {
        alert("Las contraseñas no coinciden");
      }
    } else {
      alert("Correo electrónico no admitido");
    }
  } else {
    alert("Alerta! \n" + "Error campos vacios");
  }
});
