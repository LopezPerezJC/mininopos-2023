<?php 
require_once "../model/Lista.php";

$lista=new Lista();

$id_compra=isset($_POST["id_compra"])? limpiarCadena($_POST["id_compra"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$precio=isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$cantidad_prod=isset($_POST["cantidad_prod"])? limpiarCadena($_POST["cantidad_prod"]):"";
$subtotal=isset($_POST["subtotal"])? limpiarCadena($_POST["subtotal"]):"";


switch ($_GET["op"]) {
	case 'guardar':
		$rspta = $lista->insertar($nombre, $precio, $imagen, $cantidad_prod, $subtotal);
		echo $rspta ? "Producto añadido correctamente" : "No se pudo añadir el producto";
	break;

	case'Total':
		$rspta=$lista->Total();
		echo $rspta ? "Datos Eliminados correctamente : " : "No se pudo Eliminar los datos";
	break;

		

	
}
