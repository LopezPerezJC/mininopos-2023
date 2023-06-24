<?php
    /*lista de servicios necesarios*/
    require "../../model/dataBase_connection.php";
    require 'config.php';

    $BaseDatos = new BaseDatos();
    session_start();

    $columns = ['username', 'nombre', 'img_usuario', 'rol'];
    $table = "usuarios";
    
    // $campo = $conn->real_escape_string($_POST['campo']) ?? null;
    $id_tienda = $_SESSION["id_tienda_usuario"];

    // $sql = "SELECT " . implode(", ", $columns) . "
    // FROM $table";

    // $where = '';
    // if($campo != null) {
    //     $where = "WHERE (";

    //     $cont = count($columns);
    //     for($i = 0; $i<$cont;$i++){
    //         $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    //     }
    //     $where = substr_replace($where, "", -3);
    //     $where .= ")";
        
    //     echo $where;
    // }

    $resultado = $BaseDatos->obtenerUsuariosTienda($id_tienda);

    $html = '';
    $numero_rows = $resultado->num_rows;
    
    if($numero_rows > 0){
        while($row = $resultado->fetch_assoc()) {
            $html .= '<tr>';
            $html .= '<td>' . $row['username'] . '</td>';
            $html .= '<td>' . $row['nombre'] . '</td>';
            $html .= '<td><img height="50px" with="50px" class="img_usuario" src="data:image/jpeg;base64,' . base64_encode($row['img_usuario']) . '"/></td>';
            $html .= '<td>' . $row['rol'] . '</td>';
            $html .= '<td><a href="" class="btn btn-warning">Editar</a></td>';
            $html .= '<td><a href="RecibidoEliminarUsuario.php?id=' .  $row['id'] .'" class="btn btn-danger">Eliminar</a></td>';
            $html .= '</tr>';
        }
    } else {
        $html .= '<tr>';
        $html .= '<td colspan="5">Sin resultados!</td>';
        $html .= '</tr>';
    }

    echo json_encode($html,JSON_UNESCAPED_UNICODE);

?>