<?php

	Class LoginController {

		public function login($post) {
			
			sleep(2);
			session_start();
			$mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
			$respuesta = array('success'=>false);
			$datos = $post['datos_login'];

			$sql = "SELECT username, password
					FROM   usuarios 
					WHERE  username	 = ? AND
						   password  = ?	 ";


			$stmt = $mysqli->prepare($sql);
	        $stmt->bind_param('ss', $datos[0], $datos[1]);
	        $stmt->execute();
	        $rs = $stmt->get_result();

	        if($rs->num_rows == 1){

	       		$usuario = $rs->fetch_array();
	            $arr = array();
	            $arr['username']    	   	= $usuario[0];
	            $arr['password']     		= $usuario[1];

                
				$_SESSION['usuario'] = $arr['username'];
				$respuesta = array('success'=>true);
	        
	        } else {
	        	$respuesta = array('success'=>false);
	        }
			
			$stmt->close();
			return json_encode($respuesta);		
		}

 		public function logout($post){
	           
	        session_start();
	        session_destroy();
	       	$respuesta = array('success'=>true);
 			return json_encode($respuesta);
 		}
 	}
?>