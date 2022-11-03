<?php

	Class AtencionController{

		// ESTA FUNCION ME DEVUELVE TODOS LOS DIAGNOSTICOS QUE VOY A MOSTRAR AL REALIZAR UNA CONSULTA MEDICA
		public function listarDiagnosticos(){

			// MYSQLI ABRE UNA CONEXION AL SERVIDOR MYSQL SERVER. CONTIENE LOS SIGUIENTES PARAMETROS.
			// 'localhost'  es el nombre del servidor. 'root' el nombre del usuario. 
			//	en tercer lugar iria una contraseña en caso de tener, y por ultimo el nombre de la bbdd en este caso 'sistemamedicos'
			$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
			
			// LE ASIGNO EL VALOR FALSO A LA RESPUESTA
			$respuesta = array('success'=>false);

			//CREO UNA VARIABLE DE TIPO ARRAY
			$listado = array();

			//CONSULTA A LA BBDD
			$sql = "SELECT id, Descripcion, Codigo FROM diagnostico";
			
			//PREPARA LA SENTENCIA PARA SER EJECUTADA REPETIDAMENTE EFICAZMENTE
			$stmt = $mysqli->prepare($sql);
			
			//CONDICION SI EXISTE UNA SETENCIA
			if ($stmt!==FALSE) {
				
				//EJECUTA UNA CONSULTA
				$stmt->execute();
				
				//OBTIENE LOS RESULTADOS DE LA SETENCIA
				$rs = $stmt->get_result();
				
				//CONDICION SI EXISTE ALGUNA FILA DE RESULTADO
				if($rs->num_rows > 0){

					//FETCH ARRAY GUARDA LOS VALORES EN INDICES NUMERICOS, EN ESTE CASO EN 'DIAG'
		            while($diag = $rs->fetch_array()){
		                
		            	//ALMACENAMOS EN UN ARRAY LOS VALORES OBTENIDOS DE A BBDD
		                $arr = array();
		                $arr['id']         		= $diag[0];
		                $arr['Descripcion']     = $diag[1];
		             	$arr['Codigo']     		= $diag[2];	
		             	$listado[] 				= $arr;
		            }
		       		
		       		//ASIGNAMOS A LA RESPUESTA EL VALOR TRUE Y TAMBIEN EL LISTADO DE LOS DIAGNOSTICOS
					$respuesta = array('success'=>true, 'diagnostico'=>$listado);

				}else{
					$respuesta = array('success'=>true);
				}
				
				//CERRAMOS LA CONEXION A LA BBDD
				$stmt->close();
			}
		
			//RETORNAMOS LA RESPUESTA DE TIPO JSON PARA PODER SER INTERPRETADA POR AJAX
			return json_encode($respuesta);		
		}

		public function buscarDiagnosticos($post){
		
			$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
			$respuesta = array('success'=>false);
			$id = $post['id'];
			
			$sql = "SELECT id, Descripcion, Codigo
					FROM diagnostico 
					WHERE id = ?";
			
			$stmt = $mysqli->prepare($sql);
			if ($stmt!==FALSE) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$rs = $stmt->get_result();

				if($rs->num_rows == 1){

		            while($diagnostico = $rs->fetch_array()){
		                $arr = array();
		                $arr['id']       	 			= $diagnostico[0];
		                $arr['Descripcion']       	 	= $diagnostico[1];
		                $arr['Codigo']		    	 	= $diagnostico[2];
		            }
		       
					$respuesta = array('success'=>true,'datosdiag'=>$arr);

				}else{
					$respuesta = array('success'=>true, 'existe'=>'no');
				}
				$stmt->close();
					
			}
		
			return json_encode($respuesta);		
		}
	
		public function listarPrestaciones(){

			$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
			$respuesta = array('success'=>false);

			$listado = array();

			$sql = "SELECT id, Descripcion, Codigo, Coseguro FROM prestacion";
			
			$stmt = $mysqli->prepare($sql);
			if ($stmt!==FALSE) {
				$stmt->execute();
				$rs = $stmt->get_result();
				 
				if($rs->num_rows > 0){

		            while($prest = $rs->fetch_array()){
		                $arr = array();
		                $arr['id']       		= $prest[0];
		                $arr['Descripcion']     = $prest[1];
		             	$arr['Codigo']     		= $prest[2];	
		             	$arr['Coseguro']   		= $prest[3];	
		             	$listado[] = $arr;
		            }
		       
					$respuesta = array('success'=>true, 'prestaciones'=>$listado);

				}else{
					$respuesta = array('success'=>true);
				}
		
				$stmt->close();
			}
			return json_encode($respuesta);		
		}
	
		public function datosReciboPac($post){

			$datospac = $post['datospac'];

			if (isset($_POST)) {
		
				$datospac1 =  $datospac[0];
				$datospac2 =  $datospac[1];
				$datospac3 =  $datospac[2];
				$datospac4 =  $datospac[3];
				$datospac5 =  $datospac[4];
				$datospac6 =  $datospac[5];
				$datospac7 =  $datospac[6]; 
				$datospac8 =  $datospac[7]; 
				$datospac9 =  $datospac[8];
			}

			$listaDatosPac = array($datospac1, $datospac2, $datospac3, $datospac4, $datospac5, $datospac6, $datospac7, $datospac8, $datospac9);

			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION['listaDatosPac'] = $listaDatosPac;

			header("Location: ../vista/atencion_ambulatoria/recibo.php");

			die();
		}
	
		public function datosReciboMed($post){

			$datosmed = $post['datosmed'];

			if (isset($_POST)) {
			
				$datosmed1 = $datosmed[0];
				$datosmed2 = $datosmed[1];
				$datosmed3 = $datosmed[2];

			}

			$listaDatosMed = array($datosmed1, $datosmed2, $datosmed3);

			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION['listaDatosMed'] = $listaDatosMed;

			header("Location: ../vista/atencion_ambulatoria/recibo.php");

			die();
		}

		public function datosReciboDiag($post){

			$datosdiag = $post['datosdiag'];

			if (isset($_POST)) {
				
				$datosdiag = $datosdiag;
			}

			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION['datosdiag'] = $datosdiag;

			header("Location: ../vista/atencion_ambulatoria/recibo.php");

			die();
			return $datosdiag;
		}

		public function buscarPrestaciones($post){
		
			$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
			$respuesta = array('success'=>false);
			$id = $post['id'];
			
			$sql = "SELECT id, Descripcion, Codigo, Coseguro
					FROM prestacion 
					WHERE id = ?";
			
			$stmt = $mysqli->prepare($sql);
			if ($stmt!==FALSE) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$rs = $stmt->get_result();

				if($rs->num_rows == 1){

		            while($prestacion = $rs->fetch_array()){
		                $arr = array();
		                $arr['id']       	 			= $prestacion[0];
		                $arr['Descripcion']       	 	= $prestacion[1];
		                $arr['Codigo']		    	 	= $prestacion[2];
		            	$arr['Coseguro']		    	= $prestacion[3];
		            }
		       
					$respuesta = array('success'=>true,'datospres'=>$arr);

				}else{
					$respuesta = array('success'=>true, 'existe'=>'no');
				}
				$stmt->close();
					
			}
		
			return json_encode($respuesta);		
		}

		public function datosReciboPres($post){

			$datospres = $post['datospres'];

			if (isset($_POST)) {
				
				$datospres1 = $datospres[0];
				$datospres2 = $datospres[1];
				$datospres3 = $datospres[2];
			}

			$listaDatosPres = array($datospres1, $datospres2, $datospres3);

			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION['listaDatosPres'] = $listaDatosPres;

			header("Location: ../vista/atencion_ambulatoria/recibo.php");

			die();
			return $datospres1;
		}

		public function datosReciboCant($post){

			$cantidad = $post['cantidad'];

			if (isset($_POST)) {
				
				$datoscant = $cantidad;
			}

			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION['datoscant'] = $datoscant;

			header("Location: ../vista/atencion_ambulatoria/recibo.php");

			die();
		}

		public function datosReciboFecha($post){

			$fecha = $post['fecha'];

			if (isset($_POST)) {
				
				$datosfecha = $fecha;
			}

			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION['datosfecha'] = $datosfecha;

			header("Location: ../vista/atencion_ambulatoria/recibo.php");

			die();
		}

		public function datosReciboHora($post){

			$hora = $post['hora'];

			if (isset($_POST)) {
				
				$datoshora = $hora;
			}

			if (!isset($_SESSION)) {
				session_start();
			}

			$_SESSION['datoshora'] = $datoshora;

			header("Location: ../vista/atencion_ambulatoria/recibo.php");

			die();
		}

		public function valoresRecibo($post){
 			
 			$valores_recibo = $post['valores_recibo'];
 			$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
			$respuesta = array('success'=>false);

			var_dump($valores_recibo);
			
			$mysqli->set_charset("utf8");
			
			$sql = "INSERT INTO atencion_ambulatoria (ClienteNom,ClienteDni,ClienteFecna,ClienteEdad,ClienteDomicilio,ClienteLoc,ClienteProv,ClienteTel,MedicoNom,MedicoEsp,MedicoMat,Diagnostico,PrestacionCod,PrestacionDes,PrestacionCos,Fecha,Hora,Cantidad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($sql);
			if ($stmt!==false) {
				$stmt->bind_param('ssssssssssssssssss', $valores_recibo[0], $valores_recibo[1], $valores_recibo[2], $valores_recibo[3], $valores_recibo[4], $valores_recibo[5], $valores_recibo[6], $valores_recibo[7], $valores_recibo[8], $valores_recibo[9], $valores_recibo[10], $valores_recibo[11], $valores_recibo[12], $valores_recibo[13], $valores_recibo[14], $valores_recibo[15], $valores_recibo[16], $valores_recibo[17]);
							
					if($stmt->execute()){
						$respuesta = array('success'=>true);
					}
				
					$stmt->close();
			}
			

			return json_encode($respuesta);
		}
	
		public function buscarPresCod($post){

			$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
			
			$respuesta = array('success'=>false);
			$codigopres = $post['PrestacionCod'];

			$sql = "SELECT Coseguro
					FROM prestacion
					WHERE Codigo = ?";
			
			$stmt = $mysqli->prepare($sql);
			if ($stmt!==FALSE) {
				$stmt->bind_param('s', $codigopres);
				$stmt->execute();
				$rs = $stmt->get_result();

				if($rs->num_rows == 1){

		            while($coseguro = $rs->fetch_array()){
		                $arr = array();
		                $arr['Coseguro'] = $coseguro[0];
 		            }
		       
					$respuesta = array('success'=>true, 'existe'=>'si', 'PrestacionCos'=>$arr);
				}else{
					$respuesta = array('success'=>true, 'existe'=>'no');
				}
				$stmt->close();
			}
			return json_encode($respuesta);		
		}
	
	}
?>