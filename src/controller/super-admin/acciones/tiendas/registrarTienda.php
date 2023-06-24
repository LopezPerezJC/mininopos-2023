<?php
require "../../../../model/dataBase_connection.php";
$BaseDatos = new BaseDatos();

$id =  null;
$nombre = $_POST['nombre_tienda'];
$direccion = $_POST['direccion_tienda'];
$telefono = $_POST['telefono_tienda'];
$correo = $_POST['correo_tienda'];

if($nombre != "" && $direccion != "" && $telefono != "" && $correo != "") {
    try{
        $insercion = $BaseDatos->nuevaTienda($id, $nombre, $direccion, $telefono, $correo);
        echo'<script type="text/javascript">
    window.location.href="../../tiendas.php";
    alert("Tienda registrada con éxito!");
    </script>';
    } catch(e) {
        echo'<script type="text/javascript">
    window.location.href="../../tiendas.php";
    alert("Error al registrar la tienda :(");
    </script>';
    }
} else {
    echo "campos vacios";
}
?>