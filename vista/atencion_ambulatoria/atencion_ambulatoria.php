<link rel="stylesheet" type="text/css" href="css/estilos_atencion-ambulatoria.css">

<!-- Tarjeta donde busco el paciente por su dni -->

<div class="card" id="card_buscarPac">
			
		<div class="card-header" >
			<h5 class="card-title">Atencion Ambulatoria</h5>
		</div>
  	
  	
  	<div class="card-body">
			<input type="text" class="input__atencion" placeholder="Ingrese documento..." id="dniPaciente" aria-label="Search" autocomplete="off">
		</div>	
		

		<div class="card-footer">
			 <button type="button" class="btn__atencion" id="buscarPaciente">Buscar</button>
			 <button type="button" class="btn__atencion limpiar" id="limpiar">Limpiar</button>
		</div>
</div>

		
<!-- Modal donde muestro la informacion del paciente seleccionado -->

<div class="modal"  id="modal_buscarPac" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header">
	        <h5>Paciente Seleccionado</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-body">
      	<h6><span id="infopac"></span></h6>
      	
      	<div id="diferido">
					<label  class="form-check-label" for="paciente_diferido">¿Es diferido?</label>
					<input  class="form-check-input" type="checkbox" id="paciente_diferido">
					<input  type="text" id="fecha_diferido">
				</div>		 		
	    </div>

      <div class="modal-footer">
      	<button type="button" id="continuarconsulta" class="btn btn-success">Continuar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
          
    </div>
  </div>
</div>


<script type="text/javascript" src="js/atencion_ambulatoria.js"></script>


