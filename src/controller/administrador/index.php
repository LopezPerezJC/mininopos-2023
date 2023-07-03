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
    <link rel="stylesheet" href="../../view/css/administrador.css">
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
                    <?php $obtenerDatosPerfil = $BaseDatos->obtenerDatosUsuario($_SESSION["id_usuario"]); ?>
                    <?php while ($row = $obtenerDatosPerfil->fetch_assoc()) { ?>
                    <?php echo  '<img height="50px" width="50px" src="data:image/jpeg;base64,' . base64_encode($row['img_usuario']) . '"/>' ?>
                    <?php } ?>
                    <div class="container-info-usuario">
                        <?php echo '<p id="nombre-usuario">' . $_SESSION["nombre_usuario"] . '</p><p id="rol-usuario">' . $_SESSION["rol_usuario"] . '</p>'; ?>
                    </div>
                </div>


                <div class="menu-botones">
                    <div class="botones" id="botones">
                        <a href="#" class="btn btn-menu btn-primary" id="btn-home">
                            <i class="fa-solid fa-house fa-lg" style="color: #ffffff;"></i>
                            Inicio
                        </a>
                        <a href="inventario.php" class="btn btn-menu btn-light" id="btn-inventario">
                            <i class="fa-solid fa-list-check fa-xl" style="color: #455dfc;"></i>
                            Inventario
                        </a>
                        <a href="usuarios.php" class="btn btn-menu btn-light">
                            <i class="fa-solid fa-users fa-xl" style="color: #455dfc;"></i>
                            Usuarios
                        </a>
                        <!-- <a href="#" class="btn btn-menu btn-light">
                            <i class="fa-solid fa-spell-check fa-xl" style="color: #455fdc;"></i>
                            Bitácora
                        </a>
                        <a href="#" class="btn btn-menu btn-light">
                            <i class="fa-solid fa-spell-check fa-xl" style="color: #455fdc;"></i>
                            Citas
                        </a> -->
                        <a href="cuestionario.php" class="btn btn-menu btn-light">
                            <i class="fa-solid fa-spell-check fa-xl" style="color: #455fdc;"></i>
                            Cuestionario
                        </a>
                    </div>
                    <a href="../super-admin/logout.php" class="btn btn-menu btn-danger">
                        <i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i>
                        Cerrar sesión
                    </a>
                </div>
            </div>
            <div class="contenedor-contenido col-10" id="contenedor-modulos">
                <?php
                
                echo '<div class="targeta">';
                    $obtenerNumeroProductos = $BaseDatos->obtenerNumeroProductos($_SESSION["id_tienda_usuario"]);
                    $filaProductos = $obtenerNumeroProductos->fetch_assoc();
                    $i = 0; $j=0;
                    while($obtenerNumeroProductos->fetch_assoc()) {
                        $i++;
                    }
                    echo "<h3>Productos registrados " . "<br>" . $i . "</h3> ";

                echo '</div>';

                echo '<div class="targeta">';
                    $obtenerNumeroUsuarios = $BaseDatos->obtenerNumeroUsuarios($_SESSION["id_tienda_usuario"]);
                    $filaUsuarios = $obtenerNumeroUsuarios->fetch_assoc();
                    while($obtenerNumeroUsuarios->fetch_assoc()) {
                        $j++;
                    }
                    echo "<h3>Usuarios registrados " . "<br>" . $j . "</h3>";
                echo '</div>';
                 ?>
            </div>
        </div>
    </div>

    <div id="modal"></div>

    <script src="https://kit.fontawesome.com/ae4444d2d2.js" crossorigin="anonymous"></script>
    <script type="module" src="../controller/js/inicio.admin.controller.js"></script>
    <script type="module" src="../controller/js/inventario.admin.controller.js"></script>
    <script src="../controller/jquery.min.js"></script>
    <script>
    document.getElementById("campo").addEventListener("keyup", getData())

    function getData() {
        let input = document.getElementById("campo").value
        let content = document.getElementById("content")
        let url = "load.php"
        let formData = new FormData()
        formData.append('campo', input)

        fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data
                console.log(data)
            }).catch(err => console.log(err))

    }
    </script>
</body>

</html>