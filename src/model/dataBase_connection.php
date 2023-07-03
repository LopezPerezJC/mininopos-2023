<?php
 
class BaseDatos
{ 
    private $host = 'localhost';
    private $usuario = 'root';
    private $pass = '';
    private $db = 'mininopos';
 
    private $conexion;

    public function __construct(){ 
    $this->conexion = new mysqli(
        $this->host,
        $this->usuario,
        $this->pass,
        $this->db
    );
        if ($this->conexion->errno){
            /*Lanzar modal de error */
        } else {
            /*Lanzar modal de error */
        }
    }

    
    /* TIENDAS */
    function getNumTiendas() {
        $numero_tiendas = array();
        $consulta = "SELECT id from tiendas";
        $resultado = $this->conexion->query($consulta);
        $numero_tiendas = $resultado;

        return $numero_tiendas;
    }

    function getTiendas() {        
        $tiendas = array();
        $consulta = "SELECT * from tiendas";
        $resultado = $this->conexion->query($consulta);
        $tiendas = $resultado;

        return $tiendas;
    }

    function buscarTienda($id) {
        $consulta = "SELECT * from tiendas WHERE id=$id";
        $resultado = $this->conexion->query($consulta);

        return $resultado;
    }
    
    function nuevaTienda($id, $nombre, $direccion, $telefono, $correo) {
        $sql = "INSERT INTO tiendas VALUES('$id', '$nombre', '$direccion', '$telefono', '$correo')";
        $insercion = $this->conexion->query($sql);
    }

    function eliminarTienda($id) {
        $sql = "DELETE FROM tiendas WHERE id=$id";
        $operacion = $this->conexion->query($sql);
    }

    function actualizarTienda($id_tienda, $nombre, $direccion, $telefono, $correo) {
        $sql = "UPDATE tiendas SET nombre ='$nombre', direccion ='$direccion', telefono  ='$telefono', correo ='$correo' WHERE id='$id_tienda'";
        $operacion = $this->conexion->query($sql);
    }

    function buscarNombreTienda($id) {
        $consulta = "SELECT nombre from tiendas WHERE id=$id";
        $resultado = $this->conexion->query($consulta);

        return $resultado;
    }


    /* USUARIOS */

    function getNumUsuarios() {
        $numero_usuarios = array();
        $consulta = "SELECT id from usuarios";
        $resultado = $this->conexion->query($consulta);
        $numero_usuarios = $resultado;

        return $numero_usuarios;
    }

    function getUsuarios() {
        $consulta = "SELECT * from usuarios";
        $resultado = $this->conexion->query($consulta);
        return $resultado;
    }

    function crearUsuario($id_usuario, $id_tienda, $username, $nombre, $contrasenia, $rol, $img_user) {
        $sql = "INSERT INTO usuarios VALUES('$id_usuario', '$id_tienda', '$username', '$nombre', '$contrasenia', '$rol', '$img_user')";
        $insercion = $this->conexion->query($sql);
    }

    function getImgUsuario() {
        $consulta = "SELECT img_usuario from usuarios WHERE id=";
        $resultado = $this->conexion->query($consulta);
        return $resultado;
    }

    function eliminarUsuario($id) {
        $sql = "DELETE FROM usuarios WHERE id=$id";
        $operacion = $this->conexion->query($sql);        
    }
    function actualizarUsuario($id_usuario, $id_tienda, $username, $nombre, $contrasenia, $rol, $img_usuario) {
        $sql = "UPDATE usuarios SET id=id, id_tienda ='$id_tienda', username  ='$username', nombre ='$nombre', contrasenia = '$contrasenia', rol = '$rol', img_usuario='$img_usuario' WHERE id='$id_usuario'";
        $operacion = $this->conexion->query($sql);
    }

    /* LOGIN */
    function existeUsuario($username, $contrasenia) {
        $sql = "SELECT id , id_tienda, username , nombre ,  contrasenia , rol FROM usuarios WHERE username='$username' AND contrasenia='$contrasenia'";
        $operacion = $this->conexion->query($sql);

        return $operacion;
    }

    function obtenerDatosUsuario($id_usuario) {
        $consulta = "SELECT * from usuarios WHERE id='$id_usuario'";
        $resultado = $this->conexion->query($consulta);
        return $resultado;
    }



