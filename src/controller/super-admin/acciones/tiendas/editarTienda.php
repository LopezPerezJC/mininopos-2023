<?php
    /*lista de servicios necesarios*/
    require "../../../model/dataBase_connection.php";
    $BaseDatos = new BaseDatos();

    id=$_POST['id']

    if($id != "") {
        $datosTienda = $BaseDatos->buscarTienda($id);

        echo $datosTienda['id'];

    } else {
        echo "Id requerido para la acción!";
    }


    // include "./super-admin.html;
?>