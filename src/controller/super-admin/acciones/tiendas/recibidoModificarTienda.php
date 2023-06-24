<?php
require "../../../../model/dataBase_connection.php";
$BaseDatos = new BaseDatos();

$id_tienda = $_REQUEST['id'];
$nombre = $_REQUEST['nombre_tienda'];
$direccion = $_REQUEST['direccion_tienda'];
$telefono = $_REQUEST['telefono_tienda'];
$correo = $_REQUEST['correo_tienda'];

if($id_tienda != "" && $nombre != "" && $direccion != "" && $telefono != "" && $correo != "") {
    try {
        $update = $BaseDatos->actualizarTienda($id_tienda, $nombre, $direccion, $telefono, $correo);
        echo "<script type='text/javascript'>
            alert('Los datos de la tienda se actualizaron!');
            window.location='../../tiendas.php';
        </script>";
    } catch(e) {
        echo "Error";
    }
} else {
    echo'<script>alert("Tienda no actualizada!"); </script>';
}
?>