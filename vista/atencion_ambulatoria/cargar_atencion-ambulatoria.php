<!--Estilos Css-->
<link href="css/estilos_atencion-ambulatoria.css" rel="stylesheet" /> 

<!--Tarjeta informativa del paciente-->
<div class="card card_atencion">
	
	<div class="card-header header_atencion">
		<h5 class="card-title">Atencion Ambulatoria 
			<i class="bi bi-calendar3" style="float: right;"> <span id="fecha"></span> 
			<i class="bi bi-three-dots-vertical"></i> 
			<i class="bi bi-stopwatch"></i> <span id="hora"></span></i>
		</h5>
	</div>
		
	<div class="card-body row">
		
		<div class="col-1">
			<img src="imagenes/user.png" class="imagen_user"></img> 
		</div>
		
		<div class="col-5 infopac1">
			<h5><span id="datospac1"></span></h5>
			Documento de Identidad: <span id="datospac2"></span><br>
			Fecha de Nacimiento: <span id="datospac3"></span><br>
			Edad: <span id="datospac4"></span><br>
			Genero: <span id="datospac5"></span>

		</div>	
		
		<div class="col-5 infopac2">
		<br>Domicilio: <span id="datospac6"></span><br>
			Localidad: <span id="datospac7"></span><br>
			Provincia: <span id="datospac8"></span><br>
			Telefono: <span id="datospac9"></span>
		</div>
	
	</div>	
</div>
<br>

<!--Seleccion del medico-->

<div class="card card_atencion" id="tarjeta_medico">

	<div class="card-header" id="header_medico">
		<h5 class="card-title">Selección Médico</h5>
	</div>


	<div class="card-body">
		<button id="buscarmatricula" type="button" class="btn btn-outline-dark btn__med">NUMERO MATRICULA</button>
		<button id="buscarnombremed" type="button" class="btn btn-outline-dark btn__med">NOMBRE Y APELLIDO</button>	
	</div>
		
	<div id="opcion_matricula">
		<div class="card-body ingrese_matricula">
			<input type="text" class="input__atencion" placeholder="Ingrese matricula..." id="ingresematricula" aria-label="Search" autocomplete="off">
		</div>
		<div class="card-footer">
		   <button type="button" class="btn__atencion" id="buscarMatricula">Buscar</button>
		   <button type="button" class="btn__atencion limpiar" id="limpiar">Limpiar</button>
		</div> 
	</div>


	<div id="opcion_nombre">
		<div class="card-body ingrese_nombre">
			<select id="select_medico" style="width: 100%"> </select>
		</div>
	</div>

		
<!-- Modal donde muestro la informacion del medico seleccionado -->

		<div class="modal"  id="modal-medico_seleccionado" tabindex="-1">
		  <div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		       <div class="modal-header">
			        <h5>Medico Seleccionado</h5>
			        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      	</div>
		     
		      <div class="modal-body">
			    <h6><span id="nombremed"></span><br>
			    	<span id="matriculamed"></span></h6> 
			  </div>

		      <div class="modal-footer">
		      	<button type="button" id="cerrar-medico" class="btn btn-success">Continuar</button>
		      </div>
		          
		    </div>
		  </div>
		</div>
</div>	

<!--Tarjeta Medico Seleccionado -->
<div id="medico_seleccionado" class="card card_atencion">

	<div class="card-header card-seleccionado">
		<h5 class="card-title">Medico seleccionado <i class="bi bi-check2-circle"></i></h5>
	</div>

	<div class="card-body">
		Apellido y Nombre:<span class="col-md-4" id="datosmed1" style="padding-right: 30px; padding-left: 5px;"></span>
		Especialidad:<span class="col-md-4" id="datosmed2" style="padding-right: 30px; padding-left: 5px;"></span>
		Matricula Provincial: LA PAMPA<span class="col-md-4" id="datosmed3" style="padding-left: 5px;"></span>
		<button type="button" class="btn__atencion cambiar-medico" id="cambiarmed"><i class="bi bi-search"></i> Cambiar</button>
	</div>
</div>

<br>

<!--Seleccion del diagnostico-->

<div id="diagselect" class="card card_atencion">
	
	<div class="card-header" id="header_diagnostico">
		<h5 class="card-title">Selección Diagnostico</h5>
	</div>
	
	<div class="card-body">
		<select id="selectdiag" style="width: 100%"></select>
	</div>
	
</div>

<!--Diagnostico seleccionado-->
<div id="diagseleccionado" class="card card_atencion">
	<div class="card-header card-seleccionado">
		<h5 class="card-title">Diagnostico Seleccionado <i class="bi bi-check2-circle"></i></h5>
	</div>

	<div class="card-body">
		<div>
		<table class="table table-sm">
			<head>
				<tr>
					<th>Codigo</th>
					<th>Descripcion</th>
					<th></th>
				</tr>
			</head> 
			<body>
				<tr id="tr_diag">
					<td id="codigodiag"></td>
					<td id="descripciondiag"></td>
					<td>
						<button type="button" id="cambiardiag" class="btn__atencion limpiar"><i class="bi bi-trash"></i> Eliminar</button>
					</td>
				</tr>	
			</body>
		</table>
		</div>
	</div>
</div>

<br>

<!--Seleccion de la Prestacion-->

<div id="prestselect" class="card card_atencion">
	<div class="card-header" id="header_prestacion">
		<h5 class="card-title">Selección Prestación</h5>
	</div>
	
	<div class="card-body">
		<select id="selectpres" style="width: 100%"></select>
	</div>
</div>

<!--Prestacion seleccionada-->
<div id="prestseleccionado" class="card card_atencion">
	
	<div class="card-header card-seleccionado">
		<h5 class="card-title">Prestación Seleccionada <i class="bi bi-check2-circle"></i></h5>
	</div>

	<div class="card-body">
		<div>
		<table class="table table-sm">
			<head>
				<tr id="head">
					<th>Codigo</th>
					<th>Descripcion</th>
					<th>Cantidad</th>
					<th></th>
				</tr>
			</head> 
			<body>
				<tr id="tr_pres">
					<td id="codigopres"></td>
					<td id="descripcionpres"></td>
					<td>
						<input id="cant" type="text" value="1">
						<button id="aumentarcant" class="btn btn-outline-secondary" type="button"><i class="bi bi-plus-lg"></i></button>
						<button id="disminuircant" class="btn btn-outline-secondary" type="button"><i class="bi bi-dash-lg"></i></button>
						</div>
					</td>
					<td>
						<button type="button" id="cambiarpres" class="btn__atencion limpiar"><i class="bi bi-trash"></i> Eliminar</button>
					</td>
				</tr>	
			</body>
		</table>
		</div>
	</div>
</div>

<br><button id="validar" class="btn__validar" style="float: right;"><i class="bi bi-check2"></i> Validar</button>

<script type="text/javascript" src="js/atencion_ambulatoria.js"></script>