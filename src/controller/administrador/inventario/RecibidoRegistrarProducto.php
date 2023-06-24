<?php
require "../../../model/dataBase_connection.php";
$BaseDatos = new BaseDatos();

// $id_usuario != "" &&  $id_tienda = "" &&  $nombre = "" && $username = "" && $rol = "" && $contrasenia = "" && $img_user = ""
$id = null;
$id_tienda = $_POST['id_tienda_usuario'];
$codigo = $_POST['codigo_producto'];
$nombre = $_POST['nombre_producto'];
$img_producto = $_POST['img_producto'];
$precio = $_POST['precio_producto'];
$existencias = $_POST['existencias_producto'];
$descripcion = $_POST['descripcion_producto'];

$check = getimagesize($_FILES["img_producto"]["tmp_name"]);

    if($check !== false){
        $image = $_FILES['img_producto']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    
        //Insert image content into database
        $insert = $BaseDatos->registrarProducto($id, $id_tienda, $codigo, $nombre, $precio, $existencias, $descripcion, $imgContent);
        
        if($insert){
            echo "<script type='text/javascript'>
            alert('El producto se registró correctamente!');
            window.location='./../inventario.php';
        </script>";
        }else{
            echo "<script type='text/javascript'>
            alert('El producto se registró correctamente!');
            window.location='./../inventario.php';
        </script>";
        } 
    }else{
        echo "<script type='text/javascript'>
        alert('Error en imagen!');
        window.location='./../inventario.php';
    </script>";
    } 
?>