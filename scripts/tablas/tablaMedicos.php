<?php 
       
        include_once '../../db/db.php';

        $conexion = Database::connect();
        $mysqli = $conexion;
        $tabla = array();


        $sql =  "SELECT id, CONCAT (Nombre,' ',Apellido) AS Nombre, Dni, NumeroMatricula, Especialidad,
                        Telefono
                 FROM medicos";

        $stmt = $mysqli->prepare($sql);

        if ($stmt!==FALSE) {
            $stmt->execute();
            $rs = $stmt->get_result();

            if ($rs->num_rows > 0)
            {
                while ($datos = mysqli_fetch_row($rs)){

                    $btnmodificar = '<button class="btn btn-warning btn-circle" onclick="buscarMedico('.$datos[0].');">
                                     <i class="bi bi-gear"></i></button> ';
                    
                    $btneliminar = '<button class="btn btn-danger btn-circle" style="margin-left: 5px;" onclick="eliminarMedico('.$datos[0].');"><i class="far fa-trash-alt"></i></button>';

                   
                    $arr                        = array();
                    $arr['Nombre']              = $datos[1];
                    $arr['Dni']                 = $datos[2];
                    $arr['NumeroMatricula']     = $datos[3];
                    $arr['Especialidad']        = $datos[4];
                    $arr['Telefono']            = $datos[5];
                    $arr['botones']             = $btnmodificar.' '.$btneliminar;
                    $tabla[]                    = $arr;
                }
            }
        }

        $stmt->close();
        echo json_encode(array('data' => $tabla));
 ?>

 