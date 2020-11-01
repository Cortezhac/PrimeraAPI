<?php 
    class Categorias{
        private $id;
        private $nombre;
        private $estado;

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
        
        function setEstado($estado){
            $this->estado = $estado;
        }

        function getEstado(){
            return $this->estado;
        }
    }
?>