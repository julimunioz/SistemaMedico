jQuery(document).ready(function(){

	jQuery("#pacientes").on('click' ,function(){
		$("#contenedor1").load('vista/pacientes/listaPac.php');
	});

	jQuery("#medicos").on('click' ,function(){
		$("#contenedor1").load('vista/medicos/listaMed.php');
	});

	jQuery("#atencion_ambulatoria").on('click' ,function(){
		$("#contenedor1").load('vista/atencion_ambulatoria/atencion_ambulatoria.php');
	});

	jQuery("#consultas").on('click' ,function(){
		$("#contenedor1").load('vista/consultas/lista_consultas.php');
	});

	jQuery("#agregarpac").on('click' ,function(){
		$("#contenedor1").load('vista/pacientes/formulario_paciente.php');
	});

	jQuery("#listadopac").on('click' ,function(){
		$("#contenedor1").load('vista/pacientes/listado_paciente.php');
	});

	jQuery("#agregarmed").on('click' ,function(){
		$("#contenedor1").load('vista/medicos/formulario_medico.php');
	});

	jQuery("#listadomed").on('click' ,function(){
		$("#contenedor1").load('vista/medicos/listado_medico.php');
	});

	jQuery("#settings").on('click' ,function(){
		$("#contenedor1").load('vista/configuracion/configuracion_usuario.php');
	});

});

