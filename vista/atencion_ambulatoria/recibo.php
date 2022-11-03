<?php
	
	//TICKET

	
	//CREAMOS LA SESION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
	} 	

	//RECIBIMOS TODOS LOS DATOS DE LAS SESIONES
	if(isset($_SESSION['listaDatosPac']) and isset($_SESSION['listaDatosMed']) and isset($_SESSION['datosdiag']) and isset($_SESSION['listaDatosPres']) and isset($_SESSION['datoscant']) and isset($_SESSION['datosfecha']) and isset($_SESSION['datoshora']))
    	{	
    		//LOS GUARDAMOS EN VARIABLES 
        	$listaDatosPac = $_SESSION['listaDatosPac'];
          	$listaDatosMed = $_SESSION['listaDatosMed'];
    		$datosdiag = $_SESSION['datosdiag'];
    		$listaDatosPres = $_SESSION['listaDatosPres'];
    		$datoscant = $_SESSION['datoscant'];
	   		$datosfecha = $_SESSION['datosfecha'];
	   		$datoshora = $_SESSION['datoshora'];

	   	}
 
	//ESTA VARIABLE CONTIENE TODA LA PLANTILLA HTML DEL TICKET QUE LUEGO SERA LLAMADA DESDE UN GENERADOR PDF

	$html = '<div id="recibo">
		
			<div class="row">	
	  			  <div id="Nro" class="column">
	  			  	<h6>Fecha: '.$datosfecha.'</h6>
					<h6>Hora: '.$datoshora.'</h6>
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
					<span>Nombre: '.$listaDatosPac[0].'</span><br>
					<span>Documento: '.$listaDatosPac[1].'</span><br>
					<span>Fecha Nac: '.$listaDatosPac[2].'</span><br>
					<span>Edad: '.$listaDatosPac[3].'</span><br>
				</div>	
				<div id="datoscolumn" class="column">
					<span>Domicilio: '.$listaDatosPac[5].'</span><br>
					<span>Localidad: '.$listaDatosPac[6].'</span><br>
					<span>Provincia: '.$listaDatosPac[7].'</span><br>
					<span>Telefono: '.$listaDatosPac[8].'</span>
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
					<span>Nombre: '.$listaDatosMed[0].'</span> <br>
					<span>Especialidad: '.$listaDatosMed[1].'</span><br>
					<span>Numero Matricula: '.$listaDatosMed[2].'</span><br>
				</div>
				<div id="datoscolumn" class="column">
					<span>Nombre: '.$listaDatosMed[0].'</span><br>
					<span>Especialidad: '.$listaDatosMed[1].'</span><br>
					<span>Numero Matricula: '.$listaDatosMed[2].'</span><br>
				</div>
			</div>
		
			<div>
				<h5>Diagnóstico: </h5><span>'.$datosdiag.'</span>
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
							<td id="codigo">'.$listaDatosPres[0].'</td>
							<td id="descripcion">'.$listaDatosPres[1].'</td>
							<td id="cant">'.$datoscant.'</td>
							<td id="coseguro">'.$listaDatosPres[2].'</td>
						</tr>
					</tbody>
					<footer>
						<tr id="footer">
							<td></td>
							<td></td>
							<td id="cant">Total</td>
							<td id="coseguro">'.$listaDatosPres[2] * $datoscant.'</td>
						</tr>
					</footer>
				</table>
			</div>	
		</div>';

?>