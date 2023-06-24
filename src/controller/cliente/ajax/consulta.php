<?php
	include("../BD/conexion.php");
	 
	 	if(isset($_POST['buscar']))
    { 
    	$nombre = $_POST['nombre'];
    	$valores = array();
    	$valores['existe'] = "0";

    	//CONSULTAR
		  $resultados = mysqli_query($conexion,"SELECT * FROM articulo WHERE nombre = '$nombre'");
		  while($consulta = mysqli_fetch_array($resultados))
		  {
		  	$valores['existe'] = "1"; //Esta variable no la usamos en el vídeo (se me olvido, lo siento xD). Aqui la uso en la linea 97 de registro.php
		  	$valores['precio'] = $consulta['precio'];
			$valores['imagen'] = $consulta['imagen'];	    
		  }
		  sleep(1);
		  $valores = json_encode($valores);
			echo $valores;
    }

?>

