 <?php

    Class UbicacionController {

        public function listarProvincias(){

            $mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
            $respuesta = array('success'=>false);

            $listado = array();

            $sql = "SELECT id, Nombre FROM provincias";
            
            $stmt = $mysqli->prepare($sql);
            if ($stmt!==FALSE) {
                $stmt->execute();
                $rs = $stmt->get_result();

                if($rs->num_rows > 0){

                    while($prov = $rs->fetch_array()){
                        $arr = array();
                        $arr['id']         = $prov[0];
                        $arr['Nombre']     = $prov[1];
                        $listado[] = $arr;
                    }
               
                    $respuesta = array('success'=>true, 'provincias'=>$listado);

                }else{
                    $respuesta = array('success'=>true);
                }
        
                $stmt->close();
            }
        
            return json_encode($respuesta);     
        }
    
        public function listarLocalidades($post){

            $mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
            $respuesta = array('success'=>false);
            $prov = $post['prov'];
            $listado = array();

            $sql = "SELECT id, Provincias, Nombre 
                    FROM localidades
                    WHERE Provincias = ?";


            $stmt = $mysqli->prepare($sql);
            if ($stmt!==FALSE) {
                $stmt->bind_param('i', $prov);
                $stmt->execute();
                $rs = $stmt->get_result();

                if($rs->num_rows > 1){

                    while($loc = $rs->fetch_array()){
                        $arr = array();
                        $arr['id']           = $loc[0];
                        $arr['Provincias']   = $loc[1];
                        $arr['Nombre']       = $loc[2];
                        $listado[] = $arr;
                    }
        
                    $respuesta = array('success'=>true, 'localidades'=>$listado);
                }else{
                    $respuesta = array('success'=>true, 'existe'=>'no');
                }
        
                $stmt->close();
            }
        
            return json_encode($respuesta);     
        }

        public function buscarProvincia($post){

            $mysqli = new mysqli ('localhost', 'root', '', 'sistemamedicos'); 
            $respuesta = array('success'=>false);
            $nombre = $post['prov'];

            $sql = "SELECT id
                    FROM   provincias 
                    WHERE  Nombre       = ?";
            
            $stmt = $mysqli->prepare($sql);
            if ($stmt!==FALSE) {
                
                $stmt->bind_param('s', $nombre);
                $stmt->execute();
                $rs = $stmt->get_result();

                if($rs->num_rows == 1){

                    while($prov = $rs->fetch_array()){
                        $id = array();
                        $id['id'] = $prov[0];
                    }
               
                    $respuesta = array('success'=>true, 'provincia'=>$id);

                }

                $stmt->close();
            }
        
            return json_encode($respuesta);       
        }

}