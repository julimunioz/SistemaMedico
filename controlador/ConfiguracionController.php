<?php

    Class ConfiguracionController {

        public function verificarPassword($post) {
           
            session_start();
         
            $mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
            $respuesta = array('success'=>false);
            $pass_actual = $post['pass_actual'];

            $sql = "SELECT username, password
                    FROM   usuarios 
                    WHERE  password = ? AND
                           username = ? ";
                           

            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('ss',$pass_actual, $_SESSION['usuario']);
            $stmt->execute();
            $rs = $stmt->get_result();

            if($rs->num_rows == 0){
                $respuesta = array('success'=>false);   
           } else {
                $respuesta = array('success'=>true);
            }
            
            $stmt->close();
            return json_encode($respuesta);
        }

        public function cambiarPassword($post){
            
            session_start();
           
            $password = $post['password'];

            $mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
            $respuesta = array('success'=>false);

            $sql = " UPDATE usuarios
                     SET    password    = ?
                     WHERE  username    = ? ";

            $stmt = $mysqli->prepare($sql);
           
            $stmt->bind_param('ss', $password, $_SESSION['usuario']);
           
            if($stmt->execute()){
                $respuesta = array('success'=>true);
            }
            
            $stmt->close();
            echo json_encode($respuesta);
        }
    }