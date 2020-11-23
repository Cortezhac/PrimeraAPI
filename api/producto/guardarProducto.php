<?php 
if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Metodo de entrada ilegal";
}


if(!( (isset($_POST['nombre']) && isset($_POST['descripcion'])) &&
    (isset($_POST['stock']) && isset($_POST['precio'])) &&
    (isset($_POST['unidad']) && isset($_POST['estado'])) && 
    (isset($_POST['estado']) && isset($_POST['categoria'])) )){
        // Datos enviados incorrectos
        echo "1";
        die();
    }

    // Archivos necesarios para el funcionamiento de la API
    require_once("../../app/system/Conexion.php");
    require_once("../../app/model/Productos.php");
    $conexion = new Conexion();
    $parametros = new Productos();
    // Obtener datos del request
    $parametros->setNombre($_POST['nombre']);
    $parametros->setDescripcion("descripcion");
    $parametros->setStock($_POST['stock']);
    $parametros->setPrecio($_POST['precio']);
    $parametros->setUnidadMedida($_POST['unidad']);
    $parametros->setEstado($_POST['estado']);
    $parametros->setCategoriaId($_POST['categoria']);
    // Realizar consulta 
    $consultaSQL = "INSERT INTO tb_productos (id_producto, nom_producto, des_producto, stock, precio, unidad_medida, estado_producto, categoria) VALUE (NULL, ?, ?, ?, ?, ?, ?, ?)";
    $con = $conexion->getConexion();
    $resultado = $con->prepare($consultaSQL);
    $resultado->execute(array(
        $parametros->getNombre(),
        $parametros->getDescripcion(),
        $parametros->getStock(),
        $parametros->getPrecio(),
        $parametros->getUnidadMedida(),
        $parametros->getEstado(),
        $parametros->getCategoriaId()
    ));
    // ver errores
    //var_dump($resultado->errorInfo());
    $count = $resultado->rowCount();// Columnas afectadas
    header('Content-type: application/json; charset=utf-8');
    if($count > 0){
        $json_array = json_encode(array("estado" => "0", "return" => $resultado));
        echo $json_array;
    }else{
        $json_array = json_encode(array("estado" => "1", "return" => $resultado));
        echo $json_array;
    }
?>