document.addEventListener("DOMContentLoaded", function() {
  /* traer datos para el usuario */
  comboboxMascotas = document.getElementById("mascota");
  axios
    .get("http://localhost/animaLand/api/getOnlyVeterinarios.php")
    .then(r => {
      if (r.data.code == 1) {
        cargar_provincias(r.data.data);
      } else {
        alert("Alerta! \n" + "Error al intentar encontar el usuario");
      }
    })
    .catch(function(err) {
      console.log("Error " + err);
      alert("Alerta! \n" + "Error al intentar conectar al servidor");
    });

  /* funciones */
  function cargar_provincias(array) {
    //console.log(array);
    array.sort();
    addOptions("veterinarios", array);
  }

  // Rutina para agregar opciones a un <select>
  function addOptions(domElement, array) {
    var select = document.getElementById(domElement);

    for (value in array) {
      var option = document.createElement("option");
      option.text = array[value].Nombre;
      option.setAttribute("value", array[value].id);
      select.add(option);
    }
  }
});
