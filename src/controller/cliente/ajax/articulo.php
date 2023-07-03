<?php
require_once "../model/Articulo.php";

$articulo = new Articulo();

$id_compra = isset($_POST["id_compra"]) ? limpiarCadena($_POST["id_compra"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$precio = isset($_POST["precio"]) ? limpiarCadena($_POST["precio"]) : "";
$imagen = isset($_POST["imagen"]) ? limpiarCadena($_POST["imagen"]) : "";
$cantidad_prod = isset($_POST["cantidad_prod"]) ? limpiarCadena($_POST["cantidad_prod"]) : "";
$subtotal = isset($_POST["subtotal"]) ? limpiarCadena($_POST["subtotal"]) : "";


switch ($_GET["op"]) {
	case 'desactivar':
		$rspta = $articulo->desactivar($id_compra);
		echo $rspta ? "Datos Eliminados correctamente" : "No se pudo Eliminar los datos";
		break;

	case 'listar':
		$rspta = $articulo->listar();
		$data = array();
		$suma_subtotal = 0;

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" => $reg->nombre,
				"1" => '<input type="number"  id="precio' . $reg->id_compra . '" name="precio" class="form-control" value="' . $reg->precio . '" readonly>',
				"2" => "<img src='../files/articulos/" . $reg->imagen . "' height='50px' width='50px'>",
				"3" => '<div class="">
							<input type="number" style="width:50px;text-align: center;margin-top: 2px;" id="cantidad_prod_' . $reg->id_compra . '" name="cantidad_prod" class="form-control" value="' . $reg->cantidad_prod . '" readonly>
							<span class="input-group-btn">
								<button class="btn btn-danger" id="resta_' . $reg->id_compra . '" type="button" onclick="resta(' . $reg->id_compra . ')">-</button> 
							</span>
							<span class="input-group-btn">
								<button class="btn btn-success" id="suma_' . $reg->id_compra . '" type="button" onclick="suma(' . $reg->id_compra . ')">+</button>
							</span>
						</div>',
				"4" => '<input type="number" id="subtotal_' . $reg->id_compra . '" name="subtotal" class="form-control" value="' . $reg->subtotal . '" readonly>',

				"5" => ($reg->condicion) ? '<button class="btn btn-danger btn-xs" onclick="desactivar(' . $reg->id_compra . ')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-primary btn-xs" onclick="activar(' . $reg->id_compra . ')"><i class="fa fa-check"></i></button>'
			);
		}

		$results = array(
			"sEcho" => 1, // info para datatables
			"iTotalRecords" => count($data), // enviamos el total de registros al datatable
			"iTotalDisplayRecords" => count($data), // enviamos el total de registros a visualizar
			"aaData" => $data
		);
		echo json_encode($results);
		break;

		case 'cancela':
			$rspta = $articulo->cancela();
			echo $rspta ? "LISTA  ELIMINADA correctamente" : "No se pudo Eliminar los datos";
			break;
}
