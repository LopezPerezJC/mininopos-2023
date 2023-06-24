<?php
require "../../model/dataBase_connection.php";
$BaseDatos = new BaseDatos();

$id_usuario = $_REQUEST['id_usuario'];
$id_tienda = $_REQUEST['id_tienda_usuario'];
$username = $_REQUEST['username_usuario'];
$nombre = $_REQUEST['nombre_usuario'];
$contrasenia = $_REQUEST['contrasenia_usuario'];
$rol = $_REQUEST['rol_usuario'];
$img_user = $_REQUEST['img_usuario'];
$image = $_FILES['img_usuario']['tmp_name'];
$check = getimagesize($image);

//function actualizarUsuario($id_usuario, $id_tienda, $username, $nombre, $contrasenia, $rol, $img_usuario)
if($check != false){
    if($id_tienda != "" && $username != "" && $nombre != "" && $contrasenia != "" && $rol != "") {
        $imgContent = addslashes(file_get_contents($image));
        $update = $BaseDatos->actualizarUsuario($id_usuario, $id_tienda, $username, $nombre, $contrasenia, $rol, $imgContent);

        echo "<script type='text/javascript'>
            alert('Usuario actualizado correctamente!');
                window.location='usuarios.php';
            </script>";
    }
    
} else {
    echo'<script>alert("Usuario no actualizada!"); </script>';
}



if($id_tienda != "" && $nombre != "" && $direccion != "" && $telefono != "" && $correo != "") {
    
}
?>