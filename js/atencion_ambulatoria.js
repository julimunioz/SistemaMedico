jQuery(document).ready(function(){

	$("#buscarPaciente").on('click', function(){
		var dni = $("#dniPaciente").val();
		buscarPacienteDoc(dni); 
	});

	$("#limpiar").on('click', function(){
		$("#dniPaciente").val('');
		$("#ingresematricula").val('');
		$("#ingresenombreMed").val('');
	});


	$("#fecha_diferido").css("display","none");
	$('#fecha_diferido').datepicker({
        dayNames: ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"],
	    dayNamesMin: ["Do","Lu","Ma","Mi","Ju","Vi","Sa"],
	    monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
	    monthNamesShort: ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
        dateFormat: 'dd/mm/yy',
        changeMonth: false,
        changeYear: false,
        minDate: '-14D',
        maxDate: '0'
	});
	
	$("#paciente_diferido").change(function(){
		if ($(this).is(':checked')) {
			$("#fecha_diferido").css("display","block");
			$('#fecha_diferido').datepicker('show');
			
		} else {
 		 	$("#fecha_diferido").css("display","none");
 		 	$('#fecha_diferido').val('');
 		}
	});
	
	
	$("#continuarconsulta").on('click', function(){
		var dni = $("#dniPaciente").val();
		informacionAtencion(dni);
		$("#modal_buscarPac").modal('hide');
	});

	$("#opcion_matricula").css("display","none");
	
	$("#opcion_nombre").css("display","none");
	
	$("#medico_seleccionado").css("display","none");
	
	$("#select_medico").select2();
	
	$("#buscarmatricula").on('click' ,function(){
		$("#buscarmatricula").addClass('opcion_buscarmedico');
		$("#buscarnombremed").removeClass('opcion_buscarmedico');
		$("#opcion_matricula").css("display","block");
		$("#opcion_nombre").css("display","none");
	});
	
	$("#buscarnombremed").on('click' ,function(){
		$("#buscarnombremed").addClass('opcion_buscarmedico');
		$("#buscarmatricula").removeClass('opcion_buscarmedico');
		$("#opcion_nombre").css("display","block");
		$("#opcion_matricula").css("display","none");
	});

	$("#buscarMatricula").on('click', function(){
		var matriculamed = $("#ingresematricula").val();
		buscar_medicoMatricula(matriculamed);
	});

	$("#select_medico").on('change', function(){
		var id_med = $("#select_medico").val();
		buscarMedico(id_med);
	});

	$("#cambiarmed").on('click', function(){
		$("#medico_seleccionado").css("display","none");
		$("#tarjeta_medico").css("display","block");
		$('#header_medico').removeClass('header_incompleto');
		$("#ingresematricula").val('');
		llenarMedicos();
	});

	$('#diagseleccionado').css("display","none");
	$('#prestseleccionado').css("display","none");
	$('#selectdiag').select2();
	$('#selectpres').select2();
	

	$('#selectdiag').on('change', function(){
		$('#diagseleccionado').css("display","block");
		$('#diagselect').css("display","none");
		
		var iddiag = $('#selectdiag').val();
		var datosdiag =  $("#selectdiag option:selected").text();
		datosDiag(iddiag);
		datosReciboDiag(datosdiag);	
	});

	$('#cambiardiag').on('click', function(){
		$('#diagseleccionado').css("display","none");
		$('#diagselect').css("display","block");
		$('#header_diagnostico').removeClass('header_incompleto');
		llenarDiagnostico();
	});

	$('#selectpres').on('change', function(){
		$('#prestseleccionado').css("display","block");
		$('#prestselect').css("display","none");

		var numero = 1;
		$('#aumentarcant').on('click', function(){
			if (numero < '2'){
				numero ++;
				$('#cant').val(numero);
			} else {
				alert ("maximo 2 consumos");
			}
		});
		
		$('#disminuircant').on('click', function(){
			if (numero > '1'){
				numero --;
				$('#cant').val(numero);
			} else {
				alert("minimo 1 consumo");
			}
		});
	
		var idpres = $('#selectpres').val();
		datosPres(idpres);
	});

	$('#cambiarpres').on('click', function(){
		$('#prestseleccionado').css("display","none");
		$('#prestselect').css("display","block");
		$('#header_prestacion').removeClass('header_incompleto');
		llenarPrestacion();
	});


	$('#validar').on('click', function(){
	
		var campodiag = $('#selectdiag').val();
		var campopres = $('#selectpres').val();
		var campomed = $('#datosmed1').text();
		
	
		if (campodiag != null && campopres != null){
			datosReciboFecha();
			datosReciboHora();
			datosReciboCant();
			valoresRecibo();
			recibo();
		} else if (campodiag == null){
			$('#header_diagnostico').addClass('header_incompleto');
		}

		if (campopres == null){
			$('#header_prestacion').addClass('header_incompleto');
		}  

		if (campomed == ""){
			$('#header_medico').addClass('header_incompleto');
		}
	});
	

});

