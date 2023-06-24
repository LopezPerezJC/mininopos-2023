<?php
    /*lista de servicios necesarios*/
    require "../../../model/dataBase_connection.php";
    $BaseDatos = new BaseDatos();

    $id_producto = $_REQUEST['id'];

    if($id_producto != "") {
        $eliminarProducto = $BaseDatos->eliminarProducto($id_producto);
        echo "<script type='text/javascript'>
            alert('Producto eliminado!');
            window.location='../../inventario.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('El id esta vacio!');
                window.location='../../inventario.php';
            </script>";
    }
?>