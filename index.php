<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>inicio</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="estilos.css">
		<link rel="stylesheet" href="sweetalert.css">
    <link rel="stylesheet" href="jquery.toast.css">
    <link rel="stylesheet" href="pace.css">
    <link rel="stylesheet" href="validar_usuarios.css">
  
		<script src="https://use.fontawesome.com/1cf2aae13c.js"></script>
   <style>
  /* este es el media para imprimir  */   
@media print{
   .botonx{
    display: none;
   }
 }    
   </style> 
	</head>
	<body>
		<header id="container">
			<h1 class="text-center animar">Registro</h1>		
		</header>
<?php require_once 'botones.php'; ?>
<?php require_once 'modalAgregar.php';  ?>
<!--  tabla   -->
              <br>
        <div class="container">      
			<div class="table-responsive">	
              <table class="table table-bordered table-hover table-condensed" id="cuerpo">
              	<thead>
              	<tr>
              		<th class="text-center"><i class="fa fa-check" aria-hidden="true"></i> Producto</th>
              		<th class="text-center"><i class="fa fa-check" aria-hidden="true"></i> Precio</th>
              		<th class="text-center"><i class="fa fa-check" aria-hidden="true"></i> Stock</th>
                  <th class="text-center"><i class="fa fa-check" aria-hidden="true"></i> Imagen</th>
              		<th class="text-center" colspan="2"><i class="fa fa-check" aria-hidden="true"></i> Accion</th>
              	</tr>
              	</thead>
              	<tbody></tbody>		
              </table>
      </div>
      </div>
<!--  /tabla   -->

<!--modal para editar-->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">X</button>
          <h4 class="modal-title">Edite los datos:</h4>
        </div>
      <div class="modal-body">
      <form id="formProducto" enctype="multipart/form-data">
         <div class="form-group">
           <input type="text" id="idproducto" name="idproducto" class="form-control" readonly>
          </div> 
          <div class="form-group">
          <label for="sugerenciaReporte">Producto:</label>
          <input type="text" id="nombre" name="nombre" class="form-control">
          </div>
            <div class="form-group">
          <label for="precio2">Precio:</label>
          <input type="text" id="precio2" name="precio2" class="form-control">
          </div>
          <div class="form-group">
          <label for="stock2">Stock:</label>
          <input type="text" id="stock2" name="stock2" class="form-control">
          </div>
          <div class="form-group">
          <label for="foto2">Imagen:</label><br>
          <img src="" id="imagen_pro" width="120" height="80">
          <p id="data_texto"></p>
          <input type="file" id="foto2" name="foto2" class="form-control"> 
          </div>
          
          <button type="submit" class="update-btn btn btn-primary" >Actualizar</button>
         
       </form>
      </div>
  </div>
</div>
</div>
			
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script src="validarform_datos.js"></script>
    <script src="pace.js"></script>
		<script src="push.js"></script>
		<script src="sweetalert.min.js"></script>
    <script src="jquery.toast.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap-filestyle.js"></script>
    <script type="text/javascript">
      
      $('#foto').filestyle({
        buttonText : 'Archivo',
        buttonName : 'btn-primary'
      });

       
      $('#foto2').filestyle({
        buttonText : 'Archivo',
        buttonName : 'btn-primary'
      });
    </script>
    <script type="text/javascript" src="morris.js"></script>
     <script type="text/javascript" src="raphel.js"></script>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>
