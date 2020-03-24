/* variables globales */
var fechasG;
var veterinariosG;
var dateG;
/* traer datos para el usuario */
/* get fecha */
today = new Date();
currentMonth = today.getMonth();
currentYear = today.getFullYear();
selectYear = currentYear;
selectMonth = currentMonth;
/* array of months */
months = [
  "Ene",
  "Feb",
  "Mar",
  "Apr",
  "May",
  "Jun",
  "Jul",
  "Aug",
  "Sep",
  "Oct",
  "Nov",
  "Dec"
];
var monthNew;
if (currentMonth < 10) {
  var montData = currentMonth + 1;
  var monthNew = "0" + montData.toString();
}
document.addEventListener("DOMContentLoaded", function() {
  /* send monthNew */
  var dataSend = new FormData();
  dataSend.append("fecha", monthNew);
  axios
    .post("http://localhost/animaLand/api/GetCitasActuales.php", dataSend)
    .then(r => {
      if (r.data.code == 1) {
        var getFechas = r.data.data;
        fechasG = getFechas;
        /* process */
        monthAndYear = document.getElementById("monthAndYear");
        showCalendar(currentMonth, currentYear);
      } else {
        alert("Alerta! \n" + "Error al intentar encontar el usuario");
      }
    })
    .catch(function(err) {
      console.log("Error " + err);
      alert("Alerta! \n" + "Error al intentar conectar al servidor");
    });
});

function showCalendar(month, year) {
  let firstDay = new Date(year, month).getDay();
  tbl = document.getElementById("calendar-body"); // body of the calendar
  // clearing all previous cells
  tbl.innerHTML = "";
  // filing data about month and in the page via DOM.
  monthAndYear.innerHTML = months[month] + " " + year;
  selectYear.value = year;
  selectMonth.value = month;
  // creating all cells
  let date = 1;
  for (let i = 0; i < 6; i++) {
    // creates a table row
    let row = document.createElement("tr");
    //creating individual cells, filing them up with data.
    for (let j = 0; j < 7; j++) {
      if (i === 0 && j < firstDay) {
        cell = document.createElement("td");
        cellInout = document.createElement("a");
        cellText = document.createTextNode("");
        cell.appendChild(cellInout);
        cellInout.appendChild(cellText);

        row.appendChild(cell);
      } else if (date > daysInMonth(month, year)) {
        break;
      } else {
        cell = document.createElement("td");
        cellInout = document.createElement("a");
        cellInout.setAttribute("value", dateN);
        cellText = document.createTextNode(date);

        /* proceso para validar disponibilidad */
        var dayN = date;
        if (dayN <= 9) {
          dayN = "0" + dayN.toString();
        }
        var monthN = month;
        if (monthN <= 9) {
          monthN += 1;
          monthN = "0" + monthN.toString();
        }
        var dateN =
          year.toString() + "-" + monthN.toString() + "-" + dayN.toString();
        if (month >= today.getMonth()) {
          if (
            date >= today.getDate() &&
            year >= today.getFullYear() &&
            month >= today.getMonth()
          ) {
            /* checar dia */
            var checkDate = new Date(year, month, date);
            var checkDay = checkDate.getDay();
            if (checkDay > 0 && checkDay < 6) {
              cellInout.setAttribute("data-toggle", "modal");
              cellInout.setAttribute("data-target", "#modalUpdate");
              cellInout.setAttribute("class", "btn btn-sm");
              cellInout.setAttribute(
                "onclick",
                "myFunction(" + year + "," + monthN + "," + dayN + ")"
              );
              cell.style.background = "#D1CECE";
            } else {
              /* fin de semana */
              cell.style.background = "white";
            }
          } else {
            /* dias pasados */
            cell.style.background = "white";
          }
        }
        /* availability */
        cell.appendChild(cellInout);
        cellInout.appendChild(cellText);
        row.appendChild(cell);
        date++;
      }
    }
    tbl.appendChild(row); // appending each row into calendar body.
  }
}

// check how many days in a month code from https://dzone.com/articles/determining-number-days-month
function daysInMonth(iMonth, iYear) {
  return 32 - new Date(iYear, iMonth, 32).getDate();
}

function myFunction(year, month, day) {
  if (month <= 9) {
    month = "0" + month.toString();
  }
  dateG = year + "-" + month + "-" + day;
  var fechaString = document.getElementById("fechaString");
  fechaString.innerHTML = "Fecha: " + dateG;
}

function next() {
  var backcurrentYear = currentYear;
  backcurrentYear = currentMonth === 11 ? backcurrentYear + 1 : backcurrentYear;
  currentMonth = (currentMonth + 1) % 12;
  if (backcurrentYear == currentYear) {
    showCalendar(currentMonth, currentYear);
  }
}

function previous() {
  var backcurrentYear = currentYear;
  backcurrentYear = currentMonth === 0 ? backcurrentYear - 1 : backcurrentYear;
  currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
  if (backcurrentYear == currentYear) {
    showCalendar(currentMonth, currentYear);
  }
}

function veterinarioClick() {
  var veterinario = document.getElementById("veterinarios");
  veterinariosG = veterinario.value;
  var horas = [
    "8:00 - 10:00",
    "10:00 - 12:00",
    "12:00 - 14:00",
    "14:00 - 16:00",
    "16:00 - 18:00",
    "18:00 - 20:00"
  ];

  for (var p in fechasG) {
    if (dateG == fechasG[p].Fecha) {
      if (fechasG[p].Veterinario_id == veterinariosG) {
        /* si la fecha mandada esta en uso */
        var pos = horas.indexOf(fechasG[p].Hora); /* buscar horas */
        newHoras = horas.splice(pos, 1); /*  quitar horas disponibles */
        /* veterinarios disponibles */
      }
    }
  }
  cargar_provincias(horas, dateG);
}

/* funciones */
function cargar_provincias(array, date) {
  addOptions("divP", array, date);
}

// Rutina para agregar opciones a un <select>
function addOptions(domElement, array, date) {
  var fecha = document.getElementById("fecha"); /* todo va aca */
  fecha.setAttribute("value", date);
  var divs = document.getElementById(domElement);
  divs.innerHTML = ""; /* formatear contenedor  */
  var select = document.createElement("select"); /* crear select */
  select.setAttribute("class", "form-control"); /* add clase */
  select.setAttribute("id", "hora"); /* add clase */
  divs.appendChild(select);
  for (value in array) {
    var option = document.createElement("option");
    option.text = array[value];
    option.setAttribute("value", array[value]);
    select.add(option);
  }
}

/* insertar cita */
function addCita() {
  var mascota = document.getElementById("mascota");
  var hora = document.getElementById("hora");
  var fecha = document.getElementById("fecha");
  if (
    mascota.value != "" &&
    hora.value != "" &&
    fecha.value != "" &&
    veterinariosG != ""
  ) {
    let dataSends = new FormData();
    dataSends.append("mascota", mascota.value);
    dataSends.append("veterinario", veterinariosG);
    dataSends.append("hora", hora.value);
    dataSends.append("fecha", fecha.value);
    axios
      .post("http://localhost/animaLand/api/NuevaCita.php", dataSends)
      .then(r => {
        if (r.data.code == 1) {
          alert("Cita agendada con éxito");
          window.location = "http://localhost/AnimaLand/index.php?citas";
        } else {
          alert("Error! \n" + "Correo electrónico ya existente");
        }
      })
      .catch(function(err) {
        console.log("Error " + err);
      });
  }
}
