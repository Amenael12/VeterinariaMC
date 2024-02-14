<?php
//conexion
include("config.php");
$id = $_POST['id'];
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$sql = "UPDATE tb_propietario SET cedula='$cedula' ,nombre ='$nombre', apellido ='$apellido', telefono = '$telefono', correo = '$correo', direccion = '$direccion'
WHERE id_propietario= $id";
if (mysqli_query($mysqli, $sql)) {
    echo '<script languaje= "javascript">';
    echo 'alert("Guardado");';
    echo 'window.location="propietarios.php"';
    echo '</script>';
}
?>