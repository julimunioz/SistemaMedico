/* ACCEDEMOS AL FORMULARIO Y A SUS INPUTS POR SU ID  */

formulario = document.getElementById('formulario');
inputs = document.querySelectorAll('#formulario input'); 

/* EXPRESIONES REGULARES */
expresiones = {
	nombre: /^[A-Za-zÀ-ÿ\s]{3,20}$/, // Letras, espacios y acentos.
	apellido: /^[a-zA-ZÀ-ÿ\s]{3,20}$/, // Letras, espacios y acentos.
	documento: /^\d{7,8}$/, // 7 a 8 numeros.
	telefono: /^[\d\s]{8,14}$/, // 14 numeros.
	calle: /^[A-Za-zÀ-ÿ\s\d]{1,25}$/, // Letras, numeros y espacios.
	numero: /^\d{1,4}$/ // 2 a 4 numeros.
}

/* INDICAMOS EL VALOR FALSE A LOS CAMPOS PARA LUEGO COMPROBAR SI TIENEN DATOS (TRUE) */
campos = {
	nombre: false,
	apellido: false,
	documento: false,
	telefono: false,
	calle: false,
	numero: false,
	generoPaciente: false
}

/* FUNCION 'VALIDAR FORMULARIO':
	Contiene un switch donde recibe el nombre del input a traves del evento e.target.name .
	Para cada caso de input, llama a la funcion 'validarcampo', donde se le pasa tres parametros,
	la expresion regular correspondiente, el input y el nombre del campo.  */

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

	}
}


/* FUNCION 'VALIDAR CAMPO':
	Recibe los tres parametros que enviamos en 'validarformulario' (expresion, input, campo).
	Tenemos una condicional if, donde accede a la expresion a traves del metodo .test que devuelve true o false,
	dependiendo el valor del input que se ingreso y de su respectiva expresion regular.
	En caso de que sea true, accedemos a los id de los grupos que hicimos en el form. para agregarle los estilos 
	de css a traves de clases. 
	Tambien le asignamos al campo el valor true.
	Si la condicion es falsa, se le asigna tambien los estilos css de error y el campo va a continuar en false.
*/

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
		campos[campo] = false
	}
}

/* FUNCION 'VALIDAR GENERO':
	Se accede a los determinados casos de input con el name para agregar y eliminar estilos de validacion al genero.
*/

validarGenero = (e) => {
	switch(e.target.name) {
		
		case "hombre": 	 	
			document.getElementById('genero_hombre').classList.add('genero_seleccionado');
			document.getElementById('genero_mujer').classList.remove('genero_seleccionado');
			document.getElementById('genero_otro').classList.remove('genero_seleccionado');
		break;
		
		case "mujer": 	 	
			document.getElementById('genero_mujer').classList.add('genero_seleccionado');
			document.getElementById('genero_hombre').classList.remove('genero_seleccionado');
			document.getElementById('genero_otro').classList.remove('genero_seleccionado');
		break;
		
		case "otro": 	 	
			document.getElementById('genero_otro').classList.add('genero_seleccionado');
			document.getElementById('genero_hombre').classList.remove('genero_seleccionado');
			document.getElementById('genero_mujer').classList.remove('genero_seleccionado');
		break;
	}
}

/* AGREGAMOS EVENTOS A TODOS LOS INPUTS DEL FORMULARIO. 'CLICK', 'KEYUP' (LEVANTAR TECLA), 
	BLUR (CLICK AFUERA DEL INPUT) */

inputs.forEach((input) => {
	input.addEventListener('click', validarGenero);
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario); 
});


$('#genero_hombre').on('click', function() {
	generoPaciente = "Hombre";
	campos['generoPaciente'] = true;
});

$('#genero_mujer').on('click', function() {
	generoPaciente = "Mujer";
	campos['generoPaciente'] = true;
});

$('#genero_otro').on('click', function() {
	generoPaciente = "Otro";
	campos['generoPaciente'] = true;
});

/* -	Al formulario le asignamos el evento submit.
   - 	'prevent default' me impide enviar los datos por url.
   -	Se realiza una condicion para verificar que todos los campos esten completos y de manera correcta.
   		Si es correcto creamos la variable 'datosPaciente' donde guardamos todos los campos para luego enviar por ajax,
   		y guardarlos en la base de datos.
   		Caso contrario muestra los mensajes de error.
*/

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	 select_day = document.getElementById('selectday');
	 select_month = document.getElementById('selectmonth');
	 select_year = document.getElementById('selectyear');
	 select_prov = document.getElementById('selectProv');
	 select_loc = document.getElementById('selectLoc');

	if (campos.nombre && campos.apellido && campos.documento && campos.telefono && campos.calle && campos.numero && campos.generoPaciente && select_day.value != 0 && select_month.value != 0 &&
		 select_year.value != 0 && select_prov.value != 0 && select_loc.value != 0){


		if (select_day.value < 10) {
			var dianac = 0+select_day.value;
		} else {
			var dianac = select_day.value;
		}

		if (select_month.value < 10) {
			var mesnac = 0+select_month.value;
		} else {
			var mesnac = select_month.value;
		}
		
		var nombrePaciente = document.getElementById('nombrePaciente').value;
		var apellidoPaciente = document.getElementById('apellidoPaciente').value;
		var dniPaciente = document.getElementById('dniPaciente').value;
		var telefonoPaciente = document.getElementById('telefonoPaciente').value;
		var callePaciente = document.getElementById('callePaciente').value;
		var nroPaciente = document.getElementById('nroPaciente').value;
		var yearnac = select_year.value;
		var fecna = dianac+'/'+mesnac+'/'+yearnac;
		var edadPaciente = document.getElementById('edadPaciente').value;
		var provinciaPaciente = $("#selectProv option:selected").text();
		var localidadPaciente = $("#selectLoc option:selected").text();
		

		var datosPaciente = [nombrePaciente, apellidoPaciente, dniPaciente, telefonoPaciente, edadPaciente, generoPaciente, provinciaPaciente, localidadPaciente, callePaciente, nroPaciente, fecna];

		$.ajax({
			type:"post",
			data: {param:200, datosPaciente: datosPaciente},
			url: "scripts/sistemaMedico.php",
			dataType:'json',
			success: function(r){
				if (r.success == true) {
					if (r.opcion == 1) {
						
						document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
							icono.classList.remove('formulario__grupo-correcto');
						});

						document.querySelectorAll('.edad-correcta').forEach((icono) => {
							icono.classList.remove('edad-correcta');
						});

						document.getElementById('genero_mujer').classList.remove('genero_seleccionado');
						document.getElementById('genero_hombre').classList.remove('genero_seleccionado');
						document.getElementById('genero_otro').classList.remove('genero_seleccionado');

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
					alert('Error al cargar el Paciente.')
				}
			}
		});

	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		}, 4000);
	}
});