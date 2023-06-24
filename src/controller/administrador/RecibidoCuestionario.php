<?php
require "../../model/dataBase_connection.php";
$BaseDatos = new BaseDatos();

//Selecciona uno y selecciona más de uno*
//usar diferentes tipos de controles

// $id_usuario != "" &&  $id_tienda = "" &&  $nombre = "" && $username = "" && $rol = "" && $contrasenia = "" && $img_user = ""
$id_tienda = $_POST['id_tienda'];
$respuesta_pregunta_1 = $_POST['opciones-pregunta-1'];
$respuesta_pregunta_2 = $_POST['opciones-pregunta-2'];
$respuesta_pregunta_3 = $_POST['opciones-pregunta-3'];
$sugerencia = $_POST['pregunta-4'];

if($id_tienda != "" && $respuesta_pregunta_1 != "" && $respuesta_pregunta_2 != "" && $respuesta_pregunta_3 != ""){
        // $insert = $BaseDatos->registrarProducto();
        //CREATE TABLE cuestionarios(id int not null auto_increment, id_tienda int, $respuesta1 int, $respuesta2 int, $respuesta3 int, $sugerencia varchar(300), primary key(id), foreign key(id_tienda) references tiendas(id));
        $insert = $BaseDatos->nuevoCuestionario($id_tienda, $respuesta_pregunta_1, $respuesta_pregunta_2, $respuesta_pregunta_3, $sugerencia);
        if($insert){
            echo "<script type='text/javascript'>
            alert('El cuestionario se envió correctamente!');
            window.location='./index.php';x
        </script>";
        }else{
            echo "<script type='text/javascript'>
            alert('El cuestionario se envió correctamente!');
            window.location='./index.php';
        </script>";
        } 
    }else{
        echo "<script type='text/javascript'>
        alert('Error, el cuestionario no se envió!');
        window.location='./index.php';
    </script>";
    } 
?>