    /*PRODUCTOS */
    function registrarProducto($id, $id_tienda, $codigo, $nombre, $precio, $existencias, $descripcion, $img_producto) {
        $insercion = "INSERT INTO productos values('$id', '$id_tienda', '$codigo', '$nombre', '$precio', '$existencias', '$descripcion', '$img_producto')";
        $insertar = $this->conexion->query($insercion);

        return $insertar;
    }

    function eliminarProducto($id) {
        $sql = "DELETE FROM productos WHERE id=$id";
        $operacion = $this->conexion->query($sql);
    }

    function actualizarProducto($id_producto, $codigo, $nombre, $precio, $existencias, $descripcion, $img_producto) {
        $sql = "UPDATE productos SET id=id, id_tienda=id_tienda, codigo='$codigo', nombre ='$nombre', precio ='$precio', existencias  ='$existencias', descripción ='$descripcion' , img_producto ='$img_producto' WHERE id='$id_producto'";
        $operacion = $this->conexion->query($sql);
    }

    function getNumProductos() {
        $consulta = "SELECT id from productos";
        $resultado = $this->conexion->query($consulta);

        return $resultado;
    }

    function getProductosTienda($id_tienda) {
        $consulta = "SELECT * from productos WHERE id_tienda='$id_tienda'";
        $resultado = $this->conexion->query($consulta);

        return $resultado;
    }

    function buscandoProducto($id_tienda, $arreglo, $tabla, $where) {
        echo $consulta = "SELECT " . implode(", ", $arreglo) . "
        FROM $tabla $where";

        $resultado = $this->conexion->query($consulta);

        return $resultado;
    }

    function obtenerUsuariosTienda($id_tienda) {
        $consulta = "SELECT * from usuarios WHERE id_tienda='$id_tienda'";
        $resultado = $this->conexion->query($consulta);
        return $resultado;
    }

    /*OBTENER DATOS PARA MÓDULO INICIO*/
    function obtenerNumeroProductos($id_tienda){
        $numProductos = "SELECT * FROM productos WHERE id_tienda=$id_tienda";
        $resultProductos = $this->conexion->query($numProductos);

        return $resultProductos;
    }
    function obtenerNumeroUsuarios($id_tienda){
        $numUsuarios = "SELECT * FROM usuarios WHERE id_tienda=$id_tienda";
        $resultUsuarios = $this->conexion->query($numUsuarios);

        return $resultUsuarios;
    }
    function getUsersGlobal(){
        $users = "SELECT * FROM usuarios";
        $usersResult = $this->conexion->query($users);

        return $usersResult;
    }
    
    /* CUESTIONARIOS */
    function nuevoCuestionario($id, $id_tienda, $id_usuario, $respuesta1, $respuesta2, $respuesta3, $sugerencia) {
        $registrar = "INSERT INTO cuestionarios VALUES('$id', '$id_tienda', '$id_usuario', '$respuesta1', '$respuesta2', '$respuesta3', '$sugerencia')";
        $resultado = $this->conexion->query($registrar);

        return $resultado;

        //CREATE TABLE cuestionarios(id int not null auto_increment, id_tienda int, $respuesta1 int, $respuesta2 int, $respuesta3 int, $sugerencia varchar(300), primary key(id), foreign key(id_tienda) references tiendas(id));
        //create table cuestionarios(id int not null auto_increment, id_tienda int, id_usuario, respuesta1 int, respuesta2 int, respuesta3 int, sugerencia varchar(200), primary key(id), foreign key(id_tienda) references tiendas(id), foreign key(id_usuario) references usuarios(id)) on delete on update cascade;
        
    }

    function obtener_Resultados_Pregunta1(){
        $consulta = "SELECT t.respuesta1, COUNT(c.respuesta1) AS conteo FROM (SELECT 1 AS respuesta1 UNION ALL SELECT 2 AS respuesta1 UNION ALL SELECT 3 AS respuesta1 UNION ALL SELECT 4 AS respuesta1 UNION ALL SELECT 5 AS respuesta1) AS t LEFT JOIN cuestionarios AS c ON t.respuesta1 = c.respuesta1 GROUP BY t.respuesta1";
        $resultados = $this->conexion->query($consulta);

        $resultados = $resultados->fetch_all();        
        return $resultados;
        //CREATE TABLE cuestionarios(id int not null auto_increment, id_tienda int, $respuesta1 int, $respuesta2 int, $respuesta3 int, $sugerencia varchar(300), primary key(id), foreign key(id_tienda) references tiendas(id));
        
    }

