<?php 
       
        include_once '../../db/db.php';

        $conexion = Database::connect();
        $mysqli = $conexion;
        $tabla = array();


        $sql =  "SELECT id, CONCAT (Nombre,' ',Apellido) AS Nombre, Dni,    FechaNac, Edad, 
                CONCAT (Calle,' ',Nro_Calle) AS Domicilio, Genero
                FROM pacientes";

        $stmt = $mysqli->prepare($sql);

        if ($stmt!==FALSE) {
            $stmt->execute();
            $rs = $stmt->get_result();

            if ($rs->num_rows > 0)
            {
                while ($datos = mysqli_fetch_row($rs)){

                    
                    $btninfo = '<button class="btn btn-primary btn-circle" data-bs-toggle="modal" data-bs-target="#modal_info" onclick="informacionPaciente('.$datos[2].',true);"><i class="bi bi-search"></i></button>';
                    
                    $btnmodificar = '<button class="btn btn-warning btn-circle" style="margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#modal_modificar" onclick="informacionPaciente('.$datos[2].');"><i class="bi bi-gear"></i></button> ';
                    
                    $btneliminar = '<button class="btn btn-danger btn-circle" style="margin-left: 5px;" onclick="eliminarPaciente('.$datos[0].','.$datos[2].');"><i class="far fa-trash-alt"></i></button>';

                   
                    $arr                    = array();
                    $arr['nombre']          = $datos[1];
                    $arr['dni']             = $datos[2];
                    $arr['fechanac']        = $datos[3];
                    $arr['edad']            = $datos[4];
                    $arr['domicilio']       = $datos[5];
                    $arr['genero']          = $datos[6];
                    $arr['botones']         = $btninfo.' '.$btnmodificar.' '.$btneliminar;
                    $tabla[]                = $arr;
                }
            }
        }

        $stmt->close();
        echo json_encode(array('data' => $tabla));

?>