<?php
require "../../../model/dataBase_connection.php";
$BaseDatos = new BaseDatos();

$id = $_GET['id'];
if($id != "") {
    try {
        $eliminar = $BaseDatos->eliminarTienda($id);
        echo'<script type="text/javascript">
    window.location.href="../tiendas.php";
    alert("Tienda eliminada con éxito!");
    </script>';
    } catch(e) {
        echo'<script type="text/javascript">
    window.location.href="../tiendas.php";
    alert("Error al eliminar la tienda :(");
    </script>';
    }
} else {
    echo'<script type="text/javascript">
    window.location.href="../tiendas.php";
    echo "El id es necesario!"';
}
?>