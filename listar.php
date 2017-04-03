<?php
require_once 'helperPDO.php';
$driver=new driverBD();
$sql="SELECT * FROM producto where estado=1";
$stm=$driver->getProcedure($sql);
$valor=$stm->execute();
if($valor){
$data["data"]=[];	
   while($resultado=$stm->fetch(PDO::FETCH_ASSOC)){
       $data["data"][]= $resultado;
   }
   
   echo json_encode( $data);  
}else{
  echo "error";
}

$stm->closeCursor();
$conex=null;


?>