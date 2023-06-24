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
    <link rel="stylesheet" href="../../view/css/cuestionario.css">
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
                        <a href="#" class="btn btn-menu btn-light" id="btn-home">
                            <i class="fa-solid fa-house fa-lg" style="color: #455dfc;"></i>
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
                        <a href="cuestionario.php" class="btn btn-menu btn-primary">
                            <i class="fa-solid fa-spell-check fa-xl" style="color: #ffffff;"></i>
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
                <h5> Evaluación de software MininoPOS</h5>
                <p>¡Hola!, por favor dedique unos minutos de su tiempo para rellenar el siguiente cuestionario. Esto nos ayuda
                    a conocer mejor su experiencia con el software y mejorla.
                </p>
                <div class="contenedor-form-cuestionario">
                    <form action="RecibidoCuestionario.php" method="get">
                        <input hidden type="text" name="id_tienda" value="<?php echo $_SESSION["id_tienda_usuario"] ?>">
                        <div class="mb-3">
                            <label for="opciones-pregunta-1" class="form-label">1. ¿Es la interfaz de nuestro software fácil de usar?</label>
                            <select name="opciones-pregunta-1" class="form-control" id="">
                                <option>Selecciona una opción</option>
                                <option value="1">Muy sencilla</option>
                                <option value="2">Más bien fácil</option>
                                <option value="3">De dificultad media</option>
                                <option value="4">Más bien difícil</option>
                                <option value="5">Muy complicada</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="opciones-pregunta-2" class="form-label">2. ¿Cómo está usted satisfecho con el rendimiento de nuestro software?</label>
                            <select name="opciones-pregunta-2" class="form-control" id="">
                                <option >Selecciona una opción</option>
                                <option value="5">Muy satisfecho</option>
                                <option value="4">Satisfecho</option>
                                <option value="3">Normal</option>
                                <option value="2">Insatisfecho</option>
                                <option value="1">Terriblemente insatisfecho</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="opciones-pregunta-3" class="form-label">3. ¿Recomendaría nuestro software a los demás?</label>
                            <select name="opciones-pregunta-3" class="form-control" id="">
                                <option >Selecciona una opción</option>
                                <option value="5">Definitivamente sí</option>
                                <option value="4">Probablemente sí</option>
                                <option value="3">No lo sé</option>
                                <option value="2">Probablemente no</option>
                                <option value="1">Seguramente no</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pregunta-4" class="form-label">4. ¿Cómo podemos mejorar nuestro software?</label>
                            <textarea name="pregunta-4" class="form-control" id="" cols="30" rows="4" style="resize: none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar cuestionario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modal"></div>

    <script src="https://kit.fontawesome.com/ae4444d2d2.js" crossorigin="anonymous"></script>
    <script src="../controller/jquery.min.js"></script>
</body>

</html>