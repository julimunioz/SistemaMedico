 <?php

Class PacienteController {

	public function cargarPaciente($post) {
		
		$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
		$respuesta = array('success'=>false, 'opcion'=>0);
		$datosPaciente = $post['datosPaciente'];

		$sql = "SELECT Dni
				FROM   pacientes 
				WHERE  Dni				= ? ";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $datosPaciente[2]);
        $stmt->execute();
        $rs = $stmt->get_result();

        if($rs->num_rows == 0){

			$mysqli->set_charset("utf8");
			$nombrepac = ucwords ($datosPaciente[0]);
			$apellido = ucwords ($datosPaciente[1]);
			
			$sql = "INSERT INTO pacientes (Nombre, Apellido, Dni, Telefono, Edad, Genero, Provincia, Localidad, 				Calle, Nro_Calle, FechaNac) 
					VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			
			$stmt = $mysqli->prepare($sql);
			
			if ($stmt!==false) {
				$stmt->bind_param('sssssssssss', $nombrepac, $apellido, $datosPaciente[2], 													 $datosPaciente[3], $datosPaciente[4], $datosPaciente[5], 									 $datosPaciente[6], $datosPaciente[7], $datosPaciente[8], 									 $datosPaciente[9], $datosPaciente[10]);
				$stmt->execute();	
				$respuesta = array('success'=>true, 'opcion'=>1);	
			} 
		} else {$respuesta = array('success'=>true, 'opcion'=>2);}
		
		$stmt->close();
		return json_encode($respuesta);	
	}

	public function eliminarPaciente($post) {
		//$error = false;
		$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
		$respuesta = array('success'=>false);
		$idPaciente = $post['idPaciente'];

		
		$mysqli->set_charset("utf8");
		$sql = "DELETE FROM pacientes WHERE id = ?";
		$stmt = $mysqli->prepare($sql);
		if ($stmt!==FALSE) {
			$stmt->bind_param('i', $idPaciente);
			$stmt->execute();
			$stmt->close();
			$respuesta = array('success'=>true);	
		}
		
		return json_encode($respuesta);	
	}

	public function modificarPaciente($post){
		
	    
        $datosPaciente = $post['datosPaciente'];
        $idPac = $datosPaciente[0];
      

        $mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
        $arr['success'] = false;
        $nombrepac = ucwords ($datosPaciente[1]);
		$apellido = ucwords ($datosPaciente[2]);

		$sql = " UPDATE pacientes
				 SET Nombre 	= ?,
				 	 Apellido 	= ?, 
				 	 Dni        = ?, 
				 	 Telefono 	= ?, 
				 	 Edad 		= ?, 
				 	 Genero 	= ?, 
				 	 Provincia 	= ?, 
				 	 Localidad 	= ?, 
				 	 Calle 		= ?, 
				 	 Nro_Calle 	= ?, 
				 	 FechaNac 	= ? 
				 WHERE id 		= ? ";

        $stmt = $mysqli->prepare($sql);
       
        $stmt->bind_param('sssssssssssi', $nombrepac, $apellido, $datosPaciente[3], $datosPaciente[4],$datosPaciente[5], $datosPaciente[6], $datosPaciente[7], $datosPaciente[8], $datosPaciente[9], 
        	$datosPaciente[10], $datosPaciente[11], $idPac);
       
        if($stmt->execute()){
            $arr['success'] = true;
        }
        
        $stmt->close();
        echo json_encode($arr);
 	}

	public function buscarPacienteDni($post) {
		
		$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
		$respuesta = array('success'=>false);
		$dni = $post['dni'];

		$sql = "SELECT id, Nombre, Apellido, Dni, Telefono, Edad, Genero, Provincia, Localidad, Calle, Nro_Calle, FechaNac
		 		FROM pacientes 
				WHERE Dni = ?";
		
		$stmt = $mysqli->prepare($sql);
		if ($stmt!==FALSE) {
			$stmt->bind_param('s', $dni);
			$stmt->execute();
			$rs = $stmt->get_result();

			if($rs->num_rows == 1){

	            while($paciente = $rs->fetch_array()){
	                $arr = array();
	                $arr['id']    	   = $paciente[0];
	                $arr['Nombre']     = $paciente[1];
	                $arr['Apellido']   = $paciente[2];
	                $arr['Dni']        = $paciente[3];
	                $arr['Telefono']   = $paciente[4];
	                $arr['Edad']       = $paciente[5];
	                $arr['Genero']     = $paciente[6];
	                $arr['Provincia']  = $paciente[7];
	                $arr['Localidad']  = $paciente[8];
	                $arr['Calle']  	   = $paciente[9];
	                $arr['Nro_Calle']  = $paciente[10];
	                $arr['FechaNac']    = $paciente[11];
                }
	       
				$respuesta = array('success'=>true,'datosPaciente'=>$arr);

			}else{
				$respuesta = array('success'=>false);
			}
			$stmt->close();
				
		}
	
		return json_encode($respuesta);		
	}

	public function buscarPacienteNom($post) {
		
		$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
		$respuesta = array('success'=>false);
		$nombre = $post['nombre'];
		
		$sql = "SELECT id, Nombre, Apellido, Dni, Telefono, Domicilio, FechaNac, Edad, Genero, Provincia, Localidad
				FROM clientes 
				WHERE Nombre = ?";
		
		$stmt = $mysqli->prepare($sql);
		if ($stmt!==FALSE) {
			$stmt->bind_param('s', $nombre);
			$stmt->execute();
			$rs = $stmt->get_result();

			if($rs->num_rows == 1){

	            while($paciente = $rs->fetch_array()){
	                $arr = array();
	                $arr['id']         = $paciente[0];
	                $arr['Nombre']     = $paciente[1];
	                $arr['Apellido']   = $paciente[2];
	                $arr['Dni']        = $paciente[3];
	                $arr['Telefono']   = $paciente[4];
	                $arr['Domicilio']  = $paciente[5];
	                $arr['FechaNac']   = $paciente[6];
	                $arr['Edad']       = $paciente[7];
	                $arr['Genero']     = $paciente[8];
	                $arr['Provincia']  = $paciente[9];
	                $arr['Localidad']  = $paciente[10];

	          
	            }
	       
				$respuesta = array('success'=>true, 'existe'=>'si', 'datosPaciente'=>$arr);

			}else{
				$respuesta = array('success'=>true, 'existe'=>'no');
			}
			$stmt->close();
				
		}
	
		return json_encode($respuesta);		
	}
}

?>