"use strict";
//Funcion para crear nodos
function Crear(x) {
  return document.createElement(x);
}
//Funcion par anexar nodos
function Colocar(x, y) {
  return x.append(y);
}
//Funcion para llamar nodos
function LlamarId(x) {
  return document.getElementById(x);
}
var pagina = 0;
var botonS = LlamarId("Siguiente");
var botonA = LlamarId("anterior");
window.addEventListener("load", function (e) {
  LlamarId("NuevaFila").addEventListener("click", CrearFila);
  LlamarId("Guardar").addEventListener("submit", (e) => {
    e.preventDefault();
  });
  LlamarId("bGuardar").addEventListener("click", (e) => {
    Promediar(e);
  });
  botonS.addEventListener("click", (e) => {
    MostrarS(e);
  });
  botonA.addEventListener("click", (e) => {
    MostrarA(e);
  });
});
//Mostrar la seccion de pregunta
let objCreados = 0;
function MostrarS(e) {
  // Ocultar form cedula
  const formCedula = document.getElementById("formCedula");
  if (pagina === 0 || pagina === 1) {
    formCedula.hidden = false;
  } else {
    formCedula.hidden = true;
  }
  if (
    (pagina * 5 <= document.querySelectorAll("input:checked").length &&
      document.querySelector("select").value != "") ||
    pagina === 0
  ) {
    pagina++;
    console.log(pagina);
    document.getElementById(`Pregunta_${pagina}`).hidden = false;
    //Colocar required en los radios
    if (pagina < 8) {
      for (let i = 1; i < 6; i++) {
        document
          .querySelector(
            `input[type=radio][value="1"][name="${pagina}-${i}"]`
          )
          .setAttribute("required", "");
      }
    }
    if (pagina > 1) {
      document.getElementById(`Pregunta_${pagina - 1}`).hidden = true;
      botonA.hidden = false;
    } else {
      botonA.hidden = true;
    }
    if (pagina >= 8) {
      botonS.hidden = true;
      document.getElementById("Criterios").hidden = true;
    } else {
      botonS.hidden = false;
      document.getElementById("Criterios").hidden = false;
    }
    if (pagina === 8 && objCreados === 0) {
      CrearFila();
      let textA = document.querySelectorAll("textarea");
      for (let i = 0; i < textA.length; i++) {
        textA[i].setAttribute("required", "");
      }
      objCreados = 1;
    }
  }
}
function MostrarA(e) {
  e.preventDefault();
  pagina--;
  if (pagina === 0 || pagina === 1) {
    formCedula.hidden = false;
  } else {
    formCedula.hidden = true;
  }
  document.getElementById(`Pregunta_${pagina}`).hidden = false;
  document.getElementById(`Pregunta_${pagina + 1}`).hidden = true;
  if (pagina >= 2) {
    botonA.hidden = false;
  } else {
    botonA.hidden = true;
  }
  if (pagina < 8) {
    document.getElementById("Criterios").hidden = false;
    botonS.hidden = false;
  }
}
/* Comprobación de datos */
var CantidadCheck = document.querySelectorAll(`#Encuesta`).length;
var ChecksT = false;
/* Promedio */
function Promediar(e) {
  /* Conseguir el numero de la pregunta */
  var Check = "0-0";
  var Preguntas = 0;
  var rCriterios = [];
  var checkA = parseInt(Check.split("-", 1));
  let checkB = parseInt(Check.split("-")[1]);
  /* Arreglo de respuestas */
  var Respuestas = [];
  /* Bucle para recorrer cada pregunta */
  for (let i = 0; i < CantidadCheck; i++) {
    if (i % 25 == 0) {
      checkA += 1;
    }
    if (i % 5 == 0) {
      checkB += 1;
      Check = checkA + "-" + checkB;
      Preguntas += 1;
      /* Conseguir la respuesta a cada pregunta */
      if (document.querySelector(`input[name="${Check}"]:checked`)) {
        /* Añadirla al arreglo de preguntas */
        let ValorC = document.querySelector(
          `input[name="${Check}"]:checked`
        ).value;
        Respuestas.push(ValorC);
      } else {
        console.log("falta contestar");
      }
    }
    if (checkB == 5) {
      checkB = 0;
    }
    /* Definir el numero de pregunta */
    if (Respuestas.length == 5) {
      /* Hacer promedio de las respuestas */
      let Sumatoria = 0;
      Respuestas.forEach((element) => {
        Sumatoria += parseInt(element);
      });
      let Promedio = Sumatoria / Respuestas.length;
      /* Mostrar el promedio */
      document.getElementById(`Promedio${checkA}`).value = Promedio;
      rCriterios.push(Promedio);
      Respuestas = [];
    }
  }
  //Validar que todos los campos esten llenos
  if (document.querySelectorAll("input:checked").length === Preguntas) {
    let textAreas = document.querySelectorAll("textarea");
    let valido = true;
    for (let i = 0; i < textAreas.length; i++) {
      console.log(textAreas[i].value, valido);
      if (textAreas[i].value === "") {
        valido = false;
      }
    }
    if (valido) {
      subir(rCriterios);
    }
  }
  console.log(document.querySelectorAll("textarea")[0].value);
}
//Subir el formulario
function subir(rCriterios) {
  let sCriterios = 0;
  rCriterios.forEach((element) => {
    sCriterios += element;
  });
  let pCriterios = sCriterios / rCriterios.length;
  //Crear tabla para mostrar los resultados
  let tabla = Crear("table");
  let tbody = Crear("tbody");
  let texto = [
    "Calidad del trabajo: ",
    "Comunicación: ",
    "Compromiso: ",
    "Orientación del cliente: ",
    "Iniciativa e innovación: ",
    "Trabajo en equipo y relaciones interpersonales: ",
    "Liderazgo: ",
    "El promedio de los criterios de evaluación es: ",
    "El promedio total de la evaluacion es: ",
  ];
  let pFinal = (pCriterios + pObjetivos) / 2;
  console.log("El promedio final es: ", pFinal.toFixed(1));
  for (let i = 0; i < rCriterios.length + 1; i++) {
    let tr = Crear(`tr`);
    let td_1 = Crear(`td`);
    let td_2 = Crear(`td`);
    if (i < rCriterios.length) {
      console.log(rCriterios)
      let tdT_1 = document.createTextNode(texto[i]);
      let tdT_2 = document.createTextNode(rCriterios[i]);
      let tdT_3 = document.createTextNode(rCriterios[i]);
      Colocar(td_1, tdT_1);
      Colocar(td_2, tdT_2);
    }
    if (i === rCriterios.length) {
      let tdT_1 = document.createTextNode(
        "Promedio de Evaluación de objetivos: "
      );
      let tdT_2 = document.createTextNode(pObjetivos.toFixed(1));
      Colocar(td_1, tdT_1);
      Colocar(td_2, tdT_2);
      let tdFT_2 = document.createTextNode(pObjetivos.toFixed(1));
      Colocar(td_1, tdT_1);
      Colocar(td_2, tdT_2);
      let tdFT = document.createTextNode(
          "El promedio de la evaluacion es: "
        );
    }
    Colocar(tr, td_1);
    Colocar(tr, td_2);
    Colocar(tbody, tr);
  }
  
  Colocar(tabla, tbody);
  let td_FT = Crear('tr')
  swal({
    title: "¿La información es correcta?",
    icon: "warning",
    buttons: ["Cancelar", "Aceptar"],
    content: tabla,
  }).then((Subir) => {
    if (Subir) {
      LlamarId("Guardar").action = "./";
      LlamarId("Guardar").submit();
    }
  });
}
/* Calificacion de la evaluacion de objetivos */
var tObjetivos = [];
var pObjetivos = 0;
function Calificacion(nPregunta) {
  let nCalificacion = 1;
  let sObjetivos = 0;
  var Resultado = document.getElementById(`resultado_${nPregunta}`).value;
  var Meta = document.getElementById(`meta_${nPregunta}`).value;
  let Calificacion = Resultado / Meta;
  var TextoC = document.getElementById(`Calificacion_${nPregunta}`);
  TextoC.setAttribute("class", "col");
  //Asignar una ponderacion a los objetivos
  if (Calificacion >= 1.5) {
    nCalificacion = 5;
    TextoC.style.color = "green";
    TextoC.innerText = "Excelente";
  } else if (Calificacion > 1.1) {
    nCalificacion = 4;
    TextoC.style.color = "rgb(58, 196, 206)";
    TextoC.innerText = "Muy bien";
  } else if (Calificacion >= 1) {
    nCalificacion = 3;
    TextoC.style.color = "grey";
    TextoC.innerText = "Bien";
  } else if (Calificacion >= 0.7) {
    nCalificacion = 2;
    TextoC.style.color = "rgb(182, 182, 0)";
    TextoC.innerText = "En observación";
  } else {
    nCalificacion = 1;
    TextoC.style.color = "red";
    TextoC.innerText = "Insuficiente";
  }
  tObjetivos[nPregunta - 1] = parseInt(nCalificacion);

  for (let i = 0; i < tObjetivos.length; i++) {
    if (tObjetivos[i] !== undefined) {
      sObjetivos += tObjetivos[i];
    }
  }
  pObjetivos = sObjetivos / tObjetivos.length;
}
//Creacion de filas para los objetivos
var campos = 1;
var camposE = 0;
function CrearFila() {
  //Contenedores de las filas
  var Fila = document.getElementById("FilaObjetivos");
  let nFila = document.createElement("div");
  nFila.setAttribute("class", "row pb-3");
  nFila.setAttribute("id", `fila_${campos}`);
  //Input de objetivos
  var divT = document.createElement("div");
  divT.setAttribute("class", "col-5");
  var inputT = document.createElement("input");
  inputT.setAttribute("type", "text");
  inputT.setAttribute("id", `Objetivo_${campos}`);
  inputT.setAttribute("name", `Objetivo_${campos}`);
  inputT.setAttribute("required", "");
  inputT.setAttribute("class", "form-control");
  divT.appendChild(inputT);
  nFila.append(divT);
  Fila.append(nFila);
  //Input de meta
  var divN = document.createElement("div");
  divN.setAttribute("class", "col");
  var inputN = document.createElement("input");
  inputN.setAttribute("type", "number");
  inputN.setAttribute("required", "");
  inputN.setAttribute("id", `meta_${campos}`);
  inputN.setAttribute("name", `meta_${campos}`);
  inputN.setAttribute("class", "form-control");
  divN.appendChild(inputN);
  nFila.append(divN);
  Fila.append(nFila);
  //Input de Resultado
  var divNR = document.createElement("div");
  divNR.setAttribute("class", "col");
  var inputNR = document.createElement("input");
  inputNR.setAttribute("type", "number");
  inputNR.setAttribute("id", `resultado_${campos}`);
  inputNR.setAttribute("name", `resultado_${campos}`);
  inputNR.setAttribute("required", "");
  inputNR.setAttribute("class", "form-control");
  divNR.appendChild(inputNR);
  nFila.append(divNR);
  Fila.append(nFila);
  //Calificacion
  var divC = document.createElement("div");
  divC.setAttribute("class", "col");
  divC.setAttribute("id", `Calificacion_${campos}`);
  divC.setAttribute("name", `Calificacion_${campos}`);
  nFila.append(divC);
  Fila.append(nFila);
  //Boton para eliminar fila
  var button = document.createElement("button");
  let icon = document.createElement("i");
  icon.setAttribute("class", "fa-solid fa-trash");
  icon.setAttribute("id", `icon_${campos}`);
  button.className = "btn btn-danger col-1";
  button.setAttribute("id", `eliminarFila_${campos}`);
  button.appendChild(icon);
  nFila.append(button);
  Fila.append(nFila);
  //Eliminar primer boton de eleminar fila
  const deleteButton = document.getElementById("eliminarFila_1");
  if (deleteButton) {
    deleteButton.classList.add("invisible");
  }
  //Agregar eventos a meta y resultado
  document.getElementById(`meta_${campos}`).addEventListener("keyup", (e) => {
    let nPregunta = e.composedPath()[0].id.split("_", 2)[1];
    Calificacion(parseInt(nPregunta));
  });
  document
    .getElementById(`resultado_${campos}`)
    .addEventListener("keyup", (e) => {
      let nPregunta = e.composedPath()[0].id.split("_", 2)[1];
      Calificacion(parseInt(nPregunta));
    });
  //Borrar una fila de objetivos
  document
    .getElementById(`eliminarFila_${campos}`)
    .addEventListener("click", (e) => {
      e.preventDefault();
      let filaE = parseInt(e.composedPath()[1].id.split("_", 2)[1]);
      swal({
        title: "¿Esta seguro de eliminar la fila?",
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          for (let i = filaE; i <= campos; i++) {
            console.log(
              "i:",
              i,
              "filaE:",
              filaE,
              "campos:",
              campos
            );
            if (document.getElementById(`fila_${i + 1}`) !== null) {
              console.log("Entro");
              document.getElementById(
                `fila_${i + 1}`
              ).id = `fila_${i}`;
              document.getElementById(
                `Objetivo_${i + 1}`
              ).id = `Objetivo_${i}`;
              document.getElementById(
                `meta_${i + 1}`
              ).id = `meta_${i}`;
              document.getElementById(
                `resultado_${i + 1}`
              ).id = `resultado_${i}`;
              document.getElementById(
                `Calificacion_${i + 1}`
              ).id = `Calificacion_${i}`;
              document.getElementById(
                `eliminarFila_${i + 1}`
              ).id = `eliminarFila_${i}`;
            }
          }
          document.getElementById(`fila_${filaE}`).remove();
          campos--;
        }
      });
    });
  campos++;
  //Crear fila automaticamente
  if (campos < 2) {
    CrearFila();
  }
}
//Crear formulario para subir a PHP
function FormularioPHP() {
  let form = Crear("form");
  let input = Crear("input");
  for (let i = 0; i < 8; i++) {
    input.setAttribute("id", `input_${i}`);
  }
}
// Mostrar formulario
formCedula.addEventListener("submit", MostrarS());

// Ejecutar scroll a la primera pregunta
const scrolls = document.querySelectorAll(".scroll");
console.log(document.querySelectorAll('input[type=radio]:checked').length)