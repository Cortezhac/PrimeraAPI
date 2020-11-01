<?php 
// pdo->query para consultas que devuelven valor en POST si usas GET es comveniente usar consultas preparadas
// fetch convierte en array la informacion
// Obtener el estado de la peticion
if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Metodo de entrada ilegal";
    die();
}

if(!(isset($_POST['nombre']) && isset($_POST['clave']))){
    echo "0";
    die();
}

// Archivos necesarios para el funcionamiento de la api
require_once '../../app/system/Conexion.php';
require_once '../../app/model/Usuarios.php';

$conexion = new Conexion();// conexion con la base de datos
$persona = new Usuarios();// tabla usuarios

$con = $conexion->getConexion();// obtener conexion

//Obentener datos del request en GET
$persona->setUsuario($_POST['nombre']);
$persona->setClave($_POST['clave']);

// Consulta
$consultaSQL = "SELECT * FROM tb_usuarios WHERE usuario = ? AND clave = ?";
$resultado = $con->prepare($consultaSQL);// prepara consulta
$resultado->execute(array(
    $persona->getUsuario(),
    $persona->getClave()));// enviar consulta con valores
$datos = $resultado->fetch(PDO::FETCH_ASSOC);// convertir en arreglo asocuativo

if($resultado->rowCount() > 0){//imprimir
    /* Test de datos
    foreach($datos as $key => $value) {
        echo  $key . " : " . $value . ' <BR>';
    }*/
    header('Content-type: application/json; charset=utf-8');
    $json_array = json_encode($datos);
    echo $json_array;
}else{
    //No se encontro ningun valor
    echo 0;
}
?>