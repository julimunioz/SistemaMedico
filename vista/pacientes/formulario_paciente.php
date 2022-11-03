<!-- ESTILOS DEL FORMULARIO -->
<link rel="stylesheet" type="text/css" href="css/estilos_formulario.css">

<div class="card">
  <div class="card-header">
    <h5>Agregar Paciente</h5>
  </div>
  
  <div class="card-body">
    <form class="formulario" id="formulario">
  
  <!-- Grupo: Nombre -->
      <div class="formulario__grupo" id="grupo__nombre">
        <label for="nombrePaciente" class="formulario__label">Nombre</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="nombre" id="nombrePaciente" autocomplete="off">
          <i class="formulario__validacion-estado bi bi-x-lg"></i>
        </div>    
        <p class="formulario__input-error">El nombre debe contener solo letras y un maximo de 20 digitos.</p>
      </div> 

  <!-- Grupo: Apellido -->
      <div class="formulario__grupo" id="grupo__apellido">
        <label for="apellidoPaciente" class="formulario__label">Apellido</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="apellido" id="apellidoPaciente" autocomplete="off">
          <i class="formulario__validacion-estado bi bi-x-lg"></i>
        </div>    
        <p class="formulario__input-error">El apellido debe contener solo letras y de un maximo de 20 digitos.</p>
      </div> 

  <!-- Grupo: Dni -->
      <div class="formulario__grupo" id="grupo__documento">
        <label for="dniPaciente" class="formulario__label">Documento</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="documento" id="dniPaciente" autocomplete="off">
          <i class="formulario__validacion-estado bi bi-x-lg"></i>
        </div>    
        <p class="formulario__input-error">El dni debe contener solo números y entre 7 a 8 digitos sin puntos ni espacios.</p>
      </div>

  <!-- Grupo: Telefono -->
      <div class="formulario__grupo" id="grupo__telefono">
        <label for="telefonoPaciente" class="formulario__label">Telefono</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="telefono" id="telefonoPaciente" autocomplete="off">
          <i class="formulario__validacion-estado bi bi-x-lg"></i>
        </div>    
        <p class="formulario__input-error">El telefono solo debe contener números y entre 8 a 14 digitos.</p>
      </div> 

  <!-- Grupo: Domicilio -->
        <div class="row">            
           <div class="col-sm">
            <div class="formulario__grupo" id="grupo__calle">
              <label for="CallePaciente" class="formulario__label">Calle</label>
              <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="calle" id="callePaciente" autocomplete="off">
                <i class="formulario__validacion-estado bi bi-x-lg"></i>
              </div>    
              <p class="formulario__input-error">La calle solo puede contener letras, numeros, espacios y un maximo de 25 digitos.</p>
            </div>
          </div>

          <div class="col-sm">
            <div class="formulario__grupo" id="grupo__numero">
              <label for="NroPaciente" class="formulario__label">Nro</label>
              <div class="formulario__grupo-input">
                <input type="text" class="formulario__input" name="numero" id="nroPaciente" autocomplete="off">
                <i class="formulario__validacion-estado bi bi-x-lg"></i>
              </div>    
              <p class="formulario__input-error">Solo números y un maximo de 4 digitos.</p>
            </div>
        </div>
      </div> 

  <!-- Grupo: Fecha Nacimiento -->
      <div class="formulario__grupo" id="grupo__fecna">
        <label for="fecnaPaciente" class="formulario__label">Fecha Nacimiento</label>
        <div class="formulario__grupo-input row">
          <div class="col-sm"><select class="formulario__select" id="selectday"></select></div>
          <div class="col-sm"><select class="formulario__select" id="selectmonth"></select></div>
          <div class="col-sm"><select class="formulario__select" id="selectyear"></select></div>
        </div>    
        <p class="formulario__input-error">Fecha Incorrecta</p>
      </div> 

  <!-- Grupo: Edad -->
      <div class="formulario__grupo" id="grupo__edad"> 
        <label for="edadPaciente" class="formulario__label">Edad</label>
        <div class="formulario__grupo-input">
          <input type="text" class="formulario__input" name="edad" id="edadPaciente" disabled>
          <i class="validacion_edad-estado bi bi-check-lg"></i>
        </div>    
        <p class="formulario__input-error">Complete correctamente la fecha de nacimiento.</p>
      </div>

  <!-- Grupo: Genero -->
      <div class="formulario__grupo" id="grupo__genero">
        
        <label for="generoPaciente" class="formulario__label">Genero</label>
       
        <div class="row">
          <div class="col-sm">
           <input type="radio" class="btn-check" name="hombre" id="hombre" autocomplete="off">
            <label class="btn btn-outline-dark" id="genero_hombre" for="hombre">HOMBRE</label>
          </div>
          
          <div class="col-sm">
            <input type="radio" class="btn-check" name="mujer" id="mujer" autocomplete="off">
            <label class="btn btn-outline-dark" id="genero_mujer" for="mujer">MUJER</label>
          </div>
          
          <div class="col-sm">
            <input type="radio" class="btn-check" name="otro" id="otro" autocomplete="off">
            <label class="btn btn-outline-dark" id="genero_otro" for="otro">OTRO</label>
          </div>
        </div>
        
        <p class="formulario__input-error">Genero Incorrecto</p>
      </div> 

  <!-- Grupo: Provincia -->
      <div class="formulario__grupo" id="grupo__provincia"> 
        <label for="selectProv" class="formulario__label">Provincia</label>
        <div class="formulario__grupo-input">
          <select class="formulario__select" id="selectProv"></select>
        </div>    
        <p class="formulario__input-error">Error</p>
      </div>

  <!-- Grupo: Localidad -->
      <div class="formulario__grupo" id="grupo__localidad"> 
        <label for="selectLoc" class="formulario__label">Localidad</label>
        <div class="formulario__grupo-input">
          <select class="formulario__select" id="selectLoc"></select>
        </div>    
        <p class="formulario__input-error">Error</p>
      </div>

  <!-- Footer -->
      <div class="formulario__mensaje" id="formulario__mensaje">
        <p><i class="bi bi-exclamation-triangle-fill"></i> <b>Error:</b> Completa el formulario correctamente</p>
      </div>
     
          <div class="formulario__mensaje-documento" id="formulario__mensaje-documento">
            <p><i class="bi bi-exclamation-triangle-fill"></i> <b>Error:</b> DOCUMENTO EXISTENTE </p>
          </div>
     
      <div class="formulario__grupo formulario__grupo-btn-aceptar">
        <button type="submit" class="formulario__btn" id="cargarPaciente">Registrar</button>
        <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Datos cargados exitosamente!</p>
      </div>

    </form>
  </div>
</div>

<!-- SCRIPT DE JS -->
<script type="text/javascript" src="js/pacienteJS/paciente_formulario.js"></script>
<script type="text/javascript" src="js/pacienteJS/paciente_validacion-agregar.js"></script>
  
  