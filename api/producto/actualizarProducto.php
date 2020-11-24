<?php 

if($_SERVER["REQUEST_METHOD"] != "POST"){
    echo "Metodo de entrada ilegal";
}

if(!( (isset($_POST['nombre']) && isset($_POST['descripcion'])) &&
    (isset($_POST['stock']) && isset($_POST['precio'])) &&
    (isset($_POST['unidad']) && isset($_POST['estado'])) && 
    (isset($_POST['estado']) && isset($_POST['categoria']) && isset($_POST['id'])) )){
    // Datos enviados incorrectos
    echo "1";
    die();
}

require_once('../../app/system/Conexion.php');
require_once('../../app/model/Productos.php');

$conexion = new Conexion();// objeto conexion
$producto = new Productos();
// Obtener datos del request
$producto->setNombre($_POST['nombre']);
$producto->setDescripcion("descripcion");
$producto->setStock($_POST['stock']);
$producto->setPrecio($_POST['precio']);
$producto->setUnidadMedida($_POST['unidad']);
$producto->setEstado($_POST['estado']);
$producto->setCategoriaId($_POST['categoria']);
$producto->setIdProducto($_POST['id']);
// Realizar consulta 

$consultaSQL = "UPDATE tb_productos SET nom_producto = ? , des_producto = ?, stock = ?, precio = ?, unidad_medida = ?, estado_producto = ?, categoria = ? WHERE id_producto = ? ";
$con = $conexion->getConexion();
// Preparar la consulta
$statement = $con->prepare($consultaSQL);
$statement->execute(array(
    $producto->getNombre(),
    $producto->getDescripcion(),
    $producto->getStock(),
    $producto->getPrecio(),
    $producto->getUnidadMedida(),
    $producto->getEstado(),
    $producto->getCategoriaId(),
    $producto->getIdProducto()
));// Data

header('Content-type: application/json; charset=utf-8');
if($statement){
    $json_array = json_encode(array("estado" => "1", "return" => $statement));
    echo $json_array;
}else{
    $json_array = json_encode(array("estado" => "0", "return" => $statement));
    echo $json_array;
}

?>