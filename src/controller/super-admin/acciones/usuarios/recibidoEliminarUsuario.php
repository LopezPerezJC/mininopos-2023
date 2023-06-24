<?php
    /*lista de servicios necesarios*/
    require "../../../../model/dataBase_connection.php";
    $BaseDatos = new BaseDatos();

    $id_usuario = $_POST['id'];

    if($id_usuario != "") {
        try {
            $eliminarUsuario = $BaseDatos->eliminarUsuario($id_usuario);
            echo "<script type='text/javascript'>                
                window.location='../../usuarios.php';
                alert('Usuario eliminado!');
                </script>";
            
        } catch(e) {
            echo "<script type='text/javascript'>
                window.location='../../usuarios.php';                
                alert('Usuario No eliminado!');
                </script>";
        }
    } else {
        echo "<script type='text/javascript'>
                alert('El id esta vacio!');
                window.location='../../usuarios.php';
            </script>";
    }
?>