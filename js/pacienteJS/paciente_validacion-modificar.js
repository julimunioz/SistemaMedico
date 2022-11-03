formulario = document.getElementById('formulario-modificar');
inputs = document.querySelectorAll('#formulario-modificar input'); 

/* EXPRESIONES REGULARES */
expresiones = {
	nombre: /^[A-Za-zÀ-ÿ\s]{3,20}$/, // Letras, espacios y acentos.
	apellido: /^[a-zA-ZÀ-ÿ\s]{3,20}$/, // Letras, espacios y acentos.
	documento: /^\d{7,8}$/, // 7 a 8 numeros.
	telefono: /^[\d\s]{10,14}$/, // 14 numeros.
	calle: /^[A-Za-zÀ-ÿ\s\d]{1,25}$/, // Letras, numeros y espacios.
	numero: /^\d{1,4}$/, // 2 a 4 numeros.
	edad: /^\d{1,3}$/, // 1 a 3 numeros.
	fecna: /^[\d\/]{10}$/ // 10 numeros y cualquier caracter.
}

campos = {
	nombre: true,
	apellido: true,
	documento: true,
	telefono: true,
	calle: true,
	numero: true,
	edad: true,
	fecna: true,
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
		
		case "calle": 	 	
			validarCampo(expresiones.calle, e.target, 'calle');
		break;

		case "numero": 	 	
			validarCampo(expresiones.numero, e.target, 'numero');
		break;

		case "edad": 	 	
			validarCampo(expresiones.edad, e.target, 'edad');
		break;

		case "fecna": 	 	
			validarCampo(expresiones.fecna, e.target, 'fecna');
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

	 genero = document.getElementById('generoPaciente');
	
	if (campos.nombre && campos.apellido && campos.documento && campos.telefono && campos.calle && campos.numero &&
		 campos.edad && campos.fecna && genero.value != 0){

		var nombrePaciente = document.getElementById('nombrePaciente').value;
		var apellidoPaciente = document.getElementById('apellidoPaciente').value;
		var dniPaciente = document.getElementById('dniPaciente').value;
		var telefonoPaciente = document.getElementById('telefonoPaciente').value;
		var callePaciente = document.getElementById('callePaciente').value;
		var nroPaciente = document.getElementById('nroPaciente').value;
		var fecna = document.getElementById('fecnaPaciente').value;
		var edadPaciente = document.getElementById('edadPaciente').value;
		var generoPaciente = genero.value;
		var provinciaPaciente = $("#selectProv option:selected").text();
		var localidadPaciente = $("#selectLoc option:selected").text();
		var idPaciente = $('#idpac').text();
		var datosPaciente = [idPaciente, nombrePaciente, apellidoPaciente, dniPaciente, telefonoPaciente, edadPaciente, generoPaciente, provinciaPaciente, localidadPaciente, callePaciente, nroPaciente, fecna];

		$.ajax({
			type:"post",
			data: {param: 202, datosPaciente},
			url: "scripts/sistemaMedico.php",
			dataType:'json',
			success: function(respuesta){
				if (respuesta.success == true) {
					tablaPacientes.ajax.reload();
				}else{
					alert('Error al modificar');
				}
			}
		});
			
		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
			$('#modal_modificar').modal('hide');
		}, 2000);
	
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		}, 2000);
	}
});