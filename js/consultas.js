jQuery(document).ready(function(){

	tablaConsultas();
	
});

function eliminarConsulta(id){

	$.ajax({
		type:"post",
		data: {param:501, id},
		url: "scripts/sistemaMedico.php",
		dataType:'json',
		success: function(respuesta){
			if(respuesta){
				
				$('#modal_eliminar-consulta').modal('show');
				
				$('#datospac1').html(respuesta.datos[0]);
				$('#datospac2').html(respuesta.datos[1]);
				$('#datospac3').html(respuesta.datos[2]);
				$('#datospac4').html(respuesta.datos[3]);
				$('#datospac5').html(respuesta.datos[4]);
				$('#datospac6').html(respuesta.datos[5]);
				$('#datospac7').html(respuesta.datos[6]);
				$('#datospac8').html(respuesta.datos[7]);
			
				$('#nomb_medico').html(respuesta.datos[8]);
				$('#espec_medico').html(respuesta.datos[9]);
				$('#matric_medico').html(respuesta.datos[10]);
			
				$('#diagnostico').html(respuesta.datos[11]);

				$('#codigopres').html(respuesta.datos[12]);
				$('#descripcionpres').html(respuesta.datos[13]);
				$('#cant').html(respuesta.datos[17]);

				$('#eliminar_consulta').on('click', function(){ 
					$.ajax({
						type:"post",
						data: {param:500, id},
						url: "scripts/sistemaMedico.php",
						dataType:'json',
						success: function(respuesta){
							if (respuesta.success == true) {
								tablaConsultas.ajax.reload();
							}else{
								alert('Error en el servidor');
							}
						}
					}); 
				});
			
			} else{
				alert("Ocurrio un error al realizar la peticion.")
			}
		}
	});
}

function datosRecibo(id){
	$.ajax({
		type:"post",
		data: {param:501, id : id},
		url: "scripts/sistemaMedico.php",
		dataType:'json',
		success: function(r){
			if(r){
				ticket();
			}
			else{
				alert("Ocurrio un error al realizar la peticion.")
			}
		}
	});
}

function ticket(){
    var win = window.open('generadorPDF/pdfconsultas/abrir.php', '_blank');
    win.focus();
}

function tablaConsultas(){
	
	tablaConsultas = $('#tablaconsultas').DataTable({

		    language: {
		        "loadingRecords": "Cargando...",
		        "processing": "Procesando...",
		        "search": "Buscar:",
		        "zeroRecords": "No se encontraron consultas",
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

	    	"ajax": "scripts/tablas/tablaConsultas.php",    
 	        "columns": [                    
				{data:"nombre_pac"},
				{data:"dni_pac"},
				{data:"transaccion"},
				{data:"datos_med"},
				{data:"fecha-hora"},
				{data:"botones"}
        	]  
	   
	});    
}

