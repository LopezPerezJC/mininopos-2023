<?php
    /*lista de servicios necesarios*/
    require "../../../../model/dataBase_connection.php";
    $BaseDatos = new BaseDatos();

    $id_usuario = $_POST['id'];

    if($id_usuario != "") {
        try {
            $eliminarUsuario = $BaseDatos->eliminarUsuario($id_usuario);
            echo "<script type='text/javascript'>
                alert('Usuario eliminado!');
                window.location='../../usuarios.php';
                </script>";
            
        } catch(e) {
            echo "<script type='text/javascript'>
                alert('Usuario No eliminado!');
                window.location='../../usuarios.php';
                </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                alert('El id esta vacio!');
                window.location='../../usuarios.php';
            </script>";
    }
?>