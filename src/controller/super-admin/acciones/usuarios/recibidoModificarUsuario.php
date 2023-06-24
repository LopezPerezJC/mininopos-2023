<?php
require "../../../../model/dataBase_connection.php";
$BaseDatos = new BaseDatos();

$id_usuario = $_REQUEST['id'];
$id_tienda = $_REQUEST['id_tienda'];
$username = $_REQUEST['username_usuario'];
$nombre = $_REQUEST['nombre_usuario'];
$contrasenia = $_REQUEST['contrasenia_usuario'];
$rol = $_REQUEST['rol_usuario'];
$img_usuario = $_REQUEST['img_usuario'];
$check = getimagesize($_FILES["img_usuario"]["tmp_name"]);

/*REVISAR CÓMO ACTUALIZAR LA IMG DEL USUARIO */

if($id_usuario != "" && $id_tienda != "" && $username != "" && $nombre != "" && $contrasenia != "" && $contrasenia != "" && $rol != "" && $img_usuario != "") {
    try {
        $image = $_FILES['img_usuario']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        $update = $BaseDatos->actualizarUsuario($id_usuario, $id_tienda, $username, $nombre, $contrasenia, $rol, $imgContent);
        echo "<script type='text/javascript'>
            alert('Los datos del usuario se actualizaron!');
            window.location='../../usuarios.php';
        </script>";
    } catch(e) {
        echo "Error";
    }
} else {
    echo'<script>alert("Datos vacios!"); </script>';
}
?>