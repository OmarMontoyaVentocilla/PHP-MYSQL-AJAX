<?php

require_once 'helperPDO.php';
$driver=new driverBD();
$id=$_POST['id'];
$query='UPDATE producto SET estado=0 WHERE idproducto= :id and estado=1';
$stm=$driver->getProcedure($query);
$stm->bindParam(':id',$id,PDO::PARAM_INT);
$resultado=$driver->getExecute($stm);
$respuesta="";
if($resultado){
 $respuesta="Se elimino los datos correctamente";
}else{
$respuesta="No se pudo eliminar los datos";
}

echo json_encode($respuesta);


?>