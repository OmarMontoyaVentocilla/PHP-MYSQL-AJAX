<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Ingresa un nuevo producto</h4>
      </div>
      <div class="modal-body">
<form id="form"  enctype="multipart/form-data" name="form">
  <div class="form-group">
    <label for="producto" ><i class="fa fa-check" aria-hidden="true"></i> Producto:</label>
    <input type="text" class="form-control" name="producto" id="producto" placeholder="Producto" required autocomplete="off">
  </div>
  <div class="form-group">
    <label for="stock"><i class="fa fa-check" aria-hidden="true"></i> Stock:</label>
    <input type="text" class="form-control" name="stock"  id="stock" placeholder="Stock" required autocomplete="off">
  </div>
   <div class="form-group">
    <label for="precio"><i class="fa fa-check" aria-hidden="true"></i> Precio:</label>
    <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio" required autocomplete="off">
  </div>
   <div class="form-group">
          <label for="foto"><i class="fa fa-check" aria-hidden="true"></i> Imagen:</label>
          <input type="file" id="foto" name="foto" class="form-control" required> 
   </div>
  <button type="submit" id="boton" class="btn btn-primary">Registrar</button>	
</form>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
 </div>
</div>