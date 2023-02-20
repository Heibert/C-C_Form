"use strict";
// Funcion animacion cargando

window.onload = function () {
    setTimeout(function () {
        document.getElementsByClassName("loader")[0].style.display = "none";
        document
            .getElementById("main-container")
            .classList.remove("hidden-content");
        document.getElementById("main-container").style.visibility = "visible";
        document.getElementById("main-container").style.opacity = "1";
    }, 100);
};

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

let progressBar = document.getElementById("progressBar");
let divProgressBar = document.getElementById("divProgressBar");
let progressBarWidth = 0;

//Mostrar la seccion de pregunta
let objCreados = 0;
let selects = document.getElementsByTagName("select");
function MostrarS(e) {
    if (
        (pagina * 5 <= document.querySelectorAll("input:checked").length &&
            selects[0].value != "" &&
            selects[1].value != "") ||
        pagina === 0
    ) {
        pagina++;

        // Ocultar titulo primera pagina
        if (pagina == 2) {
            calidadTrabajo.hidden = true;
        }

        progressBarWidth += 12.5;
        progressBar.setAttribute("style", `width: ${progressBarWidth}%`);
        progressBar.innerHTML = `${progressBarWidth}%`;

        document.getElementById(`Pregunta_${pagina}`).hidden = false;
        //Colocar required en los radios
        if (pagina < 8) {
            for (let i = 1; i < 6; i++) {
                document
                    .querySelector(
                        `input[type=radio][value="20"][name="${pagina}-${i}"]`
                    )
                    .setAttribute("required", "");
                document.querySelector(
                    `input[type=radio][value="20"][name="${pagina}-${i}"]`
                );
                // Checkea todas las secciones para pruebas
                // .setAttribute("checked", "");
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

    // Mostrar titulo primera pagina
    if (pagina == 1) {
        calidadTrabajo.hidden = false;
    }

    progressBarWidth -= 12.5;
    progressBar.setAttribute("style", `width: ${progressBarWidth}%`);
    progressBar.innerHTML = `${progressBarWidth}%`;

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
var CantidadCheck = document.querySelectorAll("input[type='radio']").length;
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
            let promedioT = Promedio.toString();
            document.getElementById(`Promedio${checkA}`).value =
                promedioT + "%";
            rCriterios.push(Promedio.toString() + "%");
            Respuestas = [];
            console.log(rCriterios);
        }
    }
    //Validar que todos los campos esten llenos
    if (document.querySelectorAll("input:checked").length === Preguntas) {
        let textAreas = document.querySelectorAll("textarea");
        let valido = true;
        for (let i = 0; i < textAreas.length; i++) {
            if (textAreas[i].value === "") {
                valido = false;
            }
        }
        let textObjetivos = document.querySelectorAll("input[type=text]");
        for (let i = 0; i < textObjetivos.length; i++) {
            if (textObjetivos[i].value === "") {
                valido = false;
            }
        }
        for (let i = 1; i < campos; i++) {
            console.log(document.getElementById("Calificacion_" + i).value);
            if (
                document.getElementById("Calificacion_" + i).value ===
                    "Infinity%" ||
                document.getElementById("Calificacion_" + i).value === "NaN%"
            ) {
                valido = false;
            }
        }

        if (valido) {
            subir(rCriterios);
        }
    }
}
//Subir el formulario
const guardarEvaluacion = () => {
    LlamarId("Guardar").action = "./";
    LlamarId("Guardar").submit();
};

function subir(rCriterios) {
    let sCriterios = 0;
    rCriterios.forEach((element) => {
        sCriterios += parseInt(element);
        console.log(sCriterios);
    });
    let pCriterios =
        Math.round(sCriterios / rCriterios.length).toString() + "%";
    LlamarId("promedioC").value = pCriterios;
    const pFinal =
        Math.round((parseInt(pCriterios) + parseInt(pObjetivos)) / 2) + "%";
    LlamarId("pFinal").value = pFinal;
    /* Alert resultados evaluacion*/
    Swal.fire({
        title: "¿Guardar evaluación?",
        width: "40em",
        html: `
  <table class='mx-auto'>
    <tr>
      <th>Criterios</th>
      <th>Promedios</th>
    </tr>
    <tr>
      <td class='d-flex'>Calidad del trabajo:</td>
      <td>${rCriterios[0]}</td>
    </tr>
    <tr>
      <td class='d-flex'>Comunicación:</td>
      <td>${rCriterios[1]}</td>
    </tr>
    <tr>
      <td class='d-flex'>Compromiso:</td>
      <td>${rCriterios[2]}</td>
    </tr>
    <tr>
      <td class='d-flex'>Orientación del cliente:</td>
      <td>${rCriterios[3]}</td>
    </tr>
    <tr>
      <td class='d-flex'>Iniciativa e innovación:</td>
      <td>${rCriterios[4]}</td>
    </tr>
    <tr>
      <td class='d-flex'>Trabajo en equipo y relaciones interpersonales:</td>
      <td>${rCriterios[5]}</td>
    </tr>
    <tr>
      <td class='d-flex'>Liderazgo:</td>
      <td>${rCriterios[6]}</td>
    </tr>
    <tr>
      <td class='d-flex'>Promedio total de los criterios:</td>
      <td>${pCriterios}</td>
    </tr>
    <tr>
      <td class='d-flex'>Promedio total de los objetivos:</td>
      <td>${pObjetivos}</td>
    </tr>
    <tr>
      <td class='pt-3 bold'>Promedio final de la evaluación:</td>
      <td class='d-flex pt-3 bold'>${pFinal}</td>
    </tr>
  </table>`,
        footer: `<div class='text-center'>¿Estas seguro que desea guardar esta evaluación? Esta accion no se podra deshacer</div>`,
        icon: "question",
        confirmButtonColor: "#5bcce8",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar",
        showCancelButton: true,
        showConfirmButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                {
                    showClass: {
                        popup: "animate__animated animate__fadeInDown",
                    },
                    hideClass: {
                        popup: "animate__animated animate__fadeOutUp",
                    },
                    title: "Evaluación guardada",
                    text: "La evaluación ha sido guardada con éxito.",
                    icon: "success",
                    button: false,
                    showConfirmButton: false,
                },
                setTimeout(guardarEvaluacion, 1500)
            );
        }
    });
}

