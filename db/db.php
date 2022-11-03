<?php
//parametros para hacer la conexion a la base de datos.
class Database
{
    public static function connect()
    {
       $conexion = new mysqli('localhost', 'root', '', 'sistemamedicos');
       $conexion->query("SET NAMES 'utf8'");
       return $conexion;
    }
}