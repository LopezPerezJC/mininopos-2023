<?php
require "./../../model/dataBase_connection.php";
$BaseDatos = new BaseDatos();

/*REVISAR CÓMO ACTUALIZAR LA IMG DEL USUARIO */
if(isset($_POST['btn-login'])) {
    $username_usuario = $_POST['username_usuario'];
    $constrasenia_usuario = $_POST['contrasenia_usuario'];

    if($username_usuario != "" && $constrasenia_usuario !="") {
        try {
            $comprobar = $BaseDatos->existeUsuario($username_usuario, $constrasenia_usuario);
            
            $estadoEncontrado = false;
            $datos_usuario = array();
            while($row = $comprobar->fetch_assoc()) {
                $datos_usuario = $row;
                if($row["username"] == $username_usuario && $row["contrasenia"] == $constrasenia_usuario){
                    $estadoEncontrado = true;
                }
            }
            
            if($estadoEncontrado == true) {
                //comprobar que tipo de usuario es
                //iniciar sesión
                //redirigir
                // echo "<pre>";
                //     print_r($datos_usuario);
                // echo "</pre>";

                // [id] => 1
                // [id_tienda] => 1
                // [username] => lopezperezjc
                // [nombre] => Juan Carlos López Pérez
                // [contrasenia] => $P4rr0w5
                // [rol] => super-admin
                


                if($datos_usuario["rol"] == "super-admin") {
                    session_start();
                    $_SESSION["id_usuario"] = $datos_usuario["id"];
                    $_SESSION["id_tienda_usuario"] = $datos_usuario["id_tienda"];
                    $_SESSION["username_usuario"] = $datos_usuario["username"];
                    $_SESSION["nombre_usuario"] = $datos_usuario["nombre"];
                    $_SESSION["password_usuario"] = $datos_usuario["contrasenia"];
                    $_SESSION["rol_usuario"] = $datos_usuario["rol"];

                    header("Location:  ./../super-admin/index.php");

                    echo "<script type='text/javascript'>
                    alert('Bienvenido al punto de venta MininoPOS 🐱!');
                    </script>";
                }
                if($datos_usuario["rol"] == "administrador") {
                    session_start();
                    $_SESSION["id_usuario"] = $datos_usuario["id"];
                    $_SESSION["id_tienda_usuario"] = $datos_usuario["id_tienda"];
                    $_SESSION["username_usuario"] = $datos_usuario["username"];
                    $_SESSION["nombre_usuario"] = $datos_usuario["nombre"];
                    $_SESSION["password_usuario"] = $datos_usuario["contrasenia"];
                    $_SESSION["rol_usuario"] = $datos_usuario["rol"];

                    header("Location:  ./../administrador/index.php");


                    echo "<script type='text/javascript'>
                    alert('Bienvenido al punto de venta MininoPOS 🐱!');
                    </script>";
                }
                if($datos_usuario["rol"] == "empleado") {
                    session_start();
                    $_SESSION["id_usuario"] = $datos_usuario["id"];
                    $_SESSION["id_tienda_usuario"] = $datos_usuario["id_tienda"];
                    $_SESSION["username_usuario"] = $datos_usuario["username"];
                    $_SESSION["nombre_usuario"] = $datos_usuario["nombre"];
                    $_SESSION["password_usuario"] = $datos_usuario["contrasenia"];
                    $_SESSION["rol_usuario"] = $datos_usuario["rol"];

                    header("Location:  ./../empleado/index.php");


                    echo "<script type='text/javascript'>
                    alert('Bienvenido al punto de venta MininoPOS 🐱!');
                    </script>";
                }            
                
            } else {
                echo 'El usuario no existe!';
                echo "<script type='text/javascript'>
                alert('El usuario no existe!');
                window.location='../../../index.html';
                </script>";
            }
        } catch(e) {
            echo "Error con la BD";
        }
    }else {
        echo 'Credenciales necesarios!';
            echo "
            <script type='text/javascript'>
                alert('Faltan datos!');
            </script>
            ";
        }
}

?>