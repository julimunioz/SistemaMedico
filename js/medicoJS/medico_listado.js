$(document).ready(function(){

	tablaMedicos();

});

function buscarMedico(id){
	$.ajax({
		type:'post',
		data: {param:302, id},
		url: 'scripts/sistemaMedico.php',
		dataType:'json',
		success: function(respuesta){
			if(respuesta.success){

					/* Modal Modificar */
					$("#nombreMedico #apellidoMedico #dniMedico #telefonoMedico #matricula #especialidad").val('');
					$("#idmed").text(respuesta.datosMedicos['id']);
					$("#nombreMedico").val(respuesta.datosMedicos['Nombre']);
					$("#apellidoMedico").val(respuesta.datosMedicos['Apellido']);
					$("#dniMedico").val(respuesta.datosMedicos['Dni']);
					$("#telefonoMedico").val(respuesta.datosMedicos['Telefono']);
					$("#matricula").val(respuesta.datosMedicos['NumeroMatricula']);
					$("#especialidad :selected").text(respuesta.datosMedicos['Especialidad']);
					
					$('#modal_modificar-medico').modal('show');

			}	else {
					alert("Ocurrio un error");
			}
		}
	});
}

function eliminarMedico(id){
	$.ajax({
		type:'post',
		data: {param:302, id},
		url: 'scripts/sistemaMedico.php',
		dataType:'json',
		success: function(respuesta){
			if(respuesta.success){
				$("#nombre_medico").text(respuesta.datosMedicos['Nombre']+' '+respuesta.datosMedicos['Apellido']);
				$('#modal_eliminar-medico').modal('show');
				$('#eliminar_medico').on('click', function(){
					$.ajax({
						type:"post",
						data: {param:301, idMedico: id},
						url: "scripts/sistemaMedico.php",
						dataType:'json',
						success: function(respuesta){
							if (respuesta.success == true) {
								tablaMedicos.ajax.reload();
							}else{
								alert('Error en el servidor');
							}
						}
					});
				});
			} else { 
				alert("Ocurrio un error");
			}
		}
	});
}

function tablaMedicos(){

	tablaMedicos = $('#tablaMed').DataTable({

		    language: {
		        "loadingRecords": "Cargando...",
		        "processing": "Procesando...",
		        "search": "Buscar:",
		        "zeroRecords": "No se encontraron medicos",
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

	    		"ajax": "scripts/tablas/tablaMedicos.php",    
 	        "columns": [                    
						{data:"Nombre"},
						{data:"Dni"},
						{data:"Telefono"},
						{data:"NumeroMatricula"},
						{data:"Especialidad"},
						{data:"botones" }
        	]  
	   
	});    
}
