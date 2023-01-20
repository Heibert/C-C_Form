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
			if (textAreas[i].value === "") {
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
	LlamarId("Guardar").action = "./"
	LlamarId("Guardar").submit()
}

function subir(rCriterios) {
	let sCriterios = 0;
	rCriterios.forEach((element) => {
		sCriterios += element;
	});
	let pCriterios = sCriterios / rCriterios.length;
	LlamarId("promedioC").value = pCriterios.toFixed(1);
	const pFinal = (pCriterios + pObjetivos) / 2;
	LlamarId("pFinal").value = pFinal.toFixed(1);
	/* Alert resultados evaluacion*/
	Swal.fire({
		title: '¿Guardar evaluación?',
		padding: '3em',
		width: 800,
		html: `<div class='text-center'>
  <table class='m-0'>
    <tr>
      <th>Criterios</th>
      <th>Calificación</th>
    </tr>
    <tr>
      <td>Calidad del trabajo</td>
      <td>${rCriterios[0].toFixed(1)}</td>
    </tr>
    <tr>
      <td>Comunicación:</td>
      <td>${rCriterios[1].toFixed(1)}</td>
    </tr>
    <tr>
      <td>Compromiso:</td>
      <td>${rCriterios[2].toFixed(1)}</td>
    </tr>
    <tr>
      <td>Orientación del cliente:</td>
      <td>${rCriterios[3].toFixed(1)}</td>
    </tr>
    <tr>
      <td>Iniciativa e innovación:</td>
      <td>${rCriterios[4].toFixed(1)}</td>
    </tr>
    <tr>
      <td>Trabajo en equipo y relaciones interpersonales:</td>
      <td>${rCriterios[5].toFixed(1)}</td>
    </tr>
    <tr>
      <td>Liderazgo:</td>
      <td>${rCriterios[6].toFixed(1)}</td>
    </tr>
    <tr>
      <td>Promedio de criterios:</td>
      <td>${pCriterios.toFixed(1)}</td>
    </tr>
    <tr>
      <td>Promedio de los objetivos:</td>
      <td>${pObjetivos.toFixed(1)}</td>
    </tr>
    <tr>
      <td>El promedio de la evaluación es:</td>
      <td>${pFinal.toFixed(1)}</td>
    </tr>
  </table>
</div>`
		,
		footer: `<div class='text-center'>Recuerda que solo puedes realizar la evaluación una vez por cada empleado</div>`,
		icon: 'question',
		confirmButtonColor: '#5bcce8',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Confirmar',
		cancelButtonText: 'Cancelar',
		showCancelButton: true,
		showConfirmButton: true,
		showClass: {
			popup: 'animate__animated animate__fadeInDown'
		},
		hideClass: {
			popup: 'animate__animated animate__fadeOutUp'
		},
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
				title: 'Evaluación guardada',
				text: 'La evaluación ha sido guardada con éxito.',
				icon: 'success',
				button: false,
				showConfirmButton: false,

			},
				setTimeout(guardarEvaluacion, 1500),
			);
		}
	})
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
	//Asignar una ponderacion a los objetivos
	if (Calificacion >= 1.5) {
		nCalificacion = 5;
		TextoC.style.color = "green";
		TextoC.value = "Excelente";
	} else if (Calificacion > 1.1) {
		nCalificacion = 4;
		TextoC.style.color = "rgb(58, 196, 206)";
		TextoC.value = "Muy bien";
	} else if (Calificacion >= 1) {
		nCalificacion = 3;
		TextoC.style.color = "grey";
		TextoC.value = "Bien";
	} else if (Calificacion >= 0.7) {
		nCalificacion = 2;
		TextoC.style.color = "rgb(182, 182, 0)";
		TextoC.value = "En observación";
	} else {
		nCalificacion = 1;
		TextoC.style.color = "red";
		TextoC.value = "Insuficiente";
	}
	tObjetivos[nPregunta - 1] = parseInt(nCalificacion);

	for (let i = 0; i < tObjetivos.length; i++) {
		if (tObjetivos[i] !== undefined) {
			sObjetivos += tObjetivos[i];
		}
	}
	pObjetivos = sObjetivos / tObjetivos.length;
	LlamarId("pObjetivos").value = pObjetivos;
}
//Creacion de filas para los objetivos
var campos = 1;
var camposE = 0;

function CrearFila() {
	//Contenedores de las filas
	console.log(campos)
	if (campos > 9) {
		let crearFila = LlamarId('NuevaFila')
		crearFila.classList.add('invisible')
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
	inputT.setAttribute("name", `Objetivo_${campos}`);
	inputT.setAttribute("required", "");
	inputT.setAttribute("class", "form-control");
	inputT.setAttribute("value", "Ventas");
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
	inputN.setAttribute("value", "100");
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
	inputNR.setAttribute("value", "200");
	inputNR.setAttribute("class", "form-control");
	divNR.appendChild(inputNR);
	nFila.append(divNR);
	Fila.append(nFila);
	//input de calificacion
	var divC = document.createElement("div");
	divC.setAttribute("class", "col");
	let inputC = Crear("input");
	inputC.setAttribute('class', 'calificacion');
	inputC.setAttribute("id", `Calificacion_${campos}`);
	inputC.setAttribute("name", `Calificacion_${campos}`);
	inputC.setAttribute("type", 'text');
	inputC.setAttribute("readonly", '');
	Colocar(divC, inputC)
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
				icon: 'warning',
				title: '¿Esta seguro de eliminar la fila?',
				text: 'Se eliminaran todos los datos de está.',
				confirmButtonColor: '#5bcce8',
				confirmButtonText: 'Aceptar',

				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				}
			}).then((willDelete) => {
				if (willDelete) {
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
	Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Cedula no encontrada',
		confirmButtonColor: '#5bcce8',
		confirmButtonText: 'Aceptar',

		showClass: {
			popup: 'animate__animated animate__fadeInDown'
		},
		hideClass: {
			popup: 'animate__animated animate__fadeOutUp'
		}
	})
}

// Capitalizar la primera letra de cada palabra del usuario evaluado

let words = nombreEvaluadoLower.split(" ");
let capitalizedText = words.map(word => word[0].toUpperCase() + word.slice(1)).join(" ");
console.log(capitalizedText);  // Output: "Hello World"
