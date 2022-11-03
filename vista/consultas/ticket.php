<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
	} 	

	if(isset($_SESSION['listaDatos']))
	{
    	$listaDatos = $_SESSION['listaDatos'];
   	}

	$html = '<div id="recibo">
		
			<div class="row">	
	  			  <div id="Nro" class="column">
	  			  	<h6>Fecha: '.$listaDatos[15].'</h6>
					<h6>Hora: '.$listaDatos[16].'</h6>
	  			  </div>
			</div>

			<div>
				<h4>Ticket Orden Medica</h4>
			</div>

			<div>
				<h5>Beneficiario</h5>
			</div>
			
			<div class="row">
				<div id="datoscolumn" class="column">
					<span>Nombre: '.$listaDatos[0].'</span><br>
					<span>Documento: '.$listaDatos[1].'</span><br>
					<span>Fecha Nac: '.$listaDatos[2].'</span><br>
					<span>Edad: '.$listaDatos[3].'</span><br>
				</div>	
				<div id="datoscolumn" class="column">
					<span>Domicilio: '.$listaDatos[4].'</span><br>
					<span>Localidad: '.$listaDatos[5].'</span><br>
					<span>Provincia: '.$listaDatos[6].'</span><br>
					<span>Telefono: '.$listaDatos[7].'</span>
				</div>
			</div>

			<div class="row">
				<div id="datoscolumn" class="column">
					<h5>Prescriptor</h5>
				</div>
				<div id="datoscolumn" class="column">
					<h5>Efector</h5>
				</div>
			</div>

			<div class="row">
				<div id="datoscolumn" class="column">
					<span>Nombre: '.$listaDatos[8].'</span> <br>
					<span>Especialidad: '.$listaDatos[9].'</span><br>
					<span>Numero Matricula: '.$listaDatos[10].'</span><br>
				</div>
				<div id="datoscolumn" class="column">
					<span>Nombre: '.$listaDatos[8].'</span><br>
					<span>Especialidad: '.$listaDatos[9].'</span><br>
					<span>Numero Matricula: '.$listaDatos[10].'</span><br>
				</div>
			</div>
		
			<div>
				<h5>Diagnóstico: </h5><span>'.$listaDatos[11].'</span>
			</div>

			<div>
				<h5>Prestación/es:</h5>
			</div>

			<div id="tabla">	
				<table>
					<thead>
						<tr>
							<th id="codigo">Codigo</th>
							<th id="descripcion">Descripcion</th>
							<th id="cant">Cant</th>
							<th id="coseguro">Coseguro</th>
							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td id="codigo">'.$listaDatos[12].'</td>
							<td id="descripcion">'.$listaDatos[13].'</td>
							<td id="cant">'.$listaDatos[17].'</td>
							<td id="coseguro">'.$listaDatos[14].'</td>
						</tr>
					</tbody>
					<footer>
						<tr id="footer">
							<td></td>
							<td></td>
							<td id="cant">Total</td>
							<td id="coseguro">'.$listaDatos[14] * $listaDatos[17].'</td>
						</tr>
					</footer>
				</table>
			</div>	
		</div>';

?>