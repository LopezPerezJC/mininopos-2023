<?php
    /*lista de servicios necesarios*/
    require "../../model/dataBase_connection.php";
    $BaseDatos = new BaseDatos();
    session_start();
    // include "./super-admin.html";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado</title>
    <link rel="stylesheet" href="../../view/css/empleado.css">
    <link rel="stylesheet" href="../../view/bootstrap-5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container contenedor-global">
        <div class="header row w-100 align-items-center">
            <h2 id="nombre-tienda" class="txt-center">MininoPOS</h2>
        </div>
        <div class="row w-100 contenedor-main">
            <div class="w-100 menu-empleado">
            <div class="perfil-usuario">
                    <?php
                            $obtenerDatosPerfil = $BaseDatos->obtenerDatosUsuario($_SESSION["id_usuario"]); ?>
                    <?php while ($row = $obtenerDatosPerfil->fetch_assoc()) { ?>
                    <?php echo  '<img height="50px" width="50px" src="data:image/jpeg;base64,' . base64_encode($row['img_usuario']) . '"/>' ?>

                    <?php } ?>
                    <?php
                            echo '<p id="nombre-usario">' . $_SESSION["username_usuario"] . '<br><p id="rol-usuario">' . $_SESSION["rol_usuario"] . '</p>';
                    ?>
                </div>
                <div class="contenedor-btn-logout">
                    <a href="../super-admin/logout.php" class="btn btn-danger">
                        <i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i>
                        Cerrar sesión
                    </a>
                </div>
            </div>
            <div class="contenedor-contenido row-12">
                    <div class="header-table">
                        <h4 class="">Productos registrados en el sistema</h4>
                    </div>
                    <!-- BUSCADOR PRODUCTOS -->
                    <div class="buscador-productos">
                        <form action="" method="post">
                            <label for="campo">Buscar:</label>
                            <input type="text" name="campo" id="campo">
                        </form>
                    </div>

                    <div class="container-datos">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Precio</th>
                                    <th>Existencias</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                            
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>

        <div id="modal"></div>

        <script src="https://kit.fontawesome.com/ae4444d2d2.js" crossorigin="anonymous"></script>
        <script src="../../controller/jquery.min.js"></script>
        <script>
            document.getElementById("campo").addEventListener("keyup", getData())

            function getData(){
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