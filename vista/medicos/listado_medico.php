<!-- Tabla donde muestro la lista de medicos  -->
<div class="card">
	<div class="card-header">
		<h5>Medicos</h5>
	</div>
	<div class="card-body">
		<table class="table table-hover" id="tablaMed">
			<thead>
				<tr>
					<th scope="col">Nombre</th>
					<th scope="col">DNI</th>
					<th scope="col">Telefono</th>
					<th scope="col">Numero Matricula</th>
					<th scope="col">Especialidad</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
		</table>
	</div>
</div>

<!-- Modal donde modifico los medicos  -->

<div class="modal"  id="modal_modificar-medico" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
	        <h5>Modificar Medico</h5>
	        <h5 style="margin-left: 400px;">Nro Med: <span id="idmed"></span></h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      	</div>
     
      <div class="modal-body">
      	<?php require_once'formulario-modificar_medico.php'?>
      </div>
          
    </div>
  </div>
</div>


<!-- Modal donde confirmo antes de eliminar  -->

<div class="modal"  id="modal_eliminar-medico" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header">
	        <h5>Eliminar Medico</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-body">
      	<h6>¿Desea eliminar a <span id="nombre_medico"></span>?</h6>
      </div>

      <div class="modal-footer">
      	<button type="button" id="eliminar_medico" class="btn btn-success" data-bs-dismiss="modal">Continuar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
          
    </div>
  </div>
</div>


<script type="text/javascript" src="js/medicoJS/medico_listado.js"></script>
