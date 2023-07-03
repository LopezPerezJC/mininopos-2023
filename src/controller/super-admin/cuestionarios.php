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
    <link rel="stylesheet" href="../../view/css/cuestionarios.grafica.css">
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
                        <a href="tiendas.php" class="btn btn-menu btn-light" id="btn-tiendas">
                            <i class="fa-solid fa-list-check fa-xl" style="color: #455dfc;"></i>
                            Tiendas
                        </a>
                        <a href="usuarios.php" class="btn btn-menu btn-light" id="btn-usuarios">
                            <i class="fa-solid fa-users fa-xl" style="color: #455dfc;"></i>
                            Usuarios
                        </a>
                        <a href="#" class="btn btn-menu btn-primary">
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
            <div class="modulo-inicio" id="modulo-inicio">
                <div class="contenedor-targetas">
                    <?php
                            //RESPUESTAS PREGUNTA 1
                            $conteo_P1 = $BaseDatos->obtener_Resultados_Pregunta1();
                            
                            $P1_Opcion1 = 0;
                            $P1_Opcion2 = 0;
                            $P1_Opcion3 = 0;
                            $P1_Opcion4 = 0;
                            $P1_Opcion5 = 0;

                            $P1_Opcion1 = $conteo_P1[0][1];
                            $P1_Opcion2 = $conteo_P1[1][1];                            
                            $P1_Opcion3 = $conteo_P1[2][1];
                            $P1_Opcion4 = $conteo_P1[3][1];
                            $P1_Opcion5 = $conteo_P1[4][1];
                            
                            $conteoRespuestas = [$P1_Opcion1, $P1_Opcion2, $P1_Opcion3, $P1_Opcion4, $P1_Opcion5];
                            echo "<script> var respuestasP1 = " . json_encode($conteoRespuestas) . ";</script>";
                        ?>

                    <?php
                            //RESPUESTAS PREGUNTA 1
                            $conteo_P2 = $BaseDatos->obtener_Resultados_Pregunta2();
                            
                            $P2_Opcion1 = 0;
                            $P2_Opcion2 = 0;
                            $P2_Opcion3 = 0;
                            $P2_Opcion4 = 0;
                            $P2_Opcion5 = 0;

                            $P2_Opcion1 = $conteo_P2[0][1];
                            $P2_Opcion2 = $conteo_P2[1][1];                            
                            $P2_Opcion3 = $conteo_P2[2][1];
                            $P2_Opcion4 = $conteo_P2[3][1];
                            $P2_Opcion5 = $conteo_P2[4][1];
                            
                            $conteoRespuestasP2 = [$P2_Opcion1, $P2_Opcion2, $P2_Opcion3, $P2_Opcion4, $P2_Opcion5];
                            echo "<script> var respuestasP2 = " . json_encode($conteoRespuestasP2) . ";</script>";
                        ?>

                    <?php
                            //RESPUESTAS PREGUNTA 1
                            $conteo_P3 = $BaseDatos->obtener_Resultados_Pregunta3();
                            
                            $P3_Opcion1 = 0;
                            $P3_Opcion2 = 0;
                            $P3_Opcion3 = 0;
                            $P3_Opcion4 = 0;
                            $P3_Opcion5 = 0;

                            $P3_Opcion1 = $conteo_P3[0][1];
                            $P3_Opcion2 = $conteo_P3[1][1];                            
                            $P3_Opcion3 = $conteo_P3[2][1];
                            $P3_Opcion4 = $conteo_P3[3][1];
                            $P3_Opcion5 = $conteo_P3[4][1];
                            
                            $conteoRespuestasP3 = [$P3_Opcion1, $P3_Opcion2, $P3_Opcion3, $P3_Opcion4, $P3_Opcion5];
                            echo "<script> var respuestasP3 = " . json_encode($conteoRespuestasP3) . ";</script>";
                        ?>


                    <div class="contenedor-resultado-cuestionarios">
                        <div class="grafico_pregunta_1" id="piechart" style="width: 100%; height: 500px;"></div>
                        <div class="grafico_pregunta_2" id="piechart2" style="width: 100%; height: 500px;"></div>
                        <div class="grafico_pregunta_3" id="piechart3" style="width: 100%; height: 500px;"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="modal"></div>

    <script src="https://kit.fontawesome.com/ae4444d2d2.js" crossorigin="anonymous"></script>
    <script src="../jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(pintarGrafica1);

    const nuevoRespuestasP1 = respuestasP1.map(elemento => parseInt(elemento));

    //RESPUESTAS PREGUNTA 1
    function pintarGrafica1() {

        var data = google.visualization.arrayToDataTable([
            ['Respuestas', 'Total'],
            ['Muy sencilla', nuevoRespuestasP1[0]],
            ['Más bien fácil', nuevoRespuestasP1[1]],
            ['De dificultad media', nuevoRespuestasP1[2]],
            ['Más bien difícil', nuevoRespuestasP1[3]],
            ['Muy complicada', nuevoRespuestasP1[4]]
        ]);

        var options = {
            title: '1. ¿Es la interfaz de nuestro software fácil de usar?'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }

    //RESPUESTAS PREGUNTA 2
    google.charts.setOnLoadCallback(pintarGrafica2);
    const nuevoRespuestasP2 = respuestasP2.map(elemento => parseInt(elemento));

    function pintarGrafica2() {

        var data = google.visualization.arrayToDataTable([
            ['Respuestas', 'Total'],
            ['Muy satisfecho', nuevoRespuestasP2[0]],
            ['Satisfecho', nuevoRespuestasP2[1]],
            ['Normal', nuevoRespuestasP2[2]],
            ['Insatisfecho', nuevoRespuestasP2[3]],
            ['Terriblemente insatisfecho', nuevoRespuestasP2[4]]
        ]);

        var options = {
            title: '2. ¿Cómo está usted satisfecho con el rendimiento de nuestro software?'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
    }

    //RESPUESTAS PREGUNTA 3
    google.charts.setOnLoadCallback(pintarGrafica3);
    const nuevoRespuestasP3 = respuestasP3.map(elemento => parseInt(elemento));

    function pintarGrafica3() {

        var data = google.visualization.arrayToDataTable([
            ['Respuestas', 'Total'],
            ['Seguramente no', nuevoRespuestasP3[0]],
            ['Probablemente no', nuevoRespuestasP3[1]],
            ['No lo sé', nuevoRespuestasP3[2]],
            ['Probablemente sí', nuevoRespuestasP3[3]],
            ['Definitivamente sí', nuevoRespuestasP3[4]]
        ]);

        var options = {
            title: '3. ¿Recomendaría nuestro software a los demás?'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
    }
    </script>

</body>

</html>