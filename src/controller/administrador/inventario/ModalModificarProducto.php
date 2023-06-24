<!--ventana para Update--->
<div class="modal fade" id="editChildresn<?php echo $row['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #455dfc !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Actualizar información producto
                </h6>
                <button type="button" class="btn btn-danger close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form method="POST" action="./inventario/RecibidoModificarProducto.php" enctype="multipart/form-data">
                <div class="mb-2">
                    <?php  echo '<input hidden type="text" name="id" class="form-control" value="' . $row['id'] .'" id="id"
                            readonly>'; ?>
                </div>
                <div class="mb-2">
                    <span style="font-size:15px;">Código</span>
                    <input type="text" name="codigo_producto" class="form-control" value="<?php echo $row['codigo']; ?>" id="codigo_producto"
                        placeholder="123456879" required>
                </div>
                <div class="mb-2">
                    <span style="font-size:15px;">Nombre</span>
                    <input type="text" name="nombre_producto" class="form-control" value="<?php echo $row['nombre']; ?>" id="nombre_producto"
                        required>
                </div>
                <div class="mb-2">
                    <span style="font-size:15px;">Foto/Imagen</span>
                    <input type="file" name="img_producto" class="form-control" value="" id="img_producto" required>
                </div>
                <div class="row contenedor-precio-exis">
                    <div class="col-4">
                        <span style="font-size:15px;">Precio</span>
                        <input type="number" step='0.01' min="0" name="precio_producto" class="form-control" value="<?php echo $row['precio']; ?>"
                            id="precio_producto" placeholder="0.0" required>
                    </div>
                    <div class="col-4">
                        <span style="font-size:15px;">Existencias</span>
                        <input type="number" min="0" name="existencias_producto" class="form-control" value="<?php echo $row['existencias']; ?>"
                            id="existencias_producto" placeholder="0" required>
                    </div>
                </div>
                <div class="mb-2">
                    <span style="font-size:15px;">Descripción</span>
                    <textarea class="form-control" name="descripcion_producto" id="descripcion_producto" cols="10"
                        rows="3"><?php echo $row['descripción']; ?></textarea>
                </div>
                <p>*Todos los campos deben estar rellenados</p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!---fin ventana Update --->