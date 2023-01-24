<?php
session_start();
if (!isset($_SESSION['usuario'])) {
	header("Location: https://intranet.cyc-bpo.com/index.php");
	die();
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link rel="stylesheet" href="./Formulario/Assets/CSS.css">
	<link rel="shortcut icon" href="./Formulario/Assets/logo favicon.png">
	<title>Evaluacion</title>
</head>

<body class="bg-primary container p-5">
	<div class="rounded container p-5 bg-white">
		<!-- Encabezado -->
		<div class="disabled" id="nombreEvaluado"></div>
		<div class="text-center">
			<img class="text-center p-3" src="./Formulario/Assets/logotipo_h®.png" alt="Logo corporativo" width="20%">
		</div>
		<div class="text-center p-3">
			<h3>FORMATO EVALUACIÓN DE DESEMPEÑO LABORAL CON PERSONAL A CARGO</h3>
		</div>

		<div class="row">
			<div class="centro h4" id="Criterios"> CRITERIOS DE EVALUACIÓN (50%)</div>
		</div>

		<div class="h5 centro" id='calidadTrabajo'>CALIDAD DEL TRABAJO</div>

		<form action="./" method="POST" id=formCedula>
			<div class="row p-3 ps-3">
				<div class="col-5">
					<label for="cedula">Cedula de ciudadania de la persona a evaluar:</label>
					<input required autocomplete="off" type="number" name="cedula" class="form-control" id="cedula">
				</div>
				<div class="col-1 text-center align-self-end">
					<button type="submit" class="btn btn-secondary">Buscar</button>
				</div>
			</div>
		</form>

		<!-- Contenido -->
		<form class="container" method="post" name="Formulario" id="Guardar" hidden>
			<!-- Encuesta -->
			<input type="number" name="cedulaV" id="cedulaE" hidden>
			<div id="Pregunta_1" hidden>
				<div class="row pt-3 ps-1">
					<div class="col-4 text-center">
						<div class="form-floating">
							<select name="motivoEval" class="form-select" id="floatingSelect" aria-label="Floating label select example" required>
								<option selected value="">Seleccione una opción por favor</option>
								<option value='Semestral'>Semestral</option>
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
						<input name="1-1" class="pointer form-check-input" type="radio" id="Encuesta_1" value='1'>
						<label for='Encuesta_1' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1">
						<div class="d-flex">
							<input name="1-1" class="pointer form-check-input" type="radio" id="Encuesta_2" value="2">
							<label for='Encuesta_2' class="pointer ps-3">En Observacion</label>
						</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-1" class="pointer form-check-input" type="radio" id="Encuesta_3" value="3">
						<label for='Encuesta_3' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-1" class="pointer form-check-input" type="radio" id="Encuesta_4" value="4">
						<label for='Encuesta_4' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-1" class="pointer form-check-input" type="radio" id="Encuesta_5" value="5">
						<label for='Encuesta_5' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div id="creacionPregunta"></div>
				<div class="row">
					<div class="row p-3">Posee amplios conocimientos del mercado, el negocio, su área y lo comparte con
						su
						equipo.</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="pointer form-check-input" type="radio" id="Encuesta_6" value='1'>
						<label for='Encuesta_6' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="pointer form-check-input" type="radio" id="Encuesta_7" value="2">
						<label for='Encuesta_7' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="pointer form-check-input" type="radio" id="Encuesta_8" value="3">
						<label for='Encuesta_8' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="pointer form-check-input" type="radio" id="Encuesta_9" value="4">
						<label for='Encuesta_9' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="pointer form-check-input" type="radio" id="Encuesta_10" value="5">
						<label for='Encuesta_10' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Elabora e implementa soluciones prácticas y operables en pro del logro de los
						objetivos.
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="pointer form-check-input" type="radio" id="Encuesta_11" value='1'>
						<label for='Encuesta_11' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="pointer form-check-input" type="radio" id="Encuesta_12" value="2">
						<label for='Encuesta_12' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="pointer form-check-input" type="radio" id="Encuesta_13" value="3">
						<label for='Encuesta_13' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="pointer form-check-input" type="radio" id="Encuesta_14" value="4">
						<label for='Encuesta_14' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="pointer form-check-input" type="radio" id="Encuesta_15" value="5">
						<label for='Encuesta_15' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Sus reportes, trabajos y proyectos se destacan por ser impecables.
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="pointer form-check-input" type="radio" id="Encuesta_16" value='1'>
						<label for='Encuesta_16' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="pointer form-check-input" type="radio" id="Encuesta_17" value="2">
						<label for='Encuesta_17' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="pointer form-check-input" type="radio" id="Encuesta_18" value="3">
						<label for='Encuesta_18' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="pointer form-check-input" type="radio" id="Encuesta_19" value="4">
						<label for='Encuesta_19' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="pointer form-check-input" type="radio" id="Encuesta_20" value="5">
						<label for='Encuesta_20' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Realiza constantes propuestas de mejoramiento.
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="pointer form-check-input" type="radio" id="Encuesta_21" value='1'>
						<label for='Encuesta_21' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="pointer form-check-input" type="radio" id="Encuesta_22" value="2">
						<label for='Encuesta_22' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="pointer form-check-input" type="radio" id="Encuesta_23" value="3">
						<label for='Encuesta_23' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="pointer form-check-input" type="radio" id="Encuesta_24" value="4">
						<label for='Encuesta_24' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="pointer form-check-input" type="radio" id="Encuesta_25" value="5">
						<label for='Encuesta_25' class="pointer ps-3">Excelente</label>
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
						<input name="2-1" class="pointer form-check-input" type="radio" id="Encuesta_26" value='1'>
						<label for='Encuesta_26' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="pointer form-check-input" type="radio" id="Encuesta_27" value="2">
						<label for='Encuesta_27' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="pointer form-check-input" type="radio" id="Encuesta_28" value="3">
						<label for='Encuesta_28' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="pointer form-check-input" type="radio" id="Encuesta_29" value="4">
						<label for='Encuesta_29' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="pointer form-check-input" type="radio" id="Encuesta_30" value="5">
						<label for='Encuesta_30' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Escucha a los demás con empatía ocupándose en entender sus puntos de vista.
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="pointer form-check-input" type="radio" id="Encuesta_31" value='1'>
						<label for='Encuesta_31' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="pointer form-check-input" type="radio" id="Encuesta_32" value="2">
						<label for='Encuesta_32' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="pointer form-check-input" type="radio" id="Encuesta_33" value="3">
						<label for='Encuesta_33' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="pointer form-check-input" type="radio" id="Encuesta_34" value="4">
						<label for='Encuesta_34' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="pointer form-check-input" type="radio" id="Encuesta_35" value="5">
						<label for='Encuesta_35' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Ofrece retroalimentación para ayudar a sus colaboradores y pares a actuar de
						forma
						exitosa.</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="pointer form-check-input" type="radio" id="Encuesta_36" value='1'>
						<label for='Encuesta_36' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="pointer form-check-input" type="radio" id="Encuesta_37" value="2">
						<label for='Encuesta_37' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="pointer form-check-input" type="radio" id="Encuesta_38" value="3">
						<label for='Encuesta_38' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="pointer form-check-input" type="radio" id="Encuesta_39" value="4">
						<label for='Encuesta_39' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="pointer form-check-input" type="radio" id="Encuesta_40" value="5">
						<label for='Encuesta_40' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Tiene influencia sobre los demás para cambiar sus ideas y acciones, basándose
						en
						aportes
						positivos.</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="pointer form-check-input" type="radio" id="Encuesta_41" value='1'>
						<label for='Encuesta_41' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="pointer form-check-input" type="radio" id="Encuesta_42" value="2">
						<label for='Encuesta_42' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="pointer form-check-input" type="radio" id="Encuesta_43" value="3">
						<label for='Encuesta_43' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="pointer form-check-input" type="radio" id="Encuesta_44" value="4">
						<label for='Encuesta_44' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="pointer form-check-input" type="radio" id="Encuesta_45" value="5">
						<label for='Encuesta_45' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Maneja las reglas adecuadas del lenguaje, gramática y sintaxis para transmitir
						sus
						ideas.</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="pointer form-check-input" type="radio" id="Encuesta_46" value='1'>
						<label for='Encuesta_46' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="pointer form-check-input" type="radio" id="Encuesta_47" value="2">
						<label for='Encuesta_47' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="pointer form-check-input" type="radio" id="Encuesta_48" value="3">
						<label for='Encuesta_48' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="pointer form-check-input" type="radio" id="Encuesta_49" value="4">
						<label for='Encuesta_49' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="pointer form-check-input" type="radio" id="Encuesta_50" value="5">
						<label for='Encuesta_50' class="pointer ps-3">Excelente</label>
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
						<input name="3-1" class="pointer form-check-input" type="radio" id="Encuesta_51" value='1'>
						<label for='Encuesta_51' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="pointer form-check-input" type="radio" id="Encuesta_52" value="2">
						<label for='Encuesta_52' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="pointer form-check-input" type="radio" id="Encuesta_53" value="3">
						<label for='Encuesta_53' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="pointer form-check-input" type="radio" id="Encuesta_54" value="4">
						<label for='Encuesta_54' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="pointer form-check-input" type="radio" id="Encuesta_55" value="5">
						<label for='Encuesta_55' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Define y se identifica claramente con la visión de la organización y la
						transmite a
						su equipo</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="pointer form-check-input" type="radio" id="Encuesta_56" value='1'>
						<label for='Encuesta_56' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="pointer form-check-input" type="radio" id="Encuesta_57" value="2">
						<label for='Encuesta_57' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="pointer form-check-input" type="radio" id="Encuesta_58" value="3">
						<label for='Encuesta_58' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="pointer form-check-input" type="radio" id="Encuesta_59" value="4">
						<label for='Encuesta_59' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="pointer form-check-input" type="radio" id="Encuesta_60" value="5">
						<label for='Encuesta_60' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Transmite a pares y supervisados los objetivos, generando compromiso e
						identificación
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="pointer form-check-input" type="radio" id="Encuesta_61" value='1'>
						<label for='Encuesta_61' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="pointer form-check-input" type="radio" id="Encuesta_62" value="2">
						<label for='Encuesta_62' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="pointer form-check-input" type="radio" id="Encuesta_63" value="3">
						<label for='Encuesta_63' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="pointer form-check-input" type="radio" id="Encuesta_64" value="4">
						<label for='Encuesta_64' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="pointer form-check-input" type="radio" id="Encuesta_65" value="5">
						<label for='Encuesta_65' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Reconoce el esfuerzo de sus colaboradores, a fin de mantener la motivación y el
						compromiso</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="pointer form-check-input" type="radio" id="Encuesta_66" value='1'>
						<label for='Encuesta_66' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="pointer form-check-input" type="radio" id="Encuesta_67" value="2">
						<label for='Encuesta_67' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="pointer form-check-input" type="radio" id="Encuesta_68" value="3">
						<label for='Encuesta_68' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="pointer form-check-input" type="radio" id="Encuesta_69" value="4">
						<label for='Encuesta_69' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="pointer form-check-input" type="radio" id="Encuesta_70" value="5">
						<label for='Encuesta_70' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Es prudente en el manejo de la información y los asuntos a su cargo.</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="pointer form-check-input" type="radio" id="Encuesta_71" value='1'>
						<label for='Encuesta_71' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="pointer form-check-input" type="radio" id="Encuesta_72" value="2">
						<label for='Encuesta_72' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="pointer form-check-input" type="radio" id="Encuesta_73" value="3">
						<label for='Encuesta_73' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="pointer form-check-input" type="radio" id="Encuesta_74" value="4">
						<label for='Encuesta_74' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="pointer form-check-input" type="radio" id="Encuesta_75" value="5">
						<label for='Encuesta_75' class="pointer ps-3">Excelente</label>
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
						<input name="4-1" class="pointer form-check-input" type="radio" id="Encuesta_76" value='1'>
						<label for='Encuesta_76' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="pointer form-check-input" type="radio" id="Encuesta_77" value="2">
						<label for='Encuesta_77' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="pointer form-check-input" type="radio" id="Encuesta_78" value="3">
						<label for='Encuesta_78' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="pointer form-check-input" type="radio" id="Encuesta_79" value="4">
						<label for='Encuesta_79' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="pointer form-check-input" type="radio" id="Encuesta_80" value="5">
						<label for='Encuesta_80' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Indaga y se informa sobre necesidades actuales y potenciales de sus clientes.
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="pointer form-check-input" type="radio" id="Encuesta_81" value='1'>
						<label for='Encuesta_81' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="pointer form-check-input" type="radio" id="Encuesta_82" value="2">
						<label for='Encuesta_82' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="pointer form-check-input" type="radio" id="Encuesta_83" value="3">
						<label for='Encuesta_83' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="pointer form-check-input" type="radio" id="Encuesta_84" value="4">
						<label for='Encuesta_84' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="pointer form-check-input" type="radio" id="Encuesta_85" value="5">
						<label for='Encuesta_85' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Planifica sus acciones y las de su equipo considerando las necesidades de los
						clientes.
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="pointer form-check-input" type="radio" id="Encuesta_86" value='1'>
						<label for='Encuesta_86' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="pointer form-check-input" type="radio" id="Encuesta_87" value="2">
						<label for='Encuesta_87' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="pointer form-check-input" type="radio" id="Encuesta_88" value="3">
						<label for='Encuesta_88' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="pointer form-check-input" type="radio" id="Encuesta_89" value="4">
						<label for='Encuesta_89' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="pointer form-check-input" type="radio" id="Encuesta_90" value="5">
						<label for='Encuesta_90' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Genera ambientes y procesos de trabajo que cuidan y atienden al cliente.</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="pointer form-check-input" type="radio" id="Encuesta_91" value='1'>
						<label for='Encuesta_91' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="pointer form-check-input" type="radio" id="Encuesta_92" value="2">
						<label for='Encuesta_92' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="pointer form-check-input" type="radio" id="Encuesta_93" value="3">
						<label for='Encuesta_93' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="pointer form-check-input" type="radio" id="Encuesta_94" value="4">
						<label for='Encuesta_94' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="pointer form-check-input" type="radio" id="Encuesta_95" value="5">
						<label for='Encuesta_95' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Se esfuerza por ofrecer un excelente servicio.</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="pointer form-check-input" type="radio" id="Encuesta_96" value='1'>
						<label for='Encuesta_96' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="pointer form-check-input" type="radio" id="Encuesta_97" value="2">
						<label for='Encuesta_97' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="pointer form-check-input" type="radio" id="Encuesta_200" value="3">
						<label for='Encuesta_200' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="pointer form-check-input" type="radio" id="Encuesta_98" value="4">
						<label for='Encuesta_98' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="pointer form-check-input" type="radio" id="Encuesta_99" value="5">
						<label for='Encuesta_99' class="pointer ps-3">Excelente</label>
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
						<input name="5-1" class="pointer form-check-input" type="radio" id="Encuesta_100" value='1'>
						<label for='Encuesta_100' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="pointer form-check-input" type="radio" id="Encuesta_101" value="2">
						<label for='Encuesta_101' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="pointer form-check-input" type="radio" id="Encuesta_102" value="3">
						<label for='Encuesta_102' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="pointer form-check-input" type="radio" id="Encuesta_103" value="4">
						<label for='Encuesta_103' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="pointer form-check-input" type="radio" id="Encuesta_104" value="5">
						<label for='Encuesta_104' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Da ejemplo con su actitud y toma iniciativas para la mejora y la eficiencia.
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="pointer form-check-input" type="radio" id="Encuesta_105" value='1'>
						<label for='Encuesta_105' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="pointer form-check-input" type="radio" id="Encuesta_106" value="2">
						<label for='Encuesta_106' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="pointer form-check-input" type="radio" id="Encuesta_107" value="3">
						<label for='Encuesta_107' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="pointer form-check-input" type="radio" id="Encuesta_108" value="4">
						<label for='Encuesta_108' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="pointer form-check-input" type="radio" id="Encuesta_109" value="5">
						<label for='Encuesta_109' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Idea y lleva a cabo soluciones novedosas para resolver problemas.</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="pointer form-check-input" type="radio" id="Encuesta_110" value='1'>
						<label for='Encuesta_110' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="pointer form-check-input" type="radio" id="Encuesta_111" value="2">
						<label for='Encuesta_111' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="pointer form-check-input" type="radio" id="Encuesta_112" value="3">
						<label for='Encuesta_112' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="pointer form-check-input" type="radio" id="Encuesta_113" value="4">
						<label for='Encuesta_113' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="pointer form-check-input" type="radio" id="Encuesta_114" value="5">
						<label for='Encuesta_114' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Le gusta estar informado y aprender para aplicar estos conocimientos si tiene
						oportunidad.</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="pointer form-check-input" type="radio" id="Encuesta_115" value='1'>
						<label for='Encuesta_115' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="pointer form-check-input" type="radio" id="Encuesta_116" value="2">
						<label for='Encuesta_116' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="pointer form-check-input" type="radio" id="Encuesta_117" value="3">
						<label for='Encuesta_117' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="pointer form-check-input" type="radio" id="Encuesta_118" value="4">
						<label for='Encuesta_118' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="pointer form-check-input" type="radio" id="Encuesta_119" value="5">
						<label for='Encuesta_119' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Muestra interés para solucionar los errores cometidos por el o por sus
						compañeros.
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="pointer form-check-input" type="radio" id="Encuesta_120" value='1'>
						<label for='Encuesta_120' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="pointer form-check-input" type="radio" id="Encuesta_121" value="2">
						<label for='Encuesta_121' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="pointer form-check-input" type="radio" id="Encuesta_122" value="3">
						<label for='Encuesta_122' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="pointer form-check-input" type="radio" id="Encuesta_123" value="4">
						<label for='Encuesta_123' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="pointer form-check-input" type="radio" id="Encuesta_124" value="5">
						<label for='Encuesta_124' class="pointer ps-3">Excelente</label>
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
						<input name="6-1" class="pointer form-check-input" type="radio" id="Encuesta_125" value='1'>
						<label for='Encuesta_125' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="pointer form-check-input" type="radio" id="Encuesta_126" value="2">
						<label for='Encuesta_126' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="pointer form-check-input" type="radio" id="Encuesta_127" value="3">
						<label for='Encuesta_127' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="pointer form-check-input" type="radio" id="Encuesta_128" value="4">
						<label for='Encuesta_128' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="pointer form-check-input" type="radio" id="Encuesta_129" value="5">
						<label for='Encuesta_129' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Valora y promueve el trabajo en equipo.</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="pointer form-check-input" type="radio" id="Encuesta_130" value='1'>
						<label for='Encuesta_130' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="pointer form-check-input" type="radio" id="Encuesta_131" value="2">
						<label for='Encuesta_131' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="pointer form-check-input" type="radio" id="Encuesta_132" value="3">
						<label for='Encuesta_132' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="pointer form-check-input" type="radio" id="Encuesta_133" value="4">
						<label for='Encuesta_133' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="pointer form-check-input" type="radio" id="Encuesta_134" value="5">
						<label for='Encuesta_134' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Implementa modalidades alternativas de trabajo en equipo, a fin de añadir valor
						a
						los
						resultados.</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="pointer form-check-input" type="radio" id="Encuesta_135" value='1'>
						<label for='Encuesta_135' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="pointer form-check-input" type="radio" id="Encuesta_136" value="2">
						<label for='Encuesta_136' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="pointer form-check-input" type="radio" id="Encuesta_137" value="3">
						<label for='Encuesta_137' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="pointer form-check-input" type="radio" id="Encuesta_138" value="4">
						<label for='Encuesta_138' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="pointer form-check-input" type="radio" id="Encuesta_139" value="5">
						<label for='Encuesta_139' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Logra la cooperación de las personas involucradas directa o indirectamente con
						su
						área.
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="pointer form-check-input" type="radio" id="Encuesta_140" value='1'>
						<label for='Encuesta_140' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="pointer form-check-input" type="radio" id="Encuesta_141" value="2">
						<label for='Encuesta_141' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="pointer form-check-input" type="radio" id="Encuesta_142" value="3">
						<label for='Encuesta_142' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="pointer form-check-input" type="radio" id="Encuesta_143" value="4">
						<label for='Encuesta_143' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="pointer form-check-input" type="radio" id="Encuesta_144" value="5">
						<label for='Encuesta_144' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Motiva al equipo a integrar sus ideas y llegar a consensos.</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="pointer form-check-input" type="radio" id="Encuesta_145" value='1'>
						<label for='Encuesta_145' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="pointer form-check-input" type="radio" id="Encuesta_146" value="2">
						<label for='Encuesta_146' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="pointer form-check-input" type="radio" id="Encuesta_147" value="3">
						<label for='Encuesta_147' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="pointer form-check-input" type="radio" id="Encuesta_148" value="4">
						<label for='Encuesta_148' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="pointer form-check-input" type="radio" id="Encuesta_149" value="5">
						<label for='Encuesta_149' class="pointer ps-3">Excelente</label>
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
						<input name="7-1" class="pointer form-check-input" type="radio" id="Encuesta_150" value='1'>
						<label for='Encuesta_150' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="pointer form-check-input" type="radio" id="Encuesta_151" value="2">
						<label for='Encuesta_151' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="pointer form-check-input" type="radio" id="Encuesta_152" value="3">
						<label for='Encuesta_152' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="pointer form-check-input" type="radio" id="Encuesta_153" value="4">
						<label for='Encuesta_153' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="pointer form-check-input" type="radio" id="Encuesta_154" value="5">
						<label for='Encuesta_154' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Reconoce a los empleados con potencial, creando oportunidades para ellos.</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="pointer form-check-input" type="radio" id="Encuesta_155" value='1'>
						<label for='Encuesta_155' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="pointer form-check-input" type="radio" id="Encuesta_156" value="2">
						<label for='Encuesta_156' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="pointer form-check-input" type="radio" id="Encuesta_157" value="3">
						<label for='Encuesta_157' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="pointer form-check-input" type="radio" id="Encuesta_158" value="4">
						<label for='Encuesta_158' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="pointer form-check-input" type="radio" id="Encuesta_159" value="5">
						<label for='Encuesta_159' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Realiza un apropiado seguimiento de las tareas, brindando feedback a sus
						colaboradores.
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="pointer form-check-input" type="radio" id="Encuesta_160" value='1'>
						<label for='Encuesta_160' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="pointer form-check-input" type="radio" id="Encuesta_161" value="2">
						<label for='Encuesta_161' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="pointer form-check-input" type="radio" id="Encuesta_162" value="3">
						<label for='Encuesta_162' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="pointer form-check-input" type="radio" id="Encuesta_163" value="4">
						<label for='Encuesta_163' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="pointer form-check-input" type="radio" id="Encuesta_164" value="5">
						<label for='Encuesta_164' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Motiva y establece un clima de confianza, generando entusiasmo y compromiso en
						su
						equipo.
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="pointer form-check-input" type="radio" id="Encuesta_165" value='1'>
						<label for='Encuesta_165' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="pointer form-check-input" type="radio" id="Encuesta_166" value="2">
						<label for='Encuesta_166' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="pointer form-check-input" type="radio" id="Encuesta_167" value="3">
						<label for='Encuesta_167' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="pointer form-check-input" type="radio" id="Encuesta_168" value="4">
						<label for='Encuesta_168' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="pointer form-check-input" type="radio" id="Encuesta_169" value="5">
						<label for='Encuesta_169' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Guía de manera efectiva al equipo de trabajo para cumplir con los objetivos.
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="pointer form-check-input" type="radio" id="Encuesta_170" value='1'>
						<label for='Encuesta_170' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="pointer form-check-input" type="radio" id="Encuesta_171" value="2">
						<label for='Encuesta_171' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="pointer form-check-input" type="radio" id="Encuesta_172" value="3">
						<label for='Encuesta_172' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="pointer form-check-input" type="radio" id="Encuesta_173" value="4">
						<label for='Encuesta_173' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="pointer form-check-input" type="radio" id="Encuesta_174" value="5">
						<label for='Encuesta_174' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row" hidden>
					<input readonly name="promedio7" class="centro" id="Promedio7"><!-- Aqui va el promedio --></input>
					<input type="number" name="promedioC" id="promedioC" hidden>
					<input type="number" name="pObjetivos" id="pObjetivos" hidden>
					<input type="number" name="pFinal" id="pFinal" hidden>
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
					<button type="button" id="NuevaFila" class="bold btn btn-secondary">Agregar nuevos objetivos <i class="width fa-solid fa-chevron-down iconArrow"></i></button><br>
				</div>

				<div class="p-3">
					<h5 class="text-center">COMPROMISOS DE MEJORAMIENTO</h5>
					<div class="form-floating">
						<textarea autocomplete="off" name="compromisos" class="form-control" placeholder="Leave a comment here" style="height: 150px" maxlength="500" id="floatingTextarea"></textarea>
						<label for="floatingTextarea">Por favor ingrese los compromisos de mejoramiento (Max 500 caracteres)</label>
					</div>
				</div>

				<div class="p-3">
					<h5 class="text-center">DESARROLLO DE PERSONAL</h5>
					<div class="form-floating">
						<textarea autocomplete="off" name="desarrolloP" class="form-control" placeholder="Leave a comment here" style="height: 150px" maxlength="500" id="floatingTextarea"></textarea>
						<label for="floatingTextarea">Por favor ingrese la informacion de desarrollo de personal (Max 500 caracteres)</label>
					</div>
				</div>

				<div class="p-3">
					<h5 class="text-center">OBSERVACIONES DEL EVALUADOR</h5>
					<div class="form-floating">
						<textarea autocomplete="off" maxlength="500" name="obsEvaluador" class="form-control" placeholder="Leave a comment here" style="height: 150px" maxlength="500" id="floatingTextarea"></textarea>
						<label for="floatingTextarea">Por favor ingrese sus observaciones (Max 500 caracteres)</label>
					</div>
				</div>

				<div class="p-3">
					<h5 class="text-center">OBSERVACIONES DEL EVALUADO</h5>
					<div class="form-floating">
						<textarea autocomplete="off" name="obsEvaluado" class="form-control" placeholder="Leave a comment here" style="height: 150px" maxlength="500" id="floatingTextarea"></textarea>
						<label for="floatingTextarea">Por favor ingrese las observaciones del evaluado (Max 500 caracteres)</label>
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

//Conexion con MYSQL
$mysqli  = new mysqli("172.16.0.6", "root", "*4b0g4d0s4s*", "userscyc");
if ($mysqli->connect_errno) {
	echo $mysqli->connect_error;
}
if (isset($_POST["cedulaV"])) {
	$cedulaV = $_POST["cedulaV"];
}
//Evaluar si la hay la cedula existe
if (isset($_POST["cedula"]) && $_POST["cedula"] != "") {

	$cedula = $_POST["cedula"];
	$result = $mysqli->query("SELECT id_user,pnom_user,snom_user,pape_user,sape_user FROM users WHERE id_user = $cedula");
	if ($result->num_rows != NULL && $result->num_rows != 0) {
		$consulta = $result->fetch_row();
		echo
		"<script>
			LlamarId('cedulaE').value = $cedula 
			LlamarId('Guardar').hidden = false 
			const nombreEvaluado = document.getElementById('nombreEvaluado')
			const nombreEvaluadoMostrar = '$consulta[1] $consulta[2] $consulta[3] $consulta[4]'
			const nombreEvaluadoLower = nombreEvaluadoMostrar.toLowerCase()
 			let words = nombreEvaluadoLower
    		.trim()
    		.split(' ')
    		.filter((word) => word);
			let capitalizedText = words
    		.map((word) => word[0].toUpperCase() + word.slice(1))
    		.join(' ');
			nombreEvaluado.textContent = 'Persona a evaluar: '+capitalizedText
			cedulaEncontrada(capitalizedText)
		</script>";
	} else {
		echo "<script>
			cedulaNoEncontrada();
		</script>";
	}
}
//Subir los datos
if (isset($cedulaV)) {
	//Convertir los datos a variables
	$evaluador = $_SESSION["usuario"];
	$motivoEval = $_POST['motivoEval'];
	$promedio1 = $_POST["promedio1"];
	$promedio2 = $_POST["promedio2"];
	$promedio3 = $_POST["promedio3"];
	$promedio4 = $_POST["promedio4"];
	$promedio5 = $_POST["promedio5"];
	$promedio6 = $_POST["promedio6"];
	$promedio7 = $_POST["promedio7"];
	$promedioC = $_POST["promedioC"];
	$pObjetivos = $_POST["pObjetivos"];
	$compromisos = $_POST["compromisos"];
	$desarrolloP = $_POST["desarrolloP"];
	$obsEvaluador = $_POST["obsEvaluador"];
	$obsEvaluado = $_POST["obsEvaluado"];
	$pFinal = $_POST["pFinal"];
	for ($i = 1; $i <= 10; $i++) {
		if (isset($_POST["Objetivo_$i"])) {
			$objetivo[$i] = $_POST["Objetivo_$i"];
			$meta[$i] = $_POST["meta_$i"];
			$rObjetivo[$i] = $_POST["resultado_$i"];
			$ponderacionObjetivo[$i] = $_POST["Calificacion_$i"];
		} else {
			$objetivo[$i] = 'NULL';
			$meta[$i] = 'NULL';
			$rObjetivo[$i] = 'NULL';
			$ponderacionObjetivo[$i] = 'NULL';
		}
	}
	$enviado = false;
	echo $enviado;
	if (!$enviado) {
		if ($mysqli->query("INSERT INTO eDesempenoCPA(id,id_evaluador,id_evaluado,fecha,motivoE,promedio_1,promedio_2,promedio_3,promedio_4,promedio_5,promedio_6,promedio_7,promedioCriterios,objetivo_1,meta_1,rObjetivo_1,ponderacionObjetivo_1,objetivo_2,meta_2,rObjetivo_2,ponderacionObjetivo_2,objetivo_3,meta_3,rObjetivo_3,ponderacionObjetivo_3,objetivo_4,meta_4,rObjetivo_4,ponderacionObjetivo_4,objetivo_5,meta_5,rObjetivo_5,ponderacionObjetivo_5,objetivo_6,meta_6,rObjetivo_6,ponderacionObjetivo_6,objetivo_7,meta_7,rObjetivo_7,ponderacionObjetivo_7,objetivo_8,meta_8,rObjetivo_8,ponderacionObjetivo_8,objetivo_9,meta_9,rObjetivo_9,ponderacionObjetivo_9,objetivo_10,meta_10,rObjetivo_10,ponderacionObjetivo_10,compromisos,desarrolloP,obsEvaluador,obsEvaluado,promedioObjetivos,pFinal) VALUES (NULL,'$evaluador','$cedulaV',NULL,'$motivoEval','$promedio1','$promedio2','$promedio3','$promedio4','$promedio5','$promedio6','$promedio7','$promedioC','$objetivo[1]','$meta[1]','$rObjetivo[1]','$ponderacionObjetivo[1]','$objetivo[2]','$meta[2]','$rObjetivo[2]','$ponderacionObjetivo[2]','$objetivo[3]','$meta[3]','$rObjetivo[3]','$ponderacionObjetivo[3]','$objetivo[4]','$meta[4]','$rObjetivo[4]','$ponderacionObjetivo[4]','$objetivo[5]','$meta[5]','$rObjetivo[5]','$ponderacionObjetivo[5]','$objetivo[6]','$meta[6]','$rObjetivo[6]','$ponderacionObjetivo[6]','$objetivo[7]','$meta[7]','$rObjetivo[7]','$ponderacionObjetivo[7]','$objetivo[8]','$meta[8]','$rObjetivo[8]','$ponderacionObjetivo[8]','$objetivo[9]','$meta[9]','$rObjetivo[9]','$ponderacionObjetivo[9]','$objetivo[10]','$meta[10]','$rObjetivo[10]','$ponderacionObjetivo[10]','$compromisos','$desarrolloP','$obsEvaluador','$obsEvaluado','$pObjetivos','$pFinal')")) {
			echo "<script>window.location.replace('./')</script>";
		}
		echo "Si";
	} else {
		echo "NO";
		echo $mysqli->error;
	}
}
// Cerrar conexion
$mysqli->close();
?>

</html>