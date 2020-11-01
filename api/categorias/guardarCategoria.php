<?php 
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        echo "Metodo de entrada ilegal";
    }

    if(!isset($_POST["nom_categoria"])){
        echo "1";
        die();
    }

    // Archivos necesarios para el funcionamiento de la api
    require_once("../../app/system/Conexion.php");
    require_once("../../app/model/Categorias.php");

    $conexion = new Conexion();
    $parametros = new Categorias();
    
    //obtener datos del request
    $parametros->setNombre($_POST["nom_categoria"]);
    $parametros->setEstado($_POST["estado_categoria"]);

    // Realizar consulta
    $consultaSQL = "INSERT INTO tb_categorias (id_categoria, nom_categoria, estado_categoria) VALUES (NULL, ?, ?)";
    //Abrir conexion
    $con = $conexion->getConexion();
    $resultado = $con->prepare($consultaSQL); // preparar consulta
    $resultado->execute(array($parametros->getNombre(), 
                                $parametros->getEstado()));
    $count = $resultado->rowCount(); // trae las columnas afectadas en este caso 1
    header('Content-type: application/json; charset=utf-8');
    if($count > 0){
        $json_array = json_encode(array("estado" => "0", "return" => $resultado));
        echo $json_array;
    }else{
        $json_array = json_encode(array("estado" => "1", "return" => $resultado));
        echo $json_array;
    }

?>