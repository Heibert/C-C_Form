<?php
session_start();
if (!isset($_SESSION['usuario'])) {
	header("Location: https://intranet.cyc-bpo.com/index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/619ba43be5.js" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link rel="stylesheet" href="./Formulario/Assets/CSS.css">
	<link rel="shortcut icon" href="./Formulario/Assets/logo favicon.png">
	<title>Formulario</title>
</head>

<body class="bg-primary container p-5">
	<div class="rounded container p-5 bg-white">
		<!-- Encabezado -->
		<div id="nombreEvaluado"></div>
		<div class="text-center">
			<img class="text-center p-3" src="./Formulario/Assets/logotipo_h®.png" alt="Logo corporativo" width="20%">
		</div>
		<div class="text-center p-3">
			<h3>FORMATO EVALUACIÓN DE DESEMPEÑO LABORAL CON PERSONAL A CARGO</h3>
		</div>

		<div class="row">
			<div class="centro h4" id="Criterios"> CRITERIOS DE EVALUACIÓN (50%)</div>
		</div>

		<div class="h5 centro">CALIDAD DEL TRABAJO</div>

		<form action="./" method="POST" id=formCedula>
			<div class="row pb-3 ps-3">
				<div class="col-3">
					<label for="cedula">Cedula de ciudadania:</label>
					<input required type="number" name="cedula" class="form-control" id="cedula">
				</div>
				<div class="col-1 text-center align-self-end">
					<button type="submit" class="btn btn-secondary">Buscar</button>
				</div>
			</div>
		</form>

		<!-- Contenido -->
		<form class="container" method="post" name="Formulario" id="Guardar" hidden>
			<!-- Encuesta -->
			<div id="Pregunta_1" hidden>
				<div class="row pt-3 ps-1">
					<div class="col-4 text-center">
						<div class="form-floating">
							<select name="motivoEval" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
								<option value="" selected>Seleccione una opción por favor</option>
								<option selected value="Semestral">Semestral</option>
								<option value="Ascenso">Ascenso</option>
								<option value="Salario">Aumento de salario</option>
							</select>
							<label for="floatingSelect">Razon de la evaluacion:</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="row p-3 scroll">Supervisa y corrige el trabajo del equipo, anticipándose ante errores o fallas.
					</div>
					<div class="row-1 d-flex">
						<input name="1-1" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1">
						<div class="d-flex">
							<input name="1-1" class="form-check-input" type="radio" id="Encuesta" checked value="2">
							<p class="ps-3 m-0">En observación</p>
						</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-1" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-1" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-1" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div id="creacionPregunta"></div>
				<div class="row">
					<div class="row p-3">Posee amplios conocimientos del mercado, el negocio, su área y lo comparte con
						su
						equipo.</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observación</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Elabora e implementa soluciones prácticas y operables en pro del logro de los
						objetivos.
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observación</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Sus reportes, trabajos y proyectos se destacan por ser impecables.
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observación</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Realiza constantes propuestas de mejoramiento.
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observación</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row" hidden>
					<input readonly name="promedio1" class="centro invisible" id="Promedio1"><!-- Aqui va el promedio --></input>
				</div>
			</div>
			<!-- 2da ronda de preguntas -->
			<div id="Pregunta_2" hidden>
				<div class="h5 centro">COMUNICACION</div>
				<div class="row">
					<div class="row p-3 scroll">Comparte información relevante con sus colaboradores y con otras áreas de la
						organización.</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observación</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Escucha a los demás con empatía ocupándose en entender sus puntos de vista.
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observación</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Ofrece retroalimentación para ayudar a sus colaboradores y pares a actuar de
						forma
						exitosa.</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observación</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Tiene influencia sobre los demás para cambiar sus ideas y acciones, basándose
						en
						aportes
						positivos.</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observación</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Maneja las reglas adecuadas del lenguaje, gramática y sintaxis para transmitir
						sus
						ideas.</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observación</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row" hidden>
					<input readonly name="promedio2" class="centro" id="Promedio2"><!-- Aqui va el promedio --></input>
				</div>
			</div>
			<!-- 3ra ronda de preguntas -->
			<div id="Pregunta_3" hidden>
				<div class="h5 centro">COMPROMISO</div>
				<div class="row">
					<div class="row p-3 scroll">Monitorea el logro de los objetivos e implementa acciones correctivas.</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observación</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Define y se identifica claramente con la visión de la organización y la
						transmite a
						su equipo</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Transmite a pares y supervisados los objetivos, generando compromiso e
						identificación
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Reconoce el esfuerzo de sus colaboradores, a fin de mantener la motivación y el
						compromiso</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Es prudente en el manejo de la información y los asuntos a su cargo.</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row" hidden>
					<input readonly name="promedio3" class="centro" id="Promedio3"><!-- Aqui va el promedio --></input>
				</div>
			</div>
			<!-- 4ta ronda de preguntas -->
			<div id="Pregunta_4" hidden>
				<div class="h5 centro">ORIENTACIÓN AL CLIENTE</div>
				<div class="row">
					<div class="row p-3 scroll">Es paciente y tolerante con sus clientes, aun en situaciones complejas.</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Indaga y se informa sobre necesidades actuales y potenciales de sus clientes.
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Planifica sus acciones y las de su equipo considerando las necesidades de los
						clientes.
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Genera ambientes y procesos de trabajo que cuidan y atienden al cliente.</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Se esfuerza por ofrecer un excelente servicio.</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row" hidden>
					<input readonly name="promedio4" class="centro" id="Promedio4"><!-- Aqui va el promedio --></input>
				</div>
			</div>
			<!-- 5ta ronda de preguntas -->
			<div id="Pregunta_5" hidden>
				<div class="h5 centro">INICIATIVA E INNOVACIÓN</div>
				<div class="row">
					<div class="row p-3 scroll">Es participativo, aporta ideas y estimula a su gente para que actúe de la misma
						forma.
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Da ejemplo con su actitud y toma iniciativas para la mejora y la eficiencia.
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Idea y lleva a cabo soluciones novedosas para resolver problemas.</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Le gusta estar informado y aprender para aplicar estos conocimientos si tiene
						oportunidad.</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Muestra interés para solucionar los errores cometidos por el o por sus
						compañeros.
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row" hidden>
					<input readonly name="promedio5" class="centro" id="Promedio5"><!-- Aqui va el promedio --></input>
				</div>
			</div>
			<!-- 6ta ronda de preguntas -->
			<div id="Pregunta_6" hidden>
				<div class="h5 centro">TRABAJO EN EQUIPO Y RELACIONES INTERPERSONALES</div>
				<div class="row">
					<div class="row p-3">Actúa para generar un ambiente de trabajo amistoso, de buen clima y
						cooperación.
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Valora y promueve el trabajo en equipo.</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Implementa modalidades alternativas de trabajo en equipo, a fin de añadir valor
						a
						los
						resultados.</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Logra la cooperación de las personas involucradas directa o indirectamente con
						su
						área.
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Motiva al equipo a integrar sus ideas y llegar a consensos.</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row" hidden>
					<input readonly name="promedio6" class="centro" id="Promedio6"><!-- Aqui va el promedio --></input>
				</div>
			</div>
			<!-- 7ma ronda de preguntas -->
			<div id="Pregunta_7" hidden>
				<div class="h5 centro">LIDERAZGO</div>
				<div class="row">
					<div class="row p-3">Hace uso de su autoridad de forma justa y equitativa.
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Reconoce a los empleados con potencial, creando oportunidades para ellos.</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Realiza un apropiado seguimiento de las tareas, brindando feedback a sus
						colaboradores.
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Motiva y establece un clima de confianza, generando entusiasmo y compromiso en
						su
						equipo.
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Guía de manera efectiva al equipo de trabajo para cumplir con los objetivos.
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="form-check-input" type="radio" id="Encuesta" required value="1">
						<div class="ps-3">Insuficiente</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="form-check-input" type="radio" id="Encuesta" checked value="2">
						<div class="ps-3">En observacion</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="form-check-input" type="radio" id="Encuesta" value="3">
						<div class="ps-3">Bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="form-check-input" type="radio" id="Encuesta" value="4">
						<div class="ps-3">Muy bueno</div>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="form-check-input" type="radio" id="Encuesta" value="5">
						<div class="ps-3">Excelente</div>
					</div>
				</div>
				<div class="row" hidden>
					<input readonly name="promedio7" class="centro" id="Promedio7"><!-- Aqui va el promedio --></input>
				</div>
			</div>
			<div id="Pregunta_8" hidden>
				<div class="centro h4"> EVALUACIÓN DE OBJETIVOS (50%)</div>
				<div class="row">
					<div class="col-5 text-center">DESCRIPCIÓN DE OBJETIVOS</div>
					<div class="col-1 text-center mx-4">META</div>
					<div class="col-2 text-center ms-3 p-0">RESULTADO</div>
					<div class="col-2 text-center ps-0">CALIFICACIÓN</div>
				</div>
				<div id="FilaObjetivos" class="row">
				</div>
				<div class="d-grid gap-2">
					<button type="button" id="NuevaFila" class="btn btn-secondary"><i class="fa-solid fa-chevron-down iconArrow"></i></button><br>
				</div>

				<div class="p-3">
					<h5 class="text-center">COMPROMISOS DE MEJORAMIENTO</h5>
					<div class="form-floating">
						<textarea name="compromisos" class="form-control" placeholder="Leave a comment here" style="height: 150px" id="floatingTextarea"></textarea>
						<label for="floatingTextarea">Por favor ingrese la informacion</label>
					</div>
				</div>

				<div class="p-3">
					<h5 class="text-center">DESARROLLO DE PERSONAL</h5>
					<div class="form-floating">
						<textarea name="desarrolloP" class="form-control" placeholder="Leave a comment here" style="height: 150px" id="floatingTextarea"></textarea>
						<label for="floatingTextarea">Por favor ingrese la informacion</label>
					</div>
				</div>

				<div class="p-3">
					<h5 class="text-center">OBSERVACIONES DEL EVALUADOR</h5>
					<div class="form-floating">
						<textarea name="obsEvaluador" class="form-control" placeholder="Leave a comment here" style="height: 150px" id="floatingTextarea"></textarea>
						<label for="floatingTextarea">Por favor ingrese la informacion</label>
					</div>
				</div>

				<div class="p-3">
					<h5 class="text-center">OBSERVACIONES DEL EVALUADO</h5>
					<div class="form-floating">
						<textarea name="obsEvaluado" class="form-control" placeholder="Leave a comment here" style="height: 150px" id="floatingTextarea"></textarea>
						<label for="floatingTextarea">Por favor ingrese la informacion</label>
					</div>
				</div>

				<div class="text-end">
					<button type="submit" id="bGuardar" class="btn btn-primary btn-lg">Guardar</button>
				</div>
			</div>

			<div class="row p-3">
				<div class="col">
					<button id="anterior" hidden class="btn btn-secondary btn-lg"><i class="fa-solid fa-arrow-left"></i></button>
				</div>
				<div class="col">
					<div class="text-end">
						<button id="Siguiente" class="btn btn-secondary btn-lg"><i class="fa-solid fa-arrow-right"></i></button>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./Formulario/JS.js"></script>
<?php
$mysqli = new mysqli("172.16.0.6", "root", "*4b0g4d0s4s*", "userscyc");
if ($mysqli->connect_errno) {
	echo $mysqli->connect_error;
}
if (isset($_POST["cedula"]) && $_POST["cedula"] != "") {
	$cedula = $_POST["cedula"];
	$result = $mysqli->query("SELECT id_user,pnom_user,snom_user,pape_user,sape_user FROM users WHERE id_user = $cedula");
	if ($result->num_rows != NULL) {
		$consulta = $result->fetch_row();
		echo
		"<script>
			LlamarId('Guardar').hidden = false 
			const nombreEvaluado = document.getElementById('nombreEvaluado')
			nombreEvaluado.innerText = 'Persona a evaluar: $consulta[1] $consulta[2] $consulta[3] $consulta[4]'
		</script>";
	} else {
		echo
		"<script>
			nombreEvaluado.innerText = 'No se ha encontrado al usuario correspondiente'
			nombreEvaluado.setAttribute('class','alert alert-warning text-center')	
alert alert-warning		</script>";
	}
}
$contador = 0;
foreach ($_POST as $i => $value) {
	if ($value != "2") {
		$contador++;
	}
}
?>

</html>