/* Calificacion de la evaluacion de objetivos */
var tObjetivos = [];
var pObjetivos = 0;
function Calificacion(nPregunta) {
    let sObjetivos = 0;
    var Resultado = document.getElementById(`resultado_${nPregunta}`).value;
    var Meta = document.getElementById(`meta_${nPregunta}`).value;
    let Calificacion = Math.round((Resultado / Meta) * 100);
    var TextoC = document.getElementById(`Calificacion_${nPregunta}`);
    //Asignar una ponderacion a los objetivos
    if (Calificacion >= 96) {
        TextoC.style.color = "green";
        TextoC.value = Calificacion + "%";
    } else if (Calificacion >= 80) {
        TextoC.style.color = "rgb(58, 196, 206)";
        TextoC.value = Calificacion + "%";
    } else if (Calificacion >= 66) {
        TextoC.style.color = "grey";
        TextoC.value = Calificacion + "%";
    } else if (Calificacion >= 55) {
        TextoC.style.color = "rgb(182, 182, 0)";
        TextoC.value = Calificacion + "%";
    } else {
        TextoC.style.color = "red";
        TextoC.value = Calificacion + "%";
    }
    tObjetivos[nPregunta - 1] = parseFloat(Calificacion);
    for (let i = 0; i < tObjetivos.length; i++) {
        if (tObjetivos[i] !== undefined) {
            sObjetivos += tObjetivos[i];
        }
    }

    let ppObjetivos = sObjetivos / tObjetivos.length;
    pObjetivos = Math.round(ppObjetivos) + "%";
    LlamarId("pObjetivos").value = pObjetivos;
}

//Creacion de filas para los objetivos
var campos = 1;
var camposE = 0;

/* Alert pequeña */
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

function CrearFila() {
    //Contenedores de las filas
    if (campos > 9) {
        let crearFila = LlamarId("NuevaFila");
        crearFila.classList.add("invisible");
    }
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
    inputT.setAttribute("maxlength", "35");
    inputT.setAttribute("name", `Objetivo_${campos}`);
    inputT.setAttribute("required", "");
    inputT.setAttribute("class", "form-control");
    inputT.setAttribute("autocomplete", "off");
    divT.appendChild(inputT);
    nFila.append(divT);
    Fila.append(nFila);
    //Input de meta
    var divN = document.createElement("div");
    divN.setAttribute("class", "col");
    var inputN = document.createElement("input");
    inputN.setAttribute("type", "number");
    inputN.setAttribute("required", "");
    inputN.setAttribute("maxlength", "10");
    inputN.setAttribute("id", `meta_${campos}`);
    inputN.setAttribute("name", `meta_${campos}`);
    inputN.setAttribute("class", "form-control");
    inputN.setAttribute("autocomplete", "off");
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
    inputNR.setAttribute("maxlength", "10");
    inputNR.setAttribute("class", "form-control");
    inputNR.setAttribute("autocomplete", "off");
    divNR.appendChild(inputNR);
    nFila.append(divNR);
    Fila.append(nFila);
    //input de calificacion
    var divC = document.createElement("div");
    divC.setAttribute("class", "col");
    divC.classList.add("d-flex");
    let inputC = Crear("input");
    inputC.setAttribute("class", "calificacion");
    inputC.setAttribute("id", `Calificacion_${campos}`);
    inputC.setAttribute("name", `Calificacion_${campos}`);
    inputC.setAttribute("type", "text");
    inputC.setAttribute("readonly", "");
    inputC.setAttribute("autocomplete", "off");
    inputC.classList.add("text-center");
    Colocar(divC, inputC);
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
            Swal.fire({
                icon: "warning",
                title: "¿Esta seguro de eliminar la fila?",
                text: "Se eliminaran todos los datos de esta fila.",
                confirmButtonColor: "#5bcce8",
                confirmButtonText: "Aceptar",
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    for (let i = filaE; i <= campos; i++) {
                        if (document.getElementById(`fila_${i + 1}`) !== null) {
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

                    Toast.fire({
                        icon: "success",
                        title: "Fila eliminada correctamente",
                    });
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

// Alert cedula no encontrada de persona a evaluar
const cedulaNoEncontrada = () => {
    Toast.fire({
        icon: "error",
        title: "Cedula no encontrada",
    });
};

// Alert cedula no encontrada de persona a evaluar
const cedulaEncontrada = (capitalizedText) => {
    Toast.fire({
        icon: "success",
        title: `Evaluando a: \n ${capitalizedText}`,
    });
};

//Borrar
/* document.getElementById('agUser').onsubmit(() =>{return false}) */
