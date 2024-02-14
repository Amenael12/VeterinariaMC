<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $nombre_mascota = $_POST['nombre_mascota'];
    $nombre_medico = $_POST['nombre_medico'];
    $nombre_propietario = $_POST['nombre_propietario'];
    $descripcion = $_POST['descripcion'];

    // Inserta la nueva mascota, el nuevo médico y el nuevo propietario en las tablas correspondientes si no existen ya
    mysqli_query($mysqli, "INSERT INTO tb_mascota (nombre) SELECT '$nombre_mascota' WHERE NOT EXISTS (SELECT * FROM tb_mascota WHERE nombre = '$nombre_mascota')");
    mysqli_query($mysqli, "INSERT INTO tb_medico (nombre) SELECT '$nombre_medico' WHERE NOT EXISTS (SELECT * FROM tb_medico WHERE nombre = '$nombre_medico')");
    mysqli_query($mysqli, "INSERT INTO tb_propietario (nombre) SELECT '$nombre_propietario' WHERE NOT EXISTS (SELECT * FROM tb_propietario WHERE nombre = '$nombre_propietario')");

    // Obtén los ID correspondientes a los nombres
    $id_mascota = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id_mascota FROM tb_mascota WHERE nombre = '$nombre_mascota'"))['id_mascota'];
    $id_medico = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id_medico FROM tb_medico WHERE nombre = '$nombre_medico'"))['id_medico'];
    $id_propietario = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT id_propietario FROM tb_propietario WHERE nombre = '$nombre_propietario'"))['id_propietario'];

    $query = "INSERT INTO tb_urgencias (fecha, id_mascota, id_medico, id_propietario, descripcion) VALUES ('$fecha', '$id_mascota', '$id_medico', '$id_propietario', '$descripcion')";
    $result = mysqli_query($mysqli, $query);
    header("Location: ver_urgencias.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/mystyle1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Crear Urgencia</title>
</head>
<body>
    <div class="icon-bar">
        <a href="home_use.html"><i class="fa fa-home"></i></a>
        <a href="ver_urgencias.php"><i class="fa fa-arrow-left"></i></a> 
    </div>
    <h2>Crear Urgencia</h2>
    <hr>
    <div class="container">
        <form action="crear_urgencia.php" method="POST">
            <label for="fecha">Fecha:</label>
            <input type="datetime-local" id="fecha" name="fecha" required> 
            <label for="nombre_mascota">Nombre de la Mascota:</label>
            <input type="text" id="nombre_mascota" name="nombre_mascota" required> 
            <label for="nombre_medico">Nombre del Médico:</label>
            <input type="text" id="nombre_medico" name="nombre_medico" required> 
            <label for="nombre_propietario">Nombre del Propietario:</label>
            <input type="text" id="nombre_propietario" name="nombre_propietario" required> 
            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" required> 
            <button type="submit" class="signupbtn">Crear Urgencia</button>
        </form>
    </div>
</body>
</html>

