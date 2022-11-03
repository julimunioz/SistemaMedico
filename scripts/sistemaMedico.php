<?php 
	
	if(isset($_POST['param'])){
		$parametro = $_POST['param'];
	}

	switch ($parametro) {

		case 200:
			include_once '../controlador/PacienteController.php';
			$funciones = new PacienteController();
			$retorno = $funciones->cargarPaciente($_POST);
			break;

		case 201:
			include_once '../controlador/PacienteController.php';
			$funciones = new PacienteController();
			$retorno = $funciones->eliminarPaciente($_POST);
			break;
		
		case 202:
			include_once '../controlador/PacienteController.php';
			$funciones = new PacienteController();
			$retorno = $funciones->modificarPaciente($_POST);
			break;

		case 203:
			include_once '../controlador/PacienteController.php';
			$funciones = new PacienteController();
			$retorno = $funciones->buscarPacienteDni($_POST);
			break;

		case 300:
			include_once '../controlador/MedicoController.php';
			$funciones = new MedicoController();
			$retorno = $funciones->cargarMedico($_POST);
			break;
		
		case 301:
			include_once '../controlador/MedicoController.php';
			$funciones = new MedicoController();
			$retorno = $funciones ->eliminarMedico($_POST);
			break;
		
		case 302:
			include_once '../controlador/MedicoController.php';
			$funciones = new MedicoController();
			$retorno = $funciones ->buscarMedico($_POST);
			break;
		
		case 303:	
			include_once '../controlador/MedicoController.php';
			$funciones = new MedicoController();
			$retorno = $funciones ->buscarMedico_Matricula($_POST);
			break;

		case 304:	
			include_once '../controlador/MedicoController.php';
			$funciones = new MedicoController();
			$retorno = $funciones ->llenarMedicos($_POST);
			break;

		case 305:	
			include_once '../controlador/MedicoController.php';
			$funciones = new MedicoController();
			$retorno = $funciones ->modificarMedicos($_POST);
			break;


		case 306:	
			include_once '../controlador/MedicoController.php';
			$funciones = new MedicoController();
			$retorno = $funciones ->llenarEspecialidades($_POST);
			break;

		case 404:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->listarDiagnosticos($_POST);
			break;

		case 405:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->buscarDiagnosticos($_POST);
			break;
		
		case 406:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->listarPrestaciones($_POST);
			break;
	
		case 407:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->datosReciboPac($_POST);
			break;

		case 408:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->datosReciboMed($_POST);
			break;

		case 409:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->datosReciboDiag($_POST);
			break;	

		case 410:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->buscarPrestaciones($_POST);
			break;

		case 411:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->datosReciboPres($_POST);
			break;

		case 412:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->datosReciboCant($_POST);
			break;
		
		case 413:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->valoresRecibo($_POST);
			break;
		
		case 414:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->datosReciboFecha($_POST);
			break;
		
		case 415:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->datosReciboHora($_POST);
			break;

		case 416:	
			include_once '../controlador/AtencionController.php';
			$funciones = new AtencionController();
			$retorno = $funciones ->buscarPresCod($_POST);
			break;

		case 500:	
			include_once '../controlador/ConsultasController.php';
			$funciones = new ConsultasController();
			$retorno = $funciones ->eliminarConsulta($_POST);
		break;

		case 501:	
			include_once '../controlador/ConsultasController.php';
			$funciones = new ConsultasController();
			$retorno = $funciones ->datosRecibo($_POST);
		break;

		case 502:	
			include_once '../controlador/ConsultasController.php';
			$funciones = new ConsultasController();
			$retorno = $funciones ->verRecibo($_POST);
		break;
	
		case 600:	
			include_once '../controlador/UbicacionController.php';
			$funciones = new UbicacionController();
			$retorno = $funciones ->listarProvincias($_POST);
		break;

		case 601:	
			include_once '../controlador/UbicacionController.php';
			$funciones = new UbicacionController();
			$retorno = $funciones ->listarLocalidades($_POST);
		break;

		case 602:	
			include_once '../controlador/UbicacionController.php';
			$funciones = new UbicacionController();
			$retorno = $funciones ->buscarProvincia($_POST);
		break;		

		case 700:	
			include_once '../controlador/ConfiguracionController.php';
			$funciones = new ConfiguracionController();
			$retorno = $funciones ->verificarPassword($_POST);
		break;

		case 701:	
			include_once '../controlador/ConfiguracionController.php';
			$funciones = new ConfiguracionController();
			$retorno = $funciones ->cambiarPassword($_POST);
		break;

		case 800:	
			include_once '../controlador/LoginController.php';
			$funciones = new LoginController();
			$retorno = $funciones ->login($_POST);
		break;

		case 801:	
			include_once '../controlador/LoginController.php';
			$funciones = new LoginController();
			$retorno = $funciones ->logout($_POST);
		break;


	}

echo $retorno;

?>