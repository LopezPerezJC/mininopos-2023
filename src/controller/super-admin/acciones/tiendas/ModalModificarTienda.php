
<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #455dfc !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
            Actualizar Información Tienda
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="./acciones/tiendas/recibidoModificarTienda.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nombre</label>
                  <input type="text" name="nombre_tienda" class="form-control" value="<?php echo $row['nombre']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Dirección</label>
                  <input type="text" name="direccion_tienda" class="form-control" value="<?php echo $row['direccion']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Telefono</label>
                  <input type="text" name="telefono_tienda" class="form-control" value="<?php echo $row['telefono']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Correo</label>
                  <input type="email" name="correo_tienda" class="form-control" value="<?php echo $row['correo']; ?>" required="true">
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
       </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->
