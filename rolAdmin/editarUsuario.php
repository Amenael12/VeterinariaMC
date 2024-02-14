<?php
include("config.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];

   
    $query = "UPDATE tb_usuarios SET nombre = ?, clave = ? WHERE id_usuario = ?";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, "ssi", $nombre, $clave, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("Location: ver_usuarios.php");
    } else {
        echo "Error al actualizar el usuario.";
    }
}

$query = "SELECT tb_usuarios.*, tb_roles.nombre_rol AS nombre_rol
          FROM tb_usuarios
          JOIN tb_roles ON tb_usuarios.id_rol = tb_roles.id_rol
          WHERE id_usuario = $id";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/mystyle1.css" />
    <title>Editar Usuario</title>
</head>
<body>
    <div class="icon-bar">
        <a href="home.html"><i class="fa fa-home"></i></a>
        <a href="ver_usuarios.php"><i class="fa fa-arrow-left"></i></a> 
    </div>
    <h2>Editar Usuario</h2>
    <hr>
    <div class="container">
        <form action="editarUsuario.php?id=<?php echo $id; ?>" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required> 

            <label for="clave">Clave:</label>
            <input type="text" id="clave" name="clave" value="<?php echo $row['clave']; ?>" required> 
            <button type="submit" class="signupbtn">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
