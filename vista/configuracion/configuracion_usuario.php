<link rel="stylesheet" type="text/css" href="css/estilos_configuracion.css">
<link rel="stylesheet" type="text/css" href="css/estilos_formulario.css">
 
  <h3 class="config_usuario">CONFIGURACIÓN DEL USUARIO</h3>
    
    <div class="card configuracion">
    
      <div id="opcion_cambiar-pass" class="card-header">
        <button type="button" class="boton_cambiar-pass"><h5><i class="bi bi-gear"></i> Cambiar Contraseña</h5></button>
      </div>


      <div id="pass_actual" class="card-body">
          <div class="formulario__grupo" id="grupo__password">
              <label for="password" class="formulario__label">Ingrese contraseña actual</label>
                <div class="formulario__grupo-input">
                  <input type="password" class="formulario__input" name="password" id="password" autocomplete="off">
                  <i class="formulario__validacion-estado bi bi-x-lg"></i>
                </div>    
              <p class="formulario__input-error">Contraseña incorrecta.</p>
          </div> 
          <input type="button" id="verificar_pass" value="Verificar" class="btn__verificar">
      </div>

      <div id="cambiar_pass" class="card-body">

        <form id="formulario_pass">    
          <!-- Grupo: Nueva Contraseña -->
          <div class="formulario__grupo" id="grupo__password1">
            <label for="password1" class="formulario__label">Nueva Contraseña</label>
            <div class="formulario__grupo-input">
              <input type="password" class="formulario__input" name="password1" id="password1" autocomplete="off">
              <i class="formulario__validacion-estado bi bi-x-lg"></i>
            </div>
            <p class="formulario__input-error">La contraseña tiene que ser de 6 a 12 dígitos.</p>
          </div>

          <!-- Grupo: Repetir Contraseña -->
          <div class="formulario__grupo" id="grupo__password2">
            <label for="password2" class="formulario__label">Repetir Contraseña</label>
            <div class="formulario__grupo-input">
              <input type="password" class="formulario__input" name="password2" id="password2" autocomplete="off">
              <i class="formulario__validacion-estado bi bi-x-lg"></i>
            </div>
            <p class="formulario__input-error">Las contraseñas no coinciden.</p>
          </div>
         
         <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Contraseña modificada!</p>
          <button type="submit" id="" class="btn__verificar">Aceptar</button> 

        </form>
      
      </div>
    </div>

<script type="text/javascript" src="js/configuracionJS/configuracion.js"></script>
<script type="text/javascript" src="js/configuracionJS/validacion_nueva-pass.js"></script>