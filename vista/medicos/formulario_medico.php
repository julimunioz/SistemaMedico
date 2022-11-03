<link rel="stylesheet" type="text/css" href="css/estilos_formulario.css">
 
 <div class="card">
  <div class="card-header">
    <h5>Agregar Medico</h5>
  </div>
  <div class="card-body">

    <form class="formulario" id="formulario_medico">
  
      <!-- Grupo: Nombre -->
          <div class="formulario__grupo" id="grupo__nombre">
            <label for="nombreMedico" class="formulario__label">Nombre</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="nombre" id="nombreMedico" autocomplete="off">
              <i class="formulario__validacion-estado bi bi-x-lg"></i>
            </div>    
            <p class="formulario__input-error">El nombre debe contener solo letras y un maximo de 20 digitos.</p>
          </div> 

      <!-- Grupo: Apellido -->
          <div class="formulario__grupo" id="grupo__apellido">
            <label for="apellidoMedico" class="formulario__label">Apellido</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="apellido" id="apellidoMedico" autocomplete="off">
              <i class="formulario__validacion-estado bi bi-x-lg"></i>
            </div>    
            <p class="formulario__input-error">El apellido debe contener solo letras y de un maximo de 20 digitos.</p>
          </div> 

      <!-- Grupo: Dni -->
          <div class="formulario__grupo" id="grupo__documento">
            <label for="dniMedico" class="formulario__label">Documento</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="documento" id="dniMedico" autocomplete="off">
              <i class="formulario__validacion-estado bi bi-x-lg"></i>
            </div>    
            <p class="formulario__input-error">El dni debe contener solo números y entre 7 a 8 digitos sin puntos ni espacios.</p>
          </div>
      
      <!-- Grupo: Telefono -->
          <div class="formulario__grupo" id="grupo__telefono">
            <label for="telefonoMedico" class="formulario__label">Telefono</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="telefono" id="telefonoMedico" autocomplete="off">
              <i class="formulario__validacion-estado bi bi-x-lg"></i>
            </div>    
            <p class="formulario__input-error">El telefono solo debe contener números y entre 8 a 14 digitos.</p>
          </div> 
   
      <!-- Grupo: Nro Matricula -->
          <div class="formulario__grupo" id="grupo__matricula">
            <label for="matricula" class="formulario__label">Matricula</label>
            <div class="formulario__grupo-input">
              <input type="text" class="formulario__input" name="matricula" id="matricula" autocomplete="off">
              <i class="formulario__validacion-estado bi bi-x-lg"></i>
            </div>    
            <p class="formulario__input-error">La matricula solo debe contener números y 4 digitos.</p>
          </div> 

      <!-- Grupo: Especialidad -->
        <div class="formulario__grupo" id="grupo__especialidad"> 
          <label for="especialidad" class="formulario__label">Especialidad</label>
          <div class="formulario__grupo-input">
            <select class="formulario__select" id="especialidad"></select>
          </div>    
          <p class="formulario__input-error">Error</p>
        </div>

      <!-- Footer -->
          <div class="formulario__mensaje" id="formulario__mensaje">
            <p><i class="bi bi-exclamation-triangle-fill"></i> <b>Error:</b> Completa el formulario correctamente</p>
          </div>

          <div class="formulario__mensaje-documento" id="formulario__mensaje-documento">
            <p><i class="bi bi-exclamation-triangle-fill"></i> <b>Error:</b> DOCUMENTO O MATRICULA EXISTENTES </p>
          </div>

          <div class="formulario__grupo formulario__grupo-btn-aceptar">
            <button type="submit" class="formulario__btn" id="cargarMedico">Registrar</button>
            <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Datos cargados exitosamente!</p>
          </div>
   
    </form>
    </div>
  </div>
    
 <script type="text/javascript" src="js/medicoJS/medico_validacion.js"></script>
 <script type="text/javascript" src="js/medicoJS/medico_formulario.js"></script>














         



    
