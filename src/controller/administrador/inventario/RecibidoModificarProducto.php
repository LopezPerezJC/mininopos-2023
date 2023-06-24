<?php
require "../../../model/dataBase_connection.php";
$BaseDatos = new BaseDatos();

$id_producto = $_REQUEST['id'];
$codigo = $_REQUEST['codigo_producto'];
$nombre = $_REQUEST['nombre_producto'];
$precio = $_REQUEST['precio_producto'];
$existencias = $_REQUEST['existencias_producto'];
$descripcion = $_REQUEST['descripcion_producto'];
$img_producto = $_REQUEST['img_producto'];
$image = $_FILES['img_producto']['tmp_name'];
$check = getimagesize($image);

//function actualizarUsuario($id_usuario, $id_tienda, $username, $nombre, $contrasenia, $rol, $img_usuario)
if($check != false){
    if($id_producto != "" && $codigo != "" && $nombre != "" && $precio != "" && $existencias != "" && $descripcion != "") {
        $imgContent = addslashes(file_get_contents($image));
        try {
            $update = $BaseDatos->actualizarProducto($id_producto, $codigo, $nombre, $precio, $existencias, $descripcion, $imgContent);

            echo "<script type='text/javascript'>
                alert('Producto actualizado correctamente!');
                window.location='../inventario.php';
            </script>";
        } catch(e) {
            echo "Error";
        }
    }    
} else {
    echo "<script>alert('Producto no actualizada!');
    window.location='../inventario.php';
    </script>";
}
?>