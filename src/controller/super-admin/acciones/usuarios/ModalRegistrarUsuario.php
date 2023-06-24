<div class="modal fade" id="nuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header fs-5" style="background-color: #455dfc !important;">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Registrar un usuario
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="form-data" action="./acciones/usuarios/recibidoRegistrarUsuario.php" method="post"
                    enctype="multipart/form-data">
                    <div class="mb-2">
                        <?php $obtenerTiendas  = $BaseDatos->getTiendas(); ?>
                        <select name="tienda_usuario" id="tienda_usuario" class="form-control selecciona_tienda">
                            <option value="">Selecciona una tienda</option>
                            <?php while ($row = $obtenerTiendas->fetch_array()) { ?>
                            <?php echo '<option value="' . $row['id'] . '">'. $row['nombre'] . '</option>'; ?>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-2">
                        <span style="font-size:15px;">Nombre completo</span>
                        <input type="text" name="nombre_usuario" class="form-control" value="" id="nombre_usuario"
                            required>
                    </div>
                    <div class="mb-2">
                        <span style="font-size:15px;">Username(Por ejemplo: juan123)</span>
                        <input type="text" name="username_usuario" class="form-control" value="" id="username_usuario"
                            required>
                    </div>

                    <div class="tienda-info">
                        <div class="mb-2">
                            <select name="rol_usuario" id="rol-usuario" class="form-control">
                            <option value="">Selecciona un rol</option>
                                <option value="super-admin">Super-admin</option>
                                <option value="administrador">Administrador</option>
                                <option value="empleado">Empleado</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <span style="font-size:15px;">Contraseña</span>
                            <input type="text" name="contrasenia_usuario" class="form-control" value=""
                                id="contrasenia_usuario" required>
                        </div>

                        <div class="mb-2">
                            <span style="font-size:15px;">Foto de perfil</span>
                            <input type="file" name="img_usuario" class="form-control" value="" id="img_usuario"
                                required>
                        </div>
                    </div>
                    <p>*Todos los campos deben estar rellenados</p>
                    <div class="contenedor-botones-form">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>