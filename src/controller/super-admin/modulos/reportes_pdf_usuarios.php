<?php
require "../../../model/dataBase_connection.php";
require "../../PDF/fpdf.php";

$base_datos = new BaseDatos();

$base_datos->getUsersGlobal();

$usersList = $sentenciasSQL->fetchAll(PDO::FETCH_ASSOC);


?>