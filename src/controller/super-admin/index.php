<?php
    /*lista de servicios necesarios*/
    require "../../model/dataBase_connection.php";
    $BaseDatos = new BaseDatos();
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Administrador</title>
    <link rel="stylesheet" href="../../view/css/super-admin.css">
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
                        <a href="#" class="btn btn-menu btn-primary" id="btn-home">
                            <i class="fa-solid fa-house fa-lg" style="color: #ffffff;"></i>
                            Inicio
                        </a>
                        <a href="tiendas.php" class="btn btn-menu btn-light" id="btn-tiendas">
                            <i class="fa-solid fa-list-check fa-xl" style="color: #455dfc;"></i>
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
            <div class="modulo-inicio" id="modulo-inicio">
                <div class="contenedor-targetas">
                    <div class="targeta tiendas-registrados">
                    <i class="fa-solid fa-money-bills fa-2xl" style="color: #ffffff;"></i>
                        <p>Tiendas registradas</p>
                        <p class="numero-tiendas">
                        <?php
                            $result = $BaseDatos->getNumTiendas();

                            if($result != null){
                                $i = 0;
                              while ($row = $result->fetch_array()) {
                                // echo $row['nombre']."<br>";
                                $i++;
                              }

                              echo $i;
                              } else {
                                    echo "Error!";
                              }
                        ?>                    
                        </p>
                    </div>
                    <div class="targeta targeta-usuarios">
                    <i class="fa-solid fa-user fa-2xl" style="color: #ffffff;"></i>
                    <p>Usuarios</p>  
                    <p class="numero-usuarios">
                    <?php
                            $result = $BaseDatos->getNumUsuarios();

                            if($result != null){
                                $i = 0;
                              while ($row = $result->fetch_array()) {
                                // echo $row['nombre']."<br>";
                                $i++;
                              }

                              echo $i;
                              } else {
                                    echo "Error!";
                              }
                        ?>
                    </p>
                    </div>
                    <div class="targeta targeta-productos-registrados">
                    <i class="fa-solid fa-layer-group fa-2xl" style="color: #ffffff;"></i>
                    <p>Productos registrados</p>
                    <p class="productos-registrados">
                    <?php
                            $result = $BaseDatos->getNumProductos();

                            if($result != null){
                                $i = 0;
                              while ($row = $result->fetch_array()) {
                                // echo $row['nombre']."<br>";
                                $i++;
                              }

                              echo $i;
                              } else {
                                    echo "Error!";
                              }
                        ?> 
                    </p>
                    </div>
                    <div class="targeta tareta-ventas">
                    <i class="fa-solid fa-money-bill-trend-up fa-2xl" style="color: #ffffff;"></i>
                    <p>Ventas realizadas</p>  
                    <p>865,288</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div id="modal"></div>

    <script src="https://kit.fontawesome.com/ae4444d2d2.js" crossorigin="anonymous"></script>
    <script src="../jquery.min.js"></script>
    <script type="module" src="./super-admin.js"></script>
</body>
</html>