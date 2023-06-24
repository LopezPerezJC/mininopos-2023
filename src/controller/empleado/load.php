<?php
    /*lista de servicios necesarios*/
    require "../../model/dataBase_connection.php";
    $BaseDatos = new BaseDatos();
    session_start();

    $columns = ['codigo', 'nombre', 'img_producto', 'precio', 'existencias'];
    $table = "productos";
    
    $campo = isset($_POST['campo']);
    $id_tienda = $_SESSION["id_tienda_usuario"];

    $where = '';
    if($campo != null) {
        $where = "WHERE (";

        $cont = count($columns);
        for($i = 0; $i<$cont;$i++){
            $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
        }
        $where = substr_replace($where, "", -3);
        $where .= ")";
    }
    echo $where;

    $ResultadoConsultarProducto = $BaseDatos->buscandoProducto($id_tienda, $columns, $table, $where);

    $html = '';
    $numero_rows = $ResultadoConsultarProducto->num_rows;
    
    if($numero_rows > 0){
        while($row = $ResultadoConsultarProducto->fetch_assoc()) {
            $html .= '<tr>';
            $html .= '<td>' . $row['codigo'] . '</td>';
            $html .= '<td>' . $row['nombre'] . '</td>';
            $html .= '<td><img height="50px" width="50px" src="data:image/jpeg;base64,' . base64_encode($row['img_producto']) . '"/></td>';
            $html .= '<td>' . $row['precio'] . '</td>';
            $html .= '<td>' . $row['existencias'] . '</td>';
            $html .= '</tr>';
        }
    } else {
        $html .= '<tr>';
        $html .= '<td colspan="5">Sin resultados!</td>';
        $html .= '</tr>';
    }

    echo json_encode($html,JSON_UNESCAPED_UNICODE);

?>