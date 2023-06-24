
<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #455dfc !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
            Actualizar Información usuario
        </h6>
        <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="RecibidoModificarUsuario.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="modal-body" id="cont_modal">
            <div class="mb-2">
                    <?php  echo '<input hidden type="text" name="id_usuario" class="form-control" value="' . $row['id'] .'" id="id_usuario"
                        readonly>'; ?>
                </div>
                <div class="mb-2">
                    <?php  echo '<input hidden type="text" name="id_tienda_usuario" class="form-control" value="' . $row['id_tienda'] .'" id="id_tienda_usuario"
                        readonly>'; ?>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Nombre</label>
                  <input type="text" name="nombre_usuario" class="form-control" value="<?php echo $row['nombre']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Username</label>
                  <input type="text" name="username_usuario" class="form-control" value="<?php echo $row['username']; ?>" required="true">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Contraseña</label>
                  <input type="text" name="contrasenia_usuario" class="form-control" value="<?php echo $row['contrasenia']; ?>" required="true">
                </div>
                <div class="mb-2">
                    <select name="rol_usuario" id="rol-usuario" class="form-control">
                        <option value="">Selecciona un rol</option>
                        <option value="administrador">Administrador</option>
                        <option value="empleado">Empleado</option>
                    </select>
                </div>
                <div class="mb-2">
                    <span style="font-size:15px;">Foto de perfil</span>
                    <input type="file" name="img_usuario" class="form-control" value="" id="img_usuario"
                                required>
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
