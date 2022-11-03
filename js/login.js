$(document).ready(function(){

	$('#iniciar_sesion').on('click', function(){
		$('#iniciar_sesion').val('Validando...');
		if ($('#usuario').val() != '' && $('#pass').val() != '') {
			login();
		
		} else {
			$('.error_campos').slideDown('slow');
			setTimeout(function(){
				$('.error_campos').slideUp('slow');
			},3000);
			$('#iniciar_sesion').val('Iniciar Sesión...');
		}
	});

	$('#logout').on('click', function(){
		logout();
	});
});


function login(){
	var user = $('#usuario').val();
	var pass = $('#pass').val();
	var datos_login = [user,pass];
	$.ajax({
		type:"post",
		data: {param:800, datos_login},
		url: "scripts/sistemaMedico.php",
		dataType:'json',
		success: function(respuesta){
			if (respuesta.success == true) {
				location.href = 'sistema.php';
			}else{
				$('.error_datos').slideDown('slow');
				setTimeout(function(){
					$('.error_datos').slideUp('slow');
				},3000);
				$('#iniciar_sesion').val('Iniciar Sesión...');
			}
		}
	}); 
}

function logout () {
	$('#cerrar_sesion').modal('show');
	$('#salir').on('click', function(){
		$.ajax({
			type:'post',
			data: {param:801},
			url: 'scripts/sistemaMedico.php',
			dataType:'json',
			success: function(respuesta){
				if(respuesta.success){
					location.href = 'index.html';
				} else{
					alert('Error al cerrar sesion');
				}
			} 
		});
	});
}

