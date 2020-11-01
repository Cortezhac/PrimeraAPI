<?php 
    if($_SERVER["REQUEST_METHOD"] != "POST"){
        echo "Metodo de entrada ilegal";
    }

    if(!isset($_POST["id"])){
        echo "1";
        die();
    }

    require_once('../../app/system/Conexion.php');

    $conexion = new Conexion();// objeto conexion
    $id = $_POST['id'];// data post

    $consultaSQL = "DELETE FROM tb_categorias WHERE id_categoria = ?";
    $con = $conexion->getConexion();
    // Preparar la consulta
    $statement = $con->prepare($consultaSQL);
    $statement->execute(array($id));// Data
    
    $count = $statement->rowCount();
    header('Content-type: application/json; charset=utf-8');
    if($count > 0){
        $json_array = json_encode(array("estado" => "0"));
        echo $json_array;
    }else{
        $json_array = json_encode(array("estado" => "1"));
        echo $json_array;
    }
?>