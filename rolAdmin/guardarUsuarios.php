<?php
include("config.php");

$nombre = $_POST['nombre'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];

$hash = hash('sha256', $clave );

// Primero, intenta insertar el nuevo rol
$query_insert_rol = "INSERT INTO tb_roles (nombre_rol) VALUES ('$rol')";
mysqli_query($mysqli, $query_insert_rol);

// Obtén el id del rol recién insertado o existente
$id_rol = mysqli_insert_id($mysqli);

// Ahora, inserta el nuevo usuario con el id del rol
$query_insert_usuario = "INSERT INTO tb_usuarios (nombre, clave, id_rol) VALUES ('$nombre', '$hash', '$id_rol')";
mysqli_query($mysqli, $query_insert_usuario);

// Redirige al usuario a la página de inicio de sesión
header("Location: registroUsuario.php");
?>