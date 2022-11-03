formulario = document.getElementById('formulario_pass');
inputs = document.querySelectorAll('#formulario_pass input'); 

/* EXPRESIONES REGULARES */
expresiones = {
	password: /^.{6,12}$/ // 4 a 12 digitos.
}

campos = {
	password1: false,
	password2: false
}

validarFormulario = (e) => {
	switch(e.target.name) {
		
		case "password1": 	 	
			validarCampo(expresiones.password, e.target, 'password1');
			validarPassword2();
		break;

		case "password2": 	 	
			validarPassword2();
		break;
	}
}

validarCampo = (expresion, input, campo) => {
	
	if (expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('bi-check-lg');
		document.querySelector(`#grupo__${campo} i`).classList.remove('bi-x-lg');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('bi-x-lg');
		document.querySelector(`#grupo__${campo} i`).classList.remove('bi-check-lg');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

validarPassword2 = () => {
	inputpassword1 = document.getElementById('password1');
	inputpassword2 = document.getElementById('password2');

	if (inputpassword1.value != inputpassword2.value) {
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('bi-x-lg');
		document.querySelector(`#grupo__password2 i`).classList.remove('bi-check-lg');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password2'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('bi-check-lg');
		document.querySelector(`#grupo__password2 i`).classList.remove('bi-x-lg');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password2'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario); 
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	if (campos.password1 && campos.password2){

		var password = document.getElementById('password1').value;
		$.ajax({
			type:"post",
			data: {param:701, password},
			url: "scripts/sistemaMedico.php",
			dataType:'json',
			success: function(respuesta){
				if (respuesta.success == true) {
				
						document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
						setTimeout(() => {
							document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
							$("#contenedor1").load('vista/configuracion/configuracion_usuario.php');
						}, 2000);
				}   else {
						document.getElementById('formulario__mensaje-documento').classList.add('formulario__mensaje-documento-activo');
						setTimeout(() => {
							document.getElementById('formulario__mensaje-documento').classList.remove('formulario__mensaje-documento-activo');
						}, 2000);	
				}
			}
		});


	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		}, 2000);
	}
});