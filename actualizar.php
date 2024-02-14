<?php
//conexion
include("config.php");
$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
$sql = "UPDATE tb_area SET descripcion ='$descripcion'
WHERE id_area= $id";
if (mysqli_query($mysqli, $sql)) {
    echo '<script languaje= "javascript">';
    echo 'window.location= "areas.php";';
    echo '</script>';
}
?>