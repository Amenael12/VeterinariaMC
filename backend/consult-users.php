<?php
require_once './config.php';

$sql = "SELECT * FROM tb_usuarios";

$resultado = $mysqli->query($sql);

$data = array();

// Convertir el resultado de la consulta a un array asociativo
while ($row = $resultado->fetch_assoc()) {
    $data[] = $row;
}

// Convertir el array a formato JSON y enviarlo
echo json_encode($data);

// Cerrar la conexión
$mysqli->close();