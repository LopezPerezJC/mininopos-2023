<?php
    /*lista de servicios necesarios*/
    require "../../model/dataBase_connection.php";
    $BaseDatos = new BaseDatos();
    session_start();
    // include "./super-admin.html";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <title>Tiendas</title>
    <link rel="stylesheet" type="text/css" href="./estilos/tiendas.css">
    <link rel="stylesheet" type="text/css" href="./estilos/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="./estilos/cargando.css">
    <link rel="stylesheet" href="../../view/bootstrap-5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container contenedor-global">
        <div class="header row w-100 align-items-center">
            <h2 id="nombre-tienda" class="txt-center">MininoPOS</h2>
            <div class="menu">
                <div class="perfil-usuario">
                    <?php
                            $obtenerDatosPerfil = $BaseDatos->obtenerDatosUsuario($_SESSION["id_usuario"]); ?>
                    <?php while ($row = $obtenerDatosPerfil->fetch_assoc()) { ?>
                    <?php echo  '<img height="50px" width="50px" src="data:image/jpeg;base64,' . base64_encode($row['img_usuario']) . '"/>' ?>

                    <?php } ?>
                    <div class="container-info-usuario">
                        <?php
                            echo '<p id="nombre-usuario">' . $_SESSION["username_usuario"] . '</p><p id="rol-usuario">' . $_SESSION["rol_usuario"] . '</p>';
                        ?>
                    </div>
                </div>

                <div class="menu-botones">
                    <div class="botones" id="botones">
                        <a href="index.php" class="btn btn-menu btn-light" id="btn-home">
                            <i class="fa-solid fa-house fa-lg" style="color: #455dfc;"></i>
                            Inicio
                        </a>
                        <a href="tiendas.php" class="btn btn-menu btn-primary" id="btn-tiendas">
                            <i class="fa-solid fa-list-check fa-xl" style="color: #ffffff;"></i>
                            Tiendas
                        </a>
                        <a href="usuarios.php" class="btn btn-menu btn-light" id="btn-usuarios">
                            <i class="fa-solid fa-users fa-xl" style="color: #455dfc;"></i>
                            Usuarios
                        </a>
                        <a href="cuestionarios.php" class="btn btn-menu btn-light">
                            <i class="fa-solid fa-spell-check fa-xl" style="color: #455dfc;"></i>
                            Cuestionarios
                        </a>
                    </div>
                    <a href="logout.php" class="btn btn-menu btn-danger">
                        <i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i>
                        Cerrar sesión
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row w-100 contenedor-main" id="contenedor-main">
            <div class="modulo-inicio" id="modulo-tiendas">
                <div class="header-table">
                    <h4 class="">Tiendas registradas en el sistema</h4>
                    <a href="#" class="btn btn-success"  id="btn-nueva-tienda">
                        <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                        Nuevo
                    </a>
                    <a href="./modulos/reportes_pdf_tiendas.php" target="_blank" class="btn btn-secondary">
                        <i class="fa-regular fa-file-pdf fa-xl" style="color: #ffffff;"></i>
                        Exportar a PDF
                    </a>           
                </div>
                
                <div class="container-datos">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                            <?php $result = $BaseDatos->getTiendas(); ?>
                            <?php while ($row = $result->fetch_array()) { ?>
                                <?php echo '<tr><td>' . $row["id"] . '</td>'?>                                    
                                    <?php echo '<td>' . $row["nombre"] . '</td>'?>
                                    <?php echo '<td>' . $row["direccion"] . '</td>'?>
                                    <?php echo '<td>' . $row["telefono"] . '</td>'?>
                                    <?php echo '<td>' . $row["correo"] . '</td>'?>
                                    <?php echo '<td>'?>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editChildresn<?php echo $row['id']; ?>">
                                        Modificar
                                    </button> 
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $row['id']; ?>">
                                        Eliminar
                                    </button>                                                                 
                            
                                    </td></tr>

                                    <!--Ventana Modal para Eliminar--->
                                    <?php  include('./acciones/tiendas/ModalEliminarTienda.php'); ?>
                                    <!--Ventana Modal para Actualizar--->
                                    <?php  include('./acciones/tiendas/ModalModificarTienda.php'); ?>

                                <?php } ?>
                            <?php $result->free_result(); ?>
                </table>                
                </div>
            </div>

        </div>
    </div>

    <div id="modal"></div>

    <script src="https://kit.fontawesome.com/ae4444d2d2.js" crossorigin="anonymous"></script>
    <script src="../jquery.min.js"></script>
    <script type="module" src="./tiendas.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {        

    $('.btnBorrar').click(function(e){
        e.preventDefault();

        var id = $(this).attr("id");

        var dataString = 'id='+ id;
        url = "./acciones/tiendas/recibidoEliminarTienda.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data)
                {
                  window.location.href="./tiendas.php";
                  $('#respuesta').html(data);
                }
            });
    return false;

    });


});
</script>

</body>

</html>