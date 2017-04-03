<?php
require_once 'helperPDO.php';
$driver=new driverBD();
$idproducto=$_POST['id'];

$query='SELECT idproducto,producto,stock,precio,imagen FROM producto WHERE idproducto=:idpro and estado=1';
$stm=$driver->getProcedure($query);
$stm->bindParam(':idpro', $idproducto, PDO::PARAM_INT);
$stm->execute();
$row=$driver->getCellView($stm);
echo json_encode($row);
exit;
?>