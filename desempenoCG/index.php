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
	<div class="loader loader-ball-grid-pulse"></div>
	<div class="rounded container p-5 bg-white hidden-content" id='main-container'>
		<!-- Encabezado -->
		<div class="d-flex justify-content-between">
			<div class="disabled opacity" id="nombreEvaluado"></div>
			<button id="cancelarEvaluacion" class="btn btn-danger btn-sm" hidden>Cancelar evaluacion</button>
		</div>

		<!-- New markup -->
		<div class="p-5" id="divProgressBar" hidden>
			<div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
				<div id="progressBar" class="bold progress-bar bg-info" style="width: 12.5%"></div>
			</div>
		</div>

		<div class="text-center">
			<img class="text-center p-3" src="./Formulario/Assets/logotipo_h®.png" alt="Logo corporativo" width="20%">
		</div>
		<div class="text-center p-3">
			<h3>EVALUACIÓN DE DESEMPEÑO LABORAL CARGOS GERENCIALES</h3>
		</div>

		<div class="text-center" id='criteriosTitulo' hidden>
			<h3 class="bolder" id="Criterios"> CRITERIOS DE EVALUACIÓN (50%)</h3>
		</div>

		<div class="text-center" id='calidadTrabajo' hidden>
			<div class="h5">PENSAMIENTO Y PLANIFICACIÓN ESTRATEGICA</div>
		</div>

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
				<div class="d-flex p-2 justify-content-start">
					<div class="form-floating pe-3">
						<select name="campaña" class="form-select" id="floatingSelectCampaña" aria-label="Floating label select example" required>
							<option selected value="">Seleccione una opción por favor</option>
							<option value='MetLife'>MetLife</option>
							<option value='BBVA Digital'>BBVA Digital</option>
							<option value='Pay-U'> Pay-U</option>
							<option value='Gerencia de Planeación'>Gerencia de Planeación</option>
							<option value='Liberty'>Liberty</option>
							<option value='Congente'>Congente</option>
							<option value='Gerencia Administrativa'>Gerencia Administrativa</option>
							<option value='Yanbal'>Yanbal</option>
							<option value='Falabella'>Falabella</option>
							<option value='Falabella Peru'>Falabella Peru</option>
							<option value='Credibanco'>Credibanco</option>
							<option value='Nueva EPS'>Nueva EPS</option>
							<option value='Claro'>Claro</option>
							<option value='Avantel'>Avantel</option>
							<option value='Coomeva'>Coomeva</option>
							<option value='Azteca'>Azteca</option>
							<option value='Gerencia de Legal y Riesgo'>Gerencia de Legal y Riesgo</option>
							<option value='Scotiabank Colpatria'>Scotiabank Colpatria</option>
							<option value='Banco Agrario'>Banco Agrario</option>
							<option value='Tecnología'>Tecnología</option>
							<option value='Dirección de Recursos Físicos'>Dirección de Recursos Físicos</option>
							<option value='Gerencia Gestión Humana'>Gerencia Gestión Humana</option>
						</select>
						<label for="floatingSelectCampaña">Area/campaña del evaluado:</label>
					</div>

					<div class="form-floating">
						<select name="cargo" class="form-select" id="floatingSelectCargo" aria-label="Floating label select example" required>
							<option selected value="">Seleccione una opción por favor</option>
							<option value='Analista de Aplicaciones de Contact Center'>Analista de Aplicaciones de Contact Center</option>
							<option value='Analista de BD y Aplicaciones'>Analista de BD y Aplicaciones</option>
							<option value='Analista de Investigación'>Analista de Investigación</option>
							<option value='Analista de Saneamiento'>Analista de Saneamiento</option>
							<option value='Analista de Soporte'>Analista de Soporte</option>
							<option value='Analista Gestión Humana'>Analista Gestión Humana</option>
							<option value='Analista Jurídico'>Analista Jurídico</option>
							<option value='Asesor(a) Comercial'>Asesor(a) Comercial</option>
							<option value='Asesor(a) de Negociación'>Asesor(a) de Negociación</option>
							<option value='Asesor(a) de Negociación jr'>Asesor(a) de Negociación jr</option>
							<option value='Asesor(a) Senior'>Asesor(a) Senior</option>
							<option value='Auxiliar Administrativo'>Auxiliar Administrativo</option>
							<option value='Auxiliar de Licitación'>Auxiliar de Licitación</option>
							<option value='Auxiliar de Recursos Físicos'>Auxiliar de Recursos Físicos</option>
							<option value='Auxiliar Operativo'>Auxiliar Operativo</option>
							<option value='Back Office'>Back Office</option>
							<option value='Coordinador Contable'>Coordinador Contable</option>
							<option value='Coordinador de Capacitación'>Coordinador de Capacitación</option>
							<option value='Coordinador(a) BI'>Coordinador(a) BI</option>
							<option value='Coordinador(a) de BackOffice'>Coordinador(a) de BackOffice</option>
							<option value='Coordinador(a) de Investigaciones'>Coordinador(a) de Investigaciones</option>
							<option value='Coordinador(a) de Planeación y Calidad'>Coordinador(a) de Planeación y Calidad</option>
							<option value='Coordinador(a) de Proyecto'>Coordinador(a) de Proyecto</option>
							<option value='Data Marshall'>Data Marshall</option>
							<option value='Director(a) Analitycs'>Director(a) Analitycs</option>
							<option value='Director(a) de Investigaciones'>Director(a) de Investigaciones</option>
							<option value='Director(a) de Proyecto'>Director(a) de Proyecto</option>
							<option value='Director(a) de Recursos Físicos'>Director(a) de Recursos Físicos</option>
							<option value='Director(a) de SST'>Director(a) de SST</option>
							<option value='Director(a) Jurídico'>Director(a) Jurídico</option>
							<option value='Formador'>Formador</option>
							<option value='Gerente Administrativa'>Gerente Administrativa</option>
							<option value='Gerente de Control Interno'>Gerente de Control Interno</option>
							<option value='Gerente de cuentas'>Gerente de cuentas</option>
							<option value='Gerente de Gestión Humana'>Gerente de Gestión Humana</option>
							<option value='Gerente de Legal y de Riesgo'>Gerente de Legal y de Riesgo</option>
							<option value='Gerente de Mercadeo'>Gerente de Mercadeo</option>
							<option value='Gerente de Operaciones'>Gerente de Operaciones</option>
							<option value='Gerente de Planeación'>Gerente de Planeación</option>
							<option value='Gerente de Tecnología'>Gerente de Tecnología</option>
							<option value='Gerente General'>Gerente General</option>
							<option value='Gerente Jr Infraestructura y Redes'>Gerente Jr Infraestructura y Redes</option>
							<option value='Gerente jr. de Aplicaciones de Contact Center'>Gerente jr. de Aplicaciones de Contact Center</option>
							<option value='Gerente jr. de Mesa de Servicio'>Gerente jr. de Mesa de Servicio</option>
							<option value='Operador Logístico'>Operador Logístico</option>
							<option value='Presidente'>Presidente</option>
							<option value='Sena Lectiva'>Sena Lectiva</option>
							<option value='Sena Productiva'>Sena Productiva</option>
							<option value='Servicios Generales'>Servicios Generales</option>
							<option value='Supernumerario'>Supernumerario</option>
							<option value='Supervisor(a) de Calidad'>Supervisor(a) de Calidad</option>
							<option value='en blanco'>en blanco</option>
						</select>
						<label for="floatingSelectCargo">Cargo del evaluado:</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3 scroll">Identifica metas estratégicas y anticipa demandas, oportunidades y limitaciones futuras.
					</div>
					<div class="row-1 d-flex">
						<input name="1-1" class="pointer form-check-input" type="radio" id="Encuesta_1" value='20'>
						<label for='Encuesta_1' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1">
						<div class="d-flex">
							<input name="1-1" class="pointer form-check-input" type="radio" id="Encuesta_2" value="40">
							<label for='Encuesta_2' class="pointer ps-3">En Observacion</label>
						</div>
					</div>
					<div class="row-1 d-flex">
						<input name="1-1" class="pointer form-check-input" type="radio" id="Encuesta_3" value="60">
						<label for='Encuesta_3' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-1" class="pointer form-check-input" type="radio" id="Encuesta_4" value="80">
						<label for='Encuesta_4' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-1" class="pointer form-check-input" type="radio" id="Encuesta_5" value="100">
						<label for='Encuesta_5' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div id="creacionPregunta"></div>
				<div class="row">
					<div class="row p-3">Demuestra conocimiento y sensibilidad hacia las necesidades de los actores clave, dentro y fuera de la compañia
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="pointer form-check-input" type="radio" id="Encuesta_6" value='20'>
						<label for='Encuesta_6' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="pointer form-check-input" type="radio" id="Encuesta_7" value="40">
						<label for='Encuesta_7' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="pointer form-check-input" type="radio" id="Encuesta_8" value="60">
						<label for='Encuesta_8' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="pointer form-check-input" type="radio" id="Encuesta_9" value="80">
						<label for='Encuesta_9' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-2" class="pointer form-check-input" type="radio" id="Encuesta_10" value="100">
						<label for='Encuesta_10' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Traduce las metas estratégicas en planes prácticos y alcanzables
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="pointer form-check-input" type="radio" id="Encuesta_11" value='20'>
						<label for='Encuesta_11' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="pointer form-check-input" type="radio" id="Encuesta_12" value="40">
						<label for='Encuesta_12' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="pointer form-check-input" type="radio" id="Encuesta_13" value="60">
						<label for='Encuesta_13' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="pointer form-check-input" type="radio" id="Encuesta_14" value="80">
						<label for='Encuesta_14' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-3" class="pointer form-check-input" type="radio" id="Encuesta_15" value="100">
						<label for='Encuesta_15' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Toma decisiones de manera oportuna, incluso
						en circunstancias inciertas.
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="pointer form-check-input" type="radio" id="Encuesta_16" value='20'>
						<label for='Encuesta_16' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="pointer form-check-input" type="radio" id="Encuesta_17" value="40">
						<label for='Encuesta_17' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="pointer form-check-input" type="radio" id="Encuesta_18" value="60">
						<label for='Encuesta_18' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="pointer form-check-input" type="radio" id="Encuesta_19" value="80">
						<label for='Encuesta_19' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-4" class="pointer form-check-input" type="radio" id="Encuesta_20" value="100">
						<label for='Encuesta_20' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Realiza constantes propuestas de mejoramiento.
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="pointer form-check-input" type="radio" id="Encuesta_21" value='20'>
						<label for='Encuesta_21' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="pointer form-check-input" type="radio" id="Encuesta_22" value="40">
						<label for='Encuesta_22' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="pointer form-check-input" type="radio" id="Encuesta_23" value="60">
						<label for='Encuesta_23' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="pointer form-check-input" type="radio" id="Encuesta_24" value="80">
						<label for='Encuesta_24' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="1-5" class="pointer form-check-input" type="radio" id="Encuesta_25" value="100">
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
						<input name="2-1" class="pointer form-check-input" type="radio" id="Encuesta_26" value='20'>
						<label for='Encuesta_26' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="pointer form-check-input" type="radio" id="Encuesta_27" value="40">
						<label for='Encuesta_27' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="pointer form-check-input" type="radio" id="Encuesta_28" value="60">
						<label for='Encuesta_28' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="pointer form-check-input" type="radio" id="Encuesta_29" value="80">
						<label for='Encuesta_29' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-1" class="pointer form-check-input" type="radio" id="Encuesta_30" value="100">
						<label for='Encuesta_30' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Escucha a los demás con empatía ocupándose en entender sus puntos de vista.
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="pointer form-check-input" type="radio" id="Encuesta_31" value='20'>
						<label for='Encuesta_31' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="pointer form-check-input" type="radio" id="Encuesta_32" value="40">
						<label for='Encuesta_32' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="pointer form-check-input" type="radio" id="Encuesta_33" value="60">
						<label for='Encuesta_33' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="pointer form-check-input" type="radio" id="Encuesta_34" value="80">
						<label for='Encuesta_34' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-2" class="pointer form-check-input" type="radio" id="Encuesta_35" value="100">
						<label for='Encuesta_35' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Negocia efectivamente y es capaz de manejar situaciones difíciles</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="pointer form-check-input" type="radio" id="Encuesta_36" value='20'>
						<label for='Encuesta_36' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="pointer form-check-input" type="radio" id="Encuesta_37" value="40">
						<label for='Encuesta_37' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="pointer form-check-input" type="radio" id="Encuesta_38" value="60">
						<label for='Encuesta_38' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="pointer form-check-input" type="radio" id="Encuesta_39" value="80">
						<label for='Encuesta_39' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-3" class="pointer form-check-input" type="radio" id="Encuesta_40" value="100">
						<label for='Encuesta_40' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Se comunica efectivamente con el Presidente y otros miembros del Comité.</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="pointer form-check-input" type="radio" id="Encuesta_41" value='20'>
						<label for='Encuesta_41' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="pointer form-check-input" type="radio" id="Encuesta_42" value="40">
						<label for='Encuesta_42' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="pointer form-check-input" type="radio" id="Encuesta_43" value="60">
						<label for='Encuesta_43' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="pointer form-check-input" type="radio" id="Encuesta_44" value="80">
						<label for='Encuesta_44' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-4" class="pointer form-check-input" type="radio" id="Encuesta_45" value="100">
						<label for='Encuesta_45' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Maneja las reglas adecuadas del lenguaje, gramática y sintaxis para transmitir sus ideas.</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="pointer form-check-input" type="radio" id="Encuesta_46" value='20'>
						<label for='Encuesta_46' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="pointer form-check-input" type="radio" id="Encuesta_47" value="40">
						<label for='Encuesta_47' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="pointer form-check-input" type="radio" id="Encuesta_48" value="60">
						<label for='Encuesta_48' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="pointer form-check-input" type="radio" id="Encuesta_49" value="80">
						<label for='Encuesta_49' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="2-5" class="pointer form-check-input" type="radio" id="Encuesta_50" value="100">
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
						<input name="3-1" class="pointer form-check-input" type="radio" id="Encuesta_51" value='20'>
						<label for='Encuesta_51' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="pointer form-check-input" type="radio" id="Encuesta_52" value="40">
						<label for='Encuesta_52' class="pointer ps-3">En observación</lab>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="pointer form-check-input" type="radio" id="Encuesta_53" value="60">
						<label for='Encuesta_53' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="pointer form-check-input" type="radio" id="Encuesta_54" value="80">
						<label for='Encuesta_54' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-1" class="pointer form-check-input" type="radio" id="Encuesta_55" value="100">
						<label for='Encuesta_55' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Emplea estrategias adoptadas con energía y compromiso</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="pointer form-check-input" type="radio" id="Encuesta_56" value='20'>
						<label for='Encuesta_56' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="pointer form-check-input" type="radio" id="Encuesta_57" value="40">
						<label for='Encuesta_57' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="pointer form-check-input" type="radio" id="Encuesta_58" value="60">
						<label for='Encuesta_58' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="pointer form-check-input" type="radio" id="Encuesta_59" value="80">
						<label for='Encuesta_59' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-2" class="pointer form-check-input" type="radio" id="Encuesta_60" value="100">
						<label for='Encuesta_60' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Se adapta rápidamente y es flexible a nuevas demandas y cambios
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="pointer form-check-input" type="radio" id="Encuesta_61" value='20'>
						<label for='Encuesta_61' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="pointer form-check-input" type="radio" id="Encuesta_62" value="40">
						<label for='Encuesta_62' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="pointer form-check-input" type="radio" id="Encuesta_63" value="60">
						<label for='Encuesta_63' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="pointer form-check-input" type="radio" id="Encuesta_64" value="80">
						<label for='Encuesta_64' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-3" class="pointer form-check-input" type="radio" id="Encuesta_65" value="100">
						<label for='Encuesta_65' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Está consciente de las fortalezas y debilidades y su impacto en otros</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="pointer form-check-input" type="radio" id="Encuesta_66" value='20'>
						<label for='Encuesta_66' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="pointer form-check-input" type="radio" id="Encuesta_67" value="40">
						<label for='Encuesta_67' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="pointer form-check-input" type="radio" id="Encuesta_68" value="60">
						<label for='Encuesta_68' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="pointer form-check-input" type="radio" id="Encuesta_69" value="80">
						<label for='Encuesta_69' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-4" class="pointer form-check-input" type="radio" id="Encuesta_70" value="100">
						<label for='Encuesta_70' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Es prudente en el manejo de la información y los asuntos a su cargo.</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="pointer form-check-input" type="radio" id="Encuesta_71" value='20'>
						<label for='Encuesta_71' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="pointer form-check-input" type="radio" id="Encuesta_72" value="40">
						<label for='Encuesta_72' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="pointer form-check-input" type="radio" id="Encuesta_73" value="60">
						<label for='Encuesta_73' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="pointer form-check-input" type="radio" id="Encuesta_74" value="80">
						<label for='Encuesta_74' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="3-5" class="pointer form-check-input" type="radio" id="Encuesta_75" value="100">
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
						<input name="4-1" class="pointer form-check-input" type="radio" id="Encuesta_76" value='20'>
						<label for='Encuesta_76' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="pointer form-check-input" type="radio" id="Encuesta_77" value="40">
						<label for='Encuesta_77' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="pointer form-check-input" type="radio" id="Encuesta_78" value="60">
						<label for='Encuesta_78' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="pointer form-check-input" type="radio" id="Encuesta_79" value="80">
						<label for='Encuesta_79' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-1" class="pointer form-check-input" type="radio" id="Encuesta_80" value="100">
						<label for='Encuesta_80' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Indaga y se informa sobre necesidades actuales y potenciales de sus clientes.
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="pointer form-check-input" type="radio" id="Encuesta_81" value='20'>
						<label for='Encuesta_81' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="pointer form-check-input" type="radio" id="Encuesta_82" value="40">
						<label for='Encuesta_82' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="pointer form-check-input" type="radio" id="Encuesta_83" value="60">
						<label for='Encuesta_83' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="pointer form-check-input" type="radio" id="Encuesta_84" value="80">
						<label for='Encuesta_84' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-2" class="pointer form-check-input" type="radio" id="Encuesta_85" value="100">
						<label for='Encuesta_85' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Planifica sus acciones y las de su equipo considerando las necesidades de los clientes.
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="pointer form-check-input" type="radio" id="Encuesta_86" value='20'>
						<label for='Encuesta_86' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="pointer form-check-input" type="radio" id="Encuesta_87" value="40">
						<label for='Encuesta_87' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="pointer form-check-input" type="radio" id="Encuesta_88" value="60">
						<label for='Encuesta_88' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="pointer form-check-input" type="radio" id="Encuesta_89" value="80">
						<label for='Encuesta_89' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-3" class="pointer form-check-input" type="radio" id="Encuesta_90" value="100">
						<label for='Encuesta_90' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Genera ambientes y procesos de trabajo que cuidan y atienden al cliente.</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="pointer form-check-input" type="radio" id="Encuesta_91" value='20'>
						<label for='Encuesta_91' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="pointer form-check-input" type="radio" id="Encuesta_92" value="40">
						<label for='Encuesta_92' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="pointer form-check-input" type="radio" id="Encuesta_93" value="60">
						<label for='Encuesta_93' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="pointer form-check-input" type="radio" id="Encuesta_94" value="80">
						<label for='Encuesta_94' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-4" class="pointer form-check-input" type="radio" id="Encuesta_95" value="100">
						<label for='Encuesta_95' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Se esfuerza por ofrecer un excelente servicio.</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="pointer form-check-input" type="radio" id="Encuesta_96" value='20'>
						<label for='Encuesta_96' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="pointer form-check-input" type="radio" id="Encuesta_97" value="40">
						<label for='Encuesta_97' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="pointer form-check-input" type="radio" id="Encuesta_200" value="60">
						<label for='Encuesta_200' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="pointer form-check-input" type="radio" id="Encuesta_98" value="80">
						<label for='Encuesta_98' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="4-5" class="pointer form-check-input" type="radio" id="Encuesta_99" value="100">
						<label for='Encuesta_99' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row" hidden>
					<input readonly name="promedio4" class="centro" id="Promedio4"><!-- Aqui va el promedio --></input>
				</div>
			</div>
			<!-- 5ta ronda de preguntas -->
			<div id="Pregunta_5" hidden>
				<div class="h5 centro">TOMA DE DESICIONES</div>
				<div class="row">
					<div class="row p-3 scroll">Muestra capacidad para la toma |de decisiones necesarias para el logro de objetivos de forma ágil y proactiva
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="pointer form-check-input" type="radio" id="Encuesta_100" value='20'>
						<label for='Encuesta_100' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="pointer form-check-input" type="radio" id="Encuesta_101" value="40">
						<label for='Encuesta_101' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="pointer form-check-input" type="radio" id="Encuesta_102" value="60">
						<label for='Encuesta_102' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="pointer form-check-input" type="radio" id="Encuesta_103" value="80">
						<label for='Encuesta_103' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-1" class="pointer form-check-input" type="radio" id="Encuesta_104" value="100">
						<label for='Encuesta_104' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Realiza la toma de decisiones en la organización apoyado en informacion relevante facilitando la eleccion de las mejores alternativas presentadas
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="pointer form-check-input" type="radio" id="Encuesta_105" value='20'>
						<label for='Encuesta_105' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="pointer form-check-input" type="radio" id="Encuesta_106" value="40">
						<label for='Encuesta_106' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="pointer form-check-input" type="radio" id="Encuesta_107" value="60">
						<label for='Encuesta_107' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="pointer form-check-input" type="radio" id="Encuesta_108" value="80">
						<label for='Encuesta_108' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-2" class="pointer form-check-input" type="radio" id="Encuesta_109" value="100">
						<label for='Encuesta_109' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Acude a las politicas de la organización para la toma de decisiones</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="pointer form-check-input" type="radio" id="Encuesta_110" value='20'>
						<label for='Encuesta_110' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="pointer form-check-input" type="radio" id="Encuesta_111" value="40">
						<label for='Encuesta_111' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="pointer form-check-input" type="radio" id="Encuesta_112" value="60">
						<label for='Encuesta_112' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="pointer form-check-input" type="radio" id="Encuesta_113" value="80">
						<label for='Encuesta_113' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-3" class="pointer form-check-input" type="radio" id="Encuesta_114" value="100">
						<label for='Encuesta_114' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Muestra capacidad para asumir riesgos que se puedan presentar.</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="pointer form-check-input" type="radio" id="Encuesta_115" value='20'>
						<label for='Encuesta_115' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="pointer form-check-input" type="radio" id="Encuesta_116" value="40">
						<label for='Encuesta_116' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="pointer form-check-input" type="radio" id="Encuesta_117" value="60">
						<label for='Encuesta_117' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="pointer form-check-input" type="radio" id="Encuesta_118" value="80">
						<label for='Encuesta_118' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-4" class="pointer form-check-input" type="radio" id="Encuesta_119" value="100">
						<label for='Encuesta_119' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Muestra interés para solucionar los errores cometidos por el o por sus compañeros.
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="pointer form-check-input" type="radio" id="Encuesta_120" value='20'>
						<label for='Encuesta_120' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="pointer form-check-input" type="radio" id="Encuesta_121" value="40">
						<label for='Encuesta_121' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="pointer form-check-input" type="radio" id="Encuesta_122" value="60">
						<label for='Encuesta_122' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="pointer form-check-input" type="radio" id="Encuesta_123" value="80">
						<label for='Encuesta_123' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="5-5" class="pointer form-check-input" type="radio" id="Encuesta_124" value="100">
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
						<input name="6-1" class="pointer form-check-input" type="radio" id="Encuesta_125" value='20'>
						<label for='Encuesta_125' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="pointer form-check-input" type="radio" id="Encuesta_126" value="40">
						<label for='Encuesta_126' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="pointer form-check-input" type="radio" id="Encuesta_127" value="60">
						<label for='Encuesta_127' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="pointer form-check-input" type="radio" id="Encuesta_128" value="80">
						<label for='Encuesta_128' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-1" class="pointer form-check-input" type="radio" id="Encuesta_129" value="100">
						<label for='Encuesta_129' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Valora y promueve el trabajo en equipo.</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="pointer form-check-input" type="radio" id="Encuesta_130" value='20'>
						<label for='Encuesta_130' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="pointer form-check-input" type="radio" id="Encuesta_131" value="40">
						<label for='Encuesta_131' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="pointer form-check-input" type="radio" id="Encuesta_132" value="60">
						<label for='Encuesta_132' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="pointer form-check-input" type="radio" id="Encuesta_133" value="80">
						<label for='Encuesta_133' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-2" class="pointer form-check-input" type="radio" id="Encuesta_134" value="100">
						<label for='Encuesta_134' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Implementa modalidades alternativas de trabajo en equipo, a fin de añadir valor
						a
						los
						resultados.</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="pointer form-check-input" type="radio" id="Encuesta_135" value='20'>
						<label for='Encuesta_135' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="pointer form-check-input" type="radio" id="Encuesta_136" value="40">
						<label for='Encuesta_136' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="pointer form-check-input" type="radio" id="Encuesta_137" value="60">
						<label for='Encuesta_137' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="pointer form-check-input" type="radio" id="Encuesta_138" value="80">
						<label for='Encuesta_138' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-3" class="pointer form-check-input" type="radio" id="Encuesta_139" value="100">
						<label for='Encuesta_139' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Logra la cooperación de las personas involucradas directa o indirectamente con
						su
						área.
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="pointer form-check-input" type="radio" id="Encuesta_140" value='20'>
						<label for='Encuesta_140' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="pointer form-check-input" type="radio" id="Encuesta_141" value="40">
						<label for='Encuesta_141' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="pointer form-check-input" type="radio" id="Encuesta_142" value="60">
						<label for='Encuesta_142' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="pointer form-check-input" type="radio" id="Encuesta_143" value="80">
						<label for='Encuesta_143' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-4" class="pointer form-check-input" type="radio" id="Encuesta_144" value="100">
						<label for='Encuesta_144' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Motiva al equipo a integrar sus ideas y llegar a consensos.</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="pointer form-check-input" type="radio" id="Encuesta_145" value='20'>
						<label for='Encuesta_145' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="pointer form-check-input" type="radio" id="Encuesta_146" value="40">
						<label for='Encuesta_146' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="pointer form-check-input" type="radio" id="Encuesta_147" value="60">
						<label for='Encuesta_147' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="pointer form-check-input" type="radio" id="Encuesta_148" value="80">
						<label for='Encuesta_148' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="6-5" class="pointer form-check-input" type="radio" id="Encuesta_149" value="100">
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
					<div class="row p-3">Carisma, capacidad de mediar en los conflictos internos y capacidad de mediar en los conflictos con los clientes
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="pointer form-check-input" type="radio" id="Encuesta_150" value='20'>
						<label for='Encuesta_150' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="pointer form-check-input" type="radio" id="Encuesta_151" value="40">
						<label for='Encuesta_151' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="pointer form-check-input" type="radio" id="Encuesta_152" value="60">
						<label for='Encuesta_152' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="pointer form-check-input" type="radio" id="Encuesta_153" value="80">
						<label for='Encuesta_153' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-1" class="pointer form-check-input" type="radio" id="Encuesta_154" value="100">
						<label for='Encuesta_154' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Facilita el uso del potencial humano y las capacidades de los trabajadores.</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="pointer form-check-input" type="radio" id="Encuesta_155" value='20'>
						<label for='Encuesta_155' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="pointer form-check-input" type="radio" id="Encuesta_156" value="40">
						<label for='Encuesta_156' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="pointer form-check-input" type="radio" id="Encuesta_157" value="60">
						<label for='Encuesta_157' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="pointer form-check-input" type="radio" id="Encuesta_158" value="80">
						<label for='Encuesta_158' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-2" class="pointer form-check-input" type="radio" id="Encuesta_159" value="100">
						<label for='Encuesta_159' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Realiza un apropiado seguimiento de las tareas, brindando feedback a sus colaboradores.
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="pointer form-check-input" type="radio" id="Encuesta_160" value='20'>
						<label for='Encuesta_160' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="pointer form-check-input" type="radio" id="Encuesta_161" value="40">
						<label for='Encuesta_161' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="pointer form-check-input" type="radio" id="Encuesta_162" value="60">
						<label for='Encuesta_162' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="pointer form-check-input" type="radio" id="Encuesta_163" value="80">
						<label for='Encuesta_163' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-3" class="pointer form-check-input" type="radio" id="Encuesta_164" value="100">
						<label for='Encuesta_164' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Motiva y establece un clima de confianza, generando entusiasmo y compromiso en
						su
						equipo.
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="pointer form-check-input" type="radio" id="Encuesta_165" value='20'>
						<label for='Encuesta_165' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="pointer form-check-input" type="radio" id="Encuesta_166" value="40">
						<label for='Encuesta_166' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="pointer form-check-input" type="radio" id="Encuesta_167" value="60">
						<label for='Encuesta_167' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="pointer form-check-input" type="radio" id="Encuesta_168" value="80">
						<label for='Encuesta_168' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-4" class="pointer form-check-input" type="radio" id="Encuesta_169" value="100">
						<label for='Encuesta_169' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Guía de manera efectiva al equipo de trabajo para cumplir con los objetivos.
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="pointer form-check-input" type="radio" id="Encuesta_170" value='20'>
						<label for='Encuesta_170' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="pointer form-check-input" type="radio" id="Encuesta_171" value="40">
						<label for='Encuesta_171' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="pointer form-check-input" type="radio" id="Encuesta_172" value="60">
						<label for='Encuesta_172' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="pointer form-check-input" type="radio" id="Encuesta_173" value="80">
						<label for='Encuesta_173' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="7-5" class="pointer form-check-input" type="radio" id="Encuesta_174" value="100">
						<label for='Encuesta_174' class="pointer ps-3">Excelente</label>
					</div>
				</div>
			</div>

			<div class="row" hidden>
				<input readonly name="promedio7" class="centro" id="Promedio7"><!-- Aqui va el promedio --></input>
			</div>
			<!-- 8ma ronda de preguntas -->
			<div id="Pregunta_8" hidden>
				<div class="h5 centro">CAPACIDAD DE ANALISIS Y GESTIÓN </div>
				<div class="row">
					<div class="row p-3">Identifica problemas que afectan la correcta funcionalidad de la empresa
					</div>
					<div class="row-1 d-flex">
						<input name="8-1" class="pointer form-check-input" type="radio" id="Encuesta_175" value='20'>
						<label for='Encuesta_175' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-1" class="pointer form-check-input" type="radio" id="Encuesta_176" value="40">
						<label for='Encuesta_176' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-1" class="pointer form-check-input" type="radio" id="Encuesta_177" value="60">
						<label for='Encuesta_177' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-1" class="pointer form-check-input" type="radio" id="Encuesta_178" value="80">
						<label for='Encuesta_178' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-1" class="pointer form-check-input" type="radio" id="Encuesta_179" value="100">
						<label for='Encuesta_179' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Reconoce informacion significativa que dinamisen el funcionamiento de la empresa</div>
					<div class="row-1 d-flex">
						<input name="8-2" class="pointer form-check-input" type="radio" id="Encuesta_180" value='20'>
						<label for='Encuesta_180' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-2" class="pointer form-check-input" type="radio" id="Encuesta_181" value="40">
						<label for='Encuesta_181' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-2" class="pointer form-check-input" type="radio" id="Encuesta_182" value="60">
						<label for='Encuesta_182' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-2" class="pointer form-check-input" type="radio" id="Encuesta_183" value="80">
						<label for='Encuesta_183' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-2" class="pointer form-check-input" type="radio" id="Encuesta_184" value="100">
						<label for='Encuesta_184' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Tiene mucha capacidad de organizar los datos importantes y de gran impacto en la empresa
					</div>
					<div class="row-1 d-flex">
						<input name="8-3" class="pointer form-check-input" type="radio" id="Encuesta_185" value='20'>
						<label for='Encuesta_185' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-3" class="pointer form-check-input" type="radio" id="Encuesta_186" value="40">
						<label for='Encuesta_186' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-3" class="pointer form-check-input" type="radio" id="Encuesta_187" value="60">
						<label for='Encuesta_187' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-3" class="pointer form-check-input" type="radio" id="Encuesta_188" value="80">
						<label for='Encuesta_188' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-3" class="pointer form-check-input" type="radio" id="Encuesta_189" value="100">
						<label for='Encuesta_189' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Posee gran capacidad para gestionar procesos a su cargo de forma rapida y confiable
					</div>
					<div class="row-1 d-flex">
						<input name="8-4" class="pointer form-check-input" type="radio" id="Encuesta_190" value='20'>
						<label for='Encuesta_190' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-4" class="pointer form-check-input" type="radio" id="Encuesta_191" value="40">
						<label for='Encuesta_191' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-4" class="pointer form-check-input" type="radio" id="Encuesta_192" value="60">
						<label for='Encuesta_192' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-4" class="pointer form-check-input" type="radio" id="Encuesta_193" value="80">
						<label for='Encuesta_193' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-4" class="pointer form-check-input" type="radio" id="Encuesta_194" value="100">
						<label for='Encuesta_194' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row">
					<div class="row p-3">Selecciona y distribuye eficazmente tareas y recursos
					</div>
					<div class="row-1 d-flex">
						<input name="8-5" class="pointer form-check-input" type="radio" id="Encuesta_195" value='20'>
						<label for='Encuesta_195' class="pointer ps-3">Insuficiente</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-5" class="pointer form-check-input" type="radio" id="Encuesta_196" value="40">
						<label for='Encuesta_196' class="pointer ps-3">En observacion</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-5" class="pointer form-check-input" type="radio" id="Encuesta_197" value="60">
						<label for='Encuesta_197' class="pointer ps-3">Bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-5" class="pointer form-check-input" type="radio" id="Encuesta_198" value="80">
						<label for='Encuesta_198' class="pointer ps-3">Muy bueno</label>
					</div>
					<div class="row-1 d-flex">
						<input name="8-5" class="pointer form-check-input" type="radio" id="Encuesta_199" value="100">
						<label for='Encuesta_199' class="pointer ps-3">Excelente</label>
					</div>
				</div>
				<div class="row" hidden>
					<input readonly name="promedio8" class="centro" id="Promedio8"><!-- Aqui va el promedio --></input>
					<input name="promedioC" id="promedioC" hidden>
					<input name="pObjetivos" id="pObjetivos" hidden>
					<input name="pFinal" id="pFinal" hidden>
				</div>
			</div>

			<!-- 9ma ronda de preguntas -->
			<div id="Pregunta_9" hidden>
				<div class="centro h4"> EVALUACIÓN DE OBJETIVOS (50%)</div>
				<div class="row">
					<div class="col-5 text-center">DESCRIPCIÓN DE OBJETIVOS</div>
					<div class="col-1 text-center mx-4">META</div>
					<div class="col-2 text-center ms-4 p-0">RESULTADO</div>
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
		
		// Obtener cedula y mostrarla quemada en el formulario

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
			formCedula.hidden = true;
			
			const cancelarEvaluacion =
            document.getElementById('cancelarEvaluacion');
			
			cancelarEvaluacion.hidden = false;

        	const alertCancelarEvaluacion = () => {
            Swal.fire({
                icon: 'warning',
                title: '¿Esta seguro que desea cancelar la evaluación?',
                text: 'Se eliminaran todos los datos guardados',
                confirmButtonColor: '#5bcce8',
                confirmButtonText: 'Aceptar',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.replace('./');
                }
            });
        };

        divProgressBar.hidden = false;
        cancelarEvaluacion.addEventListener('click', alertCancelarEvaluacion);

		const criteriosTitulo = document.getElementById('criteriosTitulo')
		criteriosTitulo.hidden = false
		
		const calidadTrabajo = document.getElementById('calidadTrabajo')
		calidadTrabajo.hidden = false

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
	mysqli_set_charset($mysqli, 'utf8mb4');
	$evaluador = $_SESSION["usuario"];
	$campaña = $_POST["campaña"];
	$cargo = $_POST["cargo"];
	$promedio1 = $_POST["promedio1"];
	$promedio2 = $_POST["promedio2"];
	$promedio3 = $_POST["promedio3"];
	$promedio4 = $_POST["promedio4"];
	$promedio5 = $_POST["promedio5"];
	$promedio6 = $_POST["promedio6"];
	$promedio7 = $_POST["promedio7"];
	$promedio8 = $_POST["promedio8"];
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

		$stmt = $mysqli->prepare("INSERT INTO eDesempenoCG(id_evaluador,id_evaluado,campaña,cargo,promedio_1,promedio_2,promedio_3,promedio_4,promedio_5,promedio_6,promedio_7, promedio_8, promedioCriterios,objetivo_1,meta_1,rObjetivo_1,ponderacionObjetivo_1,objetivo_2,meta_2,rObjetivo_2,ponderacionObjetivo_2,objetivo_3,meta_3,rObjetivo_3,ponderacionObjetivo_3,objetivo_4,meta_4,rObjetivo_4,ponderacionObjetivo_4,objetivo_5,meta_5,rObjetivo_5,ponderacionObjetivo_5,objetivo_6,meta_6,rObjetivo_6,ponderacionObjetivo_6,objetivo_7,meta_7,rObjetivo_7,ponderacionObjetivo_7,objetivo_8,meta_8,rObjetivo_8,ponderacionObjetivo_8,objetivo_9,meta_9,rObjetivo_9,ponderacionObjetivo_9,objetivo_10,meta_10,rObjetivo_10,ponderacionObjetivo_10,compromisos,desarrolloP,obsEvaluador,obsEvaluado,promedioObjetivos,pFinal) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

		$stmt->bind_param("iissssssssssssiissiissiissiissiissiissiissiissiissiisssssss", $evaluador, $cedulaV, $campaña, $cargo, $promedio1, $promedio2, $promedio3, $promedio4, $promedio5, $promedio6, $promedio7, $promedio8, $promedioC, $objetivo[1], $meta[1], $rObjetivo[1], $ponderacionObjetivo[1], $objetivo[2], $meta[2], $rObjetivo[2], $ponderacionObjetivo[2], $objetivo[3], $meta[3], $rObjetivo[3], $ponderacionObjetivo[3], $objetivo[4], $meta[4], $rObjetivo[4], $ponderacionObjetivo[4], $objetivo[5], $meta[5], $rObjetivo[5], $ponderacionObjetivo[5], $objetivo[6], $meta[6], $rObjetivo[6], $ponderacionObjetivo[6], $objetivo[7], $meta[7], $rObjetivo[7], $ponderacionObjetivo[7], $objetivo[8], $meta[8], $rObjetivo[8], $ponderacionObjetivo[8], $objetivo[9], $meta[9], $rObjetivo[9], $ponderacionObjetivo[9], $objetivo[10], $meta[10], $rObjetivo[10], $ponderacionObjetivo[10], $compromisos, $desarrolloP, $obsEvaluador, $obsEvaluado, $pObjetivos, $pFinal);

		if ($stmt->execute()) {
			echo "<script>window.location.replace('./')</script>";
		} else {
			echo "<h1 class='text-danger'>El registro no pudo ser guardado debido a: ", $mysqli->error;
		}
		$stmt->close();
		$mysqli->close();
	}
}
?>

</html>