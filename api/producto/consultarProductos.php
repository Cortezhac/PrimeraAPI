<?php
    if($_SERVER["REQUEST_METHOD"] != 'POST'){
        echo "Metodo de entrada ilegal";
        die();
    }
    
    require_once('../../app/system/Conexion.php');
    require_once('../../app/model/Productos.php');

    if(isset($_POST["opcion"])){
        if($_POST['opcion'] == "listar"){
            $conexion = new Conexion();
            // conexion con base de datos
            $con = $conexion->getConexion();
    
            $querySQL = "SELECT id_categoria, nom_categoria FROM tb_categorias";
            $resultado = $con->query($querySQL);
            $resultado = $resultado->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($resultado);
        }

    }


?>