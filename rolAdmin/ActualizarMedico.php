<?php
//conexion
include("config.php");
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$especialidad = $_POST['especialidad'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$sql = "UPDATE tb_medicos SET nombre ='$nombre', apellido ='$apellido', especialidad= '$especialidad', telefono = '$telefono', correo = '$correo', direccion = '$direccion'
WHERE id_medico= $id";
if (mysqli_query($mysqli, $sql)) {
    echo '<script languaje= "javascript">';
    echo 'window.location= "medicosList.php";';
    echo '</script>';
}
?>