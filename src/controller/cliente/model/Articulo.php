<?php 
//incluir la conexion de base de datos
require "../BD/Conexion.php";
class Articulo{


	//implementamos nuestro constructor
public function __construct(){

}

public function desactivar($id_compra){
	$sql="DELETE FROM compra_total WHERE compra_total.id_compra = '$id_compra'";
	return ejecutarConsulta($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT * FROM compra_total WHERE condicion='1'";
	return ejecutarConsulta($sql);
}
public function cancela() {
	$sql = "TRUNCATE TABLE compra_total";
	return ejecutarConsulta($sql);
}
  

}
 ?>