function buscarPacienteDoc(dni){
	$.ajax({
		type:'post',
		data: {param:203, dni},
		url: 'scripts/sistemaMedico.php',
		dataType:'json',
		success: function(respuesta){
			if(respuesta.success){

				$('#modal_buscarPac').modal('show');
				var cadena = respuesta.datosPaciente['Nombre']+' '+respuesta.datosPaciente['Apellido']+' - '+respuesta.datosPaciente['Dni'];
				$("#infopac").html(cadena);
	
			} else{
				alert('El documento no existe');
			}
		}
	});
}

function informacionAtencion(dni){
	
	var fecha = $('#fecha_diferido').val();
	$("#modal_buscarPac").on('hidden.bs.modal', function(){
		$(".container-fluid").load('vista/atencion_ambulatoria/cargar_atencion-ambulatoria.php', function(){
			var date = new Date();
			if(fecha != '') {
				console.log(fecha);
				$("#fecha").html(fecha);
			} else {
				
				var dia = date.getDate();
				var mes = date.getMonth(); 
				var año = date.getFullYear(); 
				mes = mes + 1;
				
				if (dia < 10) {
					dia = '0'+dia;
				} 
			
				if (mes < 10) {
					mes = '0'+mes;
				} 

				var fecha_actual = dia + "/" + mes + "/" + año;
				$("#fecha").html(fecha_actual);
			}

			var hora = date.getHours() + ":" + date.getMinutes();
			$("#hora").html(hora);

			llenarMedicos();
			llenarDiagnostico();
			llenarPrestacion();


			jQuery.ajax({
				type:'post',
				data: {param:203, dni},
				url: 'scripts/sistemaMedico.php',
				dataType:'json',
				success: function(respuesta){
					if(respuesta.success){
						
						
							var nombrepac = respuesta.datosPaciente['Nombre']+' '+respuesta.datosPaciente['Apellido'];
							var dnipac = respuesta.datosPaciente['Dni'];
							var fecnapac = respuesta.datosPaciente['FechaNac'];
							var edadpac = respuesta.datosPaciente['Edad'];
							var generopac = respuesta.datosPaciente['Genero'];
							
							var domiciliopac = respuesta.datosPaciente['Calle']+' '+respuesta.datosPaciente['Nro_Calle'];
							var localidadpac = respuesta.datosPaciente['Localidad'];
							var provinciapac = respuesta.datosPaciente['Provincia'];
							var telefonopac = respuesta.datosPaciente['Telefono'];

							$("#datospac1").html(nombrepac);
							$("#datospac2").html(dnipac);
							$("#datospac3").html(fecnapac);
							$("#datospac4").html(edadpac);
							$("#datospac5").html(generopac);
							$("#datospac6").html(domiciliopac);
							$("#datospac7").html(localidadpac);
							$("#datospac8").html(provinciapac);
							$("#datospac9").html(telefonopac);
							
						
							var datospac = [nombrepac, dnipac, fecnapac, edadpac, generopac, domiciliopac, localidadpac, provinciapac, telefonopac];
							datosReciboPac(datospac);
						
					}
				}
			}); 

		});
	});
}

function buscar_medicoMatricula(matricula){
	$.ajax({
		type:'post',
		data: {param:303, matricula},
		url: 'scripts/sistemaMedico.php',
		dataType:'json',
		success: function(respuesta){
			if(respuesta.success){
					
					$('#modal-medico_seleccionado').modal('show');	

					var nombremed = 'Medico: '+respuesta.datosMedicos['Nombre']+' '+respuesta.datosMedicos['Apellido'];
					var matriculamed = 'Numero Matricula: '+respuesta.datosMedicos['NumeroMatricula'];
					var datosmed1 = respuesta.datosMedicos['Apellido']+' '+respuesta.datosMedicos['Nombre'];
					var datosmed2 = respuesta.datosMedicos['Especialidad'];
					var datosmed3 = respuesta.datosMedicos['NumeroMatricula'];
					
					var datosmed = [datosmed1, datosmed2, datosmed3];
					datosReciboMed(datosmed);

					$("#nombremed").html(nombremed);
					$("#matriculamed").html(matriculamed);
					
					$("#datosmed1").html(datosmed1);
					$("#datosmed2").html(datosmed2);
					$("#datosmed3").html(datosmed3);
				
					$("#cerrar-medico").on('click', function(){
						$('#modal-medico_seleccionado').modal('hide');
						$("#tarjeta_medico").css("display","none");
						$("#medico_seleccionado").css("display","block");
					});
	
			} else {
				alert('El numero de matricula no existe.');
			}
		}
	});
}

