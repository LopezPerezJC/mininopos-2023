<?php
    /*lista de servicios necesarios*/
    require "../../model/dataBase_connection.php";
    $BaseDatos = new BaseDatos();

    $idRegistros = $_REQUEST['id'];
    
    if($idRegistros != "") {
        $eliminar = $BaseDatos->eliminarUsuario($idRegistros);
        echo "<script type='text/javascript'>
                alert('Usuario eliminado correctamente!');
                window.location='usuarios.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Usuario eliminado correctamente!');
                window.location='usuarios.php';
            </script>";
    }
?>