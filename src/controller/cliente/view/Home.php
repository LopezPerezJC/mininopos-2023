<?php
//activamos almacenamiento en el buffer
require 'header.html';

/*Incluir bases de datos!*/
?>
<div class="content-wrapper">
    <!-- Main content -->
    <div class="contenedor-selecciona-tienda">
        <form action="">
            <div class="contenedor-labels">
                <?php $obtenerTiendas  = $BaseDatos->getTiendas(); ?>
                <select name="tienda" id="tienda" class="form-control selecciona_tienda">
                    <option value="">Selecciona una tienda</option>
                    <?php while ($row = $obtenerTiendas->fetch_array()) { ?>
                    <?php echo '<option value="' . $row['id'] . '">'. $row['nombre'] . '</option>'; ?>
                <?php } ?>
                </select>
            </div>
        </form>
    </div>
    <section class="content">
        <!-- Default box -->
        <div class="row justify-content-center">
            <div class="box">
                <div class="with-border">
                </div>
                <aside class="main-sidebar">
                    <section class="sidebar">
                        <ul class="sidebar-menu" data-widget="tree">
                            <li>
                                <h4 style="padding-top: 10px;">Su total es $:</h4>
                            </li>
                            <li>
                                <input step="any" type="number" class="btn btn-warning" name="subtotal" id="subtotal"
                                    placeholder=" $ 00. 00" readonly=»readonly»>
                            <li>
                            <li>
                                <a class="btn btn-primary" type="submit" id="BtnNormal" href="articulo.php"><i
                                        class="fa fa-list-alt"></i> lista Compra</a>
                            <li>
                            <li>
                                <a class="btn btn-primary" type="submit" id="BtnNormal"><i
                                        class="fa fa-file-text-o"></i> Generar Ticket</a>
                            <li>
                        </ul>
                    </section>
                </aside>
                <!--box-header-->
                <!--centro-->
                <div class="panel-body">
                    <div id="contenedor" class="row ">
                        <div id="Producto" class="col-12">
                            <div class="row" id="Caja-con">
                                <div id="Foto_prod" class="col-4">
                                    <video id="camscaner" width="100%"></video>
                                    <button id="Inicia" class="btn btn-success">inicia escaneo</button>
                                    <button id="Termina" class="btn btn-warning">termina escaneo</button>
                                </div>
                                <div id="Formulario" class="col-4">

                                    <!----------FORMULARIO------------>
                                    <form action="" name="formulario" id="formulario" method="POST">
                                        <div class="Btn-Producto">
                                            <span>Producto:</span>
                                            <input type="text" id="nombre" name="nombre" class="form-control"
                                                placeholder="nombre" readonly=»readonly»>
                                        </div>
                                        <div class="Btn-Precio">
                                            <label for="precio">Precio Untar. $</label>
                                            <input step="any" type="number" name="precio" id="precio"
                                                placeholder="00. 00" class="form-control" readonly=»readonly»>
                                        </div>
                                        <div class="Btn-Cantidad">
                                            <span>Cantidad productos:</span>
                                            <input type="number" style="width:50px;text-align: center;margin-top: 2px;"
                                                id="cantidad_prod" name="cantidad_prod" class="form-control" value="0"
                                                readonly=»readonly»>
                                            <span class="input-group-btn">
                                                <button class="btn btn-danger" id="resta" type='button'
                                                    onclick="menos()">-</button>
                                            </span>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" id="suma" type='button'
                                                    onclick="mas()">+</button>
                                            </span>
                                        </div>
                                        <div>
                                            <img src="../files/articulos/michiNo.jpg" style="height:150px; width:150px;"
                                                name="imagen" id="imagen">
                                        </div>
                                        <div class="row" id="Btn-Ingresa">
                                            <button type="button" class="btn btn-success" id="btnGuardar"
                                                onclick="Guardar()">Agregar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- /.content -->
</div>


<script src="../public/js/jquery.min.js"></script>
<!-- Bootstrap 5.3--->
<script src="../public/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/js/adminlte.min.js"></script>
<script src="../public/datatables/buttons.colVis.min.js"></script>
<script src="../public/datatables/buttons.html5.min.js"></script>
<script src="../public/datatables/dataTables.buttons.min.js"></script>
<script src="../public/datatables/jquery.dataTables.min.js"></script>
<script src="../public/datatables/jszip.min.js"></script>
<script src="../public/datatables/pdfmake.min.js"></script>
<script src="../public/datatables/vfs_fonts.js"></script>
<script src="../public/datatables/datatables.min.js"></script>
<script src="../public/js/bootstrap-select.min.js"></script>
<script src="../public/js/bootbox.min.js"></script>

<!---script src="js/productos.js"></!---script--->
<script src="js/camara.js"></script>
<script src="js/copia.js"></script>
<script src="js/productos.js"></script>




<?php

?>