function llenarMedicos(){
	$('#select_medico').empty();
	$("#select_medico").append('<option selected disabled value="0">Nombre y Apellido...</option>');
	$.ajax({
			type:"post",
			data: {param:304},
			url: "scripts/sistemaMedico.php",
			dataType:'json',
			success: function(respuesta){
				if (respuesta.success==true) {

					var med = respuesta.medicos;
					for (var i = 0; med.length > i; i++) {
						var medicos = med[i];
						$("#select_medico").append('<option value="'+medicos['id']+'">'+medicos['Nombre']+' '+medicos['Apellido']+' - '+medicos['NumeroMatricula']+'</option>');
					}
					
				}else{
					alert('Error en el servidor');
				}
			}
	});
}

function buscarMedico(id){
	$.ajax({
		type:'post',
		data: {param:302, id},
		url: 'scripts/sistemaMedico.php',
		dataType:'json',
		success: function(respuesta){
			if(respuesta.success){
	
					var nombremed = 'Medico: '+respuesta.datosMedicos['Nombre']+' '+respuesta.datosMedicos['Apellido'];
					var matriculamed = 'Numero Matricula: '+respuesta.datosMedicos['NumeroMatricula'];
					var datosmed1 = respuesta.datosMedicos['Apellido']+' '+respuesta.datosMedicos['Nombre'];
					var datosmed2 = respuesta.datosMedicos['Especialidad'];
					var datosmed3 = respuesta.datosMedicos['NumeroMatricula'];
					
					var datosmed = [datosmed1, datosmed2, datosmed3];
					datosReciboMed(datosmed);
			
					$("#nombremed").html(nombremed);
					$("#matriculamed").html(matriculamed);
					
					$("#datosmed1").html(datosmed1);
					$("#datosmed2").html(datosmed2);
					$("#datosmed3").html(datosmed3);
					
					$("#tarjeta_medico").css("display","none");
					$("#medico_seleccionado").css("display","block");
				
			}else{
				alert('Error');
			}
		}
	});
}

function llenarDiagnostico(){
	$('#selectdiag').empty();
	$("#selectdiag").append('<option selected disabled value="0">Seleccione un diagnostico...</option>');
	$.ajax({
			type:"post",
			data: {param:404},
			url: "scripts/sistemaMedico.php",
			dataType:'json',
			success: function(respuesta){
				
				if (respuesta.success==true) {

					var nomdiag = respuesta.diagnostico;
					for (var i = 0; nomdiag.length > i; i++) {
						var nombresdiag = nomdiag[i];
						$("#selectdiag").append('<option value="'+nombresdiag['id']+'">'+nombresdiag['Descripcion']+' - '+nombresdiag['Codigo']+'</option>');
					}

				}else{
					alert('Error en el servidor');
				}
			}
	});
}

function datosDiag(iddiag){
	$.ajax({
		type:'post',
		data: {param:405, id:iddiag},
		url: 'scripts/sistemaMedico.php',
		dataType:'json',
		success: function(respuesta){
	
			if(respuesta.success){

				$("#codigodiag").html(respuesta.datosdiag['Codigo']);
				$("#descripciondiag").html(respuesta.datosdiag['Descripcion']);
			
			} else{
					console.log("respuesta falsa");
			}
		}
	});
}

function llenarPrestacion(){
	$('#selectpres').empty();
	$("#selectpres").append('<option selected disabled value="0">Seleccione una prestación...</option>');
	$.ajax({
			type:"post",
			data: {param:406},
			url: "scripts/sistemaMedico.php",
			dataType:'json',
			success: function(respuesta){
				if (respuesta.success==true) {
					
					var nompres = respuesta.prestaciones;
					for (var i = 0; nompres.length > i; i++) {
						var nombrespres = nompres[i];
						$("#selectpres").append('<option value="'+nombrespres['id']+'">'+nombrespres['Descripcion']+' - '+nombrespres['Codigo']+'</option>');
					}

				}else{
					alert('Error en el servidor');
				}
			}
	});
}

