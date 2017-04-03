<?php
require_once 'helperPDO.php';
$driver=new driverBD();
$idproducto=$_POST['idproducto'];
$nombre=$_POST['nombre'];
$precio2=$_POST['precio2'];
$stock2=$_POST['stock2'];
$file2 = $_FILES["foto2"];
$nombre_img = $file2["name"];
$tipo = $file2["type"]; 
$ruta_provisional = $file2["tmp_name"];
$size = $file2["size"]; 
$carpeta = "img/";
$nro=rand(1,999);
$src = $carpeta.$nro."_".$nombre_img;


$query='SELECT imagen FROM producto WHERE idproducto=:idpro and estado=1';
$stm=$driver->getProcedure($query);
$stm->bindParam(':idpro', $idproducto, PDO::PARAM_INT);
$stm->execute();
$row=$driver->getCellView($stm);
$imagen_antigua=$row['imagen'];
$nom_img=explode('/',$imagen_antigua);
$img_ant=$nom_img[1];


if($nombre_img==''){
$quer_su='UPDATE producto SET producto=:product,stock=:stock,precio=:precio WHERE idproducto=:idpro';
$exe_sux=$driver->getProcedure($quer_su);
$exe_sux->bindParam(':product', $nombre, PDO::PARAM_STR, 100);
$exe_sux->bindParam(':stock', $stock2, PDO::PARAM_STR, 50);
$exe_sux->bindParam(':precio', $precio2, PDO::PARAM_STR, 50);
$exe_sux->bindParam(':idpro', $idproducto, PDO::PARAM_INT);
$resultado=$driver->getExecute($exe_sux);  
$respuesta="";
if($resultado){
  $respuesta="Se actualizo los datos correctamente";
}else{
  $respuesta="No se pudo actualizar los datos";	
}
echo json_encode($respuesta);
}else if($nombre_img!=''){ 

  if(file_exists($imagen_antigua)){
  if($img_ant!=$nombre_img){
    if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png' || $tipo == 'image/gif' || $tipo=='application/pdf' || $tipo=='text/plain' || $tipo=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"
         || $tipo=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' && $tipo=='application/vnd.openxmlformats-officedocument.presentationml.presentation' || $tipo==''){
       if(move_uploaded_file($ruta_provisional, $src)){
$query_su='UPDATE producto SET producto=:product,stock=:stock,precio=:precio,imagen=:images WHERE idproducto=:idpro';
$exe_su=$driver->getProcedure($query_su);
$exe_su->bindParam(':product', $nombre, PDO::PARAM_STR, 100);
$exe_su->bindParam(':stock', $stock2, PDO::PARAM_STR, 50);
$exe_su->bindParam(':precio', $precio2, PDO::PARAM_STR, 50);
$exe_su->bindParam(':idpro', $idproducto, PDO::PARAM_INT);
$exe_su->bindParam(':images',$src,PDO::PARAM_STR);
$resultado=$driver->getExecute($exe_su);  
$respuesta="";
if($resultado){
  $respuesta="Se actualizo los datos correctamente";
   unlink("img/".$img_ant);	
}else{
  $respuesta="No se pudo actualizar los datos";	
}
echo json_encode($respuesta);
    }
  }
}
}else{
	$respuesta="No se pudo actualizar los datos";	
echo json_encode($respuesta);	
}
}
?>