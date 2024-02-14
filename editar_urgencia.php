<?php
include("config.php");

$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $nombre_mascota = $_POST['nombre_mascota'];
    $nombre_medico = $_POST['nombre_medico'];
    $nombre_propietario = $_POST['nombre_propietario'];
    $descripcion = $_POST['descripcion'];

    // Obtén los ID correspondientes a los nombres
    $id_mascota = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id_mascota FROM tb_mascota WHERE nombre = '$nombre_mascota'"))['id_mascota'];
    $id_medico = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id_medico FROM tb_medico WHERE nombre = '$nombre_medico'"))['id_medico'];
    $id_propietario = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id_propietario FROM tb_propietario WHERE nombre = '$nombre_propietario'"))['id_propietario'];

    $query = "UPDATE tb_urgencias SET fecha = '$fecha', id_mascota = '$id_mascota', id_medico = '$id_medico', id_propietario = '$id_propietario', descripcion = '$descripcion' WHERE id_urgencia = $id";
    $result = mysqli_query($mysqli, $query);
    header("Location: ver_urgencias.php");
}

$query = "SELECT tb_urgencias.*, tb_mascota.nombre AS nombre_mascota, tb_medico.nombre AS nombre_medico, tb_propietario.nombre AS nombre_propietario 
          FROM tb_urgencias 
          JOIN tb_mascota ON tb_urgencias.id_mascota = tb_mascota.id_mascota 
          JOIN tb_medico ON tb_urgencias.id_medico = tb_medico.id_medico 
          JOIN tb_propietario ON tb_urgencias.id_propietario = tb_propietario.id_propietario 
          WHERE id_urgencia = $id";
$result = mysqli_query($mysqli, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
    <title>Editar Urgencia</title>
</head>
<body>
    <div class="icon-bar">
        <a href="home.html"><i class="fa fa-home"></i></a>
        <a href="ver_urgencias.php"><i class="fa fa-arrow-left"></i></a> 
    </div>
    <h2>Editar Urgencia</h2>
    <hr>
    <div class="container">
        <form action="editar_urgencia.php?id=<?php echo $id; ?>" method="POST">
            <label for="fecha">Fecha:</label>
            <input type="datetime-local" id="fecha" name="fecha" value="<?php echo $row['fecha']; ?>" required> 
            <label for="nombre_mascota">Nombre de la Mascota:</label>
            <input type="text" id="nombre_mascota" name="nombre_mascota" value="<?php echo $row['nombre_mascota']; ?>" required> 
            <label for="nombre_medico">Nombre del Médico:</label>
            <input type="text" id="nombre_medico" name="nombre_medico" value="<?php echo $row['nombre_medico']; ?>" required> 
            <label for="nombre_propietario">Nombre del Propietario:</label>
            <input type="text" id="nombre_propietario" name="nombre_propietario" value="<?php echo $row['nombre_propietario']; ?>" required> 
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" value="<?php echo $row['descripcion']; ?>" required> 
            <button type="submit" class="signupbtn">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
