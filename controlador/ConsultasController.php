<?php

	Class ConsultasController {

		public function eliminarConsulta($post) {
		
			$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
			$respuesta = array('success'=>false);
			$idConsulta = $post['id'];

			$mysqli->set_charset("utf8");
			$sql = "DELETE FROM atencion_ambulatoria WHERE id = ?";
			$stmt = $mysqli->prepare($sql);
			if ($stmt!==FALSE) {
				$stmt->bind_param('i', $idConsulta);
				$stmt->execute();
				$stmt->close();
				$respuesta = array('success'=>true);	
			}
			
			return json_encode($respuesta);	
		}

		public function datosRecibo($post) {
			
			$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
			$id = $post['id'];

			$sql = "SELECT ClienteNom, ClienteDni, ClienteFecna, ClienteEdad, ClienteDomicilio, ClienteLoc, ClienteProv, ClienteTel, MedicoNom, MedicoEsp, MedicoMat, Diagnostico, PrestacionCod, PrestacionDes, PrestacionCos, Fecha, Hora, Cantidad
					FROM atencion_ambulatoria
					WHERE id = ?";
		
			$stmt = $mysqli->prepare($sql);
		
			if ($stmt!==FALSE) {
				$stmt->bind_param('i', $id);
				$stmt->execute();
				$rs = $stmt->get_result();

				if($rs->num_rows == 1){
		            while($consulta = $rs->fetch_array())
		            {
		                $listaDatos = array();
		                $listaDatos[0] = $consulta[0];
		                $listaDatos[1] = $consulta[1];
		                $listaDatos[2] = $consulta[2];
		                $listaDatos[3] = $consulta[3];
		                $listaDatos[4] = $consulta[4];
		                $listaDatos[5] = $consulta[5];
		                $listaDatos[6] = $consulta[6];
		                $listaDatos[7] = $consulta[7];
		                $listaDatos[8] = $consulta[8];
			            $listaDatos[9] = $consulta[9];
						$listaDatos[10] = $consulta[10];
						$listaDatos[11] = $consulta[11];
						$listaDatos[12] = $consulta[12];
						$listaDatos[13] = $consulta[13];
						$listaDatos[14] = $consulta[14];
						$listaDatos[15] = $consulta[15];
						$listaDatos[16] = $consulta[16];
		          	    $listaDatos[17] = $consulta[17];
		            }

		            //Guardamos los datos en la sesion.
					if (!isset($_SESSION)) {
						session_start();
					}

					$_SESSION['listaDatos'] = $listaDatos;


			    	$respuesta = array('success'=>true, 'datos'=>$listaDatos);			   
			    } else {
					$respuesta = array('success'=>false);	
				}

				$stmt->close();
			}

			return json_encode($respuesta);	
		}
 	}
?>