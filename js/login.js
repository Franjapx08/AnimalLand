/* proceso login */
/* obtener valores de inputs en DOM */
var botonLogin = document.getElementById("login");
var correo = document.getElementById("email");
var password = document.getElementById("password");
/* accion del boton */
botonLogin.addEventListener("click", function(e) {
  /* checar si los inputs estan vacios */
  if (correo.value != "" && password.value != "") {
    /* checar si es correo */
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(correo.value)) {
      let dataSends = new FormData();
      dataSends.append("email", correo.value);
      dataSends.append("password", password.value);
      axios
        .post("http://localhost/animaLand/api/Login.php", dataSends)
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
      alert("Error! \n" + "Campos incorrectos");
    }
  } else {
    alert("Alerta! \n" + "Error campos vacios");
  }
});
