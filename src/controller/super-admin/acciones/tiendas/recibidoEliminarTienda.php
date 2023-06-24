<?php
    /*lista de servicios necesarios*/
    require "../../../../model/dataBase_connection.php";
    $BaseDatos = new BaseDatos();

    $idRegistros = $_REQUEST['id'];

    if($idRegistros != "") {
        try {
            $BaseDatos->eliminarTienda($idRegistros);
            echo "<script type='text/javascript'>
                alert('Tienda eliminada!');
                window.location='../../tiendas.php';
            </script>";
        } catch(e) {
            echo "<script type='text/javascript'>
                alert('No se pudo eliminar la tienda!');
                window.location='../../tiendas.php';
            </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                alert('Id vacio!');
                window.location='../../tiendas.php';
            </script>";
    }
?>