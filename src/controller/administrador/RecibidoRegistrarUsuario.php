<?php
require "../../model/dataBase_connection.php";
$BaseDatos = new BaseDatos();

// $id_usuario != "" &&  $id_tienda = "" &&  $nombre = "" && $username = "" && $rol = "" && $contrasenia = "" && $img_user = ""

echo $id_usuario = null;
echo $id_tienda = $_POST['id_tienda_usuario'];
echo $nombre = $_POST['nombre_usuario'];
echo $username = $_POST['username_usuario'];
echo $rol = $_POST['rol_usuario'];
echo $contrasenia = $_POST['contrasenia_usuario'];
echo $img_user = $_POST['img_usuario'];
echo $check = getimagesize($_FILES["img_usuario"]["tmp_name"]);

    if($check !== false){
        $image = $_FILES['img_usuario']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    
        //Insert image content into database
        $insert = $BaseDatos->crearUsuario($id_usuario, $id_tienda, $username, $nombre, $contrasenia, $rol, $imgContent);
        
        if($insert){
            echo "<script type='text/javascript'>
            alert('el usuario se registró correctamente!');
            window.location='usuarios.php';
        </script>";
        }else{
            echo "<script type='text/javascript'>
            alert('el usuario se registró correctamente!');
            window.location='usuarios.php';
        </script>";
        } 
    }else{
        echo "<script type='text/javascript'>
        alert('Error en imagen!');
        window.location='usuarios.php';
    </script>";
    } 
?>