
<?php
//conexion
include("config.php");
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$clave = $_POST['clave'];

//$sql = "UPDATE tb_roles SET nombre_rol ='$rol' WHERE id_rol= $id";

$sql = "UPDATE tb_usuarios SET nombre ='$nombre', clave ='$clave'
WHERE id_usuario= $id";

if (mysqli_query($mysqli, $sql)) {
    echo '<script languaje= "javascript">';
    echo 'window.location= "editarUsuario.php";';
    echo '</script>';
}
?>


