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

    /*CRUD TIENDA */
    function nuevaTienda($id, $nombre, $direccion, $telefono, $correo) {
        $sql = "INSERT INTO tiendas VALUES('$id', '$nombre', '$direccion', '$telefono', '$correo')";
        $insercion = $this->conexion->query($sql);
    }
    function eliminarTienda($id) {
        $sql = "DELETE FROM tiendas WHERE id=$id";
        $operacion = $this->conexion->query($sql);
    }

    

    function getNumUsuarios() {
        $numero_usuarios = array();
        $consulta = "SELECT id from usuarios";
        $resultado = $this->conexion->query($consulta);
        $numero_usuarios = $resultado;

        return $numero_usuarios;
    }

    function getNumProductos() {
        $numero_productos = array();
        $consulta = "SELECT id from productos";
        $resultado = $this->conexion->query($consulta);
        $numero_productos = $resultado;
        return $numero_productos;
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