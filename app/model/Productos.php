<?php

class Productos{
    private $idProducto;
    private $nomProducto;
    private $desProducto;
    private $stock;
    private $precio;
    private $unidadMedida;
    private $estado;
    private $categoriaId;
    private $categoriaProducto;
    private $fechaEntrada;

    function __construct(){
        
    }

    function setIdProducto($idProducto){$this->idProducto = $idProducto;}
    function getIdProducto(){return $this->idProducto;}

    function setNombre($nomProducto){$this->nomProducto = $nomProducto;}
    function getNombre(){return $this->nomProducto;}

    function setDescripcion($desProducto){$this->desProducto = $desProducto;}
    function getDescripcion(){return $this->desProducto;}

    function setStock($stock){$this->stock = $stock;}
    function getStock(){return $this->stock;}

    function setPrecio($precio){$this->precio = $precio;}
    function getPrecio(){return $this->precio;}

    function setUnidadMedida($unidadMedida){$this->unidadMedida = $unidadMedida;}
    function getUnidadMedida(){return $this->unidadMedida;}

    function setEstado($estado){$this->estado = $estado;}
    function getEstado(){return $this->estado;}

    function setCategoriaId($categoriaId){$this->categoriaId = $categoriaId;}
    function getCategoriaId(){return $this->categoriaId;}
    
    function setCategoriaProducto($categoriaProducto){$this->categoriaProducto = $categoriaProducto;}
    function getCategoriaProducto(){return $this->categoriaProducto;}

    function setFechaEntrada($fechaEntrada){$this->fechaEntrada = $fechaEntrada;}
    function getFechaEntrada(){return $this->fechaEntrada;}

    function getListaCategrias(){
        
    }
}
?>