<?php 
class Usuarios{
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $usuario;
    private $clave;
    private $tipo;
    private $estado;
    private $pregunta;
    private $respuesta;
    private $fechaRegistro;

    function __construct(){
        
    }

    function setId($id){
        $this->id = $id;
    }

    function getId(){
        return $this->id;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setAppellido($apellido){
        $this->apellido = $apellido;
    }

    function getApellido(){
        return $this->apellido;
    }

    function setCorreo($correo){
        $this->correo = $correo;
    }

    function getCorreo(){
        return $this->correo;
    }
    
    function getUsuario(){
        return $this->usuario;
    }

    function setUsuario($usuario){
       $this->usuario = $usuario;
    }
    
    function getClave(){
        return $this->clave;
    }

    function setClave($clave){
        $this->clave = $clave;
    }
    
    function getTipo(){
        return $this->tipo;
    }

    function setTipo($tipo){
        $this->tipo = $tipo;
    }
    
    function getEstado(){
        return $this->estado;
    }

    function setEstado($estado){
        $this->estado = $estado;
    }
    
    function getPregunta(){
        return $this->pregunta;
    }

    function setPregunta($pregunta){
        $this->pregunta = $pregunta;
    }
    
    function getRespuesta(){
        return $this->respuesta;
    }

    function setRespuesta($respuesta){
        $this->respuesta = $respuesta;
    }
    
    function getFechaRegistro(){
        return $this->fechaRegistro;
    }

    function setFechaRegistro($fechaRegistro){
        $this->fechaRegistro = $fechaRegistro;
    }
    
}

?>