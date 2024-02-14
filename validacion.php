<?php
include("config.php");

$nombre = $_POST['nombre'];
$clave = $_POST['clave'];

// Calcula el hash SHA-256 de la contraseña
$hash = hash('sha256', $clave);

$stmt = $mysqli->prepare("CALL Val_Usuario(?, ?)");
$stmt->bind_param("ss", $nombre, $hash);
$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $rol = $row['rol'];
    if($rol == 'administrador'){
        header("Location: areas.php");
    } else if($rol == 'usuario'){
        header("Location: registro.php");
    }
} else {
    echo "Usuario o contraseña incorrectos";
}
?>
