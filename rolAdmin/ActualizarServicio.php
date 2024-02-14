<?php
//conexion
include("config.php");
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$costo = $_POST['costo'];
$sql = "UPDATE tb_servicios SET nombre ='$nombre', descripcion ='$descripcion', costo = '$costo'
WHERE id_servicio= $id";

if (mysqli_query($mysqli, $sql)) {
    echo '<script languaje= "javascript">';
    echo 'alert("Guardado");';
    echo 'window.location="serviciosList.php"';
    echo '</script>';
}
?>