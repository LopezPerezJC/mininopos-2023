<?php
    require "../../model/dataBase_connection.php";
    require "../PDF/fpdf.php";
    $BaseDatos = new BaseDatos();
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <title>Usuarios</title>
    <link rel="stylesheet" type="text/css" href="./estilos/usuarios.css">
    <link rel="stylesheet" type="text/css" href="./estilos/bootstrap.css">
    <link rel="stylesheet" href="../../view/bootstrap-5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container contenedor-global">
        <div class="header row w-100 align-items-center">
            <h2 id="nombre-tienda" class="txt-center">MininoPOS</h2>
            <div class="menu">
                <div class="perfil-usuario">
                    <img src="./../../../public/img/user-example.jpg" height="40px" width="40px" alt="">
                    <div class="contenedor-info-usuario">
                        <?php
                            echo '<p>' . $_SESSION["username_usuario"] . '<br>' . $_SESSION["rol_usuario"] . '</p>';
                        ?>
                    </div>
                </div>


                <div class="menu-botones">
                    <div class="botones" id="botones">
                        <a href="index.php" class="btn btn-menu btn-light" id="btn-home">
                            <i class="fa-solid fa-house fa-lg" style="color: #455dfc;"></i>
                            Inicio
                        </a>
                        <a href="tiendas.php" class="btn btn-menu btn-light" id="btn-tiendas">
                            <i class="fa-solid fa-list-check fa-xl" style="color: #455dfc;"></i>
                            Tiendas
                        </a>
                        <a href="usuarios.php" class="btn btn-menu btn-primary" id="btn-usuarios">
                            <i class="fa-solid fa-users fa-xl" style="color: #ffffff;"></i>
                            Usuarios
                        </a>
                        <a href="cuestionarios.php" class="btn btn-menu btn-primary">
                            <i class="fa-solid fa-spell-check fa-xl" style="color: #ffffff;"></i>
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
                    <h4 class="">Usuarios registrados en el sistema</h4>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoUsuario">
                    <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                        Nuevo
                    </button>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exportarUsuariosPDF">
                    <i class="fa-regular fa-file-pdf fa-xl" style="color: #ffffff;"></i>
                        Exportar a PDF
                    </button>
                </div>

                <div class="container-datos">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Identificador</th>
                                <th>Nombre/username</th>
                                <th>Tienda</th>
                                <th>Rol</th>
                                <th>Foto perfil</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <?php
                                $result = $BaseDatos->getUsuarios();
                            ?>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                        <?php echo '<tr><td>' . $row["id"] . '</td>'?>
                        <?php echo '<td>' . $row["nombre"] . '<br/><b>' . $row["username"] . '</b></td>'?>
                        <?php
                                        $idTiendaUsuario = $BaseDatos->buscarNombreTienda($row["id_tienda"]);
                                        $idTienda = $idTiendaUsuario->fetch_assoc();
                                    echo '<td>' . $idTienda['nombre'] . '</td>'?>
                        <?php echo '<td>' . $row["rol"] . '</td>'?>
                        <?php echo  '<td><img height="50px" width="50px" src="data:image/jpeg;base64,' . base64_encode($row['img_usuario']) . '"/></td>' ?>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editChildresn<?php echo $row['id']; ?>">
                                <i class="fa-regular fa-pen-to-square fa-xl" style="color: #ffffff;"></i>
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteChildresn<?php echo $row['id']; ?>">
                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                            </button>
                        </td>
                        </tr>

                        <!--Ventana Modal para Eliminar--->
                        <?php include('./acciones/usuarios/ModalEliminarUsuario.php'); ?>
                        <!--Ventana Modal para agregar un usuario--->
                        <?php include('./acciones/usuarios/ModalRegistrarUsuario.php'); ?>
                        <!--Ventana Modal para Actualizar--->
                        <?php include('./acciones/usuarios/ModalModificarUsuario.php'); ?>

                        <?php } ?>
                        <?php $result->free_result(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>                        

    <script src="https://kit.fontawesome.com/ae4444d2d2.js" crossorigin="anonymous"></script>
    <script src="../jquery.min.js"></script>
    <script type="module" src="./js/usuarios.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.btnBorrar').click(function(e) {
            e.preventDefault();

            var id = $(this).attr("id");

            var dataString = 'id=' + id;
            url = "./acciones/usuarios/recibidoEliminarUsuario.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data) {
                    window.location.href = "./usuarios.php";
                    $('#respuesta').html(data);
                }
            });
            return false;

        });
    });
    </script>


</body>

</html>