function datosPres(idpres){
	$.ajax({
		type:'post',
		data: {param:410, id:idpres},
		url: 'scripts/sistemaMedico.php',
		dataType:'json',
		success: function(respuesta){
	
			if(respuesta.success){

				$("#codigopres").html(respuesta.datospres['Codigo']);
				$("#descripcionpres").html(respuesta.datospres['Descripcion']);
				
				var datospres1 = respuesta.datospres['Codigo'];
				var datospres2 = respuesta.datospres['Descripcion'];
				var datospres3 = respuesta.datospres['Coseguro'];

				var datospres = [datospres1, datospres2, datospres3];
				datosReciboPres(datospres); 

			} else{
					console.log("respuesta falsa");
			}
		} 
	});
}

function datosReciboPac(datospac){
	$.ajax({
		type:'post',
		data: {param:407, datospac : datospac},
		url: 'scripts/sistemaMedico.php',
		dataType:'json'
	})
}

function datosReciboMed(datosmed){
	$.ajax({
		type:'post',
		data: {param:408, datosmed : datosmed},
		url: 'scripts/sistemaMedico.php',
		dataType:'json'
	})
}

function datosReciboDiag(datosdiag){
	$.ajax({
		type:'post',
		data: {param:409, datosdiag : datosdiag},
		url: 'scripts/sistemaMedico.php',
		dataType:'json'
	})
}

function datosReciboPres(datospres){
	$.ajax({
		type:'post',
		data: {param:411, datospres : datospres},
		url: 'scripts/sistemaMedico.php',
		dataType:'json'
	}) 
}

function datosReciboCant(){
	var cantidad = $('#cant').val();
	$.ajax({
		type:'post',
		data: {param:412, cantidad : cantidad},
		url: 'scripts/sistemaMedico.php',
		dataType:'json'
	}) 
}

function datosReciboFecha(){
	var fecha = $('#fecha').text();
	$.ajax({
		type:'post',
		data: {param:414, fecha : fecha},
		url: 'scripts/sistemaMedico.php',
		dataType:'json'
	}) 
}

function datosReciboHora(){
	var hora = $('#hora').text();
	$.ajax({
		type:'post',
		data: {param:415, hora : hora},
		url: 'scripts/sistemaMedico.php',
		dataType:'json'
	}) 
}

function recibo(){
    var win = window.open('generadorPDF/pdfrecibos/abrir.php', '_blank');
    win.focus();
}

function valoresRecibo(){

	var PrestacionCod = $("#codigopres").text();
	
	$.ajax({
		type:'post',
		data: {param:416, PrestacionCod : PrestacionCod},
		url: 'scripts/sistemaMedico.php',
		dataType:'json',
		success: function(respuesta){
			if(respuesta.success){
				if(respuesta.existe=="si"){
					var ClienteNom = $("#datospac1").text();
					var ClienteDni = $("#datospac2").text();
					var ClienteFecna = $("#datospac3").text();
					var ClienteEdad = $("#datospac4").text();
					var ClienteDomicilio = $("#datospac6").text();
					var ClienteLoc = $("#datospac7").text();
					var ClienteProv = $("#datospac8").text();
					var ClienteTel = $("#datospac9").text();
					
					var MedicoNom = $("#datosmed1").text();
					var MedicoEsp = $("#datosmed2").text();
					var MedicoMat = $("#datosmed3").text();
					
					var Diagnostico = $("#selectdiag option:selected").text();
	
					var PrestacionDes = $("#descripcionpres").text();
					var PrestacionCos =	respuesta.PrestacionCos['Coseguro'];

					var Fecha = $("#fecha").text();
					var Hora = $("#hora").text();
					var Cantidad = $('#cant').val();
					
					var valores_recibo = [ClienteNom, ClienteDni, ClienteFecna, ClienteEdad, ClienteDomicilio , ClienteLoc, ClienteProv, ClienteTel, 
					MedicoNom, MedicoEsp, MedicoMat, Diagnostico, PrestacionCod, PrestacionDes, PrestacionCos, Fecha, Hora, Cantidad];	
					$.ajax({
						type:'post',
						data: {param:413, valores_recibo : valores_recibo},
						url: 'scripts/sistemaMedico.php',
						dataType:'json'
					}) 
				}
			}
		}	
	}) 
}
