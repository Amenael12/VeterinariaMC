<?php
require_once './config.php';

$sql = "SELECT concat_ws(' ',tm.nombre, tm.apellido) as nombre, tm.estado as id_rol FROM tb_medicos tm";

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