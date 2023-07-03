<?php 
//incluir la conexion de base de datos
require "../BD/Conexion.php";
class Lista{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$precio,$imagen,$cantidad_prod,$subtotal){
	$sql="INSERT INTO compra_total(nombre,precio,imagen,cantidad_prod,subtotal) VALUES ('$nombre','$precio','$imagen','$cantidad_prod','$subtotal')";
	return ejecutarConsulta($sql);
}
public function Venta($nombre,$cantidad_prod){
	$sql="INSERT INTO venta_prod(nombre_prod,cantidad) VALUES ('$nombre','$cantidad_prod')";
	return ejecutarConsulta($sql);
}


}

 ?>
