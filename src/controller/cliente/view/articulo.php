<?php
require 'header.html';
?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h1 class="box-title">Lista de Compras</h1>
                        <div class="box-tools pull-right"></div>
                    </div>
                    <!--box-header-->
                    <!--centro-->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Precio Unitario</th>
                                    <th>Imagen</th>
                                    <th>Cantidad</th>
                                    <th>Subtotal</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="Cont-Prec">
                        <div class="precio_total">
                            <span>Su total es:</span>
                            <input  step="any" type="number" class="btn btn-warning" name="Total" id="Total" placeholder=" $ 00. 00" readonly=»readonly» >
                        </div>
                        <div class="btn_gc">
                            <button class="btn btn-danger"type="button" id="btnCancela" onclick="Cancela()"><i class="fa fa-times-circle-o"></i> Cancelar compra</button>
                            <a class="btn btn-success" type="submit" id="btnGuarda" href="Home.php"><i class="fa fa-save"></i>Aceptar</a>
                            
                        </div>
                    </div>
                    <!--fin centro-->
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>

<script src="../public/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- Bootstrap 3.3.7 -->
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

<script src="js/articulo.js"></script>
<script src="js/btnes.js"></script>
