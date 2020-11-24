<?php 
        if($_SERVER["REQUEST_METHOD"] != "POST"){
            echo "Metodo de entrada ilegal";
        }
    
        if(!(isset($_POST["id"]) && isset($_POST['nombre']) && isset($_POST['estado']))){
            echo "1";
            die();
        }
    
        require_once('../../app/system/Conexion.php');
        require_once('../../app/model/Categorias.php');
    
        $conexion = new Conexion();// objeto conexion
        $categoria = new Categorias();
        
        $categoria->setId($_POST['id']);
        $categoria->setNombre($_POST['nombre']);
        $categoria->setEstado($_POST['estado']);
    
        $consultaSQL = "UPDATE tb_categorias SET nom_categoria = ? , estado_categoria = ? WHERE id_categoria = ? ";
        $con = $conexion->getConexion();
        // Preparar la consulta
        $statement = $con->prepare($consultaSQL);
        $statement->execute(array(
            $categoria->getNombre(),
            $categoria->getEstado(),
            $categoria->getId()));// Data
        
        header('Content-type: application/json; charset=utf-8');
        if($statement){
            $json_array = json_encode(array("estado" => "1", "return" => $statement));
            echo $json_array;
        }else{
            $json_array = json_encode(array("estado" => "0", "return" => $statement));
            echo $json_array;
        }
?>