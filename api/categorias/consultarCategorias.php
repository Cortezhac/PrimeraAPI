<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        echo "Metodo de entrada incorrecto";
        die();
    }

    require_once('../../app/system/Conexion.php');
    require_once('../../app/model/Categorias.php');

    if(isset($_POST['opcion'])){
        $opcion = $_POST['opcion'];
        if($opcion == "listar"){
            $SQL = "SELECT * FROM tb_categorias";
            $conexion = new Conexion();
            $con = $conexion->getConexion();
            $resultado = $con->query($SQL);
            $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $jsonPack = json_encode($resultado);
            echo $jsonPack;
        }
    }


?>