/* proceso login */
/* obtener valores de inputs en DOM */
var botonRegistro = document.getElementById("registry");
var nombre = document.getElementById("name");
var apellido = document.getElementById("surname");
var direccion = document.getElementById("address");
var correo = document.getElementById("email");
var password1 = document.getElementById("psword1");
var password2 = document.getElementById("paswr2");

/* accion del boton */
botonRegistro.addEventListener("click", function(e) {
  /* comparan contraseñas */
  if (
    (nombre.value != "",
    apellido.value != "",
    direccion.value != "",
    correo.value != "",
    password1.value != "",
    password2.value != "")
  ) {
    /* si es correo */
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(correo.value)) {
      if (password1.value == password2.value) {
        let dataSends = new FormData();
        dataSends.append("nombre", nombre.value);
        dataSends.append("apellido", apellido.value);
        dataSends.append("direccion", direccion.value);
        dataSends.append("email", correo.value);
        dataSends.append("password", password1.value);
        axios
          .post("http://localhost/animaLand/api/Registro.php", dataSends)
          .then(r => {
            if (r.data.code == 1) {
              alert("Cuenta creada con éxito");
              window.location = "http://localhost/AnimaLand/index.php";
            } else {
              alert("Error! \n" + "Correo electrónico ya existente");
            }
          })
          .catch(function(err) {
            console.log("Error " + err);
          });
      } else {
        alert("Error! \n" + "Las contraseñas no coinciden");
      }
    } else {
      /* no es correo */
      alert("Error! \n" + "No es un correo electrónico valido");
    }
  } else {
    /* contraseñas diferentes*/
    alert("Error! \n" + "Campos vacios");
  }
});
