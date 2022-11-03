<?php 
       
        include_once '../../db/db.php';

        $conexion = Database::connect();
        $mysqli = $conexion;
        $tabla = array();


        $sql = "SELECT id, ClienteNom, ClienteDni, MedicoNom, MedicoMat, Fecha, Hora
                 FROM atencion_ambulatoria";
        
        $stmt = $mysqli->prepare($sql);

        if ($stmt!==FALSE) {
            $stmt->execute();
            $rs = $stmt->get_result();

            if ($rs->num_rows > 0)
            {
                while ($datos = mysqli_fetch_row($rs)){

                    
                    $btninfo = '<button class="btn btn-primary btn-circle" 
                                onclick="datosRecibo('.$datos[0].');"><i class="bi bi-filetype-pdf"></i></button>';

                    $btneliminar = '<button class="btn btn-danger btn-circle" style="margin-left: 5px;" onclick="eliminarConsulta('.$datos[0].');"><i class="far fa-trash-alt"></i></button>';
                   
                    $arr                        = array();
                    $arr['nombre_pac']          = $datos[1];
                    $arr['dni_pac']             = $datos[2];
                    $arr['transaccion']         = 'Atencion Ambulatoria';
                    $arr['datos_med']           = $datos[4].' - '.$datos[3];
                    $arr['fecha-hora']          = $datos[5].' - '.$datos[6];
                    $arr['botones']             = $btninfo.' '.$btneliminar;
                    $tabla[]                    = $arr;
                }
            }
        }

        $stmt->close();
        echo json_encode(array('data' => $tabla));

?>