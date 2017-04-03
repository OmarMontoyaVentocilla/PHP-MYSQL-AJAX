<?php 
require_once 'conexion.php';
$conex=new Conexion();
$cn=$conex->getConexion();
$producto=trim($_POST['producto']);
$precio=trim($_POST['precio']);
$stock=trim($_POST['stock']);
$file = $_FILES["foto"];
$nombre = $file["name"];
$tipo = $file["type"]; 
$ruta_provisional = $file["tmp_name"];
$size = $file["size"]; 
$carpeta = "img/";
$nro=rand(1,999);
$src = $carpeta.$nro."_".$nombre;
$rp="";
if($producto!='' && $precio!='' && $stock!='' && $file!=''){
       if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png' || $tipo == 'image/gif' || $tipo=='application/pdf' || $tipo=='text/plain' || $tipo=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"
         || $tipo=='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' && $tipo=='application/vnd.openxmlformats-officedocument.presentationml.presentation' ){
             if($size <=1024*1024){
                  if(move_uploaded_file($ruta_provisional, $src)){
					$sql="INSERT INTO producto(producto,stock,precio,imagen,estado) VALUES (:producto,:stock,:precio,:imagen,1);";
					$stm=$cn->prepare($sql);
					$respuesta=false;
					$stm->bindParam(':producto',$producto,PDO::PARAM_STR);
					$stm->bindParam(':stock',$stock,PDO::PARAM_INT);
					$stm->bindParam(':precio',$precio,PDO::PARAM_INT);
					$stm->bindParam(':imagen',$src,PDO::PARAM_STR);
					$respuesta=$stm->execute();
					if($respuesta){
					$rp="Se registro exitosamente.";
					 }else{
					 $rp="No se pudo registrar";
					 }
					 echo json_encode($rp);
                  }
             }else{
             	$rp="Pasa los limites de tamaño.";
             	echo $rp;
             }    
       } 
   }    
?>