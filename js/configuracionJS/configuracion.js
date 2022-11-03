jQuery(document).ready(function(){

	$('#pass_actual').css("display","none");
	$('#cambiar_pass').css("display","none");
	
	$('.boton_cambiar-pass').on('click', function(){
		$('#opcion_cambiar-pass').css("display","none");
		$('#pass_actual').css("display","block");
	});

	$('#verificar_pass').on('click', function(){
		verificarPassword();
	});

});

function verificarPassword() {
	var pass_actual = $('#password').val();
	$.ajax({
		type:"post",
		data: {param:700, pass_actual},
		url: "scripts/sistemaMedico.php",
		dataType:'json',
		success: function(respuesta){
			if (respuesta.success == true) {
				$('#verificar_pass').val('Verificando...');
				setTimeout(function(){
					$('#pass_actual').css("display","none");
					$('#cambiar_pass').css("display","block");
				},2000); 
			}else{
				$("#grupo__password .formulario__input-error").addClass('formulario__input-error-activo');
				$("#grupo__password").addClass('formulario__grupo-incorrecto');
				setTimeout(function(){
					$("#grupo__password .formulario__input-error").removeClass('formulario__input-error-activo');
					$("#grupo__password").removeClass('formulario__grupo-incorrecto');
				},3000);
			}
		}
	}); 
}