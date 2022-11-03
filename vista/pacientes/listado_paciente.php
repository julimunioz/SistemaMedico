<!-- Tabla donde muestro la lista de pacientes  -->
	<div class="card">
		<div class="card-header">
			<h5>Pacientes</h5>
		</div>	
			<div class="card-body">
				<table class="table table-hover" id="tablaPac">
					<thead>
						<tr>
							<th scope="col">Nombre</th>
							<th scope="col">DNI</th>
							<th scope="col">Fecha Nacimiento</th>
							<th scope="col">Edad</th>
							<th scope="col">Domicilio</th>
							<th scope="col">Genero</th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				</div>	
	</div>

<!-- Modal donde muestro la informacion de los pacientes  -->

<div class="modal"  id="modal_info" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><span id="nombrepac"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-sm">
				Documento de Identidad: <span id="datospac1"></span><br>
				Fecha de Nacimiento: <span id="datospac2"></span><br>
				Edad: <span id="datospac3"></span><br>
				Genero: <span id="datospac4"></span>
			</div>	
			<div class="col-sm">
				Domicilio: <span id="datospac5"></span><br>
				Localidad: <span id="datospac6"></span><br>
				Provincia: <span id="datospac7"></span><br>
				Telefono: <span id="datospac8"></span>
			</div>
		</div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal donde modifico los pacientes  -->

<div class="modal"  id="modal_modificar" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header">
	        <h5>Modificar Paciente</h5>
	        <h5 style="margin-left: 400px;">Nro Pac: <span id="idpac"></span></h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-body">
      	<?php require_once'formulario-modificar_paciente.php'?>
      </div>
          
    </div>
  </div>
</div>

<!-- Modal donde confirmo antes de eliminar  -->

<div class="modal"  id="modal_eliminar-paciente" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header">
	        <h5>Eliminar Paciente</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-body">
      	<h6>¿Desea eliminar a <span id="nombre_paciente"></span>?</h6>
      </div>

      <div class="modal-footer">
      	<button type="button" id="eliminar_paciente" class="btn btn-success" data-bs-dismiss="modal">Continuar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
          
    </div>
  </div>
</div>


<script type="text/javascript" src="js/pacienteJS/paciente_listado.js"></script>

    