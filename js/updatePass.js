/* proceso modificar usuario */
/* boton */
var modificarPass = document.getElementById("modificarPass");
/* obtener valores de inputs en DOM */
var password = document.getElementById("password");
var password1 = document.getElementById("password1");
var password2 = document.getElementById("password2");
var id = document.getElementById("idUser");
/* accion del boton */
modificarPass.addEventListener("click", function(e) {
  /* variable si encontro contraseña */
  var pass = false;
  /* checar si los inputs estan vacios */
  if (
    password.value != "" &&
    id.value != "" &&
    password1.value != "" &&
    password2.value != ""
  ) {
    /* checar si la contraseña acutual es la correcta */
    let dataSends = new FormData();
    dataSends.append("id", id.value);
    dataSends.append("password", password.value);
    axios
      .post("http://localhost/animaLand/api/ifExistPass.php", dataSends)
      .then(r => {
        if (r.data.code == 1 || r.data.code == 2) {
          pass = true;
          var user = r.data.code;
          if (pass) {
            if (password1.value == password2.value) {
              let dataSends = new FormData();
              dataSends.append("TipoUser", user);
              dataSends.append("password", password1.value);
              dataSends.append("id", id.value);
              axios
                .post(
                  "http://localhost/animaLand/api/UpdatePass.php",
                  dataSends
                )
                .then(r => {
                  if (r.data.code == 1) {
                    location.reload();
                  } else {
                    alert(
                      "Alerta! \n" + "Error al intentar encontar el usuario"
                    );
                  }
                })
                .catch(function(err) {
                  console.log("Error " + err);
                  alert(
                    "Alerta! \n" + "Error al intentar conectar al servidor"
                  );
                });
            } else {
              alert("Las contraseñas no coinciden");
            }
          }
        } else {
          alert("Alerta! \n" + "Contraseña actual incorrecta");
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
