<?php
    /*lista de servicios necesarios*/
    require "../../../../model/dataBase_connection.php";
    $BaseDatos = new BaseDatos();

    $idRegistros = $_REQUEST['id'];

    if($idRegistros != "") {
        try {
            $BaseDatos->eliminartienda($idRegistros);
            echo'alert("Tienda eliminada con éxito!");
    </script>';
        } catch(e) {
            echo "Error";
        }
    } else {
        echo'alert("Tienda no eliminada!");
    </script>';
    }
?>