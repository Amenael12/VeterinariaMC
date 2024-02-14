<?php
include("config.php");

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$numero = $_POST['telefono'];
$correo = $_POST['email'];
$direccion =$_POST['direccion'];
//--------------------------------------
$nombre_m =$_POST['nombre_mascota'];
$especie = $_POST['especie'];
$sexo = $_POST['sexo'];
$fecha = $_POST['fecha'];
$edad =$_POST['edad'];



$query_insert_propi = "INSERT INTO tb_propietario (cedula, nombre, apellido, telefono, correo, direccion) 
VALUES('$cedula' , '$nombre' , '$apellido' , '$numero' , '$correo' , '$direccion')";
mysqli_query($mysqli, $query_insert_propi);

// Obtén el id del rol recién insertado o existente
$id_propietario = mysqli_insert_id($mysqli);


$query_insert_mascota = "INSERT INTO tb_mascota (id_propietario, nombre, especie, sexo, nacimiento, edad) 
VALUES ('$id_propietario', '$nombre_m', '$especie', '$sexo', '$fecha', '$edad')";
mysqli_query($mysqli, $query_insert_mascota);

// Redirige al usuario a la página de inicio de sesión
header("Location: registroMascota.php");
?>
