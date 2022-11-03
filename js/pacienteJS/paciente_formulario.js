jQuery(document).ready(function(){
	
	var date = new Date();
	var dia = date.getDate();
	var mes = date.getMonth(); 
	var year = date.getFullYear(); 
	var month = mes + 1;
	var datos_fecha = [dia, month, year];

	llenarDia(dia);
	llenarMes(mes);
	llenarYear(year);

	llenarProvincias();
	$("#selectProv").on('change', function(){
       	var idprov = $("#selectProv").val();
     	llenarLocalidades(idprov, null);
    });

	$("#selectday").on('change', function(){
		calcularEdad(datos_fecha);
	});	
	
	$("#selectmonth").on('change', function(){
		calcularEdad(datos_fecha);
	});
	
	$("#selectyear").on('change', function(){
		calcularEdad(datos_fecha);
	});

});

function calcularEdad(datos_fecha){

	if($("#selectday").val() != null && $("#selectmonth").val() != null && $("#selectyear").val() != null ) {
	
		var dianac = $("#selectday").val();;
		var mesnac = $("#selectmonth").val();
		var yearnac = $("#selectyear").val();
		
		if (mesnac < datos_fecha[1]) {
			edad = datos_fecha[2] - yearnac;
		} else if (mesnac > datos_fecha[1]) {
			edad = (datos_fecha[2] - yearnac) - 1;
		} else if (dianac <= datos_fecha[0]) {
			edad = datos_fecha[2] - yearnac;
		} else {
			edad = (datos_fecha[2] - yearnac) - 1;
		}

		$("#grupo__edad .formulario__input-error").removeClass('formulario__input-error-activo');
		$("#edadPaciente").val(edad);
		$("#grupo__edad").addClass('edad-correcta');

	} else {
		$("#grupo__edad .formulario__input-error").addClass('formulario__input-error-activo');
	}
}

function llenarProvincias(){

	$("#selectLoc").append('<option selected disabled value="0">Seleccione</option>');
	$("#selectProv").append('<option selected disabled value="0">Seleccione</option>');
	$.ajax({
			type:"post",
			data: {param:600},
			url: "scripts/sistemaMedico.php",
			dataType:'json',
			success: function(respuesta){
				if (respuesta.success==true) 
				{
					var nompro = respuesta.provincias;
					for (var i = 0; nompro.length > i; i++) {
						var nombresprov = nompro[i];
						$("#selectProv").append('<option value="'+nombresprov['id']+'">'+nombresprov['Nombre']+'</option>');
					}

				}else{
					alert('Error en el servidor');
				}
			}
	});
}

function llenarLocalidades(idprov, localidadSelec){
	$("#selectLoc").empty();
	$("#selectLoc").append('<option selected disabled value="0">Seleccione</option>');	
	$.ajax({
		type:"post",
		data: {param:601, prov:idprov},
		url: "scripts/sistemaMedico.php",
		dataType:'json',
		success: function(respuesta){
		
			if (respuesta.success == true) {
			
					var nomloc = respuesta.localidades;
				
					for (var i = 0; nomloc.length > i; i++) {
						var nombresloc = nomloc[i];
						


						if (localidadSelec == nombresloc['Nombre']) 
						{
							$("#selectLoc").append('<option selected value="'+nombresloc['id']+'">'+nombresloc['Nombre']+'</option>');
						}
						else 
						{
							$("#selectLoc").append('<option value="'+nombresloc['id']+'">'+nombresloc['Nombre']+'</option>');
						}
						
						 


					}


				
			}else{
				alert('Error en el servidor');
			}
		}
	});
}

function llenarDia(dia){
	
	if (dia < 10) {
		$("#selectday").append('<option selected disabled value="0">'+0+dia+'</option>');
	} else {
		$("#selectday").append('<option selected disabled value="0">'+dia+'</option>');
	}
	
	for (var i = 1; i <= 9; i++){
		$("#selectday").append('<option value="'+i+'">'+0+i+'</option>');
	}
		for (var i = 10; i <= 31; i++){
		$("#selectday").append('<option value="'+i+'">'+i+'</option>');
	}
}

function llenarMes(mes){

	mes = mes+1;
	if (mes < 10) {
		$("#selectmonth").append('<option selected disabled value="0">'+0+mes+'</option>');
	} else {
		$("#selectmonth").append('<option selected disabled value="0">'+mes+'</option>');
	}

	for (var i = 1; i <= 9; i++){
		$("#selectmonth").append('<option value="'+i+'">'+0+i+'</option>');
	}
	for (var i = 10; i <= 12; i++){
		$("#selectmonth").append('<option value="'+i+'">'+i+'</option>');
	}
}

function llenarYear(year){
	
	$("#selectyear").append('<option selected disabled value="0">'+year+'</option>');
	
	for (var i = 1920; i <= year; i++){
		$("#selectyear").append('<option value="'+i+'">'+i+'</option>');
	}
}

