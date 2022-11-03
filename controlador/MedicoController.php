<?php 
	
Class MedicoController {

	public function cargarMedico($post) {

		$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
		$r = array('success'=>false, 'opcion'=>0);
		$datosMedico = $post['datosMedico'];


		$sql = "SELECT id, Nombre, Apellido, Dni, NumeroMatricula, 	Especialidad, Telefono
				FROM medicos 
				WHERE Dni				= ? OR
					  NumeroMatricula 	= ? ";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ss',$datosMedico[2], $datosMedico[3]);
        $stmt->execute();
        $rs = $stmt->get_result();

        if($rs->num_rows == 0){

			$mysqli->set_charset("utf8");
			$sql = "INSERT INTO medicos (Nombre, Apellido, Dni, NumeroMatricula, Especialidad, Telefono) VALUES (?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($sql);
		
			if ($stmt!==FALSE) {
				$stmt->bind_param('ssssss', $datosMedico[0], $datosMedico[1], $datosMedico[2], $datosMedico[3], $datosMedico[4], $datosMedico[5]);
				$stmt->execute();
				$r = array('success'=>true, 'opcion'=>1);	
			} 
		} else {
			$r = array('success'=>true, 'opcion'=>2);
		} 

		$stmt->close();
		return json_encode($r);	
	}	

	public function eliminarMedico($post) {
		//$error = false;
		$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
		$respuesta = array('success'=>false);
		$idMedico = $post['idMedico'];

		
		$mysqli->set_charset("utf8");
		$sql = "DELETE FROM medicos WHERE id = ?";
		$stmt = $mysqli->prepare($sql);
		if ($stmt!==FALSE) {
			$stmt->bind_param('i', $idMedico);
			$stmt->execute();
			$stmt->close();
			$respuesta = array('success'=>true);	
		}
		
		return json_encode($respuesta);	
	}

	public function buscarMedico($post){
		
		$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
		$respuesta = array('success'=>false);
		$id = $post['id'];

		$sql = "SELECT id, Nombre, Apellido, Dni, NumeroMatricula, 	Especialidad, Telefono
				FROM medicos 
				WHERE id = ?";
		
		$stmt = $mysqli->prepare($sql);
		if ($stmt!==FALSE) {
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$rs = $stmt->get_result();

			if($rs->num_rows == 1){

	            while($medico = $rs->fetch_array()){
	                $arr = array();
	                $arr['id']       	 		= $medico[0];
	                $arr['Nombre']       	 	= $medico[1];
	                $arr['Apellido']    	 	= $medico[2];
	                $arr['Dni']  				= $medico[3];
	                $arr['NumeroMatricula']  	= $medico[4];
	                $arr['Especialidad']  	 	= $medico[5];
	                $arr['Telefono']  	 		= $medico[6];
	            }
	       
				$respuesta = array('success'=>true, 'datosMedicos'=>$arr);

			}else{
				$respuesta = array('success'=>false);
			}
			$stmt->close();
				
		}
	
		return json_encode($respuesta);		
	}
	
	public function buscarMedico_Matricula($post) {
		
		$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
		$respuesta = array('success'=>false);
		$matricula = $post['matricula'];

		$sql = "SELECT Nombre, Apellido, Dni, NumeroMatricula, 	Especialidad
				FROM medicos 
				WHERE NumeroMatricula = ?";
		
		$stmt = $mysqli->prepare($sql);
		if ($stmt!==FALSE) {
			$stmt->bind_param('s', $matricula);
			$stmt->execute();
			$rs = $stmt->get_result();

			if($rs->num_rows == 1){

	            while($medico = $rs->fetch_array()){
	                $arr = array();
	                $arr['Nombre']       	 	= $medico[0];
	                $arr['Apellido']    	 	= $medico[1];
	                $arr['Dni']  				= $medico[2];
	                $arr['NumeroMatricula']  	= $medico[3];
	                $arr['Especialidad']  	 	= $medico[4];
	            }
	       
				$respuesta = array('success'=>true, 'datosMedicos'=>$arr);

			}else{
				$respuesta = array('success'=>false);
			}
			$stmt->close();
				
		}
	
		return json_encode($respuesta);		
	}

	public function llenarMedicos() {
		
		$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
		$respuesta = array('success'=>false);
		$listado = array();

		$sql = "SELECT id, Nombre, Apellido, Dni, NumeroMatricula, Especialidad FROM medicos";
		
		$stmt = $mysqli->prepare($sql);
		if ($stmt!==FALSE) {
			$stmt->execute();
			$rs = $stmt->get_result();
			 
			if($rs->num_rows > 0){

	            while($med = $rs->fetch_array()){
	                $arr = array();
	                $arr['id']        			 = $med[0];
	                $arr['Nombre']         		 = $med[1];
	                $arr['Apellido']        	 = $med[2];
	                $arr['Dni']         		 = $med[3];
	                $arr['NumeroMatricula']      = $med[4];
	                $arr['Especialidad']         = $med[5];
	                $listado[] = $arr;

	            }
	       
				$respuesta = array('success'=>true, 'medicos'=>$listado);

			}else{
				$respuesta = array('success'=>false);
			}
	
			$stmt->close();
		}
	
		return json_encode($respuesta);		
	}

	public function modificarMedicos($post){	
		
        $datosMedico = $post['datosMedico'];
        $idMed = $datosMedico[0];
      	$respuesta = array('success'=>false);

        $mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
      

		$sql = " UPDATE medicos	
				 SET 	Nombre 				= ?,
					 	Apellido 			= ?, 
					 	Dni        			= ?, 
					 	NumeroMatricula 	= ?, 
					 	Especialidad 		= ?, 
					 	Telefono		 	= ? 
				 WHERE  id 					= ? ";

        $stmt = $mysqli->prepare($sql);
       
	    $stmt->bind_param('ssssssi', $datosMedico[1], $datosMedico[2], $datosMedico[3],	$datosMedico[4], $datosMedico[5], 								 $datosMedico[6], $idMed);
       
        if($stmt->execute()){
            $respuesta = array('success'=>true);
        }
        
        $stmt->close();
        echo json_encode($respuesta);
 	}

	public function llenarEspecialidades() {
        
        $mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
        $respuesta = array('success'=>false);

        $listado = array();

        $sql = "SELECT id, Nombre FROM especialidades";
        
        $stmt = $mysqli->prepare($sql);
        if ($stmt!==FALSE) {
            $stmt->execute();
            $rs = $stmt->get_result();

            if($rs->num_rows > 0){

                while($esp = $rs->fetch_array()){
                    $arr = array();
                    $arr['id']         = $esp[0];
                    $arr['Nombre']     = $esp[1];
                    $listado[] = $arr;
                }
           
                $respuesta = array('success'=>true, 'especialidades'=>$listado);

            }else{
                $respuesta = array('success'=>true);
            }
    
            $stmt->close();
        }
    
        return json_encode($respuesta);   
    }  



}




?>