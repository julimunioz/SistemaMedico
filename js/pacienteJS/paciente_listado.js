jQuery(document).ready(function(){
	
	tablaPacientes();

});

/* RECIBE EL DNI DEL PACIENTE, LO ENVIAMOS POR AJAX Y LA BASE DE DATOS NOS DEVUELVE LA INFORMACION DEL PACIENTE,
   COMPLETANDO EL MODAL INFORMATIVO, COMO TAMBIEN, EL MODAL PARA MODIFICAR AL PACIENTE.  */

function informacionPaciente(dni, valor){
			
	$.ajax({
		type:'post',
		data: {param:203, dni},
		url: 'scripts/sistemaMedico.php',
		dataType:'json',
		success: function(respuesta){
			if(respuesta.success){
		
				
				if (valor) {
					/* Modal Informativo */
					$("#nombrepac").html(respuesta.datosPaciente['Nombre']+' '+respuesta.datosPaciente['Apellido']);
					$("#datospac1").html(respuesta.datosPaciente['Dni']);
					$("#datospac2").html(respuesta.datosPaciente['FechaNac']);
					$("#datospac3").html(respuesta.datosPaciente['Edad']);
					$("#datospac4").html(respuesta.datosPaciente['Genero']);
					$("#datospac5").html(respuesta.datosPaciente['Calle']+' '+respuesta.datosPaciente['Nro_Calle']);
					$("#datospac8").html(respuesta.datosPaciente['Telefono']);
					$("#datospac6").html(respuesta.datosPaciente['Localidad']);
					$("#datospac7").html(respuesta.datosPaciente['Provincia']);
	 
				} else {

					/* Modal Modificar */
					$("#idpac").text(respuesta.datosPaciente['id']);
					$("#nombrePaciente").val(respuesta.datosPaciente['Nombre']);
					$("#apellidoPaciente").val(respuesta.datosPaciente['Apellido']);
					$("#dniPaciente").val(respuesta.datosPaciente['Dni']);
					$("#telefonoPaciente").val(respuesta.datosPaciente['Telefono']);
					$("#callePaciente").val(respuesta.datosPaciente['Calle']);
					$("#nroPaciente").val(respuesta.datosPaciente['Nro_Calle']);
					$("#fecnaPaciente").val(respuesta.datosPaciente['FechaNac']);
					$("#edadPaciente").val(respuesta.datosPaciente['Edad']);
					$("#generoPaciente").val(respuesta.datosPaciente['Genero']);
			
			//		$("#selectLoc :selected").text(respuesta.datosPaciente['Localidad']);
			//		$("#selectProv :selected").text(respuesta.datosPaciente['Provincia']);
					var prov = respuesta.datosPaciente['Provincia'];
					var loc = respuesta.datosPaciente['Localidad'];
					$.ajax({
						type:'post',
						data: {param:602, prov},
						url: 'scripts/sistemaMedico.php',
						dataType:'json',
						success: function(respuesta){
							if(respuesta.success){

								$("#selectProv").val(respuesta.provincia['id']).change();
								llenarLocalidades(respuesta.provincia['id'], loc);

							} 
						}	
					});

					
					
					

					inputFecha();
				}
			}	
		}
	});
}

function inputFecha(){
    var fecna = true;
    $('#fecnaPaciente').on('keyup', function(e){
        if($(this).val().length == 2 && fecna) {
            $(this).val($(this).val()+"/");
    	}
        if($(this).val().length == 5 && fecna) {
            $(this).val($(this).val()+"/");
    	}
    });
}

function eliminarPaciente(id, dni){
	$.ajax({
		type:'post',
		data: {param:203, dni},
		url: 'scripts/sistemaMedico.php',
		dataType:'json',
		success: function(respuesta){
			if(respuesta.success){
				$("#nombre_paciente").text(respuesta.datosPaciente['Nombre']+' '+respuesta.datosPaciente['Apellido']);
				$('#modal_eliminar-paciente').modal('show');
				$('#eliminar_paciente').on('click', function(){
					jQuery.ajax({
						type:"post",
						data: {param:201, idPaciente: id},
						url: "scripts/sistemaMedico.php",
						dataType:'json',
						success: function(respuesta){
							if (respuesta.success == true) {
								tablaPacientes.ajax.reload();
								
							}else{
								alert('Error al eliminar');
							}
						}
					});
				});
			} else {
				alert('Error en el servidor');
			}
		}	
	});
}


function tablaPacientes(){

	tablaPacientes = $('#tablaPac').DataTable({

		    language: {
		        "loadingRecords": "Cargando...",
		        "processing": "Procesando...",
		        "search": "Buscar:",
		        "zeroRecords": "No se encontraron pacientes",
		        "paginate": {
		            "first": "Primero",
		            "last": "Ultimo",
		            "next": "Siguiente",
		            "previous": "Anterior"
		        }
	    	},
	       
	        "bAutoWidth": false,	
	        "sDom": 'frtp',
	         "columnDefs":[{
	            'targets': "_all",
	            'orderable': false
       		 }],

	    	"ajax": "scripts/tablas/tablaPacientes.php",    
 	        "columns": [                    
				{data:"nombre"},
				{data:"dni"},
				{data:"fechanac"},
				{data:"edad"},
				{data:"domicilio"},
				{data:"genero"},
				{data:"botones" }
        	]  
	   
	});    
	
}
