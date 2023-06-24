<?php
    $conn = new mysqli("localhost", "root", "", "mininopos");

    if($conn->connect_error) {
        die('Error de conexión con MySQL ' . $conn->connect_error);
    }

?>