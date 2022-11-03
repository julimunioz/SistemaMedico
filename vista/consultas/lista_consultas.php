<!--Estilos Css-->
<link href="css/estilos_modal-consultas.css" rel="stylesheet" /> 

<!-- Tabla donde muestro la lista de consultas realizadas  -->
	
	<div class="card ">
		<div class="card-header"> 
			<h5>Consultas</h5>
		</div>
		<div class="card-body">
			<table class="table table-hover" id="tablaconsultas">
				<thead>
					<tr>
						<th scope="col">Apellido y Nombre</th>
						<th scope="col">Documento</th>
						<th scope="col">Tipo de Transacción</th>
						<th scope="col">Profesional</th>
						<th scope="col">Fecha de Transacción</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>



<!-- Modal donde confirmo antes de eliminar la consulta -->

<div class="modal"  id="modal_eliminar-consulta" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
       <div class="modal-header">
	        <h6>Detalle de Anulacion</h6>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <div class="modal-body">
      	
      	<!-- info medico -->
      	<div class="card-header medico">
	       	 <h5>
		  	 	Profesional: <span id="nomb_medico"></span>
		      	Especialidad: <span  id="espec_medico"></span>
		     	Matricula: Provincial - <span id="matric_medico"></span>
	      	</h5>
	    </div>

	    <!-- info paciente -->
		<div class="card">
		    <div class="card-body row">
			
				<div class="col-5">
					<h5>Paciente</h5>
					Nombre: <span id="datospac1"></span><br>
					Documento de Identidad: <span id="datospac2"></span><br>
					Fecha de Nacimiento: <span id="datospac3"></span><br>
					Edad: <span id="datospac4"></span><br>
				</div>	
				
				<div class="col-5 infopac2">
				<br>Domicilio: <span id="datospac5"></span><br>
					Localidad: <span id="datospac6"></span><br>
					Provincia: <span id="datospac7"></span><br>
					Telefono: <span id="datospac8"></span>
				</div>
		
			</div>	
		</div>

		<!-- info diagnostico -->
		<div class="card">
		    <div class="card-body">
					<h5>Diagnostico Principal</h5>
					<span id="diagnostico"></span>
			</div>	
		</div>

		<!-- info prestacion -->
		<div class="card">
		    <div class="card-body">
					<h5>Prestaciones</h5>
					<table class="tabla">
						<head>
							<tr id="head">
								<th>Codigo</th>
								<th>Descripcion</th>
								<th>Cant</th>
								<th>Estado</th>
							</tr>
						</head> 
						<body>
							<tr id="tr_pres">
								<td id="codigopres"></td>
								<td id="descripcionpres"></td>
								<td id="cant"></td>
								<td>Consumido</td>
							</tr>	
						</body>
					</table>
			</div>	
		</div>

      </div>

      <div class="modal-footer">
      	<button type="button" id="eliminar_consulta" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> ANULAR</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
      </div>
          
    </div>
  </div>
</div>

<script type="text/javascript" src="js/consultas.js"></script>