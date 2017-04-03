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