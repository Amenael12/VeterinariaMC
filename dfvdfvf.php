// registro.php
<?php
include("config.php");

$nombre = $_POST['nombre'];
$clave = $_POST['clave'];

// Genera un salt aleatorio


// Calcula el hash de la contraseña con el salt
$hash = hash('sha256', $clave );

$query = "INSERT INTO tb_usuario (nombre, clave ) VALUES ('$nombre', '$hash')";
mysqli_query($mysqli, $query);

// Redirige al usuario a la página de inicio de sesión
header("Location: login.php");
?>
