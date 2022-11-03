formulario = document.getElementById('formulario_medico');
inputs = document.querySelectorAll('#formulario_medico input'); 

/* EXPRESIONES REGULARES */
expresiones = {
	nombre: /^[A-Za-zÀ-ÿ\s]{3,20}$/, // Letras, espacios y acentos.
	apellido: /^[a-zA-ZÀ-ÿ\s]{3,20}$/, // Letras, espacios y acentos.
	documento: /^\d{7,8}$/, // 7 a 8 numeros.
	telefono: /^[\d\s]{8,14}$/, // 14 numeros.
	matricula: /^\d{4}$/, // 2 a 4 numeros.
}

campos = {
	nombre: false,
	apellido: false,
	documento: false,
	telefono: false,
	matricula: false
}

validarFormulario = (e) => {
	switch(e.target.name) {
		
		case "nombre": 	 	
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		
		case "apellido": 	 	
			validarCampo(expresiones.apellido, e.target, 'apellido');
		break;
		
		case "documento": 	 	
			validarCampo(expresiones.documento, e.target, 'documento');
		break;
		
		case "telefono": 	 	
			validarCampo(expresiones.telefono, e.target, 'telefono');
		break;
		
		case "matricula": 	 	
			validarCampo(expresiones.matricula, e.target, 'matricula');
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

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario); 
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	especialidad = document.getElementById('especialidad');

	if (campos.nombre && campos.apellido && campos.documento && campos.telefono && campos.matricula && especialidad.value != 0){

		var nombreMedico = document.getElementById('nombreMedico').value;
		var apellidoMedico = document.getElementById('apellidoMedico').value;
		var dniMedico = document.getElementById('dniMedico').value;
		var telefonoMedico = document.getElementById('telefonoMedico').value;
		var matricula = document.getElementById('matricula').value;
		var especialidad = $("#especialidad option:selected").text();

		var datosMedico = [nombreMedico, apellidoMedico, dniMedico, matricula, especialidad, telefonoMedico];

		$.ajax({
			type:"post",
			data: {param:300, datosMedico: datosMedico},
			url: "scripts/sistemaMedico.php",
			dataType:'json',
			success: function(r){
				if (r.success == true) {
					if (r.opcion == 1) {
						
						document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
							icono.classList.remove('formulario__grupo-correcto');
						});

						document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
						setTimeout(() => {
							document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
						}, 2000);
						
						formulario.reset();
					
					} else if (r.opcion == 2) {
						document.getElementById('formulario__mensaje-documento').classList.add('formulario__mensaje-documento-activo');
						setTimeout(() => {
							document.getElementById('formulario__mensaje-documento').classList.remove('formulario__mensaje-documento-activo');
						}, 2000);
					}	
				} else {
					alert('Error al cargar el Medico.')
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