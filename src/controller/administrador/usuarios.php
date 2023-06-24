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
    <title>Administrador</title>
    <link rel="stylesheet" href="../../view/css/admin.usuarios.css">
    <link rel="stylesheet" href="../../view/bootstrap-5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container contenedor-global">
        <div class="header row w-100 align-items-center">
            <h2 id="nombre-tienda" class="txt-center">MininoPOS</h2>
        </div>
        <div class="row w-100 contenedor-main">
            <div class="menu col-2">
                <div class="perfil-usuario">
                    <?php
                            $obtenerDatosPerfil = $BaseDatos->obtenerDatosUsuario($_SESSION["id_usuario"]); ?>
                            <?php while ($row = $obtenerDatosPerfil->fetch_assoc()) { ?>
                            <?php echo  '<img height="50px" width="50px" src="data:image/jpeg;base64,' . base64_encode($row['img_usuario']) . '"/>' ?>

                            <?php } ?>
                    <?php
                            echo '<p id="nombre-usario">' . $_SESSION["username_usuario"] . '<p id="rol-usuario">' . $_SESSION["rol_usuario"] . '</p>';
                    ?>
                </div>


                <div class="menu-botones">
                    <div class="botones" id="botones">
                        <a href="index.php" class="btn btn-menu btn-light" id="btn-home">
                            <i class="fa-solid fa-house fa-lg" style="color: #455dfc;"></i>
                            Inicio
                        </a>
                        <a href="inventario.php" class="btn btn-menu btn-light" id="btn-inventario">
                            <i class="fa-solid fa-list-check fa-xl" style="color: #455dfc;"></i>
                            Inventario
                        </a>
                        <a href="usuarios.php" class="btn btn-menu btn-primary">
                            <i class="fa-solid fa-users fa-xl" style="color: #ffffff;"></i>
                            Usuarios
                        </a>
                    </div>
                    <a href="../super-admin/logout.php" class="btn btn-danger">
                        <i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i>
                        Cerrar sesión
                    </a>
                </div>
            </div>
            <div class="contenedor-contenido col-10" id="contenedor-modulo">
                <h4>Lista de usuarios registrados en su tienda</h4>
                <div class="contenedor-botones-new-filtro">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuevoUsuario<?php echo $_SESSION['id_tienda_usuario']; ?>">
                        <i class="fa-solid fa-plus fa-xl" style="color: #ffffff;"></i>
                        Nuevo usuario
                    </button>
                </div>
                <div class="container-datos">                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nombre</th>
                                <th>Avatar</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="content" class="content">
                            <?php
                            $id_tienda = $_SESSION["id_tienda_usuario"];
                            $resultado = $BaseDatos->obtenerUsuariosTienda($id_tienda);
                            ?>
                            <?php while ($row = $resultado->fetch_assoc()) { ?>
                                <?php if($row["rol"] != "super-admin") { ?>
                                    <?php echo '<tr><td>' . $row["username"] . '</td>'?>                            
                                    <?php echo '<td>' . $row["nombre"] . '</td>'?>
                                    <?php echo  '<td><img height="50px" width="50px" src="data:image/jpeg;base64,' . base64_encode($row['img_usuario']) . '"/></td>' ?>
                                    <?php echo '<td>' . $row["rol"] . '</td>'?>
                            
                                <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#editChildresn<?php echo $row['id']; ?>">
                                        Modificar
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteChildresn<?php echo $row['id']; ?>">
                                        Eliminar
                                    </button>
                                </td>
                                </tr>

                                <!--Ventana Modal para Eliminar--->
                                <?php include('ModalEliminarUsuario.php'); ?>
                                <!--Ventana Modal para agregar un usuario--->
                                <?php include('ModalRegistrarUsuario.php'); ?>
                                <!--Ventana Modal para Actualizar--->
                                <?php include('ModalModificarUsuario.php'); ?>
                                <?php } ?>
                            <?php } ?>
                            <?php $resultado->free_result(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/ae4444d2d2.js" crossorigin="anonymous"></script>
    <script src="../super-admin/js/jquery.min.js"></script>
    <script src="../super-admin/js/bootstrap.min.js"></script>
    
    <script>
    function getData() {
        let input = document.getElementById("campo").value
        let content = document.getElementById("content")
        let url = "load.php"
        let formData = new FormData()
        formData.append('campo', input)

        fetch(url, {
                method: "POST",
                body: formData,
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data
            }).catch(err => {
                console.log(err)
            })

    }

    $(document).ready(function() {
        $('.btnBorrar').click(function(e) {
            e.preventDefault();

            var id = $(this).attr("id");

            var dataString = 'id=' + id;
            url = "RecibidoEliminarUsuario.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data) {
                    window.location.href = "usuarios.php";
                    $('#respuesta').html(data);
                }
            });
            return false;

        });
    });
    </script>
</body>

</html>