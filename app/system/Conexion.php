<?php 
class Conexion{
    private $conexion;
    private $host = "mysql:host=localhost;dbname=bd_tienda";
    private $usuario = "root";
    private $pass = ""; 

    function __construct(){
        try{
            $this->conexion = new PDO($this->host, $this->usuario, $this->pass);
        }catch(PDOException $ex){
            echo $ex->getMessage();
        }
    }

    function getConexion(){
        return $this->conexion;
    }
}
?>