    function obtener_Resultados_Pregunta2(){
        $consulta = "SELECT t.respuesta2, COUNT(c.respuesta2) AS conteo FROM (SELECT 1 AS respuesta2 UNION ALL SELECT 2 AS respuesta2 UNION ALL SELECT 3 AS respuesta2 UNION ALL SELECT 4 AS respuesta2 UNION ALL SELECT 5 AS respuesta2) AS t LEFT JOIN cuestionarios AS c ON t.respuesta2 = c.respuesta2 GROUP BY t.respuesta2";
        $resultados = $this->conexion->query($consulta);

        $resultados = $resultados->fetch_all();        
        return $resultados;
        //CREATE TABLE cuestionarios(id int not null auto_increment, id_tienda int, $respuesta1 int, $respuesta2 int, $respuesta3 int, $sugerencia varchar(300), primary key(id), foreign key(id_tienda) references tiendas(id));
        
    }

    function obtener_Resultados_Pregunta3(){
        $consulta = "SELECT t.respuesta3, COUNT(c.respuesta3) AS conteo FROM (SELECT 1 AS respuesta3 UNION ALL SELECT 2 AS respuesta3 UNION ALL SELECT 3 AS respuesta3 UNION ALL SELECT 4 AS respuesta3 UNION ALL SELECT 5 AS respuesta3) AS t LEFT JOIN cuestionarios AS c ON t.respuesta3 = c.respuesta3 GROUP BY t.respuesta3";
        $resultados = $this->conexion->query($consulta);

        $resultados = $resultados->fetch_all();        
        return $resultados;
        //CREATE TABLE cuestionarios(id int not null auto_increment, id_tienda int, $respuesta1 int, $respuesta2 int, $respuesta3 int, $sugerencia varchar(300), primary key(id), foreign key(id_tienda) references tiendas(id));
        
    }


    function encuestaContestada($id_usuario){
        $consultar = "SELECT id_usuario FROM cuestionarios WHERE id_usuario=$id_usuario";
        $resultado = $this->conexion->query($consultar);


        return $resultado;
        
        // while($row = $resultado->fetch_assoc()){
        //     echo '<pre>';
        //         print_r($row);
        //     echo '</echo>';
        //     if($row['id_usuario'] == $id_usuario){
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }
    }
 
    // function getData($sql)
    // {
    //     $data = array();
    //     $result = mysqli_query($this->connection, $sql);
 
    //     $error = mysqli_error($this->connection);
 
    //     if (empty($error)) {
    //         if (mysqli_num_rows($result) > 0) {
    //             while ($row = mysqli_fetch_assoc($result)) {
    //                 array_push($data, $row);
    //             }
    //         }
    //     } else {
    //         throw new Exception($error);
    //     }
    //     return $data;
    // }
 
    // function numRows($sql)
    // {
    //     $result = mysqli_query($this->connection, $sql);
    //     $error = mysqli_error($this->connection);
 
    //     if (empty($error)) {
    //         return mysqli_num_rows($result);
    //     } else {
    //         throw new Exception($error);
    //     }
    // }
 
    // function getDataSingle($sql)
    // {
 
    //     $result = mysqli_query($this->connection, $sql);
 
    //     $error = mysqli_error($this->connection);
 
    //     if (empty($error)) {
    //         if (mysqli_num_rows($result) > 0) {
    //             return mysqli_fetch_assoc($result);
    //         }
    //     } else {
    //         throw new Exception($error);
    //     }
    //     return null;
    // }
 
    // function getDataSingleProp($sql, $prop)
    // {
 
    //     $result = mysqli_query($this->connection, $sql);
 
    //     $error = mysqli_error($this->connection);
 
    //     if (empty($error)) {
    //         if (mysqli_num_rows($result) > 0) {
    //             $data = mysqli_fetch_assoc($result);
    //             return $data[$prop];
    //         }
    //     } else {
    //         throw new Exception($error);
    //     }
    //     return null;
    // }
 
    // function executeInstruction($sql)
    // {
    //     $success = mysqli_query($this->connection, $sql);
 
    //     $error = mysqli_error($this->connection);
 
    //     if (empty($error)) {
    //         return $success;
    //     } else {
    //         throw new Exception($error);
    //     }
    // }
 
    // function close()
    // {
    //     mysqli_close($this->connection);
    // }
 
    // function getLastId()
    // {
    //     return mysqli_insert_id($this->connection);
    // }
}

?>